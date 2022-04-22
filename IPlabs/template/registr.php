<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../styles/registr.css">
    <title>Registration</title>
</head>
<body>
    <div class="fixed">
        <header id="header">
            <a class="logo" href="#">Registration</a>
            <div class="burger"><img src="../IMG/menu.png"></div>
            <div class="link-container">
                <div class="pages">
                    <a class="buts" href="../index.html">Home</a>
                    <a class="buts" href="../pages/Aboutme.php">About me</a>
                    <a class="buts" href="../pages/Hobbies.php">Hobbies</a>
                    <a class="buts" href="../pages/Gallery.php">Gallery</a>
                    <a class="buts" href="#">Registr</a>
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
        <!-- Форма регистрации -->
        <form action="/inc/signup.php" method="post" enctype="multipart/form-data">
            <h1>Регистрация</h1>
            <label>ФИО</label>
            <input type="text" name="full_name" placeholder="Введите имя" style="color: white;">
            <label>Логин</label>
            <input type="text" name="login" placeholder="Введите логин" style="color: white;">
            <label>Почта</label>
            <input type="email" name="email" placeholder="Введите почту" style="color: white;">
            <label>Аватар</label>
            <input type="file" name="avatar" style="color: white;"> 
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль" style="color: white;">
            <label>Подтвердите пароль</label>
            <input type="password" name="password_two" placeholder="Введите пароль еще раз" style="color: white;">
            <button type="submit">Зарегистриоваться</button>
            <p>
            Уже есть аккаунт? <a href="./auth.php">Авторизироваться</a>
            </p>
            <?php 
                if (isset($_SESSION['message'])) {
                    echo '<p class="mes"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
        </form>
    </main>
</body>
</html>