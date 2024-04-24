<?php
session_start();

if (!isset($_SESSION['USER_ID'])) {
    header("Location: ../../shop.php"); // Redirect back to shop.php if user is not logged in
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: ../../shop.php"); // Redirect back to shop.php if product ID is not provided
    exit;
}

// Include database connection
include_once '../../includes/conn.php'; // Replace 'conn.php' with your actual database connection file

// Sanitize the product ID
$productId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

// Check if the product exists in the cart for the current user
$userId = $_SESSION['USER_ID'];
$stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id");
$stmt->bindParam(':user_id', $userId);
$stmt->bindParam(':product_id', $productId);
$stmt->execute();
$existingCartItem = $stmt->fetch(PDO::FETCH_ASSOC);

try {
    if ($existingCartItem) {
        // If the product exists in the cart, remove it
        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
    }

    // Redirect back to shop.php
    $_SESSION['STATUS_ERROR'] = "REMOVE_PROD";
    header("Location: ../../cart.php");
    exit;
} catch (PDOException $e) {
    // Handle the error as needed
    exit;
}
?>
