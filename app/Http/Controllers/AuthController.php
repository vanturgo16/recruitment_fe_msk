<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

// Mail
use App\Mail\ConfirmationAccount;
use App\Mail\ReqResetPassword;
use App\Mail\TwoFAMail;

// Model
use App\Models\User;
use App\Models\Candidate;
use App\Models\MstRules;

class AuthController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'captcha_input' => 'required|in:' . session('captcha_code'),
        ], [
            'captcha_input.required' => 'Kode CAPTCHA harus diisi.',
            'captcha_input.in' => 'Kode CAPTCHA yang dimasukkan tidak sesuai.',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();

            // Validate Candidate & Active
            if ($user->role != 'Candidate') {
                Auth::logout();
                return redirect()->route('login')->with('fail', 'Email atau password salah.');
            }
            if ($user->is_active != 1) {
                Auth::logout();
                return redirect()->route('login')->with('fail', 'Akun belum diaktivasi, silahkan cek email untuk aktivasi akun.');
            }

            $isEnable2FA = optional(MstRules::where('rule_name', 'Enable 2FA Candidates')->first())->rule_value;

            // ✅ If bulk candidate flag has 2FA enabled
            if ($isEnable2FA) {
                // Get expiration time from rules table
                $expiredSeconds = MstRules::where('rule_name', 'Expired 2FA Code (in second)')
                    ->value('rule_value') ?? 120; // default 120s if not found

                // Generate 6-digit random code
                $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

                // Update user with code and expiry time
                $user->update([
                    'two_fa_code' => $code,
                    'two_fa_expired_at' => Carbon::now()->addSeconds($expiredSeconds),
                ]);

                // Send to email
                $development = MstRules::where('rule_name', 'Development')->first()->rule_value;
                if ($development == 1) {
                    $toemail = MstRules::where('rule_name', 'Email Development')->pluck('rule_value')->toArray();
                } else {
                    $toemail = $user->email;
                }
                Mail::to($toemail)->send(new TwoFAMail($user, $code, $expiredSeconds));

                Auth::logout(); // logout temporarily until code verified
                session(['pending_2fa_user' => $user->email]); // keep email to verify later

                return redirect()->route('verify.2fa')->with('info', 'Kode 2FA telah dikirim ke email Anda.');
            }

            $user->update([
                'last_login' => now(),
                'login_counter' => $user->login_counter + 1,
                'last_session' => Session::getId(),
            ]);

            // If no 2FA required
            return redirect()->route('dashboard')->with('success', 'Login Berhasil');
        }
        
        return redirect()->route('login')->with('fail', 'Email atau password salah.');
    }

    // REGISTER
    public function register(Request $request)
    {
        return view('auth.register');
    }
    public function storeRegist(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:25',
            'lastname'  => 'required|string|max:25',
            'nik'       => 'required|string|max:20|unique:candidate,id_card_no',
            'phone'     => 'required|string|max:15',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:8',
        ], [
            // firstname
            'firstname.required' => 'Nama depan wajib diisi.',
            'firstname.string'   => 'Nama depan harus berupa teks.',
            'firstname.max'      => 'Nama depan maksimal :max karakter.',
            // lastname
            'lastname.required'  => 'Nama belakang wajib diisi.',
            'lastname.string'    => 'Nama belakang harus berupa teks.',
            'lastname.max'       => 'Nama belakang maksimal :max karakter.',
            // nik
            'nik.required'       => 'NIK wajib diisi.',
            'nik.string'         => 'NIK harus berupa teks.',
            'nik.max'            => 'NIK maksimal :max karakter.',
            // 'nik.unique'         => 'NIK tersebut sudah terdaftar.',
            'nik.unique'         => 'Akun sudah terdaftar.',
            // phone
            'phone.required'     => 'Nomor telepon wajib diisi.',
            'phone.string'       => 'Nomor telepon harus berupa teks.',
            'phone.max'          => 'Nomor telepon maksimal :max karakter.',
            // email
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            // 'email.unique'       => 'Email tersebut sudah terdaftar.',
            'email.unique'       => 'Akun sudah terdaftar.',
            // password
            'password.required'  => 'Password wajib diisi.',
            'password.string'    => 'Password harus berupa teks.',
            'password.min'       => 'Password minimal :min karakter.',
        ]);

        $expConfirm = MstRules::where('rule_name', 'Expired Confirmation Email')->first()->rule_value;
        $development = MstRules::where('rule_name', 'Development')->first()->rule_value;
        $emailDev = MstRules::where('rule_name', 'Email Development')->pluck('rule_value')->toArray();
        $toEmail = ($development == 1) ? $emailDev : $request->email;

        DB::beginTransaction();
        try {
            // Insert to user
            $user = User::create([
                'name'       => $request->firstname . ' ' . $request->lastname,
                'email'      => $request->email,
                'password'   => Hash::make($request->password),
                'role'       => 'Candidate',
                'is_active'  => 0,
            ]);
            // Insert to candidate
            $candidate = Candidate::create([
                'id_user'   => $user->id,
                'candidate_first_name'  => $request->firstname,
                'candidate_last_name'   => $request->lastname,
                'phone'      => $request->phone,
                'email'      => $request->email,
                'id_card_no' => $request->nik,
                'tnc_check' => 1,
            ]);
            // Update user_id to candidate
            $user->update(['id_candidate' => $candidate->id]);
            
            $data = [
                'firstname' => $request->firstname,
                'lastname'  => $request->lastname,
                'email'     => $request->email,
                'password'  => $request->password,
            ];
            $link = url('auth/confirmation/' . base64_encode($request->email));
            // Send Email
            $mailContent = new ConfirmationAccount($data, $link, $expConfirm);
            Mail::to($toEmail)->send($mailContent);

            DB::commit();
            return redirect()->back()->with('success', 'Pendaftaran berhasil, silahkan cek email untuk aktivasi akun.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['fail' => 'Pendaftaran gagal, silahkan coba lagi.']);
        }
    }
    public function confirmAccount($email)
    {
        $email = base64_decode($email);
        $user = User::where('email', $email)->first();
        if ($user) {
            if ($user->is_active == 0) {
                $user->update([
                    'email_verified_at' => now(),
                    'is_active' => 1
                ]);
                return redirect()->route('login')->with('success', 'Akun berhasil diaktivasi, silahkan login.');
            } else {
                return redirect()->route('login')->with('info', 'Akun sudah teraktivasi, silahkan login.');
            }
        } else {
            return redirect()->route('login')->with('fail', 'Akun tidak ditemukan / link kadaluarsa.');
        }
    }

    // FORGET PASSWORD
    public function forgetPassword()
    {
        return view('auth.forgetPassword');
    }
    public function storeforgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
        ]);

        $data = User::where('email', $request->email)->first();
        $development = MstRules::where('rule_name', 'Development')->first()->rule_value;
        $emailDev = MstRules::where('rule_name', 'Email Development')->pluck('rule_value')->toArray();
        $toEmail = ($development == 1) ? $emailDev : $request->email;

        if ($data) {
            $link = url('auth/reset-password/' . base64_encode($request->email));
            // Send Email
            $mailContent = new ReqResetPassword($data, $link);
            Mail::to($toEmail)->send($mailContent);
            return redirect()->back()->with('success', 'Silahkan cek email untuk mereset password.');
        } else {
            return redirect()->back()->with('fail', 'Email tidak ditemukan.');
        }
    }

    // RESET PASSWORD
    public function resetPassword($email)
    {
        $email = base64_decode($email);
        $user = User::where('email', $email)->first();
        if ($user) {
            return view('auth.resetPassword', compact('user'));
        } else {
            return redirect()->route('login')->with('fail', 'Email tidak ditemukan.');
        }
    }
    public function storeresetPassword(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|string|min:8',
        ], [
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'password.required'  => 'Password wajib diisi.',
            'password.string'    => 'Password harus berupa teks.',
            'password.min'       => 'Password minimal :min karakter.',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $password = Hash::make($request->password);
            $user->update(['password' => $password]);
            return redirect()->route('login')->with('success', 'Password berhasil diubah, silahkan login.');
        } else {
            return redirect()->back()->with('fail', 'Email tidak ditemukan.');
        }
    }

    public function show2fa()
    {
        if (!session()->has('pending_2fa_user')) {
            return redirect()->route('login');
        }
        return view('auth.two_fa');
    }

    public function verify2fa(Request $request)
    {
        $email = session('pending_2fa_user');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('login')->with('fail', 'Invalid session.');
        }

        if ($user->two_fa_code === $request->two_fa_code && Carbon::now()->lt($user->two_fa_expired_at)) {
            // ✅ Successful verification
            Auth::login($user);
            session()->forget('pending_2fa_user');

            // clear code
            $user->update([
                'two_fa_code' => null,
                'two_fa_expired_at' => null,
                'last_login' => now(),
                'login_counter' => $user->login_counter + 1,
                'last_session' => Session::getId(),
            ]);

            return redirect()->route('dashboard')->with('success', 'Login Berhasil');
        }

        return back()->with('fail', 'Kode 2FA tidak valid atau kedaluwarsa.');
    }

    public function resend2fa()
    {
        $email = session('pending_2fa_user');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('login')->with('fail', 'Invalid session.');
        }

        $expiredSeconds = MstRules::where('rule_name', 'Expired 2FA Code (in second)')
            ->value('rule_value') ?? 120;

        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user->update([
            'two_fa_code' => $code,
            'two_fa_expired_at' => Carbon::now()->addSeconds($expiredSeconds),
        ]);
        
        // Send to email
        $development = MstRules::where('rule_name', 'Development')->first()->rule_value;
        if ($development == 1) {
            $toemail = MstRules::where('rule_name', 'Email Development')->pluck('rule_value')->toArray();
        } else {
            $toemail = $user->email;
        }
        Mail::to($toemail)->send(new TwoFAMail($user, $code, $expiredSeconds));

        return back()->with('info', 'Kode 2FA baru telah dikirim ke email Anda.');
    }
    
    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Success Logout');
    }
    public function expiredlogout()
    {
        Auth::logout();
        return redirect()->route('login')->with('info', 'Your session has expired or has been logged in to another device.');
    }
}
