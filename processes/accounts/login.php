<?php
session_start();
include '../../includes/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === "admin@severabs.com") { 
        $_SESSION['USER_ID'] = $user['id'];
        $_SESSION['EMAIL'] = $user['email'];
        $_SESSION['STATUS'] = "ACCOUNT_LOGIN";
        header("Location: ../../admin/index.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $_SESSION['STATUS_ERROR']= "ACC_NOT_EXISTING";
        header("Location: ../../create_account.php");
        exit();
    }

    if ($user['status'] === 'UNCONFIRMED') {
        $_SESSION['STATUS_ERROR'] = "UNCONFIRMED";
        header("Location: ../../index.php");
        exit();
    }

    if ($password === $user['password']) { 
        $_SESSION['USER_ID'] = $user['id'];
        $_SESSION['EMAIL'] = $user['email'];
        $_SESSION['STATUS'] = "ACCOUNT_LOGIN";
        header("Location: ../../index.php");
        exit();
    }
    $_SESSION['STATUS_ERROR'] = "INCORRECT_PASS";
    header("Location: ../../index.php");
    exit();
  
     
  
}
?>
