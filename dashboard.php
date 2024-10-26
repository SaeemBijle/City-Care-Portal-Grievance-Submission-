<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8eaf6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #5e4b8b;
        }
        .greeting {
            text-align: center;
            margin-bottom: 20px;
        }
        .file-complaint-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #5e4b8b;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
        .file-complaint-button:hover {
            background-color: #4b3a6e;
        }
        .logout-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #e74c3c;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
        .logout-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>User Dashboard</h1>
        <div class="greeting">
            <h2>Hello, <?php echo htmlspecialchars($username); ?>!</h2>
            <p>Welcome to your dashboard.</p>
        </div>
        <a href="file_complaint.php" class="file-complaint-button">File a Complaint</a>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

</body>
</html>
