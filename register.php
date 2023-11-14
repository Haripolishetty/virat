<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h2>User Registration</h2>
    <form action="register_process.php" method="post">
        <label for="name">Name (at least 10 characters):</label>
        <input type="text" id="name" name="name" required minlength="10"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="password">Password (2 uppercase, 1 digit, 1 special character, min length 8):</label>
        <input type="password" id="password" name="password" required pattern="^(?=.*[A-Z].*[A-Z])(?=.*\d)(?=.*[!@#$_-])[A-Za-z\d!@#$_-]{8,}$"><br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
