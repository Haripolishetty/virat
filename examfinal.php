<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtech";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_no = $_POST['reg_no'];
    $name = $_POST['name'];
    $email_id = $_POST['email_id'];
    $phone_no = $_POST['phone_no'];
    $course_enrolled = $_POST['course_enrolled'];

    // Validate email format
    if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO user_data (reg_no, name, email_id, phone_no, course_enrolled) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $reg_no, $name, $email_id, $phone_no, $course_enrolled);

    if ($stmt->execute()) {
        echo "Details saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

    <script>
        function validatePhoneNumber(phone) {
            var phoneRegex = /^[789]\d{9}$/;
            return phoneRegex.test(phone);
        }

        function validateEmail(email) {
            var emailRegex = /^[a-zA-Z0-9._-]+@gmail\.com$/;
            return emailRegex.test(email);
        }

        async function submitForm(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const phone = formData.get('phone_no');
            const email = formData.get('email_id');

            if (!validatePhoneNumber(phone)) {
                alert('Phone number must be 10 digits and start with 7, 8, or 9.');
                return;
            }

            if (!validateEmail(email)) {
                alert('Invalid email format! Please use a Gmail address.');
                return;
            }

            try {
                const response = await fetch('<?php echo $_SERVER["PHP_SELF"]; ?>', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.text();
                document.getElementById('result').textContent = result;
            } catch (error) {
                console.error('Error:', error);
            }
        }
    </script>
</head>
<body>
    <h2>Login Form</h2>
    <form id="loginForm" onsubmit="submitForm(event)">
        <input type="text" name="reg_no" placeholder="Registration Number" required><br>
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email_id" placeholder="Email ID" required><br>
        <input type="text" name="phone_no" placeholder="Phone Number" required><br>
        <input type="text" name="course_enrolled" placeholder="Course Enrolled" required><br>
        <button type="submit">Submit</button>
    </form>
    <div id="result"></div>
</body>
</html>