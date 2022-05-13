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
                <textarea class="textar" name="array" placeholder="Введите элементы матрицы смежности через пробел (если путь отсутствует, впишите 0)."></textarea>
                <input class="matrix" type="text" name="first" autocomplete="off" placeholder="Введите начальную вершину"> 
                <input class="matrix" type="text" name="last" autocomplete="off" placeholder="Введите конечную вершину"> 
                <input class="sub" type="submit" value="Подтвердить">
                <p class="example">Пример ввода:<br>
                   0 9 2<br>
                   1 0 4<br>
                   2 4 0<br>
                </p>
            </form>
        </div>
        <?php 
            if (isset($_SESSION['text']) && !empty($_SESSION['text'])) {
                echo '<p class="mes"> ' . $_SESSION['text'] . ' </p>';
            }
            unset($_SESSION['text']);
            if (isset($_SESSION['matrix']) && !empty($_SESSION['matrix'])) {
                echo '<p class="mes1"> ' . $_SESSION['matrix'] . ' </p>';
            }
            unset($_SESSION['matrix']);
            if (isset($_SESSION['final']) && !empty($_SESSION['final'])) {
                echo '<p class="mes2"> ' . $_SESSION['final'] . ' </p>';
            }
            unset($_SESSION['final']);
            if (isset($_SESSION['let']) && !empty($_SESSION['let'])) {
                echo '<p class="mes3"> ' . $_SESSION['let'] . ' </p>';
            }
            unset($_SESSION['let']);
        ?> 
    </div>
</body>
</html>