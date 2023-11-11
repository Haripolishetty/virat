<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        .confirmation-container {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            width: 50%;
            margin: auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
        }

        p {
            text-align: center;
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="confirmation-container">
    <h1>Registration Confirmation</h1>

    <?php
    // Retrieve data from cookies
    $givenName = isset($_COOKIE['givenName']) ? $_COOKIE['givenName'] : '';
    $surname = isset($_COOKIE['surname']) ? $_COOKIE['surname'] : '';
    $dob = isset($_COOKIE['dob']) ? $_COOKIE['dob'] : '';
    $email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
    $sameAsEmail = isset($_COOKIE['sameAsEmail']) ? $_COOKIE['sameAsEmail'] : '';
    $loginId = isset($_COOKIE['loginId']) ? $_COOKIE['loginId'] : '';
    $hintQuestion = isset($_COOKIE['hintQuestion']) ? $_COOKIE['hintQuestion'] : '';
    $hintAnswer = isset($_COOKIE['hintAnswer']) ? $_COOKIE['hintAnswer'] : '';
    $captcha = isset($_COOKIE['captcha']) ? $_COOKIE['captcha'] : '';
    ?>

    <p>Thank you for registering!</p>

    <h2>Details:</h2>
    <p><strong>Given Name:</strong> <?php echo $givenName; ?></p>
    <p><strong>Surname:</strong> <?php echo $surname; ?></p>
    <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Login ID:</strong> <?php echo $loginId; ?></p>
    <p><strong>Hint Question:</strong> <?php echo $hintQuestion; ?></p>
    <p><strong>Hint Answer:</strong> <?php echo $hintAnswer; ?></p>
    <p><strong>Captcha:</strong> <?php echo $captcha; ?></p>
</div>

</body>
</html>
