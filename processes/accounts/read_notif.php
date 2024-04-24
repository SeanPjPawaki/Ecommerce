<?php
session_start();
include '../../includes/conn.php';
if (isset($_GET['id'])) {
    $notification_id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE notifications_user SET is_read = 1 WHERE id = :notification_id");
    $stmt->bindParam(':notification_id', $notification_id, PDO::PARAM_INT);
    try {
        $stmt->execute();
        $_SESSION['STATUS'] = "SINGLE_NOTIF_SUCCESFUL";
        header("Location: ../../profile.php?url=notifications");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Notification ID not provided.";
}
?>