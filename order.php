<?php
include('includes/conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="external/css/profile.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include('includes/styles.php') ?>

    <?php include('includes/nav.php') ?>

    <?php include('includes/modals.php') ?>

    <?php include('includes/scripts.php') ?>

    <title>Severabs Tarot Shop | Profile</title>

</head>

<body>
    <div class="container-fluid container-section-navigator">
        <div class="nav-side">
            <h1>Account Profile</h1>
            <h5><a href="index.php" class="nav-side-link">Home</a> -
                Profile</h5>
        </div>
    </div>

    <div class="container-fluid container-account">
        <div class="row">
            <div class="col main-interface-1">
                <?php
                if (isset($_GET['filter']) && $_GET['filter'] == 'all') {
                ?>
                <div class="row">

                <div class="col orders-links">
                    <a href="order.php?filter=all" class="orders-links">
                        <h5>All Orders</h5>
                </a>
        
                    </div>
                    
                <div class="col orders-links">
                    <a href="order.php?filter=pending" class="orders-links">
                        <h5>Order Pending</h5>
                </a>
        
                    </div>
               
            
               

                    <div class="col orders-links">
                    <a href="order.php?filter=delivery" class="orders-links">
                        <h5>Order on Delivery</h5>
                        </a>
                    </div>

                    <div class="col orders-links">
                    <a href="order.php?filter=received" class="orders-links">
                        <h5>Order Received</h5>
                        </a>
                    </div>

                    <div class="col orders-links">
                    <a href="order.php?filter=cancelled" class="orders-links">
                        <h5>Order Cancelled</h5>
                        </a>
                    </div>
               
                </div>
                <br>

                <?php

if (!isset($_SESSION['USER_ID'])) {
    echo "User is not logged in.";
    exit;
}

include_once 'includes/conn.php'; 

try {
    // Retrieve orders for the logged-in user
    $userId = $_SESSION['USER_ID'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :user_id ORDER by ID DESC");
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any orders
    if (empty($orders)) {
        echo "No orders found for this user.";
    } else {
        // Render HTML for each order
        foreach ($orders as $order) {
            $orderId = $order['id'];
            $status = $order['status'];
            $deliveryFee = $order['delivery_fee'];
            $total = $order['total'];
            $dateOrderPlaced = $order['date_order_placed'];

            echo '<div class="d-flex align-items-center">';
            echo '<strong role="status">Order ID: ' . $orderId . '</strong>';
            echo '<div class="ms-auto" aria-hidden="true">Status: ' . $status . '</div>';
            if ($status === 'PENDING') {
                echo '<form action="processes/purchases/cancel_order.php" method="POST">';
                echo '<input type="hidden" name="order_id" value="' . $orderId . '">';
                echo '<button type="submit" class=" btn-svrbs">(Cancel Order)</button>';
                echo '</form>';
            }
            echo '</div>';

            $stmt = $conn->prepare("SELECT * FROM order_details WHERE order_id = :order_id AND user_id = :user_id");
            $stmt->bindParam(':order_id', $orderId);
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
            $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($orderDetails as $orderDetail) {
                $productId = $orderDetail['product_id'];
                $quantity = $orderDetail['quantity'];

                $stmt = $conn->prepare("SELECT * FROM products WHERE id = :product_id");
                $stmt->bindParam(':product_id', $productId);
                $stmt->execute();
                $product = $stmt->fetch(PDO::FETCH_ASSOC);

                echo '<div class="row container-orders">';
                echo '<div class="col-sm-1">';
                echo '<img src="img/products/' . $product['image'] . '" class="img-fluid one-size">';
                echo '</div>';
                echo '<div class="col">';
                echo '<h5>' . $product['title'] . '</h5>';
                echo '<h5>' . $quantity . ' x ₱' . number_format($product['price'], 2) . '</h5>';
                echo '</div>';
                echo '</div>';
              
            }
            $subtotal = 0;
            foreach ($orderDetails as $orderDetail) {
                $productId = $orderDetail['product_id'];
                $quantity = $orderDetail['quantity'];

                $stmt = $conn->prepare("SELECT price FROM products WHERE id = :product_id");
                $stmt->bindParam(':product_id', $productId);
                $stmt->execute();
                $productPrice = $stmt->fetchColumn();

                $subtotal += $productPrice * $quantity;
            }
            echo '<div class="d-flex align-items-center">';
            echo '<div class="ms-auto" aria-hidden="true">';
            echo '<h5>Subtotal: ₱' . number_format($subtotal, 2) . '</h5>';
            echo '<h5>Delivery Fee: ₱' . number_format($deliveryFee, 2) . '</h5>';
            echo '<h5>Total: ₱' . number_format($total, 2) . '</h5>';
            echo '</div>';
            echo '</div>';
            echo '<hr>';
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
                <?php } if (isset($_GET['filter']) && $_GET['filter'] == 'pending') { ?>
                    <?php
                if (isset($_GET['filter']) && $_GET['filter'] == 'all') {
                ?>
                <div class="row">

                <div class="col orders-links">
                    <a href="order.php?filter=all" class="orders-links">
                        <h5>All Orders</h5>
                </a>
        
                    </div>
                    
                <div class="col orders-links">
                    <a href="order.php?filter=pending" class="orders-links">
                        <h5>Order Pending</h5>
                </a>
        
                    </div>
               
            
               

                    <div class="col orders-links">
                    <a href="order.php?filter=delivery" class="orders-links">
                        <h5>Order on Delivery</h5>
                        </a>
                    </div>

                    <div class="col orders-links">
                    <a href="order.php?filter=received" class="orders-links">
                        <h5>Order Received</h5>
                        </a>
                    </div>

                    <div class="col orders-links">
                    <a href="order.php?filter=cancelled" class="orders-links">
                        <h5>Order Cancelled</h5>
                        </a>
                    </div>
               
                </div>
                <br>

                <?php
                }
                ?>
                  <div class="row">

<div class="col orders-links">
    <a href="order.php?filter=all" class="orders-links">
        <h5>All Orders</h5>
</a>

    </div>
    
<div class="col orders-links">
    <a href="order.php?filter=pending" class="orders-links">
        <h5>Order Pending</h5>
</a>

    </div>




    <div class="col orders-links">
    <a href="order.php?filter=delivery" class="orders-links">
        <h5>Order on Delivery</h5>
        </a>
    </div>

    <div class="col orders-links">
    <a href="order.php?filter=received" class="orders-links">
        <h5>Order Received</h5>
        </a>
    </div>

    <div class="col orders-links">
    <a href="order.php?filter=cancelled" class="orders-links">
        <h5>Order Cancelled</h5>
        </a>
    </div>

</div>
<br>
                <?php
if (!isset($_SESSION['USER_ID'])) {
    echo "User is not logged in.";
    exit;
}

include_once 'includes/conn.php'; 

try {
    // Retrieve orders for the logged-in user
    $userId = $_SESSION['USER_ID'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :user_id AND status = 'PENDING' ORDER by ID DESC");
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any orders
    if (empty($orders)) {
        echo "No orders found for this user.";
    } else {
        // Render HTML for each order
        foreach ($orders as $order) {
            $orderId = $order['id'];
            $status = $order['status'];
            $deliveryFee = $order['delivery_fee'];
            $total = $order['total'];
            $dateOrderPlaced = $order['date_order_placed'];

            echo '<div class="d-flex align-items-center">';
            echo '<strong role="status">Order ID: ' . $orderId . '</strong>';
            echo '<div class="ms-auto" aria-hidden="true">Status: ' . $status . '</div>';
            if ($status === 'PENDING') {
                echo '<form action="processes/purchases/cancel_order.php" method="POST">';
                echo '<input type="hidden" name="order_id" value="' . $orderId . '">';
                echo '<button type="submit" class=" btn-svrbs">(Cancel Order)</button>';
                echo '</form>';
            }
            echo '</div>';

            $stmt = $conn->prepare("SELECT * FROM order_details WHERE order_id = :order_id AND user_id = :user_id");
            $stmt->bindParam(':order_id', $orderId);
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
            $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($orderDetails as $orderDetail) {
                $productId = $orderDetail['product_id'];
                $quantity = $orderDetail['quantity'];

                $stmt = $conn->prepare("SELECT * FROM products WHERE id = :product_id");
                $stmt->bindParam(':product_id', $productId);
                $stmt->execute();
                $product = $stmt->fetch(PDO::FETCH_ASSOC);

                echo '<div class="row container-orders">';
                echo '<div class="col-sm-1">';
                echo '<img src="img/products/' . $product['image'] . '" class="img-fluid one-size">';
                echo '</div>';
                echo '<div class="col">';
                echo '<h5>' . $product['title'] . '</h5>';
                echo '<h5>' . $quantity . ' x ₱' . number_format($product['price'], 2) . '</h5>';
                echo '</div>';
                echo '</div>';
              
            }
            $subtotal = 0;
            foreach ($orderDetails as $orderDetail) {
                $productId = $orderDetail['product_id'];
                $quantity = $orderDetail['quantity'];

                $stmt = $conn->prepare("SELECT price FROM products WHERE id = :product_id");
                $stmt->bindParam(':product_id', $productId);
                $stmt->execute();
                $productPrice = $stmt->fetchColumn();

                $subtotal += $productPrice * $quantity;
            }
            echo '<div class="d-flex align-items-center">';
            echo '<div class="ms-auto" aria-hidden="true">';
            echo '<h5>Subtotal: ₱' . number_format($subtotal, 2) . '</h5>';
            echo '<h5>Delivery Fee: ₱' . number_format($deliveryFee, 2) . '</h5>';
            echo '<h5>Total: ₱' . number_format($total, 2) . '</h5>';
            echo '</div>';
            echo '</div>';
            echo '<hr>';
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
              <?php  } if (isset($_GET['filter']) && $_GET['filter'] == 'delivery') { ?>
              <div class="row">

<div class="col orders-links">
<a href="order.php?filter=all" class="orders-links">
    <h5>All Orders</h5>
</a>

</div>

<div class="col orders-links">
<a href="order.php?filter=pending" class="orders-links">
    <h5>Order Pending</h5>
</a>

</div>




<div class="col orders-links">
<a href="order.php?filter=delivery" class="orders-links">
    <h5>Order on Delivery</h5>
    </a>
</div>

<div class="col orders-links">
<a href="order.php?filter=received" class="orders-links">
    <h5>Order Received</h5>
    </a>
</div>

<div class="col orders-links">
<a href="order.php?filter=cancelled" class="orders-links">
    <h5>Order Cancelled</h5>
    </a>
</div>

</div>
<br>
            <?php
if (!isset($_SESSION['USER_ID'])) {
echo "User is not logged in.";
exit;
}

include_once 'includes/conn.php'; 

try {
// Retrieve orders for the logged-in user
$userId = $_SESSION['USER_ID'];
$stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :user_id AND status = 'DELIVERY' ORDER by ID DESC");
$stmt->bindParam(':user_id', $userId);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if there are any orders
if (empty($orders)) {
    echo "No orders found for this user.";
} else {
    // Render HTML for each order
    foreach ($orders as $order) {
        $orderId = $order['id'];
        $status = $order['status'];
        $deliveryFee = $order['delivery_fee'];
        $total = $order['total'];
        $dateOrderPlaced = $order['date_order_placed'];

        echo '<div class="d-flex align-items-center">';
        echo '<strong role="status">Order ID: ' . $orderId . '</strong>';
        echo '<div class="ms-auto" aria-hidden="true">Status: ' . $status . '</div>';
        if ($status === 'PENDING') {
            echo '<form action="processes/purchases/cancel_order.php" method="POST">';
            echo '<input type="hidden" name="order_id" value="' . $orderId . '">';
            echo '<button type="submit" class=" btn-svrbs">(Cancel Order)</button>';
            echo '</form>';
        }
        echo '</div>';

        $stmt = $conn->prepare("SELECT * FROM order_details WHERE order_id = :order_id AND user_id = :user_id");
        $stmt->bindParam(':order_id', $orderId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($orderDetails as $orderDetail) {
            $productId = $orderDetail['product_id'];
            $quantity = $orderDetail['quantity'];

            $stmt = $conn->prepare("SELECT * FROM products WHERE id = :product_id");
            $stmt->bindParam(':product_id', $productId);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '<div class="row container-orders">';
            echo '<div class="col-sm-1">';
            echo '<img src="img/products/' . $product['image'] . '" class="img-fluid one-size">';
            echo '</div>';
            echo '<div class="col">';
            echo '<h5>' . $product['title'] . '</h5>';
            echo '<h5>' . $quantity . ' x ₱' . number_format($product['price'], 2) . '</h5>';
            echo '</div>';
            echo '</div>';
          
        }
        $subtotal = 0;
        foreach ($orderDetails as $orderDetail) {
            $productId = $orderDetail['product_id'];
            $quantity = $orderDetail['quantity'];

            $stmt = $conn->prepare("SELECT price FROM products WHERE id = :product_id");
            $stmt->bindParam(':product_id', $productId);
            $stmt->execute();
            $productPrice = $stmt->fetchColumn();

            $subtotal += $productPrice * $quantity;
        }
        echo '<div class="d-flex align-items-center">';
        echo '<div class="ms-auto" aria-hidden="true">';
        echo '<h5>Subtotal: ₱' . number_format($subtotal, 2) . '</h5>';
        echo '<h5>Delivery Fee: ₱' . number_format($deliveryFee, 2) . '</h5>';
        echo '<h5>Total: ₱' . number_format($total, 2) . '</h5>';
        echo '</div>';
        echo '</div>';
        echo '<hr>';
    }
}
} catch (PDOException $e) {
echo "Error: " . $e->getMessage();
}
} if (isset($_GET['filter']) && $_GET['filter'] == 'received') { ?>
          <div class="row">

<div class="col orders-links">
<a href="order.php?filter=all" class="orders-links">
    <h5>All Orders</h5>
</a>

</div>

<div class="col orders-links">
<a href="order.php?filter=pending" class="orders-links">
    <h5>Order Pending</h5>
</a>

</div>




<div class="col orders-links">
<a href="order.php?filter=delivery" class="orders-links">
    <h5>Order on Delivery</h5>
    </a>
</div>

<div class="col orders-links">
<a href="order.php?filter=received" class="orders-links">
    <h5>Order Received</h5>
    </a>
</div>

<div class="col orders-links">
<a href="order.php?filter=cancelled" class="orders-links">
    <h5>Order Cancelled</h5>
    </a>
</div>

</div>
<br>
            <?php
if (!isset($_SESSION['USER_ID'])) {
echo "User is not logged in.";
exit;
}

include_once 'includes/conn.php'; 

try {
// Retrieve orders for the logged-in user
$userId = $_SESSION['USER_ID'];
$stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :user_id AND status = 'RECEIVED' ORDER by ID DESC");
$stmt->bindParam(':user_id', $userId);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if there are any orders
if (empty($orders)) {
    echo "No orders found for this user.";
} else {
    // Render HTML for each order
    foreach ($orders as $order) {
        $orderId = $order['id'];
        $status = $order['status'];
        $deliveryFee = $order['delivery_fee'];
        $total = $order['total'];
        $dateOrderPlaced = $order['date_order_placed'];

        echo '<div class="d-flex align-items-center">';
        echo '<strong role="status">Order ID: ' . $orderId . '</strong>';
        echo '<div class="ms-auto" aria-hidden="true">Status: ' . $status . '</div>';
        if ($status === 'PENDING') {
            echo '<form action="processes/purchases/cancel_order.php" method="POST">';
            echo '<input type="hidden" name="order_id" value="' . $orderId . '">';
            echo '<button type="submit" class=" btn-svrbs">(Cancel Order)</button>';
            echo '</form>';
        }
        echo '</div>';

        $stmt = $conn->prepare("SELECT * FROM order_details WHERE order_id = :order_id AND user_id = :user_id");
        $stmt->bindParam(':order_id', $orderId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($orderDetails as $orderDetail) {
            $productId = $orderDetail['product_id'];
            $quantity = $orderDetail['quantity'];

            $stmt = $conn->prepare("SELECT * FROM products WHERE id = :product_id");
            $stmt->bindParam(':product_id', $productId);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '<div class="row container-orders">';
            echo '<div class="col-sm-1">';
            echo '<img src="img/products/' . $product['image'] . '" class="img-fluid one-size">';
            echo '</div>';
            echo '<div class="col">';
            echo '<h5>' . $product['title'] . '</h5>';
            echo '<h5>' . $quantity . ' x ₱' . number_format($product['price'], 2) . '</h5>';
            echo '</div>';
            echo '</div>';
          
        }
        $subtotal = 0;
        foreach ($orderDetails as $orderDetail) {
            $productId = $orderDetail['product_id'];
            $quantity = $orderDetail['quantity'];

            $stmt = $conn->prepare("SELECT price FROM products WHERE id = :product_id");
            $stmt->bindParam(':product_id', $productId);
            $stmt->execute();
            $productPrice = $stmt->fetchColumn();

            $subtotal += $productPrice * $quantity;
        }
        echo '<div class="d-flex align-items-center">';
        echo '<div class="ms-auto" aria-hidden="true">';
        echo '<h5>Subtotal: ₱' . number_format($subtotal, 2) . '</h5>';
        echo '<h5>Delivery Fee: ₱' . number_format($deliveryFee, 2) . '</h5>';
        echo '<h5>Total: ₱' . number_format($total, 2) . '</h5>';
        echo '</div>';
        echo '</div>';
        echo '<hr>';
    }
}
} catch (PDOException $e) {
echo "Error: " . $e->getMessage();
}
?>
<?php
}if (isset($_GET['filter']) && $_GET['filter'] == 'cancelled') { ?>
          <div class="row">

<div class="col orders-links">
<a href="order.php?filter=all" class="orders-links">
    <h5>All Orders</h5>
</a>

</div>

<div class="col orders-links">
<a href="order.php?filter=pending" class="orders-links">
    <h5>Order Pending</h5>
</a>

</div>




<div class="col orders-links">
<a href="order.php?filter=delivery" class="orders-links">
    <h5>Order on Delivery</h5>
    </a>
</div>

<div class="col orders-links">
<a href="order.php?filter=received" class="orders-links">
    <h5>Order Received</h5>
    </a>
</div>

<div class="col orders-links">
<a href="order.php?filter=cancelled" class="orders-links">
    <h5>Order Cancelled</h5>
    </a>
</div>

</div>
<br>
            <?php
if (!isset($_SESSION['USER_ID'])) {
echo "User is not logged in.";
exit;
}

include_once 'includes/conn.php'; 

$userId = $_SESSION['USER_ID'];
$stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :user_id AND status = 'CANCELLED' ORDER by ID DESC");
$stmt->bindParam(':user_id', $userId);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if there are any orders
if (empty($orders)) {
    echo "No orders found for this user.";
} else {
    // Render HTML for each order
    foreach ($orders as $order) {
        $orderId = $order['id'];
        $status = $order['status'];
        $deliveryFee = $order['delivery_fee'];
        $total = $order['total'];
        $dateOrderPlaced = $order['date_order_placed'];

        echo '<div class="d-flex align-items-center">';
        echo '<strong role="status">Order ID: ' . $orderId . '</strong>';
        echo '<div class="ms-auto" aria-hidden="true">Status: ' . $status . '</div>';
        if ($status === 'PENDING') {
            echo '<form action="processes/purchases/cancel_order.php" method="POST">';
            echo '<input type="hidden" name="order_id" value="' . $orderId . '">';
            echo '<button type="submit" class=" btn-svrbs">(Cancel Order)</button>';
            echo '</form>';
        }
        echo '</div>';

        $stmt = $conn->prepare("SELECT * FROM order_details WHERE order_id = :order_id AND user_id = :user_id");
        $stmt->bindParam(':order_id', $orderId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($orderDetails as $orderDetail) {
            $productId = $orderDetail['product_id'];
            $quantity = $orderDetail['quantity'];

            $stmt = $conn->prepare("SELECT * FROM products WHERE id = :product_id");
            $stmt->bindParam(':product_id', $productId);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '<div class="row container-orders">';
            echo '<div class="col-sm-1">';
            echo '<img src="img/products/' . $product['image'] . '" class="img-fluid one-size">';
            echo '</div>';
            echo '<div class="col">';
            echo '<h5>' . $product['title'] . '</h5>';
            echo '<h5>' . $quantity . ' x ₱' . number_format($product['price'], 2) . '</h5>';
            echo '</div>';
            echo '</div>';
          
        }
        $subtotal = 0;
        foreach ($orderDetails as $orderDetail) {
            $productId = $orderDetail['product_id'];
            $quantity = $orderDetail['quantity'];

            $stmt = $conn->prepare("SELECT price FROM products WHERE id = :product_id");
            $stmt->bindParam(':product_id', $productId);
            $stmt->execute();
            $productPrice = $stmt->fetchColumn();

            $subtotal += $productPrice * $quantity;
        }
        echo '<div class="d-flex align-items-center">';
        echo '<div class="ms-auto" aria-hidden="true">';
        echo '<h5>Subtotal: ₱' . number_format($subtotal, 2) . '</h5>';
        echo '<h5>Delivery Fee: ₱' . number_format($deliveryFee, 2) . '</h5>';
        echo '<h5>Total: ₱' . number_format($total, 2) . '</h5>';
        echo '</div>';
        echo '</div>';
        echo '<hr>';
    }
}
}


?>
            
              
            </div>

            <div class="col-sm-3 sidebar">
                <h5>Welcome, <b>user</b></h5>
                <br>
                <h5 class="bold"><i class="bi bi-person-circle"></i>
                    Profile</h5>
                <p> <a class="side-link" href="profile.php?url=account"><i class="bi bi-gear"></i> Account
                        Information</a></p>
                <p> <a class="side-link" href="profile.php?url=delivery"><i class="bi bi-truck-front"></i> Delivery
                        Information</a></p>
                <p> <a class="side-link" href="profile.php?url=billing"><i class="bi bi-receipt"></i> Billing
                        Information</a></p>
             
                <hr>
                <h5 class="bold">Shopping Information</h5>
                <p> <a class="side-link" href="order.php?filter=all"><i class="bi bi-bag"></i> Orders</a></p>
                <p> <a class="side-link" href="cart.php"><i class="bi bi-cart"></i> Cart</a></p>
                <hr>
                <h5> <a class="side-link" href="processes/accounts/logout.php"><i class="bi bi-box-arrow-left"></i>
                        Logout</a></h5>

            </div>
        </div>
    </div>

</body>
<?php include('includes/footer.php') ?>

</html>