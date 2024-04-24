<?php
session_start();

if (isset($_SESSION['USER_ID'])) {
    $conn = new PDO("mysql:host=localhost;dbname=severabs_db", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user_id = $_SESSION['USER_ID'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $middle_init = $_POST['middle_init'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $birth_date = $_POST['birth_date'];
        $email = $_POST['email'];
        $query = "UPDATE user SET first_name = :first_name, middle_init = :middle_init, last_name = :last_name, gender = :gender, birth_date = :birth_date, email = :email WHERE id = :user_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':middle_init', $middle_init, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        try {
            $stmt->execute();
            $_SESSION['STATUS'] = "ACCOUNT_INFO_UPDATED";
            header("Location: ../../profile.php?url=account");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>