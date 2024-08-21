<?php
include '../db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM guests WHERE id = $id";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode([]);
}

$connection->close();
