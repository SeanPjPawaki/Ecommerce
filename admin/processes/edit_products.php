<?php
include('../includes/conn.php');

if (isset($_GET['id'])) {
    // Retrieve product ID from the URL
    $productId = $_GET['id'];

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $type = $_POST['type'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $stocks = $_POST['stocks'];
        $availability = $_POST['availability'];
        $price = $_POST['price'];
        
        // File upload handling
        $image = $_FILES['image']['name'];
        $targetDir = "uploads/"; // Change this to your desired directory
        $targetFile = $targetDir . basename($image);

        // Check if file is uploaded successfully
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // SQL update statement
            $sql = "UPDATE products SET type = :type, title = :title, description = :description, 
                    stocks = :stocks, availability = :availability, price = :price, image = :image 
                    WHERE id = :id";
            
            // Prepare the SQL statement
            $stmt = $conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':stocks', $stocks);
            $stmt->bindParam(':availability', $availability);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':id', $productId);
            
            // Execute the prepared statement
            if ($stmt->execute()) {
                echo "Product updated successfully.";
            } else {
                echo "Error: Unable to update product.";
            }
        } else {
            echo "Error uploading file.";
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
