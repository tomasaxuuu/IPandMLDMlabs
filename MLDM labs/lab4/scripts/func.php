<?php
    session_start();

    $startTop = trim((htmlspecialchars($_POST['firstTop'])), " ");
    $endTop = trim((htmlspecialchars($_POST['secondTop'])), " ");

    $matrix = $_POST['array'];
    $matrix = trim($matrix, "\r\n");

    $points = trim((htmlspecialchars($_POST['points'])), " ");

    function validation($startTop, $endTop, $matrix, $points) {
        if(strlen($points) <= 0 && strlen($startTop) <= 0 && strlen($endTop) <= 0 && strlen($matrix) <= 0) {
            $_SESSION['text'] = "Не должно быть ни одного пустого поля";
            return false;
        }
        if(strlen($points) <= 0 || strlen($startTop) <= 0 || strlen($endTop) <= 0 || strlen($matrix) <= 0) {
            $_SESSION['text'] = "Какое - то поле пустое!";
            return false;
        }
        if (!str_contains($points, $startTop)) {
            $_SESSION['text'] = "Стартовая вершина отсутствует в графе";
            return false;
        }
        if (!str_contains($points, $endTop)) {
            $_SESSION['text'] = "Конечная вершина отсутствует в графе";
            return false;
        }
    }
    
    function forming2dArray($string){
        $string = trim($string," ");
        $string = explode("\r\n", $string);
        for($i = 0; $i < count($string); $i++){
        $string[$i] = trim($string[$i]," ");
        $string[$i] = explode(" ", $string[$i]);
        }
        return $string;
    }

    if(validation($startTop, $endTop, $matrix, $points)) {
        $matrix = forming2dArray($matrix);
        $points = explode(" ", $points);
    }
    else {
        echo $_SESSION['text'];
    }
    header('Location: ../index.php');



?>


