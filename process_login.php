<?php
session_start();
require 'db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];

    // Prepare SQL statement to fetch user details
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verify user existence and password
    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['user_id'] = $user['id']; // Store user ID in session
        $_SESSION['username'] = $user['username']; // Store username in session
        header("Location: dashboard.php"); // Redirect to dashboard or home page
        exit();
    } else {
        // Failed login
        echo "Invalid username or password.";
    }
}
?>
