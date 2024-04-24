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

    <title>Severabs - Users</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Site</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Severabs Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


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
                    <h1 class="h3 mb-2 text-gray-800">Products <a href="#" data-bs-toggle="modal" data-bs-target="#addModal">(Add Product)</a></h1>
                    <p class="mb-4">Managing Products for Severabs</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Products Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?php
                            $sql = "SELECT * FROM products";
                            $stmt = $conn->query($sql);
                            $products_row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            ?>   
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Stocks</th>
                                        <th>Availabilty</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Manage</th>
                                    </tr>
                                <tbody>
                                    <?php foreach ($products_row as $row) : ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['stocks']; ?></td>
                                        <td>
                                            <?php
                                            $availability = $row['availability'];
                                            if ($availability == 'Available') {
                                                echo '<span class="badge bg-success" style="color:white">' . $availability . '</span>';
                                            } elseif ($availability == 'Not Available') {
                                                echo '<span class="badge bg-danger" style="color:white">' . $availability . '</span>';
                                            } 
                                            ?>
                                </td>
                                        <td>₱<?php echo $row['price']; ?></td>
                                    
                                    
                                        <td><a href="#" class="btn-edit" data-bs-toggle="modal" data-bs-target="#viewModal_<?php echo $row['id']?>" data-id="">View Image
                                            </a></td>
                                        <td> <a href="#" class="btn-edit" data-bs-toggle="modal" data-bs-target="#infoModal_<?php echo $row['id']?>" data-id="">Edit</a>

                                            <a href="#" class="btn-edit" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</a>

                                        </td>

                                        <script>
                                            function confirmDelete(productId) {
                                                var confirmDelete = confirm("Are you sure you want to delete this product?");
                                                if (confirmDelete) {
                                                    // If user confirms deletion, redirect to delete_products.php with product ID as parameter
                                                    window.location.href = "processes/delete_products.php?id=" + productId;
                                                } else {
                                                    // If user cancels deletion, do nothing
                                                    return false;
                                                }
                                            }
                                            </script>

                                    </tr>

                                    <div class="modal fade" id="viewModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">View Image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                            
                                                    <img class="img-fluid" src="../img/products/<?php echo $row['image']?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                          

                                    <div class="modal fade" id="infoModal_<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editing Product </h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="processes/edit_products.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <label for="type" class="form-label">Type</label>
                                                            <select id="type" name="type" class="form-control">
                                                                <option value="Tarot Card">Tarot Card</option>
                                                                <option value="Crystal">Crystal</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'];?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea class="form-control" id="description" name="description"><?php echo $row['description']?></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="stocks" class="form-label">Stocks</label>
                                                            <input type="number" class="form-control" id="stocks" name="stocks" value="<?php echo $row['stocks'];?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="availability" class="form-label">Availability</label>
                                                            <select id="availability" name="availability" class="form-control">
                                                                <option value="Available">Available</option>
                                                                <option value="Not Available">Not Available</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Price</label>
                                                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price'];?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Image</label>
                                                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" name="Submit" value="Submit">
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
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add Product </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="processes/add_products.php" method="POST" enctype="multipart/form-data">
                                                                <div class="mb-3">
                                                                    <label for="type" class="form-label">Type</label>
                                                                    <select id="type" name="type" class="form-control">
                                                                        <option value="Tarot Card">Tarot Card</option>
                                                                        <option value="Crystal">Crystal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="title" class="form-label">Title</label>
                                                                    <input type="text" class="form-control" id="title" name="title">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="description" class="form-label">Description</label>
                                                                    <textarea class="form-control" id="description" name="description"></textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="stocks" class="form-label">Stocks</label>
                                                                    <input type="number" class="form-control" id="stocks" name="stocks">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="availability" class="form-label">Availability</label>
                                                                    <select id="availability" name="availability" class="form-control">
                                                                        <option value="Available">Available</option>
                                                                        <option value="Not Available">Not Available</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="price" class="form-label">Price</label>
                                                                    <input type="number" class="form-control" id="price" name="price">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                                                </div>
                                                                <input type="submit" class="btn btn-primary" name="Submit" value="Submit">
                                                            </form>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>