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

<!-- Redirect to Signup Page -->
<form action="SIGNUP.php">
    <input type="submit" value="Signup">
</form>

</body>
</html>
