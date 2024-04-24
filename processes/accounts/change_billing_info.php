<?php
session_start();

if (isset($_SESSION['USER_ID'])) {
    $conn = new PDO("mysql:host=localhost;dbname=severabs_db", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $user_id = $_SESSION['USER_ID'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $country = $_POST['country'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $barangay = $_POST['billing_barangay'];
        $street_address = $_POST['street_address'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        
        $query = "UPDATE billing_info SET country = :country, province = :province, city = :city, barangay = :barangay, street_address = :street_address, full_name = :full_name, email = :email, phone_number = :phone_number WHERE user_id = :user_id";
        
        $stmt = $conn->prepare($query);
        
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->bindParam(':province', $province, PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':barangay', $barangay, PDO::PARAM_STR);
        $stmt->bindParam(':street_address', $street_address, PDO::PARAM_STR);
        $stmt->bindParam(':full_name', $full_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
        
        try {
            $stmt->execute();
            $_SESSION['STATUS'] = "BILLING_INFO_UPDATED";
            header("Location: ../../profile.php?url=billing");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
