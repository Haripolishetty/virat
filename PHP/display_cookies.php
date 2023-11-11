<!DOCTYPE html>
<html>
<head>
    <title>Display Cookies Info</title>
</head>
<body>
    <h1>Display Cookies Information</h1>
    <p>Field 1 Cookie: <?php echo isset($_COOKIE['field1']) ? $_COOKIE['field1'] : 'Not set'; ?></p>
    <p>Field 2 Cookie: <?php echo isset($_COOKIE['field2']) ? $_COOKIE['field2'] : 'Not set'; ?></p>
</body>
</html>
