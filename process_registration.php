<?php
ini_set('session.save_path', realpath(dirname(__FILE__) . '/sess'));
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection
require 'db.php'; // Ensure this includes the MySQLi connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $firstName = htmlspecialchars(trim($_POST['firstName']));
    $middleName = htmlspecialchars(trim($_POST['middleName']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $email = htmlspecialchars(trim($_POST['email']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $address = htmlspecialchars(trim($_POST['address']));
    $pincode = htmlspecialchars(trim($_POST['pincode']));
    $locality = htmlspecialchars(trim($_POST['locality']));
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close(); // Close the statement to avoid commands out of sync

    if ($count > 0) {
        echo "Username already exists. Please choose another.";
        exit();
    }

    // Prepare SQL statement
    $stmt = $conn->prepare(
        "INSERT INTO users (first_name, middle_name, last_name, mobile, email, dob, address, pincode, locality, username, password) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param("sssssssssss", $firstName, $middleName, $lastName, $mobile, $email, $dob, $address, $pincode, $locality, $username, $hashedPassword);

    try {
        // Execute the statement
        $stmt->execute();
        header("Location: login.php"); // Redirect to login page after successful registration
        exit();
    } catch (mysqli_sql_exception $e) {
        error_log("Registration failed: " . $e->getMessage()); // Log error instead of echoing
        echo "An error occurred. Please try again.";
    } finally {
        $stmt->close(); // Ensure the statement is closed
    }
}
?>
