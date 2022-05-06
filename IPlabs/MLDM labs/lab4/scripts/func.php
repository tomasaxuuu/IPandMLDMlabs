<?php
    session_start();
    // преобразование строки в массив
    $matrix = preg_split('/[\n\r]+/', $_POST['array']);
    for ($i = 0; $i < count($matrix); $i++) {
        $matrix[$i] = trim($matrix[$i]);
        $matrix[$i] = preg_replace('/\s+/', ' ', $matrix[$i]);
        $matrix[$i] = explode(" ", $matrix[$i]);
    }
    
    $startTop = trim(($_POST['firstTop']), " ");
    $endTop = trim(($_POST['secondTop']), " ");

    function validation($matrix, $startTop, $endTop) {
        $_SESSION['text'] = "";
        if(strlen($startTop) === 0 or strlen($endTop) === 0 or count($matrix) === 0) {
            $_SESSION['text'] = "Не должно быть ни одного пустого поля";
            return false;
        }
        for($i = 0; $i < count($matrix); $i++){
            if (count($matrix) != count($matrix[$i])) {
                $_SESSION['text'] = "Матрица должна быть квадратной!";
                return false;
            }
        }
        if(!is_numeric($startTop) or !is_numeric($endTop)) {
            $_SESSION['text'] = "Вершины должны быть цифрами";
            return false;
        }
        if ($startTop > count($matrix)) {
            $_SESSION['text'] = "Вершины " . $startTop . " нет в графе!";
            return false;
        }
        if ($endTop > count($matrix)) {
            $_SESSION['text'] = "Вершины " . $endTop . " нет в графе!";
            return false;
        }
        return true;
    }
    
    if(validation($matrix, $startTop, $endTop)) {
        $startTop = trim(($_POST['firstTop']), " ");
        $endTop = trim(($_POST['secondTop']), " ");
        $_SESSION['calc'] = $startTop;

        header('Location: ../index.php');
    } 
    else {
        header('Location: ../index.php');
    }


?>

