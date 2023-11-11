<?php
// Predefined user details for validation
$validUserDetails = array(
    'givenName' => 'John',
    'surname' => 'Doe',
    'dob' => '01/01/1990',
    'email' => 'john.doe@example.com',
    'sameAsEmail' => 'yes',
    'loginId' => 'john.doe',
    'password' => 'securepassword',
    'confirmPassword' => 'securepassword',
    'hintQuestion' => 'birthCity',
    'hintAnswer' => 'New York',
    'captcha' => 'abc123', // For demonstration purposes
);

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $givenName = isset($_POST['givenName']) ? $_POST['givenName'] : '';
    $surname = isset($_POST['surname']) ? $_POST['surname'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $sameAsEmail = isset($_POST['sameAsEmail']) ? $_POST['sameAsEmail'] : '';
    $loginId = isset($_POST['loginId']) ? $_POST['loginId'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
    $hintQuestion = isset($_POST['hintQuestion']) ? $_POST['hintQuestion'] : '';
    $hintAnswer = isset($_POST['hintAnswer']) ? $_POST['hintAnswer'] : '';
    $captcha = isset($_POST['captcha']) ? $_POST['captcha'] : '';

    // Validate the entered details against predefined values
    $isValid = (
        $givenName === $validUserDetails['givenName'] &&
        $surname === $validUserDetails['surname'] &&
        $dob === $validUserDetails['dob'] &&
        $email === $validUserDetails['email'] &&
        $sameAsEmail === $validUserDetails['sameAsEmail'] &&
        $loginId === $validUserDetails['loginId'] &&
        $password === $validUserDetails['password'] &&
        $confirmPassword === $validUserDetails['confirmPassword'] &&
        $hintQuestion === $validUserDetails['hintQuestion'] &&
        $hintAnswer === $validUserDetails['hintAnswer'] &&
        $captcha === $validUserDetails['captcha']
    );

    if ($isValid) {
        // Store data in cookies
        setcookie('givenName', $givenName, time() + 3600, '/');
        setcookie('surname', $surname, time() + 3600, '/');
        setcookie('dob', $dob, time() + 3600, '/');
        setcookie('email', $email, time() + 3600, '/');
        setcookie('sameAsEmail', $sameAsEmail, time() + 3600, '/');
        setcookie('loginId', $loginId, time() + 3600, '/');
        setcookie('hintQuestion', $hintQuestion, time() + 3600, '/');
        setcookie('hintAnswer', $hintAnswer, time() + 3600, '/');
        setcookie('captcha', $captcha, time() + 3600, '/');

        // Redirect to a confirmation page or display a confirmation message
        header("Location: confirmation_page.php");
        exit();
    } else {
        echo '<p style="color: red;">Invalid details. Please check your entries.</p>';
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; background-color: #f2f2f2; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; min-height: 100vh; width: auto;">
        <div id="registration-container" style="background-color: #fff; border: 1px solid #ccc; padding: 20px; width: 100%; max-width: 600px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
            <h1 style="text-align: center;">User Registration</h1>

            <div>
                <h2>Important Information:</h2>
                <p>Passport application can be processed at any PSK/POPSK/PSLK WITHIN INDIA irrespective of your residential address.</p>
            </div>

            <form action="passport.php" method="post">
                <div>
                    <label for="registrationLocation">Register to Apply at:</label>
                    <input type="radio" id="cpsDelhi" name="registrationLocation" value="cpsDelhi">
                    <label for="cpsDelhi">CPS Delhi</label>
                    <input type="radio" id="passportOffice" name="registrationLocation" value="passportOffice">
                    <label for="passportOffice">Passport Office</label>
                </div>
                <br>

                <div>
                    <label for="passportOfficeSelect">Passport Office:</label>
                    <select id="passportOfficeSelect" name="passportOfficeSelect">
                        <option value="state1">State 1</option>
                        <option value="state2">State 2</option>
                        <!-- Add more states as needed -->
                    </select>
                </div>
                <br>

                <div>
                    <label for="givenName">Given Name:</label>
                    <input type="text" id="givenName" name="givenName">
                </div>
                <br>

                <div>
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname">
                </div>
                <br>

                <div>
                    <label for="dob">Date of Birth (dd/mm/yyyy):</label>
                    <input type="text" id="dob" name="dob">
                </div>
                <br>

                <div>
                    <label for="email">Email ID:</label>
                    <input type="email" id="email" name="email">
                </div>
                <br>

                <div>
                    <label>Do you want your Login ID to be the same as Email ID?</label>
                    <input type="radio" id="sameAsEmailYes" name="sameAsEmail" value="yes">
                    <label for="sameAsEmailYes">Yes</label>
                    <input type="radio" id="sameAsEmailNo" name="sameAsEmail" value="no">
                    <label for="sameAsEmailNo">No</label>
                </div>
                <br>

                <div>
                    <label for="loginId">Login ID:</label>
                    <input type="text" id="loginId" name="loginId">
                </div>
                <br>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>
                <br>

                <div>
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                </div>
                <br>

                <div>
                    <label for="hintQuestion">Hint Question:</label>
                    <select id="hintQuestion" name="hintQuestion">
                        <option value="birthCity">Birth City</option>
                        <option value="favouriteColor">Favorite Color</option>
                        <!-- Add more questions as needed -->
                    </select>
                </div>
                <br>

                <div>
                    <label for="hintAnswer">Hint Answer:</label>
                    <input type="text" id="hintAnswer" name="hintAnswer">
                </div>
                <br>

                <div>
                    <label>Enter Characters Displayed:</label>
                    <img src="captcha_image.jpg" alt="Captcha Image"><br>
                    <input type="text" id="captcha" name="captcha">
                </div>
                <br>

                <div>
                    <input type="submit" value="Register">
                    <input type="reset" value="Clear" style="background-color: blue;">
                </div>
                <br>
            </form>
        </div>
    </div>
</body>
</html>
