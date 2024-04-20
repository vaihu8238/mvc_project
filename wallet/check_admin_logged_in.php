<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();

    $is_admin_logged_in = $_SESSION['is_admin_logged_in'];

    if(!($is_admin_logged_in)){
        header('Location: admin_login.php');
    }
?>