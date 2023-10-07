<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Password Reset Link</title>
</head>
<body>
    <h1>Password Reset Link</h1>

    <p>Dear {{ $user->name }},</p>

    <p>We have received a request to reset your password. To proceed with the password reset, please click the following link:</p>

    <p><a href="{{ $resetLink }}">Reset Password</a></p>

    <p>If you didn't request a password reset, please ignore this email.</p>

    <p>Thank you,</p>
    <p>Your Application Team</p>
</body>
</html>
