<?php 
    session_start();
    require_once 'connect.php';

    $id = $_POST['id'];
    $score = $_POST['score'];
    mysqli_query($connect, "UPDATE `users` SET `score` = '$score' WHERE `users`.`id` = '$id'");

    header('Location: ../GamePage/Game.php');