<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trackingId = $_POST['tracking_id'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE complaints SET status = ? WHERE tracking_id = ?");
    if ($stmt->execute([$status, $trackingId])) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error updating status.";
    }
}
?>
