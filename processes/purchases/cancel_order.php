<?php
session_start();

if (!isset($_SESSION['USER_ID'])) {
    echo "User is not logged in.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['order_id'])) {
        echo "Order ID is missing.";
        exit;
    }

    include_once '../../includes/conn.php'; 

    try {
        $orderId = $_POST['order_id'];
        $userId = $_SESSION['USER_ID'];

        // Check if the order belongs to the current user
        $stmt = $conn->prepare("SELECT * FROM orders WHERE id = :order_id AND user_id = :user_id");
        $stmt->bindParam(':order_id', $orderId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$order) {
            echo "Order not found or does not belong to the current user.";
            exit;
        }

        // Check if the order status is pending
        if ($order['status'] !== 'PENDING') {
            echo "Cannot cancel order. Order is not pending.";
            exit;
        }

        // Update the order status to Cancelled
        $stmt = $conn->prepare("UPDATE orders SET status = 'CANCELLED' WHERE id = :order_id");
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();

        echo "Order cancelled successfully.";
        header('Location: ../../order.php?filter=all');
    } catch (PDOException $e) {
        // Handle database error
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>