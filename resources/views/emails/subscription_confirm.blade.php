<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007BFF;
            color: #ffffff;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .message {
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        p {
            margin: 0 0 10px;
            font-size: 16px;
        }

        .signature {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Subscribing!</h1>
        </div>
        <div class="message">
            <p>Dear Subscriber,</p>
            <p>Thank you for subscribing to Bookopolis.</p>
            <p>Your subscription started on: <strong>{{ $data['start_date'] }}</strong></p>
            <p>Your subscription will expire on: <strong>{{ $data['expires_at'] }}</strong></p>
            <p>Enjoy unlimited access to our premium books and content.</p>
        </div>
        <p class="signature">Best Regards,<br>Team Bookopolis</p>
    </div>
</body>

</html>
