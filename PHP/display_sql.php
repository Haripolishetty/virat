<?php
session_start();

$servername = "localhost"; // Change this if your MySQL server is on a different host
$username = "root"; // Change this if your MySQL username is different
$password = ""; // Change this if your MySQL password is set
$database = "webdev"; // Change this to your actual database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have two fields in your table: field1 and field2
$sql = "SELECT dum1, dum2 FROM dummy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Field 1</th><th>Field 2</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["dum1"] . "</td><td>" . $row["dum2"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

$conn->close();
?>
