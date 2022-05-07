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

    function validation($matrix, $startTop) {
        $_SESSION['text'] = "";
        if(strlen($startTop) === 0 or count($matrix) === 0) {
            $_SESSION['text'] = "Не должно быть ни одного пустого поля";
            return false;
        }
        for($i = 0; $i < count($matrix); $i++){
            if (count($matrix) != count($matrix[$i])) {
                $_SESSION['text'] = "Матрица должна быть квадратной!";
                return false;
            }
        }
        if(!is_numeric($startTop)) {
            $_SESSION['text'] = "Вершины должны быть цифрами";
            return false;
        }
        if ($startTop > count($matrix)) {
            $_SESSION['text'] = "Вершины " . $startTop . " нет в графе!";
            return false;
        }
        return true;
    }
    
    if(validation($matrix, $startTop)) {
        $startTop = trim(($_POST['firstTop']), " ");
        $matrix2 = $matrix;
        $INF = 99999;
        //вывод введенной матрицы смежности
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                $matrix1 = $matrix1.$matrix[$i][$j]." ";
            }
            $matrix1 = $matrix1."<br>";
        }
        $_SESSION['matrix'] = "Введенная матрица:<br>" . $matrix1. "<br>Количество вершин матрицы:<br>" . count($matrix). "<br>";

        // замена всех 0 на INF, т.к нет пути в этом направлении
        for ($i = 0; $i < count($matrix2); $i++) {
            for ($j = 0; $j < count($matrix2[$i]); $j++) {
                if($matrix2[$i][$j] === '0') {
                    $matrix2[$i][$j] = INF;
                    if($matrix2[$i][$j] === INF) {
                        $matrix2[$i][$j] = "INF";
                    }
                }
            }
        }
        
        for ($k = 0; $k < count($matrix); $k++) {
            for ($i = 0; $i < count($matrix); $i++) {
                for ($j = 0; $j < count($matrix); $j++) {
                    $end[$i][$j] = min($matrix[$i][$j], ($matrix[$i][$k] + $matrix[$k][$j]));
                    if($end[$i][$j] === '0') {
                        $end[$i][$j] = INF;
                        if($end[$i][$j] === INF) {
                            $end[$i][$j] = "INF";
                        }
                    }
                }
            }
        }


        for ($i = 0; $i < count($end); $i++) {
            for ($j = 0; $j < count($end); $j++) {
                $matrix4 = $matrix4.$end[$i][$j]." ";
            }
            $matrix4 = $matrix4."<br>";
        }
        $_SESSION['final'] = "Матрица конечных путей :<br>" . $matrix4. "<br>";
        header('Location: ../index.php');
    } 
    else {
        header('Location: ../index.php');
    }


?>

