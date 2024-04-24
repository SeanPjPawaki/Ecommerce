<?php

session_start();


include_once '../includes/conn.php'; 

if (!isset($_SESSION['USER_ID'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['USER_ID'];

if (isset($_POST['Update'])) {
    $countryBilling = $_POST['country_billing'];
    $provinceBilling = $_POST['province_billing'];
    $cityBilling = $_POST['city_billing'];
    $barangayBilling = $_POST['barangay_billing'];
    $streetAddressBilling = $_POST['street_address_billing'];
    $fullNameBilling = $_POST['full_name_billing'];
    $emailBilling = $_POST['email_billing'];
    $phoneNumberBilling = $_POST['phone_number_billing'];

    $countryDelivery = $_POST['country_delivery'];
    $provinceDelivery = $_POST['province_delivery'];
    $cityDelivery = $_POST['city_delivery'];
    $barangayDelivery = $_POST['barangay_delivery'];
    $streetAddressDelivery = $_POST['street_address_delivery'];
    $fullNameDelivery = $_POST['full_name_delivery'];
    $emailDelivery = $_POST['email_delivery'];
    $phoneNumberDelivery = $_POST['phone_number_delivery'];

    $stmtBilling = $conn->prepare("UPDATE billing_info SET country = :country, province = :province, city = :city, barangay = :barangay, street_address = :street_address, full_name = :full_name, email = :email, phone_number = :phone_number WHERE user_id = :user_id");
    $stmtBilling->bindParam(':country', $countryBilling);
    $stmtBilling->bindParam(':province', $provinceBilling);
    $stmtBilling->bindParam(':city', $cityBilling);
    $stmtBilling->bindParam(':barangay', $barangayBilling);
    $stmtBilling->bindParam(':street_address', $streetAddressBilling);
    $stmtBilling->bindParam(':full_name', $fullNameBilling);
    $stmtBilling->bindParam(':email', $emailBilling);
    $stmtBilling->bindParam(':phone_number', $phoneNumberBilling);
    $stmtBilling->bindParam(':user_id', $userId);
    $stmtBilling->execute();

    $stmtDelivery = $conn->prepare("UPDATE delivery_info SET country = :country, province = :province, city = :city, barangay = :barangay, street_address = :street_address, full_name = :full_name, email = :email, phone_number = :phone_number WHERE user_id = :user_id");
    $stmtDelivery->bindParam(':country', $countryDelivery);
    $stmtDelivery->bindParam(':province', $provinceDelivery);
    $stmtDelivery->bindParam(':city', $cityDelivery);
    $stmtDelivery->bindParam(':barangay', $barangayDelivery);
    $stmtDelivery->bindParam(':street_address', $streetAddressDelivery);
    $stmtDelivery->bindParam(':full_name', $fullNameDelivery);
    $stmtDelivery->bindParam(':email', $emailDelivery);
    $stmtDelivery->bindParam(':phone_number', $phoneNumberDelivery);
    $stmtDelivery->bindParam(':user_id', $userId);
    $stmtDelivery->execute();


    $_SESSION['STATUS'] = 'UPDATE_SUCCESFUL';
    header("Location: ../checkout.php");
    exit;
}
?>
