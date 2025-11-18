<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Two-Factor Authentication Code</title>
    <style>
        .code {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 5px;
            color: #dc3545;
            margin: 20px 0;
        }
        .footer {
            margin-top: 25px;
            font-size: 13px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: #ffffff; border: 1px solid #dddddd; padding: 20px; border-radius: 8px;">
        <h2>Halo, {{ $user->name ?? 'User' }}</h2>

        <p>
            Untuk menyelesaikan login Anda, silakan gunakan kode verifikasi 2FA berikut:
            <br><small><i>To complete your login, please use the following 2FA verification code:</i></small>
        </p>
        
        <div class="code">{{ $code }}</div>

        <p>
            ⚠️ Kode ini akan kedaluwarsa dalam <strong>{{ $expired }} detik</strong>.
            <br><small><i>⚠️ This code will expire in <strong>{{ $expired }} seconds</strong>.</i></small>
        </p>

        <p>
            Jika Anda tidak mencoba untuk masuk, silakan abaikan email ini.
            <br><small><i>If you did not attempt to log in, please ignore this email.</i></small>
        </p>

        <hr style="margin: 30px 0;">

        <p>
            Salam,<br>
            Tim Kami
            <br><small><i>Regards, Our Team</i></small>
            <br> [Dashboard Recruitment MSK] <br>
        </p>

        <div class="footer">
            &copy; {{ date('Y') }} PT Mitra Sendang Kemakmuran Banten<br>
            This is an automated message — please do not reply.
        </div>
    </div>
</body>
</html>
