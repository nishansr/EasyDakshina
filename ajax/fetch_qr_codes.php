<?php
include '../db.php';

$sql = "SELECT * FROM qr_codes";
$result = $connection->query($sql);

if ($result === false) {
    echo '<div class="carousel-item active"><p>Error fetching QR codes.</p></div>';
} elseif ($result->num_rows > 0) {
    $active = true;
    while ($row = $result->fetch_assoc()) {
        if (isset($row['qr_code_image']) && !empty($row['qr_code_image'])) {  
            $imagePath = 'uploads/' . htmlspecialchars($row['qr_code_image']);
            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
            echo '<img src="' . $imagePath . '" class="d-block w-100" alt="QR Code">';
            echo '</div>';
            $active = false;
        } else {
            echo '<div class="carousel-item active"><p>QR code image missing or path is incorrect.</p></div>';
        }
    }
} else {
    echo '<div class="carousel-item active"><p>No QR codes found.</p></div>';
}

$connection->close();
