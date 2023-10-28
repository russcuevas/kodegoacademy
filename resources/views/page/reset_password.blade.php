<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('page/css/forgot_password.css')}}">
    <title>Reset Password</title>
</head>

<body>
    <p>Hey Mr./Ms. {{ $name }},</p>

    <p>You are receiving this email because we received a password reset request for your account.</p>

    <p><strong>Reset your password:</strong></p>

    <p><a href="{{ $resetLink }}">Reset Password</a></p>

    <p>If you did not request a password reset, no further action is required.</p>
</body>

</html>