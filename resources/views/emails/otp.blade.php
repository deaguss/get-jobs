<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #555555;
        }

        .otp-code {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #aaaaaa;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Your OTP Code</h1>
        <p>Your OTP code is: <span class="otp-code">{{ $otp }}</span></p>
        <p>This code will expire in 10 minutes.</p>
        <div class="footer">
            <p>If you did not request this code, please ignore this email.</p>
        </div>
    </div>
</body>

</html>