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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/updatePage.css">
    <title>Update</title>
</head>
<body>
    <div class="fixed">
        <header id="header">
            <a class="logo" href="#">Edit</a>
            <div class="burger"><img src="../IMG/menu.png"></div>
                <div class="link-container">
                    <div class="pages">
                        <a class="buts" href="../index.html">Home</a>
                        <a class="buts" href="../pages/Aboutme.php">About me</a>
                        <a class="buts" href="../pages/Hobbies.php">Hobbies</a>
                        <a class="buts" href="../pages/Gallery.php">Gallery</a>
                        <a class="buts" href="../template/profile.php">Profile</a>
                    </div>
                    <div class="soc">
                        <a class="social" target="blank" href="https://www.instagram.com/tomasaxuuu/"><img src="../IMG/inst.png" width="25" height="25"></a>
                        <a class="social" target="blank" href="https://vk.com/tomasaxuuu"><img src="../IMG/vk.png" width="25" height="25"></a>
                        <a class="social" target="blank" href="https://open.spotify.com/user/5uh6ik7nbma6wbpaiq9ljr3i9"><img src="../IMG/spoty.png" width="25" height="25"></a>
                    </div>
                    <div class="url"><a href="../pages/Links.php">Links</a></div>
                </div>
        </header>
    </div>
    <main>
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
    </main>
</body>
</html>