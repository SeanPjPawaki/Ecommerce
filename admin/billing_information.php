<?php
include('includes/conn.php')
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

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

   

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
                               
                             
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
                    <h1 class="h3 mb-2 text-gray-800">Managing Billing Information </h1>
                    <p class="mb-4">Manage billing informations of users of Severabs.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Billing Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                            $sql = "SELECT * FROM billing_info";
$stmt = $conn->query($sql);
$billing_info_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Country</th>
            <th>Province</th>
            <th>City</th>
            <th>Barangay</th>
            <th>Street Address</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($billing_info_rows as $row): ?>
        <tr>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['country']; ?></td>
            <td><?php echo $row['province']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['barangay']; ?></td>
            <td><?php echo $row['street_address']; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td>
                <a href="#" class="btn-edit" data-bs-toggle="modal" data-bs-target="#infoModal<?php echo $row['user_id'];?>" data-id="<?php echo $row['id']; ?>">Edit</a>
                 
                
            </td>
        </tr>
        <div class="modal fade" id="infoModal<?php echo $row['user_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editing Billing Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="processes/update_billing_information.php?id=<?php echo $row['user_id']?>">
                    <!-- Form fields for editing -->
                    <div class="form-group row">
                        <label for="country" class="col-sm-4 col-form-label">Country</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="country" name="country" value="<?php echo $row['country']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="province" class="col-sm-4 col-form-label">Province</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="province" name="province" value="<?php echo $row['province']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-sm-4 col-form-label">City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="barangay" class="col-sm-4 col-form-label">Barangay</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="barangay" name="barangay">
                                <?php
                                $sql = "SELECT name FROM barangay";
                                $stmt = $conn->query($sql);
                                while ($barangay_row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $barangay_row['name'] . "'>" . $barangay_row['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="street_address" class="col-sm-4 col-form-label">Street Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="street_address" name="street_address" value="<?php echo $row['street_address']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="full_name" class="col-sm-4 col-form-label">Full Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-sm-4 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?php echo $row['phone_number']; ?>">
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                    <input type="hidden" name="billing_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" class="btn btn-primary" name="Submit">
                </form>
            </div>
        </div>
    </div>
</div>


        <?php endforeach; ?>
    </tbody>
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
        <div class="modal-dialog " role="document">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>