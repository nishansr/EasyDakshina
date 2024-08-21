<?php
include '../db.php';

$sql = "SELECT * FROM guests";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-striped">';
    echo '<thead><tr><th>Name</th><th>Email</th><th>Contact Number</th><th>Address</th><th>Amount Paid</th><th>Registration Date</th><th>Actions</th></tr></thead><tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>' . htmlspecialchars($row['contact_number']) . '</td>';
        echo '<td>' . htmlspecialchars($row['address']) . '</td>';
        echo '<td>' . htmlspecialchars($row['amount_paid']) . '</td>';
        echo '<td>' . htmlspecialchars($row['registration_date']) . '</td>';
        echo '<td><button class="btn btn-warning btn-sm edit-guest" data-id="' . $row['id'] . '">Edit</button> ';
        echo '<button class="btn btn-danger btn-sm delete-guest" data-id="' . $row['id'] . '">Delete</button></td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo "No guests found.";
}

$connection->close();
