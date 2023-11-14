<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if there is a file uploaded
    if (isset($_FILES["file"])) {
        // Database connection details
        $db_host = 'localhost';
        $db_name = 'webtech';
        $db_user = 'root';
        $db_pass = '';

        try {
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

        $uploadDir = "uploads/"; // Specify the directory where you want to store uploaded files
        $uploadedFile = $uploadDir . basename($_FILES["file"]["name"]);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));

        // Check if the file already exists
        if (file_exists($uploadedFile)) {
            echo "Sorry, the file already exists.";
            $uploadOk = false;
        }

        // Check the file size (adjust as needed)
        if ($_FILES["file"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = false;
        }

        // Allow certain file formats
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = false;
        }

        // Check if $uploadOk is set to false by an error
        if ($uploadOk) {
            // Move the file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadedFile)) {
                // Retrieve username from the session (assuming the user is logged in)
                $username = $_SESSION['username'] ?? 'unknown';

                // Insert information into the database
                $filename = $_FILES["file"]["name"];
                $fileSize = $_FILES["file"]["size"];

                $stmt = $pdo->prepare("INSERT INTO uploads (username, filename, file_size) VALUES (?, ?, ?)");
                $stmt->execute([$username, $filename, $fileSize]);

                echo "The file $filename has been uploaded by $username.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, your file was not uploaded.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Choose file:</label>
        <input type="file" name="file" id="file" required>
        <br>
        <?php
            // Display the username if available in the session
            if (isset($_SESSION['username'])) {
                echo "Logged in as: " . $_SESSION['username'];
            }
        ?>
        <br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
