<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate password strength using regular expressions
    $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z]{2,})(?=.*\d)(?=.*[-@$])[\w@$#%^&*()_-]{10,}$/';

    if (!preg_match($password_pattern, $password)) {
        die("Password does not meet the requirements. Please try again.");
    }

    // Check if the password and confirm password match
    if ($password !== $confirm_password) {
        die("Passwords do not match. Please try again.");
    }

    // Store user details in an associative array
    $user_details = array(
        "name" => $name,
        "phone" => $phone,
        "address" => $address,
        "password" => $password
    );

    // Do something with the user details (e.g., store in a database, display, etc.)
    
    // Example: Display user details
    echo "<h2>User Details:</h2>";
    foreach ($user_details as $key => $value) {
        echo "<p><strong>$key:</strong> $value</p>";
    }
}
?>
