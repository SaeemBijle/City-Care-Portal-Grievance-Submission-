<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "complaints_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch relevant complaint details
$sql = "SELECT id, problem, address, locality, mobile, description, status FROM complaints";
$result = $conn->query($sql);

$complaints = [];
if ($result->num_rows > 0) {
    // Fetch all complaints
    while ($row = $result->fetch_assoc()) {
        $complaints[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($complaints);
?>
