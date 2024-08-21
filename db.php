<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'easydakshina';

// Create a new connection to the MySQL database
$connection = new mysqli($host, $user, $password, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
