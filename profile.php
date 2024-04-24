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
            <div class="col main-interface">
                <?php
                if (isset($_GET['url']) && $_GET['url'] == 'account') {
                ?>

                    <h3 class="bold">My Profile</h3>
                    <h5 class="bold">Account Information</h5>

                    <?php
                    if (isset($_SESSION['USER_ID'])) {
                        $user_id = $_SESSION['USER_ID'];
                        $query = "SELECT * FROM user WHERE id = :user_id";
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                        $stmt->execute();
                        $accountData = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($accountData) {
                            $first_name = $accountData['first_name'];
                            $middle_init = $accountData['middle_init'];
                            $last_name = $accountData['last_name'];
                            $gender = $accountData['gender'];
                            $birth_date = $accountData['birth_date'];
                            $email = $accountData['email'];
                            $password = $accountData['password'];
                    ?>

                            <div class="row">
                                <div class="col">
                                    <label for="first_name">First Name</label><br>
                                    <input type="text" name="first_name" class="severabs-form form-control" value="<?php echo $first_name ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="middle_init">Middle Initial</label><br>
                                    <input type="text" name="middle_Init" class="severabs-form form-control" value="<?php echo $middle_init ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="last_name">Last Name</label><br>
                                    <input type="text" name="last_name" class="severabs-form form-control" value="<?php echo $first_name ?>" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="gender">Gender</label><br>
                                    <input type="text" name="gender" class="severabs-form form-control" value="<?php echo $gender ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="birth_date">Birth Date</label><br>
                                    <input type="text" name="birth_date" class="severabs-form form-control" value="<?php echo $birth_date ?>" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="email">Email</label><br>
                                    <input type="email" name="email" class="severabs-form form-control" value="<?php echo $email ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="password">Password</label><br>
                                    <input type="password" name="password" class="severabs-form form-control" value="<?php echo $password ?>" readonly>
                                </div>

                            </div>

                    <?php }
                    } ?>

                    <button class="btn-severabs" data-bs-toggle="modal" data-bs-target="#editInfoModal">
                        Change Information
                    </button>
                    <button class="btn-severabs" data-bs-toggle="modal" data-bs-target="#editPasswordModal">
                        Change Password
                    </button>

                <?php } elseif (
                    isset($_GET['url']) && $_GET['url'] ==
                    'delivery'
                ) { ?>
                    <h3 class="bold">My Profile</h3>
                    <h5 class="bold">Delivery Information</h5>

                    <?php
                    if (isset($_SESSION['USER_ID'])) {
                        $user_id = $_SESSION['USER_ID'];
                        $query =
                            "SELECT * FROM delivery_info WHERE user_id = :user_id";
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                        $stmt->execute();
                        $accountData = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($accountData) {
                            $country = $accountData['country'];
                            $province = $accountData['province'];
                            $city = $accountData['city'];
                            $barangay = $accountData['barangay'];
                            $street_address = $accountData['street_address'];
                            $full_name = $accountData['full_name'];
                            $email = $accountData['email'];
                            $phone_number = $accountData['phone_number'];
                    ?>

                            <div class="row">
                                <div class="col">
                                    <label for="country">Country</label><br>
                                    <input type="text" name="country" class="severabs-form form-control" value="<?php echo $country ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="province">Province</label><br>
                                    <input type="text" name="province" class="severabs-form form-control" value="<?php echo $province ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="last_name">City</label><br>
                                    <input type="text" name="city" class="severabs-form form-control" value="<?php echo $city ?>" readonly>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="country">Barangay</label><br>
                                    <input type="text" name="barangay" class="severabs-form form-control" value="<?php echo $barangay ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="province">Street Address</label><br>
                                    <input type="text" name="street_address" class="severabs-form form-control" value="<?php echo $street_address ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="last_name">Full Name</label><br>
                                    <input type="text" name="full_name" class="severabs-form form-control" value="<?php echo $full_name ?>" readonly>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="country">Email</label><br>
                                    <input type="text" name="email" class="severabs-form form-control" value="<?php echo $email ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="province">Phone Number</label><br>
                                    <input type="text" name="phone_number" class="severabs-form form-control" value="<?php echo $phone_number ?>" readonly>
                                </div>

                            </div>

                    <?php }
                    } ?>

                    <button class="btn-severabs" data-bs-toggle="modal" data-bs-target="#editDelivInfoModal">
                        Change Information
                    </button>

                <?php } elseif (
                    isset($_GET['url']) && $_GET['url'] ==
                    'billing'
                ) { ?>
                    <h3 class="bold">My Profile</h3>
                    <h5 class="bold">Billing Information</h5>
                    <?php
                    if (isset($_SESSION['USER_ID'])) {
                        $user_id = $_SESSION['USER_ID'];
                        $query =
                            "SELECT * FROM billing_info WHERE user_id = :user_id";
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                        $stmt->execute();
                        $accountData = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($accountData) {
                            $country = $accountData['country'];
                            $province = $accountData['province'];
                            $city = $accountData['city'];
                            $barangay = $accountData['barangay'];
                            $street_address = $accountData['street_address'];
                            $full_name = $accountData['full_name'];
                            $email = $accountData['email'];
                            $phone_number = $accountData['phone_number'];
                    ?>

                            <div class="row">
                                <div class="col">
                                    <label for="country">Country</label><br>
                                    <input type="text" name="country" class="severabs-form form-control" value="<?php echo $country ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="province">Province</label><br>
                                    <input type="text" name="province" class="severabs-form form-control" value="<?php echo $province ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="last_name">City</label><br>
                                    <input type="text" name="city" class="severabs-form form-control" value="<?php echo $city ?>" readonly>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="country">Barangay</label><br>
                                    <input type="text" name="barangay" class="severabs-form form-control" value="<?php echo $barangay ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="province">Street Address</label><br>
                                    <input type="text" name="street_address" class="severabs-form form-control" value="<?php echo $street_address ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="last_name">Full Name</label><br>
                                    <input type="text" name="full_name" class="severabs-form form-control" value="<?php echo $full_name ?>" readonly>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="country">Email</label><br>
                                    <input type="text" name="email" class="severabs-form form-control" value="<?php echo $email ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="province">Phone Number</label><br>
                                    <input type="text" name="phone_number" class="severabs-form form-control" value="<?php echo $phone_number ?>" readonly>
                                </div>

                            </div>

                    <?php }
                    }
                } elseif (
                    isset($_GET['url']) && $_GET['url'] ==
                    'notifications'
                ) { ?>

                    <h3 class="bold">My Profile</h3>
                    <div class="d-flex align-items-center">
                        <?php
                        $stmt = $conn->prepare("SELECT COUNT(*) AS unread_count FROM notifications_user WHERE user_id = :user_id AND is_read = 0");
                        $stmt->bindParam(':user_id', $_SESSION['USER_ID']);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $unreadCount = $result['unread_count'];

                        echo "<h5 class='bold'>Notifications ($unreadCount)</h5>";
                        ?>
                        <div class="ms-auto" aria-hidden="true">
                            <?php
                            $stmt = $conn->prepare("SELECT COUNT(*) AS unread_count FROM notifications_user WHERE user_id = :user_id AND is_read = 0");
                            $stmt->bindParam(':user_id', $_SESSION['USER_ID']);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            $unreadCount = $result['unread_count'];

                            if ($unreadCount > 0) {
                            echo "<a href='processes/accounts/read_notif_all.php' class='notif'>
                                <h5> Read All </h5>
                            </a>";
                            }
                            ?>

                        </div>
                    </div>

                    <br>

                    <?php
                    $stmt = $conn->prepare("SELECT * FROM notifications_user WHERE user_id = :user_id");
                    $stmt->bindParam(':user_id', $_SESSION['USER_ID']);
                    $stmt->execute();
                    $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $iconMap = [

                        'order_placed' => 'bi-check-circle',
                        'order_cancelled' => 'bi-x-circle',
                        'order_delivery' => 'bi-truck',
                        'order_confirmed' => 'bi-check',
                        'order_received' => 'bi-house'

                    ];

                    foreach ($notifications as $notification) {
                        $icon = isset($iconMap[$notification['type']]) ? $iconMap[$notification['type']] : 'bi-bell';

                        echo "<div class='notifications-container'>";
                        echo "<div class='row notif-row'>";
                        echo "<div class='col-sm-2'>";
                        echo "<h1 style='margin-left: 10px; font-size: 64px'><i class='bi {$icon}'></i></h1>";
                        echo "</div>";
                        echo "<div class='col-sm-5'>";
                        echo "<a href='order_details.php?id={$notification['order_id']}' class='notif'>";
                        echo "<h5><b>{$notification['title']}</b><br>{$notification['description']}</h5>";
                        echo "</a>";
                        echo "</div>";
                        echo "<div class='col-sm'>";
                        echo "<h5></h5>";
                        echo "<h5>Order ID: {$notification['order_id']}</h5>";
                        echo "</div>";
                        echo "<div class='col-sm'>";
                        echo "<h5></h5>";
                        if ($notification['is_read'] == 0) {
                            echo "<h3><a class='notif' href='processes/accounts/read_notif.php?id={$notification['id']}'><i class='bi bi-check2-circle'></i></a></h3>";
                        } else {
                            echo "<h3><i class='bi bi-check2-circle'></i></h3>";
                        }

                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<br>";
                    }
                    ?>

                    <br>

                <?php } ?>

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