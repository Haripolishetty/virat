<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $customerClass = $_POST["customerClass"];

    // Simulate checking if customer already exists in the database
    $customerExists = false;

    if ($customerExists) {
        // If customer exists, send details as JSON response
        $customerDetails = array(
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "customerClass" => $customerClass
        );

        echo json_encode($customerDetails);
    } else {
        // If customer does not exist, you can perform database operations or other tasks here
        echo "Customer does not exist in the database.";
    }
}
?>
