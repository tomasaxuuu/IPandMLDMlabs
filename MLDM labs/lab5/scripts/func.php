<?php
    session_start();
    
    // считывание матрицы смежности && преобразование строки в массив
    $matrix = preg_split('/[\n\r]+/', $_POST['array']);
    for ($i = 0; $i < count($matrix); $i++) {
        $matrix[$i] = trim($matrix[$i]);
        $matrix[$i] = preg_replace('/\s+/', ' ', $matrix[$i]);
        $matrix[$i] = explode(" ", $matrix[$i]);
    }

    //функция валидации
    function validation($matrix) {
        $_SESSION['text'] = "";
        if(count($matrix) == 0) {
            $_SESSION['text'] = "Поле должно быть заполнено!";
            return false;
        }
        for ($i = 0; $i < count($matrix); $i++){
            if (count($matrix) != count($matrix[$i])) {
                $_SESSION['text'] = "Матрица должна быть квадратной!";
                return false;
            }
            for ($j = 0; $j < count($matrix); $j++){
                if(!is_numeric($matrix[$i][$j])) {
                    $_SESSION['text'] = "Матрица должна состоять из цифр!";
                    return false;
                }
            }
        }
        return true;
    }
    
    if(validation($matrix)) {
        $input = ''; // для вывода введенной матрицы
        $path = ''; // хранение матрицы достижимости
    
        //вывод введенной матрицы смежности
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                $input = $input.$matrix[$i][$j]." ";
            }
            $input = $input."<br>";
        }
        
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                if($matrix[$i][$j] != 1 && $i != $j && $matrix[$i][$j] != 0) {
                    $matrix[$i][$j] = 1;
                }
                if ($i == $j) {
                    $matrix[$i][$j] = 0;
                }
            }
        }

        //алгорит Флойда-Уоршелла для построения матрицы достижимости
        for ($k = 0; $k < count($matrix); $k++) {
            for ($i = 0; $i < count($matrix); $i++) {
                for ($j = 0; $j < count($matrix); $j++) {
                    $matrix[$i][$j] = ($matrix[$i][$j] || ($matrix[$i][$k] && $matrix[$k][$j]));
                    if ($matrix[$i][$j] == 0) {
                        $matrix[$i][$j] = 0;
                    }
                }
            }
        }
        
        // ставим нули на главной диагонали, так как нельзя из одной вершины попасть в себя же
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                if ($i == $j) {
                    $matrix[$i][$j] = 1;
                }
                $path = $path.$matrix[$i][$j]." ";
            }
            $path = $path."<br>";
        }

        $_SESSION['matrix'] = "Введенная матрица смежности:<br>" . $input. "";
        $_SESSION['final'] = "Матрица достижимости:<br>" . $path. "";

        header('Location: ../index.php');
    } 
    else {
        header('Location: ../index.php');
    }

?>