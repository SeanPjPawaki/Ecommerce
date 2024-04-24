<?php
include('../includes/conn.php');

if (isset($_GET['id'])) {
    // Retrieve product ID from the URL
    $productId = $_GET['id'];

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST['type'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $stocks = $_POST['stocks'];
        $availability = $_POST['availability'];
        $price = $_POST['price'];
        
        // Check if a new image is uploaded
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $targetDir = "../../img/products/";
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true); // Create the directory recursively with full permissions
            }
            $targetFile = $targetDir . basename($image);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                // Update product with new image
                $sql = "UPDATE products SET type = :type, title = :title, description = :description, 
                        stocks = :stocks, availability = :availability, price = :price, image = :image 
                        WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':stocks', $stocks);
                $stmt->bindParam(':availability', $availability);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':image', $image);
                $stmt->bindParam(':id', $productId);
                if ($stmt->execute()) {
                    header("Location: ../products.php");
                    exit; // Stop script execution after redirect
                } else {
                    echo "Error: Unable to update product.";
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            // Update product without changing the image
            $sql = "UPDATE products SET type = :type, title = :title, description = :description, 
                    stocks = :stocks, availability = :availability, price = :price 
                    WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':stocks', $stocks);
            $stmt->bindParam(':availability', $availability);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':id', $productId);
            if ($stmt->execute()) {
                header("Location: ../products.php");
                exit; // Stop script execution after redirect
            } else {
                echo "Error: Unable to update product.";
            }
        }
    }

    // Fetch product information based on ID
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $productId);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Product ID not provided.";
}
?>
