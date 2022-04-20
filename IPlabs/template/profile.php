<?php
    session_start();
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
    <main style="padding: 115px 0 0 0;">
    <!-- Профиль -->
    <form>
        <p style="margin-bottom:20px;
        font-size:30px;
        color: #B38CF3;">Ваш профиль:</p>
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="400" alt="">
        <p style="margin: 10px 0;
        text-align:center;
        font-size:20px;"><?= $_SESSION['user']['full_name'] ?></p>
        <a style="margin: 10px 0;
        text-align:center;
        font-size:20px;" href="#"><?= $_SESSION['user']['email'] ?></a>
        <a style="padding-top:20px;
        font-size:30px;
        color: #B38CF3;
        text-align:center;" href="../inc/exit.php">Выход</a>
    </form>
    </main>
</body>
</html>