<?php
// Hardcoded array of users
$users = [
    ["username" => "user1", "password" => "pass1"],
    // Add more users as needed
];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Search for username and password in the array
    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            // Set cookie and redirect to display page
            setcookie("username", $username, time() + (86400 * 30), "/");
            header("Location: display.php");
            exit;
        }
    }

    echo "Invalid username or password";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Info Form</title>
    <!-- Add any required CSS for responsiveness -->
</head>
<body>
    <form action="submit.php" method="post">
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
