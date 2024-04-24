<?php
session_start();
include '../../includes/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST['first_name'];
    $middle_init = $_POST['middle_init'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $reconfirm_pass = $_POST['reconf_password'];
    $status = "UNCONFIRMED";

    $full_name = $first_name . " " . $middle_init . " " . $last_name;

    if($reconfirm_pass !== $password || $password !== $reconfirm_pass){
        $_SESSION['STATUS'] = "WRONG_PASSWORD_REGISTER";
        header("Location: EMAIL_send_account.php");
    }

    function generateOTP($length = 6)
    {
        mt_srand(1234567890);
        $characters = '0123456789';
        $characters_length = strlen($characters);
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[mt_rand(0, $characters_length - 1)];
        }
        return $otp;
    }

    $otp = generateOTP(6);


    $sql_user = "INSERT INTO user (first_name, middle_init, last_name, gender, birth_date, email, password, status, code)
                 VALUES (:first_name, :middle_init, :last_name, :gender, :birth_date, :email, :password, :status, :code)";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->execute([
        ':first_name' => $first_name,
        ':middle_init' => $middle_init,
        ':last_name' => $last_name,
        ':gender' => $gender,
        ':birth_date' => $birth_date,
        ':email' => $email,
        ':password' => $password,
        ':status' => $status,
        ':code' => $otp
    ]);

    $newly_inserted_user_id = $conn->lastInsertId();

    if (isset($_POST['use_full_name_email'])) {
        $billing_full_name = $full_name;
        $billing_email =  $email;

        $delivery_full_name =  $full_name;
        $delivery_email =  $email;
    }else{
        $billing_full_name = $_POST['billing_full_name'];
        $billing_email = $_POST['billing_email'];

        $delivery_full_name = $_POST['delivery_full_name'];
        $delivery_email = $_POST['delivery_email'];
    }

    
    if (isset($_POST['use_same_billing_delivery'])) {

        $billing_country = $_POST['billing_country'];
        $billing_province = $_POST['billing_province'];
        $billing_city = $_POST['billing_city'];
        $billing_barangay = $_POST['billing_barangay'];
        $billing_street_address = $_POST['billing_street_address'];
        $billing_full_name = $_POST['billing_full_name'];
        $billing_email = $_POST['billing_email'];
        $billing_phone_number = $_POST['billing_phone_number'];
     

        $delivery_country = $_POST['billing_country'];
        $delivery_province = $_POST['billing_province'];
        $delivery_city = $_POST['billing_city'];
        $delivery_barangay = $_POST['billing_barangay'];
        $delivery_street_address = $_POST['billing_street_address'];
        $delivery_phone_number = $_POST['delivery_phone_number'];
        $delivery_full_name = $_POST['billing_full_name'];
        $delivery_email = $_POST['billing_email'];
        $delivery_phone_number = $_POST['billing_phone_number'];

    }else{
        $billing_country = $_POST['billing_country'];
        $billing_province = $_POST['billing_province'];
        $billing_city = $_POST['billing_city'];
        $billing_barangay = $_POST['billing_barangay'];
        $billing_street_address = $_POST['billing_street_address'];
        $billing_full_name = $_POST['billing_full_name'];
        $billing_email = $_POST['billing_email'];
        $billing_phone_number = $_POST['billing_phone_number'];

        $delivery_country = $_POST['delivery_country'];
        $delivery_province = $_POST['delivery_province'];
        $delivery_city = $_POST['delivery_city'];
        $delivery_barangay = $_POST['delivery_barangay'];
        $delivery_street_address = $_POST['delivery_street_address'];
        $delivery_phone_number = $_POST['delivery_phone_number'];
        $delivery_full_name = $_POST['delivery_full_name'];
        $delivery_email = $_POST['delivery_email'];
        $billing_phone_number = $_POST['delivery_phone_number'];
    }


    $sql_billing = "INSERT INTO billing_info (user_id, country, province, city, barangay, street_address, full_name, email, phone_number)
                    VALUES (:user_id, :country, :province, :city, :barangay, :street_address, :full_name, :email, :phone_number)";
    $stmt_billing = $conn->prepare($sql_billing);
    $stmt_billing->execute([
        ':user_id' => $newly_inserted_user_id,
        ':country' => $billing_country,
        ':province' => $billing_province,
        ':city' => $billing_city,
        ':barangay' => $billing_barangay,
        ':street_address' => $billing_street_address,
        ':full_name' => $billing_full_name,
        ':email' => $billing_email,
        ':phone_number' => $billing_phone_number
    ]);

    $sql_delivery = "INSERT INTO delivery_info (user_id, country, province, city, barangay, street_address, full_name, email, phone_number)
                     VALUES (:user_id, :country, :province, :city, :barangay, :street_address, :full_name, :email, :phone_number)";
    $stmt_delivery = $conn->prepare($sql_delivery);
    $stmt_delivery->execute([
        ':user_id' => $newly_inserted_user_id,
        ':country' => $delivery_country,
        ':province' => $delivery_province,
        ':city' => $delivery_city,
        ':barangay' => $delivery_barangay,
        ':street_address' => $delivery_street_address,
        ':full_name' => $delivery_full_name,
        ':email' => $delivery_email,
        ':phone_number' => $delivery_phone_number
    ]);

    $user_info = [
        'first_name' => $_POST['first_name'],
        'middle_init' => $_POST['middle_init'],
        'last_name' => $_POST['last_name'],
        'gender' => $_POST['gender'],
        'birth_date' => $_POST['birth_date'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'status' => 'UNCONFIRMED',
        'code' => $otp
    ];

    $_SESSION['user_info'] = $user_info;

    $billing_info = [
        'country' => $_POST['billing_country'],
        'province' => $_POST['billing_province'],
        'city' => $_POST['billing_city'],
        'barangay' => $_POST['billing_barangay'],
        'street_address' => $_POST['billing_street_address'],
        'full_name' => $_POST['billing_full_name'],
        'email' => $_POST['billing_email'],
        'phone_number' => $_POST['billing_phone_number']
    ];

    $_SESSION['billing_info'] = $billing_info;

    $delivery_info = [
        'country' => $_POST['delivery_country'],
        'province' => $_POST['delivery_province'],
        'city' => $_POST['delivery_city'],
        'barangay' => $_POST['delivery_barangay'],
        'street_address' => $_POST['delivery_street_address'],
        'full_name' => $_POST['delivery_full_name'],
        'email' => $_POST['delivery_email'],
        'phone_number' => $_POST['delivery_phone_number']
    ];

    $_SESSION['delivery_info'] = $delivery_info;

    header("Location: EMAIL_send_account.php");
    exit;
}
