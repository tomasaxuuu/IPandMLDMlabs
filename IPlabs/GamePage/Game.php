<?php
    session_start();
   
    if (!$_SESSION['user']) {
        header('Location: ../../template/auth.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/game.css">
    <title>Game</title>
</head>
<body>
    <div class="fixed">
        <header id="header">
            <a class="logo" href="#">Game</a>
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
    <main class="main">
        <canvas class="canvas" id="canvas" width="288" height="512"></canvas>
        <div id="score"></div>
        <form action="../inc/result.php" method="post">
            <input type="hidden" name="id" value="<?= $_SESSION['user']['id']?>">
            <input type="hidden" name="score" id="points" value="<?= $_SESSION['user']['score'] ?>">
            <button id="butt" type="submit">Обновить результаты</button>
            <button id="butt1" type="button">Начать заново</button>
    </form>
    </main>
    <script src="./scripts/game.js"></script>
</body>
</html>