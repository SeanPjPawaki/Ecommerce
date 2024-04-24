<?php
session_start();

if (!isset($_SESSION['USER_ID'])) {
    echo "User is not logged in.";
    exit;
}

if (!isset($_GET['delivery_fee']) || !isset($_GET['total'])) {
    echo "Delivery fee or total is missing.";
    exit;
}

include_once '../../includes/conn.php'; 

$deliveryFee = $_GET['delivery_fee'];
$total = $_GET['total'];
$userId = $_SESSION['USER_ID'];
$date_order_placed = date("Y-m-d");
try {
    $stmt = $conn->prepare("INSERT INTO orders (user_id, delivery_fee, total, status, date_order_placed) VALUES (:user_id, :delivery_fee, :total, 'PENDING', :date_order_placed)");
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':delivery_fee', $deliveryFee);
    $stmt->bindParam(':total', $total);
    $stmt->bindParam(':date_order_placed', $date_order_placed);
    $stmt->execute();
    
    $orderId = $conn->lastInsertId();

    // Retrieve cart items for the logged-in user
    $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Insert cart items into order_details table
    foreach ($cartItems as $cartItem) {
        $productId = $cartItem['product_id'];
        $quantity = $cartItem['quantity'];

        // Insert cart item into order_details
        $stmt = $conn->prepare("INSERT INTO order_details (user_id, order_id, product_id, quantity) VALUES (:user_id, :order_id, :product_id, :quantity)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->execute();

         // Update the stock of the product
         $stmt = $conn->prepare("UPDATE products SET stocks = stocks - :quantity WHERE id = :product_id");
         $stmt->bindParam(':quantity', $quantity);
         $stmt->bindParam(':product_id', $productId);
         $stmt->execute();
    }

    // Clear the user's cart after successfully adding items to order_details
    $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();

    $_SESSION['STATUS'] = "ORDER_SUCCESSFUL";
    header('Location: ../../order.php?filter=all');
} catch (PDOException $e) {
    // Handle database error
    echo "Error: " . $e->getMessage();
}
?>
