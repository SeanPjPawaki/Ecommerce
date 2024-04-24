<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Severabs - Users</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">SEVERABS </div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>User</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Components:</h6>
                        <a class="collapse-item" href="billing_information.php">Billing Information</a>
                        <a class="collapse-item" href="delivery_information.php">Delivery Information</a>
                        <a class="collapse-item" href="users.php">Users</a>
                        <a class="collapse-item" href="cart.php">Cart</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Site</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Site Components:</h6>
                        <a class="collapse-item" href="orders.php">Orders</a>
                        <a class="collapse-item" href="orders_details.php">Order Details</a>
                       
                        <a class="collapse-item" href="products.php">Products</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

         

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
               

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                      

                        <!-- Nav Item - Messages -->
                    

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Severabs Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                             
                                <a class="dropdown-item" href="/Ecommerce" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="container-fluid">

                    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
                    <p class="mb-4">Manage Delivery Informations of users of Severabs.</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Order Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<?php
// Include your database connection file
include_once 'includes/conn.php';

// Query to fetch orders data
$stmt = $conn->prepare("SELECT * FROM orders");
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Query to fetch orders data
$stmt2 = $conn->prepare("SELECT * FROM order_details");
$stmt2->execute();
$order_details = $stmt2->fetchAll(PDO::FETCH_ASSOC);



if(isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $orderId = $_GET['id'];

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM orders WHERE id = :id");
    $stmt->bindParam(':id', $orderId);

    $stmt2 = $conn->prepare("DELETE FROM order_details WHERE order_id = :id");
    $stmt2->bindParam(':id', $orderId); // Use $orderId instead of $order_id


    // Execute the statement
    if ($stmt->execute() && $stmt2->execute()) {
        // Redirect back to the page where orders are displayed, or show a success message
        echo '<script>window.location.href = "orders.php";</script>';
        exit();
    } else {
        // Handle any errors that may occur during the deletion process
        echo "Error deleting order.";
    }
} else {
    // If no order ID is provided, show an error message or redirect as appropriate
    echo "No order ID provided.";
}
?>

<thead>    
    <tr>
        <th>Order ID</th>
        <th>User</th>
        <th>Delivery Fee</th>
        <th>Total</th>
        <th>Status</th>
        <th>Order Details</th>
        <th>Manage</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($orders as $order) : ?>
        <tr>
            <td><?php echo $order['id']; ?></td>
            <td><?php $user_id = $order['user_id'];
                $user_query = "SELECT first_name, last_name FROM user WHERE id = :user_id";
                $user_stmt = $conn->prepare($user_query);
                $user_stmt->bindParam(':user_id', $user_id);
                $user_stmt->execute();
                $user_row = $user_stmt->fetch(PDO::FETCH_ASSOC);
                echo $user_row['first_name'] . ' ' . $user_row['last_name']; ?>
            </td>
            <td><?php echo $order['delivery_fee']; ?></td>
            <td><?php echo $order['total']; ?></td>
            <td><?php echo $order['status']; ?></td>
            <td>
                <a href="#" data-bs-toggle="modal" data-bs-target="#viewOrderDetails<?php echo $order['id']; ?>">View</a>
            </td>
            <td>
                <a href="#" data-bs-toggle="modal" data-bs-target="#manageOrderModal<?php echo $order['id']; ?>">Manage</a> |
                <a href="orders.php?id=<?php echo $order['id']; ?>" onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
            </td>
        </tr>

        <!-- Manage Order Modal -->
        <div class="modal fade" id="manageOrderModal<?php echo $order['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editing Order</h1>
                    </div>
                    <div class="modal-body">
                        <form action="processes/edit_order.php?id=<?php echo $order['id']?>" method="POST">
                        <input type="text" name="user_id" class="form-control" value="<?php echo $order['user_id']; ?>" readonly>
                        <label for="delivery_fee">Delivery Fee</label>
                        <input type="text" name="delivery_fee" class="form-control" value="<?php echo $order['delivery_fee']; ?>" readonly>
                        <label for="total">Total</label>
                        <input type="text" name="total" class="form-control" value="<?php echo $order['total']; ?>" readonly>
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="PENDING" <?php if ($order['status'] == 'PENDING') echo 'selected'; ?>>Packaging</option>
                            <option value="DELIVERY" <?php if ($order['status'] == 'DELIVERY') echo 'selected'; ?>>In Delivery</option>
                            <option value="RECEIVED" <?php if ($order['status'] == 'RECEIVED') echo 'selected'; ?>>Received</option>
                            <option value="CANCELLED" <?php if ($order['status'] == 'CANCELLED') echo 'selected'; ?>>Cancelled</option>
                        </select>
                            <br>
                            <input type="submit" value="Submit" name="Submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Order Details Modal -->
        <div class="modal fade" id="viewOrderDetails<?php echo $order['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Order Details</h1>
                    </div>
                    <div class="modal-body">
                        <?php
                        // Fetch order details for the current order
                        $stmt = $conn->prepare("SELECT * FROM order_details WHERE order_id = :order_id");
                        $stmt->bindParam(':order_id', $order['id']);
                        $stmt->execute();
                        $order_details = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Check if order details exist
                        if ($order_details) {

                            
                            // Display order details
                            foreach ($order_details as $order_detail) {
                        
                                $stmt3 = $conn->prepare("SELECT * FROM products WHERE id = :product_id");
                                $stmt3->bindParam(':product_id', $order_detail['product_id']);
                                $stmt3->execute();
                                $product = $stmt3->fetch(PDO::FETCH_ASSOC); // Use fetch instead of fetchAll
                                
                                $subTotal = 0;

                                if ($product) {
                                    $subTotal += $product['price'] * $order_detail['quantity'];
                                    echo '<div style="display: flex;">';
                                        echo '<div class="col-lg-8">';
                                            echo 'Order ID: ' . $order['id'] . '<br>';
                                            echo 'Quantity: ' . $order_detail['quantity'] . '<br>';
                                            echo 'Product Type: ' . $product['type'] . '<br>';
                                            echo 'Product Name: ' . $product['title'] . '<br>';
                                            echo 'Original Price: ' . ($product['price']) . '<br>';
                                            echo 'Sub Price: ' . ($product['price'] * $order_detail['quantity']) . '<br>';
                                            echo '<br>';
                                        echo '</div>';
                                        echo '<div>';
                                            echo '<div><img src="../img/products/' . $product['image'] . '" class="img-fluid one-size"></div>';
                                            echo '<br>';
                                        echo '</div>';
                                    echo '</div>';
                                } else {
                                    // Handle case where product is not found
                                    echo 'Product not found.';
                                }
                            }

                            echo '<div style="font-weight: bold; color: #777; border-top: 1px solid #999; padding-top: 5px">Sub Total: ' . $subTotal . '</div>';
                            echo '<div style="font-weight: bold; color: #777; border-bottom: 1px solid #999; padding-bottom: 5px ">Delivery Fee: ' . $order['total'] . '</div>';
                            echo '<div style="font-weight: bold; color: #444; padding-top: 10px; font-size: 1.5rem">Total: ' . $order['total'] . '</div>';
                            echo '<br>';

                        } else {
                            // No order details found
                            echo 'No order details found.';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>



    <?php endforeach; ?>
</tbody>

                                    <div class="modal fade" id="pendingModalOrderID" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Manage Order</h1>
      </div>
      <div class="modal-body text-center">
        <form action="edit_order.php" method="POST">
     <a href="processes/accept_order.php?id=" class="btn btn-success">Accept Order</a>
     <a href="processes/reject_order.php?id=" class="btn btn-danger">Reject Order</a>
      </div>
</form>
    </div>
  </div>
</div>

<div class="modal fade" id="manageOrderModalID" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editing Order</h1>
      </div>
      <div class="modal-body">
        <form action="edit_order.php" method="POST">
       <label for="user_id">User ID</label>
       <input type="text" name="user_id" class="form-control">
       <label for="user_id">Delivery Fee</label>
       <input type="text" name="delivery_fee" class="form-control">
       <label for="user_id">Total</label>
       <input type="text" name="total" class="form-control">
       <label for="user_id">Status</label>
       <select class="form-control" name="status">
        <option value="Packaging">Packaging</option>
        <option value="In Delivery">In Delivery</option>
        <option value="Receieved">Receieved</option>
        <option value="Cancelled">Cancelled</option>
       </select>
       <br>
      <input type="submit" value="Submit" name="Submit" class="btn btn-primary">
      </div>

</form>
      
    </div>
  </div>
</div>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Severabs</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/Ecommerce">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bootstrap-5.3.1-dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>