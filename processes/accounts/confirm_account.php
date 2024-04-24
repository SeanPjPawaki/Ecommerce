<?php
session_start();
include '../../includes/conn.php';
if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = $_GET['email'];
    $code = $_GET['code'];
    $sql = "UPDATE user SET status = 'CONFIRMED' WHERE email = :email AND code = :code";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':code', $code);
    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            $_SESSION['STATUS'] = "ACCOUNT_ACTIVATION";
            header("Location: ../../index.php");
            exit;
        } else {
        }
    }
}
header("Location: ../../index.php");
exit;
?>
