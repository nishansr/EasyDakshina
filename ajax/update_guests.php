<?php
include '../db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$address = $_POST['address'];
$amount_paid = $_POST['amount_paid'];

$sql = "UPDATE guests SET name = '$name', email = '$email', contact_number = '$contact_number', address = '$address', amount_paid = $amount_paid WHERE id = $id";

if ($connection->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connection->error;
}

$connection->close();
