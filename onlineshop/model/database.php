<?php
$host = "localhost"; // Database host
$username = "root";  // Database username
$password = "";      // Database password (empty for XAMPP by default)
$dbname = "onlineshop"; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
