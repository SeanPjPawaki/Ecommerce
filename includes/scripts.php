<script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="vendor/bootstrap-5.3.1-dist/js/bootstrap.bundle.min.js"></script>
<script src="vendor/bootstrap-5.3.1-dist/js/popper.min.js"></script>
<script src="vendor/jquery.min.js"></script>

<?php
if (isset($_SESSION['STATUS'])) {
    $success_status = $_SESSION['STATUS'];
    $message = '';


    switch ($success_status) {
        case 'ACCOUNT_CREATION':
            $message = 'Your account has been successfully created. Please head to your email to activate it in order to use it fully!';
            break;

        case 'ACCOUNT_LOGIN':
            $message = 'You have successfully logged into your account.';
            break;

        case 'ACCOUNT_ACTIVATION':
            $message = 'Your account has been successfully activated. Welcome to our platform!';
            break;

        case 'ACCOUNT_INFO_UPDATED':
            $message = 'You have succesfully updated your account details!';
            break;


        case 'DELIVERY_INFO_UPDATED':
            $message = 'You have succesfully updated your delivery info details!';
            break;

        case 'BILLING_INFO_UPDATED':
            $message = 'You have succesfully updated your billing info details!';
            break;

        case 'SINGLE_NOTIF_SUCCESFUL':
            $message = 'You have succesfully read a notification!';
            break;

        case 'ALL_NOTIF_SUCCESSFUL':
            $message = 'You have succesfully read all notification!';
            break;

        case '1':
            $message = 'You have succesfully added a product to your cart!';
            break;

        case 'ORDER_SUCCESSFUL':
            $message = "You have succesfully placed an order! Please await until the shop approves of it!";
            break;

        case 'UPDATE_SUCCESFUL':
            $message = "You have succesfully updated your info at checkout!";
            break;

            case 'LOGOUT':
                $message = "You have succesfully logout of your account!";
                break;

        default:
            $message = '';
            break;
    }


    if (!empty($message)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{$message}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>";
    }

    unset($_SESSION['STATUS']);
}
?>

<?php

if (isset($_SESSION['STATUS_ERROR'])) {
    $status = $_SESSION['STATUS_ERROR'];
    $message = '';

    switch ($status) {
        
        case 'WRONG_PASSWORD_REGISTER':
            $message = 'Your password is not the same with your confirmed password. Please try again!';
            break;

        case 'ACC_NOT_EXISTING':
            $message = 'Email does not exist. Please create an account.';
            break;

        case 'INCORRECT_PASS':
            $message = 'Incorrect password. Please try again.';
            break;
            
        case 'UNCONFIRMED':
            $message = 'Your account is not yet activated. Please activate your account.';
            break;

        case 'NO_USER':
            $message = 'Please login your account to use all functionalities of Severabs!';
            break;

            case 'REMOVE_PROD':
                $message = 'You have discarded a product out of your cart!';
                break;

        default:
            $message = '';
            break;
    }

    if (!empty($message)) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{$message}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>";
    }

    unset($_SESSION['STATUS_ERROR']);
}
?>