<?php
session_start();

// Dummy user data - in real application, this should come from a database
$users = [
    'user1' => 'password1',
    'user2' => 'password2'
];

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username] == $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: upload1.php"); // Redirect to a welcome page
        exit;
    } else {
        $message = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h2>Login Page</h2>
    <form action="" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>