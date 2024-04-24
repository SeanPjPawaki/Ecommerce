<?php
include('../includes/conn.php');

if (isset($_GET['id'])) {

  $stmt = $conn->prepare("SELECT * FROM order_details WHERE product_id = :product_id");
  $stmt->bindParam(':product_id', $_GET['id']);
  $stmt->execute();
  $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($orders) > 0) {
      echo "<script>
        if (confirm('You cannot delete this as there are users who have purchased this product. Click OK to return to the products page.')) {
          window.location.href = '../products.php';
        }
      </script>";
    } else {

      // Retrieve product ID from the URL
      $productId = $_GET['id'];
  
      // Delete product from the database
      $sql = "DELETE FROM products WHERE id = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $productId);
      if ($stmt->execute()) {
        header("Location: ../products.php");
        exit; // Stop script execution after redirect
      } else {
          echo "Error: Unable to delete product.";
      }
    }
} else {
    echo "Product ID not provided.";
}
?>
