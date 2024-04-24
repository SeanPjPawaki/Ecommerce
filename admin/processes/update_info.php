
<?php
include('../includes/conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id']; 
    $first_name = $_POST['first_name'];
    $middle_init = $_POST['middle_init'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $status = $_POST['status'];

        $sql = "UPDATE `user` 
                SET 
                    first_name = :first_name, 
                    middle_init = :middle_init, 
                    last_name = :last_name, 
                    gender = :gender, 
                    birth_date = :birth_date, 
                    email = :email, 
                    status = :status 
                WHERE 
                    id = :id";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':middle_init', $middle_init);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':birth_date', $birth_date);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: ../users.php");
        exit();
    }
    ?>