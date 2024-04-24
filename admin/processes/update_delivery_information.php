<?php
include('../includes/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
    $user_id = $_GET['id'];
    $billing_id = $_POST['billing_id'];
    $country = $_POST['country'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $street_address = $_POST['street_address'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $sql = "UPDATE billing_info SET country = :country, province = :province, city = :city, barangay = :barangay, street_address = :street_address, full_name = :full_name, email = :email, phone_number = :phone_number WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':barangay', $barangay);
    $stmt->bindParam(':street_address', $street_address);
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':user_id', $user_id);
    if ($stmt->execute()) {
        header("Location: ../delivery_information.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>
