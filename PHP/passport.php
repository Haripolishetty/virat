<?php
$validDummyDetails = array(
    'field1' => 'dummyValue1',
    'field2' => 'dummyValue2',
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $field1 = isset($_POST['field1']) ? $_POST['field1'] : '';
    $field2 = isset($_POST['field2']) ? $_POST['field2'] : '';

    $isValid = (
        $field1 === $validDummyDetails['field1'] &&
        $field2 === $validDummyDetails['field2']
    );

    if ($isValid) {
        setcookie('field1', $field1, time() + 3600, '/');
        setcookie('field2', $field2, time() + 3600, '/');

        header("Location: display_cookies.php");
        exit();
    } else {
        echo '<p style="color: red;">Invalid details. Please check your entries.</p>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form for Two Fields</title>
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
