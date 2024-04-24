<?php 
session_start();
include('includes/conn.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="external/css/shop.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include('includes/styles.php') ?>

    <?php include('includes/nav.php') ?>

    <?php include('includes/modals.php') ?>

    <?php include('includes/scripts.php') ?>

    <title>Severabs Tarot Shop | Shop Catalog</title>

</head>
<style> 
    .prods {
        height: 200px;
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0px auto;
    }
</style>

<body>
    <div class="container-fluid container-section-navigator">
        <div class="nav-side">
            <h1>Shopping</h1>
            <h5><a href="index.php" class="nav-side-link">Home</a> - Shop Catalog</h5>
        </div>
    </div>


    <div class="container-fluid product-info-container text-center">

    <div class="container-fluid product-info-container text-center">

<?php
$stmt = $conn->prepare("SELECT * FROM products WHERE availability = 'Available'");
$stmt->execute();

// Fetch all rows as associative arrays
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Counter for tracking the number of products
$productCounter = 0;

// Generate HTML for each product
foreach ($products as $product) {
    // Check if product counter is divisible by 4
    if ($productCounter % 4 == 0) {
        // If divisible by 4, start a new row
        if ($productCounter != 0) {
            echo '</div>'; // Close previous row
        }
        echo '<div class="row product-row">'; // Start new row
    }
   
    echo '<div class="col prod-col">';
    
    echo '<div class="card text-center">';
    echo '<img src="img/products/' . $product['image'] . '" class="card-img-top prods" alt="Product Image">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title prod-title">' . $product['title'] . '</h5>';
    $description = strlen($product['description']) > 50 ? substr($product['description'], 0, 50) . '...' : $product['description'];
    echo '<p class="card-text prod-desc">' . $description . '</p>';
    echo '<p class="card-text"> ₱' . $product['price'] . '</p>';
    // Pass product details to the modal
    echo '<button type="button" class="btn btn-srvbs" data-bs-toggle="modal" data-bs-target="#viewInfo' . $product['id'] . '">View Info</button>';
    echo '</div></div></div>';

    // Increment product counter
    $productCounter++;
}

// Close the last row if it's not already closed
if ($productCounter % 4 != 0) {
    echo '</div>'; // Close the last row
}
?>
</div>

<?php
// Generate modals for each product
foreach ($products as $product) {
    echo '<div class="modal fade" id="viewInfo' . $product['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
    echo '<div class="modal-dialog">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<h5 class="modal-title bold fs-5">' . $product['title'] . '</h5>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    echo '</div>';
    echo '<div class="modal-body">';
    echo '<img src="img/products/' . $product['image'] . '" class="img-fluid prodder"';

    echo '<hr>';
    echo '<br>';
    echo '<p>' . $product['description'] . '</p>';
    echo '<p>₱' . $product['price'] . '</p>';
    echo '<br>';
    echo '</div>';
    echo '<div class="modal-footer">';
    echo '<button type="button" class="btn btn-primary" onclick="addToCart(' . $product['id'] . ')">Add to Cart</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>

</div>

</body>
<?php include('includes/footer.php') ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function addToCart(productId) {
    // Redirect user to addtocart.php with productId as query parameter
    window.location.href = 'processes/purchases/addtocart.php?productId=' + productId;
}



</script>



</html>