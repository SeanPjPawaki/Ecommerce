<?php
session_start();

if (!isset($_SESSION['USER_ID'])) {
    $_SESSION['STATUS'] = 'NO_USER';
    header("Location: ../../shop.php"); // Redirect back to shop.php if user is not logged in

    exit;
}

if (!isset($_GET['productId'])) {
    $_SESSION['STATUS'] = 'NO_USER';
    header("Location: ../../shop.php"); // Redirect back to shop.php if user is not logged in

    exit;
}

// Include database connection
include_once '../../includes/conn.php'; // Replace 'conn.php' with your actual database connection file

// Sanitize the productId
$productId = filter_var($_GET['productId'], FILTER_SANITIZE_NUMBER_INT);

// Check if the product exists and is available
$stmt = $conn->prepare("SELECT * FROM products WHERE id = :id AND availability = 'Available'");
$stmt->bindParam(':id', $productId);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$product) {
    header("Location: shop.php"); // Redirect back to shop.php if product does not exist or is not available
    exit;
}

// Check if the product already exists in the cart for the current user
$userId = $_SESSION['USER_ID'];
$stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id");
$stmt->bindParam(':user_id', $userId);
$stmt->bindParam(':product_id', $productId);
$stmt->execute();
$existingCartItem = $stmt->fetch(PDO::FETCH_ASSOC);

try {
    if ($existingCartItem) {
        // If the product already exists in the cart, update the quantity
        $quantity = $existingCartItem['quantity'] + 1; // Increment the quantity
        $stmt = $conn->prepare("UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id");
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
    } else {
        // If the product does not exist in the cart, insert a new row
        $quantity = 1; // You may adjust this based on your requirements
        $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->execute();
    }

    // Redirect back to shop.php with success message
    header("Location: ../../shop.php?success=1");
    $_SESSION['STATUS'] = '1';
    exit;
} catch (PDOException $e) {
    header("Location: ../../shop.php?error=1"); // Redirect back to shop.php with error message
    exit;
}
?>
