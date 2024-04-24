<?php 
session_start();
include('includes/conn.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="external/css/create_account.css">
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
            <h1>Create an Account</h1>
            <h5><a href="index.php" class="nav-side-link">Home</a> - Create an Account</h5>
        </div>
    </div>

    <div class="container-fluid register-info-container text-center">
        <svg class="qodef-e-star" x="0px" y="0px" width="64px" height="66px" viewBox="0 0 307.42 319.72">
            <path d="M3043.61,960.06c21.52-20.63,129-18.76,138.48-19.4h.81l-.41,0,.41,0h-.81c-9.45-.64-124.55.15-137.42-13.28-14-14.61-21.63-146.55-21.63-146.55s2.95,127.1-14.76,143.78c-16.2,15.26-101,16.35-132.8,16.21,32.83.59,122.23,3.74,134.92,20.65,16.15,21.53,12.64,139.08,12.64,139.08S3027.35,975.64,3043.61,960.06Z" transform="translate(-2875.48 -780.77)"></path>
        </svg>
        <br>
        <h5>Be part of us!</h5>
        <hr class="purple-small-line">
        <br>
        <form action="processes/accounts/create_account.php" method="POST" onsubmit="submitForm()">
          
            <div class="row">
                <div class="col">

                    <h5>Primary Information</h5>
                    <label>First Name <span class="req">*</span>
                        <input type="text" name="first_name" placeholder="Insert your first name" class="form-control input-spacer" required>
                        <label>Middle Initial
                            <input type="text" name="middle_init" placeholder="Insert your middile initial" class="form-control input-spacer ">
                            <label>Last Name <span class="req">*</span>
                                <input type="text" name="last_name" placeholder="Insert your last name" class="form-control input-spacer " required>
                                <label>Gender <span class="req">*</span>
                                    <select name="gender" class="form-control input-spacer" required>
                                        <option>Select your gender here</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label>Birthdate <span class="req">*</span>
                                        <input type="date" name="birth_date" class="form-control input-spacer " required>
                                        <label>Email <span class="req">*</span>
                                            <input type="email" name="email" placeholder="Insert your email" class="form-control input-spacer " required>
                                            <label>Password <span class="req">*</span>
                                                <input type="password" name="password" placeholder="Insert your password" class="form-control input-spacer" minlength="6" required>
                                                <label>Re-confirm Password <span class="req">*</span>
                                                    <input type="password" name="reconf_password" placeholder="Insert your password here again" class="form-control input-spacer " minlength="6">
                </div>

                <div class="col">
                    <h5>Billing Information</h5>
                    <label>Country <span class="req">*</span>
                        <input type="text" name="billing_country" placeholder="Insert your country here" value="Philippines" readonly class="form-control input-spacer" required>
                        <label>Province <span class="req">*</span>
                            <input type="text" name="billing_province" class="form-control input-spacer" value="Zamboanga del Sur" readonly required>
                            <label>City <span class="req">*</span>
                                <input type="text" name="billing_city" class="form-control input-spacer" value="Zamboanga City" readonly required>
                                <?php
                                $sql = "SELECT name FROM barangay";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $barangays = $stmt->fetchAll(PDO::FETCH_COLUMN);

                                ?>

                                <label>Barangay <span class="req">*</span></label>
                                <select name="billing_barangay" class="form-control input-spacer" required>
                                    <option> Select a barangay here</option>
                                    <?php

                                    foreach ($barangays as $barangay) {
                                        echo "<option value='" . htmlspecialchars($barangay) . "'>" . htmlspecialchars($barangay) . "</option>";
                                    }
                                    ?>
                                </select>

                                <label>Street Address <span class="req">*</span>
                                    <input type="text" name="billing_street_address" placeholder="Insert your street address here" class="form-control input-spacer" required>
                                    <label>Full Name <span class="req">*</span>
                                        <input type="text" name="billing_full_name" class="form-control input-spacer" placeholder="Insert full name here" required>
                                        <label>Email <span class="req">*</span>
                                            <input type="email" name="billing_email" class="form-control input-spacer" placeholder="Insert email here" required>
                                            <label>Phone Number <span class="req">*</span>
                                                <input type="number" name="billing_phone_number" class="form-control input-spacer" placeholder="Insert phone number here" required>
                </div>

                <div class="col">
                    <h5>Delivery Information</h5>
                    <label>Country <span class="req">*</span>
                        <input type="text" name="delivery_country" placeholder="Insert your country here" value="Philippines" readonly class="form-control input-spacer">
                        <label>Province <span class="req">*</span>
                            <input type="text" name="delivery_province" class="form-control input-spacer" value="Zamboanga del Sur" readonly>
                            <label>City <span class="req">*</span>
                                <input type="text" name="delivery_city" class="form-control input-spacer" value="Zamboanga City" readonly>
                                <?php
                                $sql = "SELECT name FROM barangay";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $barangays = $stmt->fetchAll(PDO::FETCH_COLUMN);

                                ?>

                                <label>Barangay <span class="req">*</span></label>
                                <select name="delivery_barangay" class="form-control input-spacer" required>
                                    <option> Select a barangay here</option>
                                    <?php

                                    foreach ($barangays as $barangay) {
                                        echo "<option value='" . htmlspecialchars($barangay) . "'>" . htmlspecialchars($barangay) . "</option>";
                                    }
                                    ?>
                                </select>

                                <label>Street Address <span class="req">*</span>
                                    <input type="text" name="delivery_street_address" placeholder="Insert your street address here" class="form-control input-spacer">
                                    <label>Full Name <span class="req">*</span>
                                        <input type="text" name="delivery_full_name" class="form-control input-spacer" placeholder="Insert full name here">
                                        <label>Email <span class="req">*</span>
                                            <input type="email" name="delivery_email" class="form-control input-spacer" placeholder="Insert email here">
                                            <label>Phone Number <span class="req">*</span>
                                                <input type="number" name="delivery_phone_number" class="form-control input-spacer" placeholder="Insert phone number here">
                </div>



            </div>
            <br> <br>

            <input type="submit" name="Submit" value="Submit" class="form-control form-severabs btn-form" >
        </form>
    </div>

    <script>
    function submitForm() {
        Swal.fire({
            icon: 'loading',
            title: 'Submitting form to server!',
            text: 'You will receive an e-mail notification for confirming of account soon!',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    }
</script>
</body>
<?php include('includes/footer.php') ?>

</html>