<?php
// Database connection details
$servername = "your_database_server";
$username = "your_database_username";
$password = "your_database_password";
$dbname = "webdevv";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"])) {
        // Signup form processing
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        // Insert user details into the database
        $sql = "INSERT INTO users (name, phone, address) VALUES ('$name', '$phone', '$address')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful
            echo "Registration successful!";
        } else {
            // Registration failed
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["login_name"])) {
        // Login form processing
        $login_name = $_POST["login_name"];
        $login_password = $_POST["login_password"];

        // Retrieve user details from the database
        $sql = "SELECT * FROM users WHERE name='$login_name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $userDetails = $result->fetch_assoc();

            // Check if the password is correct
            if (password_verify($login_password, $userDetails["password"])) {
                // Redirect to a new page or display user details
                header("Location: display.php?name=" . urlencode($userDetails["name"]) . "&phone=" . urlencode($userDetails["phone"]) . "&address=" . urlencode($userDetails["address"]));
                exit();
            }
        }

        // If the user doesn't exist or the password is incorrect, show an error
        die("Invalid login credentials");
    }
}

// Close the database connection
$conn->close();
?>





<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
        }

        form {
            width: 45%;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>

</head>
<body>
    <div class="container">
        <!-- Signup Form -->
        <form action="KKQ1.php" method="post" id="signupForm">
            <h2>Sign Up</h2>
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" name="phone" pattern="[0-9]{10}" required>

            <label for="address">Address:</label>
            <input type="text" name="address" required>

            <label for="password">Password:</label>
            <input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-@$])[A-Za-z\d@$!%*?&]{10,}$" required>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required>

            <input type="submit" value="Sign Up">
        </form>

        <!-- Login Form -->
        <form action="KKQ1.php" method="post" id="loginForm">
            <h2>Login</h2>
            <label for="login_name">Name:</label>
            <input type="text" name="login_name" required>

            <label for="login_password">Password:</label>
            <input type="password" name="login_password" required>

            <input type="submit" value="Log In">
        </form>
    </div>
</body>
</html>
