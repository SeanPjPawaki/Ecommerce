<?php
include('includes/conn.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Severabs - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>

</head>



<body id="page-top">
    <div id="wrapper">
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                     
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php
                                        $today = date('Y-m-d');

// Query to retrieve the total earnings for today where status is 'received'
$stmt = $conn->prepare("SELECT SUM(total) AS daily_earnings FROM orders WHERE status = 'received' AND DATE(date_order_placed) = :today");
$stmt->bindParam(':today', $today);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Get the daily earnings
$dailyEarnings = isset($result['daily_earnings']) ? $result['daily_earnings'] : 0;
?>

<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
    Earnings (Daily)
</div>
<div class="h5 mb-0 font-weight-bold text-gray-800">
₱<?php echo number_format($dailyEarnings, 2); ?>
</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <?php
// Include your database connection file
include_once 'includes/conn.php';

// Query to count the total number of products
$stmt = $conn->prepare("SELECT COUNT(*) AS total_products FROM products");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Get the total number of products
$totalProducts = isset($result['total_products']) ? $result['total_products'] : 0;
?>

<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
    Products
</div>
<div class="h5 mb-0 font-weight-bold text-gray-800">
    <?php echo number_format($totalProducts); ?>
</div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                              <?php
                                              $stmt = $conn->prepare("SELECT COUNT(*) AS id FROM user");
                                              $stmt->execute();
                                              $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                              
                                              // Get the total number of users
                                              $totalUsers = isset($result['id']) ? $result['id'] : 0;
                                              ?>
                                              
                                              <div class="col-auto">
                                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo number_format($totalUsers); ?></div>
                                              </div>
                                              <div class="col">
                                                  <div class="progress progress-sm mr-2">
                                                      <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo ($totalUsers > 0)?>"></div>
                                                  </div>
                                              </div>
                                              
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php
                                        $stmt = $conn->prepare("SELECT COUNT(*) AS total_orders FROM orders WHERE status = 'received'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Get the total number of orders
$totalOrders = isset($result['total_orders']) ? $result['total_orders'] : 0;
?>

<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
    Orders
</div>
<div class="h5 mb-0 font-weight-bold text-gray-800">
    <?php echo number_format($totalOrders); ?>
</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Products Overview</h6>
                                  
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="productStockChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <a class="collapse-item" href="orders.php">Orders -></a>

                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class=" text-center small">
                                        <span class="mr-2">
                                          Hover over the divided sections of the pie chart to view 
                                          specific sections
                                        </span>
                                    </div>
                                </div>
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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
  
    <?php
// Include your database connection file
include_once 'includes/conn.php';

// Query to count orders with different statuses
$stmt = $conn->prepare("SELECT status, COUNT(*) AS count FROM orders GROUP BY status");
$stmt->execute();
$statusCounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Initialize variables for each status count
$pendingCount = 0;
$inDeliveryCount = 0;
$deliveredCount = 0;

// Iterate through the status counts and assign them to respective variables
foreach ($statusCounts as $statusCount) {
    switch ($statusCount['status']) {
        case 'PENDING':
            $pendingCount = $statusCount['count'];
            break;
        case 'CONFIRMED':
            $inDeliveryCount = $statusCount['count'];
            break;
        case 'DELIVERED':
            $deliveredCount = $statusCount['count'];
            break;
            case 'CANCELLED':
                $cancelledCount = $statusCount['count'];
                break;

        // Add more cases if you have additional statuses
    }
}
?>

<script>
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Pending", "Confirmed", "Delivered", "Cancelled"],
            datasets: [{
                data: [
                    <?php echo $pendingCount; ?>,
                    <?php echo $inDeliveryCount; ?>,
                    <?php echo $deliveredCount; ?>,
                    <?php echo $cancelledCount?>
                ],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>
<?php
// Query to fetch product type and its total stocks
$stmt = $conn->prepare("SELECT type, SUM(stocks) AS total_stocks FROM products GROUP BY type");
$stmt->execute();
$productStocks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Initialize arrays to hold product types and their total stocks
$productTypes = [];
$totalStocks = [];

// Iterate through the data and populate the arrays
foreach ($productStocks as $productStock) {
    $productTypes[] = $productStock['type'];
    $totalStocks[] = $productStock['total_stocks'];
}
?>

<script>
// Bar Chart Example
var ctx = document.getElementById("productStockChart");
var productStockChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($productTypes); ?>,
    datasets: [{
      label: 'Total Stocks',
      backgroundColor: 'rgba(78, 115, 223, 0.5)',
      borderColor: 'rgba(78, 115, 223, 1)',
      borderWidth: 1,
      data: <?php echo json_encode($totalStocks); ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 5,
          padding: 10
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    }
  }
});
</script>


<?php
    include_once 'includes/conn.php';

    $stmt = $conn->prepare("SELECT * FROM products WHERE stocks < :threshold");
    $stmt->bindValue(':threshold', 10); // Adjust the threshold value as needed
    $stmt->execute();
    $lowStockProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are products with low stocks
    if ($lowStockProducts) {
        echo "<script>";
        echo "Swal.fire({";
        echo "    icon: 'warning',";
        echo "    title: 'Low Stock Alert!',";
        echo "    html: 'The following products have low stocks:<br>";
        foreach ($lowStockProducts as $product) {
            echo "    - " . htmlspecialchars($product['title']) . " (Stocks: " . $product['stocks'] . ")<br>";
        }
        echo "',";
        echo "});";
        echo "</script>";
    }
    ?>
</body>

</html>