<?php
include('includes/conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="external/css/cart.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include('includes/styles.php') ?>

    <?php include('includes/nav.php') ?>

    <?php include('includes/modals.php') ?>

    <?php include('includes/scripts.php') ?>

    <title>Severabs Tarot Shop | Cart </title>

    <style>
        .one-size {
            height: 100px;
            width: auto;
        }
    </style>
</head>

<body>
    <div class="container-fluid container-section-navigator">
        <div class="nav-side">
            <h1>Account Profile</h1>
            <h5><a href="index.php" class="nav-side-link">Home</a> - <a href="profile.php?url=account" class="nav-side-link">Profile</a> -
                Cart</h5>
        </div>
    </div>

    <div class="container-fluid container-cart">
        <form action="processes/purchases/update_cart.php" method="POST">
            <div class="row text-center align-items-center container-cart">
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                    <h5>Image</h5>
                </div>
                <div class="col-sm-2">
                    <h5>Name</h5>
                </div>
                <div class="col-sm-3">
                    <h5>Price</h5>
                </div>
                <div class="col">
                    <h5>Quantity</h5>
                </div>
                <div class="col">
                    <h5>Subtotal</h5>
                </div>
            </div>
            <hr>

            <?php

                if (!isset($_SESSION['USER_ID'])) {
                    // Handle the case when the user is not logged in
                    echo "User is not logged in.";
                    exit;
                }
                
                // Include database connection
                include_once 'includes/conn.php'; // Replace 'conn.php' with your actual database connection file
                $subtotal = 0;
                // Fetch cart items for the logged-in user
                $userId = $_SESSION['USER_ID'];
                $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id");
                $stmt->bindParam(':user_id', $userId);
                $stmt->execute();
                $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                // Output cart items and calculate subtotal
                foreach ($cartItems as $cartItem) {
                    // Retrieve product details based on product_id
                    $productId = $cartItem['product_id'];
                    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :product_id");
                    $stmt->bindParam(':product_id', $productId);
                    $stmt->execute();
                    $product = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    // Calculate item total
                    $itemTotal = $product['price'] * $cartItem['quantity'];
                    $subtotal += $itemTotal;
                
                    // Display cart item with product details
                    echo '<div class="row text-center align-items-center container-cart">';
                    echo '<div class="col-sm-1"><a href="processes/purchases/remove_carter.php?id='.$cartItem['product_id'].'">X</a></div>';
                    echo '<div class="col-sm-2"><img src="img/products/' . $product['image'] . '" class="img-fluid one-size"></div>';
                    echo '<div class="col-sm-2"><h5>' . $product['title'] . '</h5></div>';
                    echo '<div class="col-sm-3"><h5>₱' . $product['price'] . '</h5></div>';
                    echo '<div class="col d-flex">';
                    echo '<button class="btn decrementBtn" data-item-id="' . $cartItem['id'] . '">-</button>';
                    echo '<h5><input type="number" name="quantity[' . $cartItem['id'] . ']" value="' . $cartItem['quantity'] . '" class="quanti_' . $cartItem['id'] . ' quanti"></h5>';
                    echo '<button class="btn incrementBtn" data-item-id="' . $cartItem['id'] . '" data-product-id="' . $productId . '">+</button>';
                    echo '<input type="hidden" name="productId[' . $cartItem['id'] . ']" value="' . $productId . '">';
                    echo '</div>';
                    echo '<div class="col itemTotal" data-item-total="' . $itemTotal . '"><h5>₱' . $itemTotal . '</h5></div>';
                    echo '</div>';
                    echo '<hr>';
                }
                ?>
        
       
       
       
        </form>
    </div>


    <script>
    document.querySelectorAll('.incrementBtn, .decrementBtn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var itemId = this.getAttribute('data-item-id');
            var input = document.querySelector('.quanti_' + itemId);
            var itemTotal = document.querySelector('.itemTotal[data-item-total="' + (parseFloat(input.value) * parseFloat(input.getAttribute('data-price'))) + '"]');
            
            if (this.classList.contains('incrementBtn') && input.value < 5) {
                input.stepUp();
            } else if (this.classList.contains('decrementBtn') && input.value > 1) {
                input.stepDown();
            }

            // Calculate the new item total
            var newTotal = parseFloat(input.value) * parseFloat(input.getAttribute('data-price'));
            
            // Update item total display
            itemTotal.setAttribute('data-item-total', newTotal);
            itemTotal.innerHTML = '₱' + newTotal.toFixed(2);

            // Update subtotal
            var subtotalValue = parseFloat(document.querySelector('.first-ic.subtotal').textContent.replace(/[^\d.-]/g, ''));
            var updatedSubtotal = subtotalValue + (newTotal - parseFloat(itemTotal.getAttribute('data-item-total')));
            document.querySelector('.first-ic.subtotal').innerHTML = '₱' + updatedSubtotal.toFixed(2);

            // Update total including delivery fee
            var deliveryFee = parseFloat(document.querySelector('.first-ic.delivery-fee').textContent.replace(/[^\d.-]/g, ''));
            var totalValue = updatedSubtotal + deliveryFee;
            document.querySelector('.first-ic.total').innerHTML = '₱' + totalValue.toFixed(2);
        });
    });
</script>




    <?php

    $user_id = $_SESSION['USER_ID'];
   
    $query1 = "SELECT user_id, barangay FROM delivery_info WHERE user_id = :user_id";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt1->execute();
    $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    $barangay = $result1['barangay'];

    $query2 = "SELECT charge AS delivery_fee FROM barangay WHERE name = :barangay";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bindParam(':barangay', $barangay, PDO::PARAM_STR);
    $stmt2->execute();
    $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    $delivery_fee = isset($result2['delivery_fee']) ? intval($result2['delivery_fee']) : 0;
    ?>

<?php
include 'includes/conn.php';

// Check if the user has items in their cart
$user_id = $_SESSION['USER_ID'];
$stmt = $conn->prepare("SELECT COUNT(*) as cart_count FROM cart WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$cart_count = $stmt->fetch(PDO::FETCH_ASSOC)['cart_count'];

if ($cart_count > 0) {
    // Retrieve cart items
    $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Calculate subtotal
    // foreach ($cartItems as $cartItem) {
    //     $subtotal += $product['price'] * $cartItem['quantity'];
    // }

    // Delivery fee
    // Total
    $total = $subtotal + $delivery_fee;
?>
<div class="container container-cart">
    <h1 class="bold">Cart totals <?php echo number_format($total, 2, '.', ',') ?></h1>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="first-ic subtotal">Subtotal</h5>
            <h5 class="first-ic delivery-fee">Delivery Fee</h5>
            <h5 class="first-ic total">Total</h5>
        </div>
        <div class="col-sm-3">
            <h5 class="first-ic subtotal">₱<?php echo number_format($subtotal, 2, '.', ',') ?></h5>
            <h5 class="first-ic delivery-fee">₱<?php echo number_format($delivery_fee, 2, '.', ',') ?></h5>
            <h5 class="first-ic total">₱<?php echo number_format($total, 2, '.', ',') ?></h5>
        </div>
    </div>
    <br>
    <a href="checkout.php?total=<?php echo $total?>&delivery_fee=<?php echo $delivery_fee?>" class="read checkout-btn"> PROCEED TO CHECKOUT </a>
</div>
<?php
}else{
    echo "<h1 style='text-align: center' class='svrbs'> Cart is empty! </h1>";
}
?>


    </div>

</body>
<?php include('includes/footer.php') ?>



</html>