<?php 
    session_start();
    require_once './connect.php';

    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    mysqli_query($connect, "UPDATE `users` SET `full_name` = '$full_name', `login` = '$login', `email` = '$email', `password` = '$password' WHERE `users`.`id` = '$id'");

    header('Location: ../template/sql.php');
