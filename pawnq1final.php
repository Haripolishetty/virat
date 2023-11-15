<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is for login
    if (isset($_POST["login"])) {
        $login_username = $_POST["login_username"];
        $login_password = $_POST["login_password"];

        // Perform login authentication (you can replace this with your authentication logic)
        // For example, check against a database of users
        $valid_login = true; // Assume a valid login for this example

        if ($valid_login) {
            echo "<h2>Login Successful!</h2>";
            echo "<p>Welcome back, $login_username!</p>";
        } else {
            echo "<h2>Login Failed!</h2>";
            echo "<p>Invalid username or password. Please try again.</p>";
        }
    }

    // Check if the form is for signup
    elseif (isset($_POST["signup"])) {
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

<!-- Login Form -->
<h2>Login</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="login_username">Username:</label>
    <input type="text" name="login_username" required><br>

    <label for="login_password">Password:</label>
    <input type="password" name="login_password" required><br>

    <input type="submit" name="login" value="Login">
</form>

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

</body>
</html>
