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
            <h1 class="name">Четвертая лабораторная работа</h1>
            <form method="post" action="./scripts/func.php" class="forms" enctype="multipart/form-data">
            <textarea class="textar" name="array" placeholder="Введите элементы матрицы смежности через пробел"></textarea>
                <input class="matrix" type="text" name="firstTop" autocomplete="off" placeholder="Введите начальную вершину">
                <input class="matrix" type="text" name="secondTop" autocomplete="off" placeholder="Введите конечную вершину">
                
                <input class="sub" type="submit" value="Подтвердить">
            </form>
        </div>
        <?php 
            if (isset($_SESSION['text']) && !empty($_SESSION['text'])) {
                echo '<p> ' . $_SESSION['text'] . ' </p>';
            }
            unset($_SESSION['text']);
            if (isset($_SESSION['calc']) && !empty($_SESSION['calc'])) {
                echo '<p> ' . $_SESSION['calc'] . ' </p>';
            }
            unset($_SESSION['calc']);
        ?> 
    </div>
</body>
</html>