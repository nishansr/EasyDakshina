<?php
include '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$address = $_POST['address'];
$amount_paid = $_POST['amount_paid'];

$sql = "INSERT INTO guests (name, email, contact_number, address, amount_paid)
VALUES ('$name', '$email', '$contact_number', '$address', '$amount_paid')";

if ($connection->query($sql) === TRUE) {
    echo "Guest added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
