<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Display Session Info</title>
</head>
<body>
    <h1>Display Session Information</h1>
    <p>Field 1 Session: <?php echo isset($_SESSION['field1']) ? $_SESSION['field1'] : 'Not set'; ?></p>
    <p>Field 2 Session: <?php echo isset($_SESSION['field2']) ? $_SESSION['field2'] : 'Not set'; ?></p>
</body>
</html>
