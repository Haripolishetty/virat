<?php
session_start();

$validDummyDetails = array(
    'field1' => 'dummyValue1',
    'field2' => 'dummyValue2',
);

// Step 2: Update the PHP code to connect to the database
$servername = "localhost"; // Change this if your MySQL server is on a different host
$username = "root"; // Change this if your MySQL username is different
$password = ""; // Change this if your MySQL password is set
$database = "webdev"; // Change this to your actual database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have two fields in your form: field1 and field2

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $field1 = isset($_POST['field1']) ? $_POST['field1'] : '';
    $field2 = isset($_POST['field2']) ? $_POST['field2'] : '';

    $isValid = (
        $field1 === $validDummyDetails['field1'] &&
        $field2 === $validDummyDetails['field2']
    );

    if ($isValid) {
        // Modify the code to insert data into the database
        $stmt = $conn->prepare("INSERT INTO `webdev`.`dummy` (dum1, dum2) VALUES (?, ?)");

        // Bind the variables to the placeholders
        $stmt->bind_param("ss", $field1, $field2);

        // Execute the statement
        $stmt->execute();
        $stmt->close();

        // Redirect to display_session.php or any other page
        header("Location: display_sql.php");
        exit();
    } else {
        echo '<p style="color: red;">Invalid details. Please check your entries.</p>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Form</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="field1">Field 1:</label>
            <input type="text" id="field1" name="field1">
        </div>
        <br>

        <div>
            <label for="field2">Field 2:</label>
            <input type="text" id="field2" name="field2">
        </div>
        <br>

        <div>
            <input type="submit" value="Submit">
            <input type="reset" value="Clear" style="background-color: blue;">
        </div>
        <br>
    </form>
</body>
</html>
