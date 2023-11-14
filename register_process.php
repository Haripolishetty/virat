<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate input
    if (strlen($name) < 10) {
        die("Name must be at least 10 characters long.");
    }

    // You can add more validation for email, phone, and address if needed.

    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Validate password complexity
    if (!preg_match("/^(?=.*[A-Z].*[A-Z])(?=.*\d)(?=.*[!@#$_-])[A-Za-z\d!@#$_-]{8,}$/", $password)) {
        die("Password must have 2 uppercase letters, 1 digit, 1 special character, and be at least 8 characters long.");
    }

    // Store the values in an associative array
    $user_data = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "address" => $address,
        "password" => $password, // You should hash and salt the password in a real application
    ];

    // You can save $user_data to a database or perform any other necessary actions here.

    // Redirect to a success page or display a success message.
    echo "Registration successful!";
} else {
    die("Access denied.");
}
?>
