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

$statusMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tracking_id = trim($_POST['tracking_id']);
    
    // Prepare the SQL statement to fetch the complaint by tracking ID
    $stmt = $conn->prepare("SELECT * FROM complaints WHERE tracking_id = ?");
    $stmt->bind_param("s", $tracking_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $complaint = $result->fetch_assoc();

    if ($complaint) {
        $statusMessage = "Status: " . htmlspecialchars($complaint['status']);
    } else {
        $statusMessage = "Complaint not found.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track Your Complaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #6a5acd;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #5c4fbc;
        }
        p {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Track Your Complaint</h1>
    <form action="track_complaint.php" method="POST">
        <input type="text" name="tracking_id" placeholder="Enter your Tracking ID" required>
        <button type="submit">Track Complaint</button>
    </form>
    <?php if ($statusMessage): ?>
        <p><?php echo $statusMessage; ?></p>
    <?php endif; ?>
</body>
</html>
