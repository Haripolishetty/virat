<?php
// Database connection settings
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is for signup
    if (isset($_POST["signup"])) {
        $name = $conn->real_escape_string($_POST["name"]);
        $phone = $conn->real_escape_string($_POST["phone"]);
        $address = $conn->real_escape_string($_POST["address"]);
        $password = $conn->real_escape_string($_POST["password"]);
        $confirm_password = $conn->real_escape_string($_POST["confirm_password"]);

        // Validate password strength using regular expressions
        $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z]{2,})(?=.*\d)(?=.*[-@$])[\w@$#%^&*()_-]{10,}$/';

        if (!preg_match($password_pattern, $password)) {
            die("Password does not meet the requirements. Please try again.");
        }

        // Check if the password and confirm password match
        if ($password !== $confirm_password) {
            die("Passwords do not match. Please try again.");
        }

        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user details into the database
        $sql = "INSERT INTO users (name, phone, address, password) VALUES ('$name', '$phone', '$address', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "<h2>Signup Successful!</h2>";
            echo "<p>Welcome, $name! Your account has been created.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

<!-- Signup Form -->
<!-- ... (same as before) ... -->

<!-- Redirect to Login Page -->
<a href="login.php">Back to Login</a>
