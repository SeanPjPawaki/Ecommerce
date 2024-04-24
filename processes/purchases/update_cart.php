<?php
session_start();

if (!isset($_SESSION['USER_ID'])) {
    header("Location: ../../shop.php"); // Redirect back to shop.php if user is not logged in
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'quantity' and 'productId' arrays are set in the POST data
    if (isset($_POST['quantity']) && isset($_POST['productId'])) {
        // Include database connection
        include_once '../../includes/conn.php'; // Replace 'conn.php' with your actual database connection file

        // Iterate through each product in the cart and update the quantity
        foreach ($_POST['quantity'] as $cartItemId => $quantity) {
            // Sanitize the quantity
            $quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);

            // Retrieve the product ID from the POST data
            $productId = $_POST['productId'][$cartItemId];

            // Update the cart with the new quantity
            $userId = $_SESSION['USER_ID'];
            $stmt = $conn->prepare("UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id");
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':product_id', $productId);
            $stmt->execute();
        }

        // Redirect back to the cart page with a success message
        header("Location: ../../cart.php?success=1");
        exit;
    } else {
        // Redirect back to the cart page with an error message if the necessary data is missing
        header("Location: ../../cart.php?error=1");
        exit;
    }
} else {
    // Redirect back to the cart page if the request method is not POST
    header("Location: ../../cart.php");
    exit;
}
?>
