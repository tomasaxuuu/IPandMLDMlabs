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
        for ($i = 0; $i < count($matrix); $i++){
            if (count($matrix) != count($matrix[$i])) {
                $_SESSION['text'] = "Матрица должна быть квадратной!";
                return false;
            }
        }
        if (!is_numeric($startTop)) {
            $_SESSION['text'] = "Кол-во вершин должно состоять из цифр";
            return false;
        }
        if ($startTop != count($matrix)) {
            $_SESSION['text'] = "Число вершин не сходится с графом";
            return false;
        }
        return true;
    }
    
    if(validation($matrix, $startTop)) {
        $startTop = trim(($_POST['firstTop']), " ");
        $matrix2 = $matrix;
        $matrix1 = '';
        $matrix4 = '';
        // $INF = 99;
        //вывод введенной матрицы смежности
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                $matrix1 = $matrix1.$matrix[$i][$j]." ";
            }
            $matrix1 = $matrix1."<br>";
        }
        $_SESSION['matrix'] = "Введенная матрица:<br>" . $matrix1. "<br>Количество вершин матрицы:<br>" . count($matrix). "<br>";

        $count = 0;
        for ($k = 0; $k < count($matrix); $k++) {
            for ($i = 0; $i < count($matrix); $i++) {
                for ($j = 0; $j < count($matrix); $j++) {
                    $count++;
                    if ($matrix[$i][$k] && $matrix[$k][$j] && $i!=$j) {
                        if ($matrix[$i][$k] + $matrix[$k][$j] < $matrix[$i][$j] || $matrix[$i][$j] == 0) {
                            $matrix[$i][$j] = $matrix[$i][$k] + $matrix[$k][$j];
                        }
                    }
                }
            }
        }

        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                if($i != $j and $matrix[$i][$j] == 0) {
                    $matrix[$i][$j] = "INF";
                }
                $matrix4 = $matrix4.$matrix[$i][$j]." ";
            }
            $matrix4 = $matrix4."<br>";
        }

        
        $_SESSION['final'] = "Матрица конечных путей :<br>" . $matrix4. "<br>Количество шагов выполнения алгоритма: <br>" . $count . "<br>";
        header('Location: ../index.php');
    } 
    else {
        header('Location: ../index.php');
    }

?>