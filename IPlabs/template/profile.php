<?php
    session_start();
    require_once '../inc/connect.php';
    if (!isset($_SESSION['user'])) {
        header('Location: registr.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../styles/profile.css">
    <title>Profile</title>
</head>
<body>
    <div class="fixed">
        <header id="header">
            <a class="logo" href="#">Profile</a>
            <div class="burger"><img src="../IMG/menu.png"></div>
            <div class="link-container">
                <div class="pages">
                <a class="buts" href="../index.html">Home</a>
                    <a class="buts" href="../pages/Aboutme.php">About me</a>
                    <a class="buts" href="../pages/Hobbies.php">Hobbies</a>
                    <a class="buts" href="../pages/Gallery.php">Gallery</a>
                    <a class="buts" href="#">Profile</a>
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
    <!-- Профиль -->
    <form>
    <?php
        $id = $_SESSION['user']['id'];
        $query = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id' ");
        $query = mysqli_fetch_all($query);
        foreach($query as $arr){
        }
    ?>
        <p class="first">Ваш профиль:</p>
        <img src="<?= $arr[5] ?>" alt="">
        <p class="second">Ваше Имя: <?= $arr[1] ?></p>
        <a class="id" href="#">id: <?= $arr[0] ?></a>
        <a class="email" href="#">Почта: <?= $arr[3] ?></a>
        <a class="role" href="#">Ваша роль: <?= $arr[7] ?></a>
        <a class="count1" href="#">Количество очков: <?= $arr[6] ?></a>
        <a class="sql" href="./sql.php">Таблица всех пользователей</a>
        <a class="out" href="../inc/exit.php">Выход</a>
    </form>
    </main>
</body>
</html>