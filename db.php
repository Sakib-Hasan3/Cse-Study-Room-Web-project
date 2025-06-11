<?php
// db.php

$host = 'localhost';
$user = 'root';         // default XAMPP username
$pass = '';             // default XAMPP password (empty)
$db   = 'study';        // ✅ your actual database name

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
