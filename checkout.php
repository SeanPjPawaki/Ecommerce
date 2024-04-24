<?php include('includes/conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="external/css/checkout.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php include('includes/styles.php') ?>

  <?php include('includes/nav.php') ?>

  <?php include('includes/modals.php') ?>

  <?php include('includes/scripts.php') ?>

  <title>Severabs Tarot Shop | Create an Account</title>

</head>

<body>
  <div class="container-fluid container-section-navigator">
    <div class="nav-side">
      <h1>Orders</h1>
      <h5><a href="index.php" class="nav-side-link">Home</a> - Checkout</h5>
    </div>
  </div>
<?php
$userId = $_SESSION['USER_ID'];
$stmtBilling = $conn->prepare("SELECT * FROM billing_info WHERE user_id = :user_id");
$stmtBilling->bindParam(':user_id', $userId);
$stmtBilling->execute();
$billingInfo = $stmtBilling->fetch(PDO::FETCH_ASSOC);
$stmtDelivery = $conn->prepare("SELECT * FROM delivery_info WHERE user_id = :user_id");
$stmtDelivery->bindParam(':user_id', $userId);
$stmtDelivery->execute();
$deliveryInfo = $stmtDelivery->fetch(PDO::FETCH_ASSOC);
?>
  <div class="container-fluid info-container">
  <form action="processes/update_infoes.php" method="POST">
    <div class="container-fluid container-billing form-severabs">
        <h5>Billing Details</h5>
        <label for="country_billing" class="label-severabs">Country: (non-editable)</label>
        <input type="text" id="country_billing" name="country_billing" class="form-control input-severabs" value=<?php echo $billingInfo['country']?> readonly>

        <label for="province_billing" class="label-severabs">Province: (non-editable)</label>
        <input type="text" id="province_billing" name="province_billing" class="form-control input-severabs" value=<?php echo $billingInfo['province']?> readonly>

        <label for="city_billing" class="label-severabs">City: (non-editable)</label>
        <input type="text" id="city_billing" name="city_billing" class="form-control input-severabs" value=<?php echo $billingInfo['city']?> readonly>

        <label for="barangay_billing" class="label-severabs">Barangay:</label>
        <?php
                                $sql = "SELECT name FROM barangay";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $barangays = $stmt->fetchAll(PDO::FETCH_COLUMN);

                                ?>

                                
                                <select id="barangay_billing" name="barangay_billing" class="form-control input-severabs" value=<?php echo $billingInfo['barangay']?> required>
                                    <option value=<?php echo $billingInfo['barangay']?>><?php echo $billingInfo['barangay']?></option>
                                    <?php

                                    foreach ($barangays as $barangay) {
                                        echo "<option value='" . htmlspecialchars($barangay) . "'>" . htmlspecialchars($barangay) . "</option>";
                                    }
                                    ?>
                                </select>


        <label for="street_address_billing" class="label-severabs">Street Address:</label>
        <input type="text" id="street_address_billing" name="street_address_billing" class="form-control input-severabs" value=<?php echo $billingInfo['street_address']?>>

        <label for="full_name_billing" class="label-severabs">Full Name:</label>
        <input type="text" id="full_name_billing" name="full_name_billing" class="form-control input-severabs" value=<?php echo $billingInfo['full_name']?>>

        <label for="email_billing" class="label-severabs">Email:</label>
        <input type="email" id="email_billing" name="email_billing" class="form-control input-severabs" value=<?php echo $billingInfo['email']?>>

        <label for="phone_number_billing" class="label-severabs">Phone Number:</label>
        <input type="tel" id="phone_number_billing" name="phone_number_billing" class="form-control input-severabs" value=<?php echo $billingInfo['phone_number']?>>
    </div>

    <br>

    <div class="container-fluid container-delivery form-severabs">
        <h5>Delivery Details</h5>
        <label for="country_delivery" class="label-severabs">Country: (non-editable)</label>
        <input type="text" id="country_delivery" name="country_delivery" class="form-control input-severabs" value=<?php echo $deliveryInfo['country']?> readonly>

        <label for="province_delivery" class="label-severabs">Province: (non-editable)</label>
        <input type="text" id="province_delivery" name="province_delivery" class="form-control input-severabs" value=<?php echo $deliveryInfo['province']?> readonly>

        <label for="city_delivery" class="label-severabs">City: (non-editable)</label>
        <input type="text" id="city_delivery" name="city_delivery" class="form-control input-severabs" value=<?php echo $deliveryInfo['city']?> readonly>

        <label for="barangay_delivery" class="label-severabs">Barangay:</label>
        <?php
                                $sql = "SELECT name FROM barangay";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $barangays = $stmt->fetchAll(PDO::FETCH_COLUMN);

                                ?>

                                
                                <select id="barangay_delivery" name="barangay_delivery" class="form-control input-severabs" value=<?php echo $deliveryInfo['barangay']?> required>
                                    <option value=<?php echo $deliveryInfo['barangay']?>><?php echo $deliveryInfo['barangay']?></option>
                                    <?php

                                    foreach ($barangays as $barangay) {
                                        echo "<option value='" . htmlspecialchars($barangay) . "'>" . htmlspecialchars($barangay) . "</option>";
                                    }
                                    ?>
                                </select>
        <label for="street_address_delivery" class="label-severabs">Street Address:</label>
        <input type="text" id="street_address_delivery" name="street_address_delivery" class="form-control input-severabs" value=<?php echo $deliveryInfo['street_address']?> >

        <label for="full_name_delivery" class="label-severabs">Full Name:</label>
        <input type="text" id="full_name_delivery" name="full_name_delivery" class="form-control input-severabs" value=<?php echo $deliveryInfo['full_name']?> >

        <label for="email_delivery" class="label-severabs">Email:</label>
        <input type="email" id="email_delivery" name="email_delivery" class="form-control input-severabs" value=<?php echo $deliveryInfo['email']?> >

        <label for="phone_number_delivery" class="label-severabs">Phone Number:</label>
        <input type="tel" id="phone_number_delivery" name="phone_number_delivery" class="form-control input-severabs" value=<?php echo $deliveryInfo['phone_number']?>>
    </div>

    <br>

    <input type="submit" value="Update" name="Update" class="update-btn">
</form>

<Hr>
  <div class="container-fluid info-container">
  <h2>Your Order</h2>
  <br>
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
    $delivery_fee = $result2['delivery_fee'];


$userId = $_SESSION['USER_ID'];
$stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $userId);
$stmt->execute();
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Initialize variables for subtotal and total
$subtotal = 0;
$totalQuantity = 0;

// Start displaying order details
echo '<div class="row">';
echo '<div class="col">';
echo '<h5>Product</h5>';
echo '<h5>Item Name x Quantity</h5>';
echo '<h5>Subtotal</h5>';
echo '<h5>Delivery Fee</h5>';
echo '<h5>Total</h5>';
echo '</div>';
echo '<div class="col">';

// Loop through cart items to display order details and calculate subtotal
foreach ($cartItems as $cartItem) {
    // Retrieve product details based on product ID
    $productId = $cartItem['product_id'];
    $quantity = $cartItem['quantity'];

    // Fetch product details from the database based on product ID
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $productId);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Calculate subtotal for the current item
    $itemSubtotal = $product['price'] * $quantity;
    $subtotal += $itemSubtotal;
    $totalQuantity += $quantity;

    // Display product details for the current item
    echo '<h5>Subtotal</h5>';
    echo '<h5>' . $product['title'] . ' x ' . $quantity . '</h5>';
    echo '<h5>₱' . number_format($itemSubtotal, 2) . '</h5>';
}


// Calculate total
$total = $subtotal + $delivery_fee;

// Display subtotal, delivery fee, and total
echo '<h5>₱' .  number_format($delivery_fee, 2) . '</h5>';
echo '<h5>₱' .  number_format($total, 2) . '</h5>';

echo '</div>';
echo '</div>';
?>

<div class="container-payment">
  <h5> <b>NOTE:</b>Your orders will all be paid via Cash on Delivery (COD).</h5>
</div>

<br>
 <a href="processes/purchases/confirm_order.php?total=<?php echo $total?>&delivery_fee=<?php echo $delivery_fee?>" class="processor-link" style='text-decoration:none'>
  Place Order </a>

</div>

  </div>
  </div>



</body>
<?php include('includes/footer.php') ?>

</html>