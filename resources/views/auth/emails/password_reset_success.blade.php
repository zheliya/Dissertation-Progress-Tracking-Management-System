<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Password Reset Success</title>
</head>
<body>
    <h1>Your password has been reset successfully</h1>

    <p>Dear {{ $user->name }},</p>

    <p>Your password has been successfully reset. You can now log in with your new password.</p>

    <p>If you did not initiate this password reset, please contact our support team immediately.</p>

    <p>Thank you,</p>
    <p>Your Application Team</p>
</body>
</html>
