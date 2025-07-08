<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Permintaan Reset Password</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: #ffffff; border: 1px solid #dddddd; padding: 20px; border-radius: 8px;">
        <h2>Halo, {{ $data->name ?? 'User' }}</h2>

        <p>
            Kami menerima permintaan untuk mengatur ulang password Anda.
            <br><small><i>We received a request to reset your password.</i></small>
        </p>

        <p>
            Klik tombol di bawah ini untuk melanjutkan proses pengaturan ulang password Anda.
            <br><small><i>Click the button below to continue the password reset process.</i></small>
        </p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $link }}" style="background-color: #d9534f; color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 5px; display: inline-block;">
                Atur Ulang Password
            </a>
            <br><small><i>Reset Password</i></small>
        </div>

        <p>
            Jika Anda tidak meminta pengaturan ulang password ini, abaikan email ini.
            <br><small><i>If you did not request this password reset, please ignore this email.</i></small>
        </p>

        <p>
            Tautan ini hanya berlaku selama beberapa waktu demi alasan keamanan.
            <br><small><i>This link is only valid for a limited time for security reasons.</i></small>
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
