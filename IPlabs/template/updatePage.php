<?php 
    session_start();
    require_once '../inc/connect.php';
    $id = $_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
    $product = mysqli_fetch_assoc($product);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
</head>
<body>
    <form action="../inc/edit.php" method="post">
        <h1>Редактирование</h1>
        <input type="hidden" name="id" value="<?= $product['id']?>">
        <label>ФИО</label>
        <input type="text" name="full_name"value="<?= $product['full_name']?>">
        <label>Логин</label>
        <input type="text" name="login" value="<?= $product['login']?>">
        <label>Почта</label>
        <input type="email" name="email" value="<?= $product['email']?>">
        <label>Пароль</label>
        <input type="password" name="password" value="<?= $product['password']?>">
        <button type="submit">Изменить</button>
        </form>
</body>
</html>