<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userDetails = array();

    // Validate and sanitize user inputs
    $userDetails['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $userDetails['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $userDetails['address'] = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    
    // Validate and enforce strong password requirements
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $passwordRequirements = "/^(?=.*[a-z])(?=.*[A-Z]{2,})(?=.*[0-9])(?=.*[-@$])\S{10,}$/";

    if ($password !== $confirmPassword) {
        die("Password and Confirm Password do not match.");
    }

    if (!preg_match($passwordRequirements, $password)) {
        die("Password does not meet the required criteria.");
    }

    // If all validations pass, store user details
    // You can modify this part to store the details in a database or any other desired location.
    // For now, let's just print the details.

    echo "User Details:<br>";
    echo "Name: " . $userDetails['name'] . "<br>";
    echo "Phone: " . $userDetails['phone'] . "<br>";
    echo "Address: " . $userDetails['address'] . "<br>";

    // You may want to hash the password before storing it in a database
    echo "Password: " . password_hash($password, PASSWORD_DEFAULT);
} else {
    // Redirect or display an error if someone tries to access process.php directly.
    header("Location: index.html");
    exit();
}
?>
