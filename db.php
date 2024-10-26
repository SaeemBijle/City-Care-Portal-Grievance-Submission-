<?php
// db.php

// Database configuration
$host = 'localhost'; // Your database host
$db = 'complaints_db'; // Your database name
$user = 'root'; // Your database username
$pass = 'root'; // Your database password

// Create a new MySQLi connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    // Log the error message
    error_log("Database connection error: " . $conn->connect_error);
    // Optionally, display a user-friendly message
    die("Could not connect to the database. Please try again later.");
}

// Set character set to utf8mb4
$conn->set_charset("utf8mb4");
?>
