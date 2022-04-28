<?php 
    session_start();
    require_once './connect.php';

    $id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = '$id'");

    header('Location: ../template/sql.php');
