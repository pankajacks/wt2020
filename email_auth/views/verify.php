<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <style>
        .info {
            border: 1px solid blue;
            padding: 30px;
            margin: 100px;
            border-radius: 8px;
            text-align:center;
            font-size: 24px;
        }

        a {
            text-decoration:none
        }

        @media only screen and (max-width: 600px) {
            .info {
                margin: 30px 10px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="info">
        <p>A verification link is sent on your email, please verify your email id.</br>
        <a href="?req=signin">Sign-in</a>, if verified.</p>
    </div>
</body>
</html>