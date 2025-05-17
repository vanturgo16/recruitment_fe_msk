<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Akun</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: #ffffff; border: 1px solid #dddddd; padding: 20px; border-radius: 8px;">
        <h2>Halo, {{ $data['firstname'] }} {{ $data['lastname'] }}</h2>
        <p>
            Terima kasih telah mendaftar.
            <br><small><i>Thank you for registering.</i></small>
        </p>

        <p>
            Berikut adalah informasi akun Anda:
            <br><small><i>Here is your account information:</i></small>
        </p>

        <ul>
            <li>Email: <strong>{{ $data['email'] }}</strong>
                <br><small><i>Email address</i></small>
            </li>
            <li>Password: <strong>{{ $data['password'] }}</strong>
                <br><small><i>Your password</i></small>
            </li>
        </ul>

        <p>
            Untuk mengaktifkan akun Anda, silakan klik tombol di bawah ini.
            <br><small><i>To activate your account, please click the button below.</i></small>
        </p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $link }}" style="background-color: #1e87f0; color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 5px; display: inline-block;">
                Konfirmasi Akun
            </a>
            <br><small><i>Confirm Account</i></small>
        </div>

        <br>
        <span style="color: #d9534f;">
            Link ini akan kedaluwarsa dalam {{ $expConfirm }} menit.
            <br><small><i>This link will expire in {{ $expConfirm }} minutes.</i></small>
        </span>

        <p>
            Jika Anda tidak mendaftar akun ini, abaikan email ini.
            <br><small><i>If you did not register this account, please ignore this email.</i></small>
        </p>

        <hr style="margin: 30px 0;">

        <p>
            Salam,<br>
            Tim Kami
            <br><small><i>Regards, Our Team</i></small>
            <br> [Dashboard Recruitment MSK] <br>
        </p>
    </div>
</body>
</html>
