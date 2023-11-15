<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication - Signup</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is for signup
    if (isset($_POST["signup"])) {
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

        // If password validation is successful, store user details in an associative array
        $user_details = array(
            "name" => $name,
            "phone" => $phone,
            "address" => $address,
            "password" => $password
        );

        // Do something with the user details (e.g., store in a database, display, etc.)

        // Example: Display user details
        echo "<h2>Signup Successful!</h2>";
        echo "<p>Welcome, $name! Your account has been created.</p>";
    }
}
?>

<!-- Signup Form -->
<h2>Signup</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="phone">Phone Number:</label>
    <input type="tel" name="phone" required><br>

    <label for="address">Address:</label>
    <input type="text" name="address" required><br>

    <!-- Password fields for new users -->
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" required><br>

    <input type="submit" name="signup" value="Signup">
</form>

<!-- Redirect to Login Page -->
<a href="login.php">Back to Login</a>

</body>
</html>
