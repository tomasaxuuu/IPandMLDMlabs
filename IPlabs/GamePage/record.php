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
    <title>Record</title>
</head>
<body>
    <form action="../inc/result.php" method="post">
        <input type="hidden" name="id" value="<?= $_SESSION['user']['id']?>">
        <input name="score" id="points" value="<?= $_SESSION['user']['score'] ?>">
        <button type="submit">Обновить результаты</button>
    </form>
    <script src="./scripts/game.js"></script>
</body>
</html>