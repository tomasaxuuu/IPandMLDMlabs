<?php 
    session_start();
    require_once '../inc/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/sql.css">
        <title>Users</title>
    </head>
    <body>
        <div class="fixed">
            <header id="header">
                <a class="logo" href="#">User data</a>
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
    </body>
    <main>
        <div class="users">
            <h1>Список пользователей</h1>
            <table>
                <tr>
                    <?php
                        if($_SESSION['user']['role'] == "admin") {
                            ?>
                            <td>id</td>
                            <?php
                        }
                        ?>
                    <td>ФИО</td>
                    <?php
                        if($_SESSION['user']['role'] == "admin") {
                            ?>
                            <td>Логин</td>
                            <?php
                        }
                        ?>
                    <td>Почта</td>
                    <td>Аватар</td>
                    <td>Очки</td>
                    <td>Роль</td>
                    <?php
                        if($_SESSION['user']['role'] == "admin") {
                            ?>
                            <td>Редактировать</td>
                            <td>Удалить</td>
                            <?php
                        }
                        ?>
                </tr>
            <?php
            $query = "SELECT * FROM `users`";
            $res = mysqli_query($connect, $query);
            while(($user = mysqli_fetch_array($res))) {
                ?>
                <tr>
                <?php
                    if($_SESSION['user']['role'] == "admin") {
                            ?>
                            <td class="data"><?=$user['id']?></td>
                            <?php
                    }
                    ?>
                    <td class="data"><?=$user['full_name']?></td>
                    <?php
                    if($_SESSION['user']['role'] == "admin") {
                            ?>
                            <td class="data"><?=$user['login']?></td>
                            <?php
                    }
                    ?>
                    <td class="data"><?=$user['email']?></td>
                    <td class="data"><img src="<?=$user['avatar']?>" width="100" class="avatarimg" alt="Аватарка"></td>
                    <td class="data"><?=$user['score']?></td>
                    <td class="data"><?=$user['role']?></td>
                    <?php
                        if($_SESSION['user']['role'] == "admin") {
                            ?>
                            <td class="data"><a href="./updatePage.php?id=<?=$user['id']?>"><img src="../IMG/edit.png" width="50" class="edel" alt="Редактировать"></a></td>
                            <td class="data"><a href="../inc/delete.php?id=<?=$user['id']?>"><img src="../IMG/delete.png" width="50" class="edel" alt="Удалить"></a></td>
                             <?php
                        }
                    ?>
                </tr>
        </div>
        <?php
    }
    ?>
        </table>
    </main>
</html>
