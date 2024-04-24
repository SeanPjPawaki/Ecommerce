<?php
// Include the database connection file
include_once '../includes/conn.php';

// Check if form is submitted
if (isset($_POST['Submit'])) {
    // Retrieve form data
    $order_id = $_GET['id']; // Change to GET to retrieve order ID from URL parameter
    $delivery_fee = $_POST['delivery_fee'];
    $total = $_POST['total'];
    $status = $_POST['status'];
    $current_date = date("Y-m-d");

    try {
        // Prepare SQL statement to update order data
        $stmt = $conn->prepare("UPDATE orders 
                                SET delivery_fee = :delivery_fee, 
                                    total = :total, 
                                    status = :status, 
                                    date_order_delivery = :date_order_delivery, 
                                    date_order_delivered = :date_order_delivered 
                                WHERE id = :order_id");

        // Check the status and update the corresponding date column
        if ($status === 'DELIVERY') {
            $stmt->bindValue(':date_order_delivery', $current_date); // Update delivery date
            $stmt->bindValue(':date_order_delivered', null, PDO::PARAM_NULL); // Reset delivered date
            

        } else if ($status === 'RECEIVED') {
            $stmt->bindValue(':date_order_delivery', $current_date); // Update delivery date
            $stmt->bindValue(':date_order_delivered', $current_date); // Update received date


        } else {
            // Reset both delivery and received dates if status is neither DELIVERY nor RECEIVED
            $stmt->bindValue(':date_order_delivery', null, PDO::PARAM_NULL);
            $stmt->bindValue(':date_order_delivered', null, PDO::PARAM_NULL);
        }

        $stmt->bindParam(':delivery_fee', $delivery_fee);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':order_id', $order_id);

        // Execute the update statement
        $stmt->execute();

        // Redirect back to the orders page or any other page as needed
        header('Location: ../orders.php');
        exit;
    } catch (PDOException $e) {
        // Handle database error
        echo "Error: " . $e->getMessage();
    }
} else {
    // If form is not submitted, redirect back to the edit form page
    header('Location: edit_order.php?id=' . $_GET['id']);
    exit;
}
?>
