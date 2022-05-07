<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
    <title>Четвертая лабораторная работа</title>
</head>
<body>
    <div class="wrap">
        <div class="main">
            <h3 class="name">Четвертая лабораторная работа:<br>
                Нахождение пути между каждой парой вершин в ориентированном графе
            </h3>
            <form method="post" action="./scripts/func.php" class="forms" enctype="multipart/form-data">
                <textarea class="textar" name="array" placeholder="Введите элементы матрицы смежности через пробел"></textarea>
                <input class="matrix" type="text" name="firstTop" autocomplete="off" placeholder="Введите начальную вершину"> 
                <!-- <input class="matrix" type="text" name="secondTop" autocomplete="off" placeholder="Введите конечную вершину"> -->
                <input class="sub" type="submit" value="Подтвердить">
            </form>
            
        </div>
        <?php 
            if (isset($_SESSION['text']) && !empty($_SESSION['text'])) {
                echo '<p class="mes"> ' . $_SESSION['text'] . ' </p>';
            }
            unset($_SESSION['text']);
            if (isset($_SESSION['matrix']) && !empty($_SESSION['matrix'])) {
                echo '<p class="mes"> ' . $_SESSION['matrix'] . ' </p>';
            }
            unset($_SESSION['matrix']);
            // if (isset($_SESSION['inf']) && !empty($_SESSION['inf'])) {
            //     echo '<p class="mes"> ' . $_SESSION['inf'] . ' </p>';
            // }
            // unset($_SESSION['inf']);
            if (isset($_SESSION['final']) && !empty($_SESSION['final'])) {
                echo '<p class="mes"> ' . $_SESSION['final'] . ' </p>';
            }
            unset($_SESSION['final']);
        ?> 
    </div>
    <!-- <div class="exit">
    <a class="labs" href="../../pages/Labs.php"><button class="laboratories" type="submit">Back</button></a>
    </div> -->
</body>
</html>