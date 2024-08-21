<?php
include '../db.php';

$id = $_POST['id'];

$sql = "DELETE FROM guests WHERE id = $id";

if ($connection->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $connection->error;
}

$connection->close();
