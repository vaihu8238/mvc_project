<?php
    error_reporting(E_ERROR | E_PARSE);
    try {
        include "check_admin_logged_in.php";
        include "db.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];

            $sql = "UPDATE users SET is_seller_approved = 1 WHERE id=$id";

            if(mysqli_query($conn, $sql)){
                header('Location: sellers_list.php');
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }

            $conn->close();
        }
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
?>