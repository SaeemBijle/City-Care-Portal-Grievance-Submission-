<?php
$host = 'localhost'; // Your database host
$db = 'complaints_db'; // Your database name
$user = 'root'; // Your database username
$pass = 'root'; // Your database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    echo "Connected successfully.";
} catch (\PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
