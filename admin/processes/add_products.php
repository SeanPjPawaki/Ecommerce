<?php
include('../includes/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $stocks = $_POST['stocks'];
    $availability = $_POST['availability'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $targetDir = "../../img/products/";
    $targetFile = $targetDir . basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $sql = "INSERT INTO products (type, title, description, stocks, availability, price, image) 
                VALUES (:type, :title, :description, :stocks, :availability, :price, :image)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':stocks', $stocks);
        $stmt->bindParam(':availability', $availability);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        if ($stmt->execute()) {
            header("Location: ../products.php");
        } else {
            echo "Error: Unable to add product.";
        }
    } else {
        echo "Error uploading file.";
    }
}
?>