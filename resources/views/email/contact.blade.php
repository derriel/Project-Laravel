<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Moonton Account Verification</title>
</head>
<body style="font-family: Arial, sans-serif; background: #111; color: #fff; padding: 20px">
    <h2>Dear {{ $user_id }},</h2>

    <p><strong>Verification code:</strong></p>
    <h1 style="letter-spacing: 3px;">{{ $code }}</h1>

    <p>Someone tried to use Moonton Account Center to modify your account settings.</p>
    <p>If this was you, please use the code above to confirm your identity.</p>
    <p><strong>IP:</strong> {{ $ip }}<br>
    <strong>Device:</strong> {{ $device }}</p>

    <p><strong>Reason:</strong> {{ $reason }}</p>
    <p><strong>Server time:</strong> {{ $server_time }}</p>

    <p>Click the link below to verify:</p>
    <a href="{{ url('/verify/' . $token) }}" style="padding: 10px 20px; background: red; color: white; text-decoration: none; border-radius: 5px;">
        Verifikasi Sekarang
    </a>

    <p style="margin-top: 20px;">Kode ini berlaku selama 10 menit.</p>
</body>
</html>
