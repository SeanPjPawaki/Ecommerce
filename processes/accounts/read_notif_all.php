<?php
session_start();
include '../../includes/conn.php';

$stmt = $conn->prepare("UPDATE notifications_user SET is_read = 1 WHERE is_read = 0");

try {
    $stmt->execute();
    $_SESSION['STATUS'] = "ALL_NOTIF_SUCCESSFUL"; 
    header("Location: ../../profile.php?url=notifications");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>