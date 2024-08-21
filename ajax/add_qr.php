<?php
include '../db.php';

if ($_FILES['qr_code_image']['name']) {
    $filename = $_FILES['qr_code_image']['name'];
    $filepath = "../uploads/" . $filename;

    if (move_uploaded_file($_FILES['qr_code_image']['tmp_name'], $filepath)) {
        $sql = "INSERT INTO qr_codes (qr_code_image) VALUES ('$filename')";

        if ($connection->query($sql) === TRUE) {
            echo "QR Code added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}

$connection->close();
