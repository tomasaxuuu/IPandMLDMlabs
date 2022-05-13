<?php
    session_start();
    
    // считывание матрицы смежности && преобразование строки в массив
    $matrix = preg_split('/[\r\n]+/', $_POST['array']);
    for ($i = 0; $i < count($matrix); $i++) {
        $matrix[$i] = trim($matrix[$i]);
        $matrix[$i] = explode(" ", $matrix[$i]);
    }
    
    // считывание кол-ва вершин графа
    $start = (int)$_POST['first'] - 1;
    $last = (int)$_POST['last'] - 1;
    
    //функция валидации
    function validation($matrix, $start, $last) {
        $_SESSION['text'] = "";
        if(strlen($start) == 0 or count($matrix) == 0 or strlen($last) == 0) {
            $_SESSION['text'] = "Не должно быть ни одного пустого поля!";
            return false;
        }
        for ($i = 0; $i < count($matrix); $i++){
            if (count($matrix) != count($matrix[$i])) {
                $_SESSION['text'] = "Матрица должна быть квадратной!";
                return false;
            }
            for ($j = 0; $j < count($matrix); $j++){
                if($i == $j and $matrix[$i][$j] != 0) {
                    $_SESSION['text'] = "На главной диагонали должны быть нули!";
                    return false;
                }
                if(!is_numeric($matrix[$i][$j])) {
                    $_SESSION['text'] = "Матрица должна состоять из цифр!";
                    return false;
                }
            }
        }
        if (!is_numeric($start)) {
            $_SESSION['text'] = "Кол-во вершин должно состоять из цифр!";
            return false;
        }
        if (!is_numeric($last)) {
            $_SESSION['text'] = "Кол-во вершин должно состоять из цифр!";
            return false;
        }
        return true;
    }
    
    if(validation($matrix, $start, $last)) {
        $matrix2 = $matrix;
        $matrix1 = '';
        $matrix4 = '';
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                if($i == $j) {
                    $R[$i][$j] = -1;
                } else {
                $R[$i][$j] = $j;
                }
            }
            
        }
        //вывод введенной матрицы смежности
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                $matrix1 = $matrix1.$matrix[$i][$j]." ";
            }
            $matrix1 = $matrix1."<br>";
        }
        $_SESSION['matrix'] = "Введенная матрица:<br>" . $matrix1. "<br>Количество вершин матрицы:<br>" . count($matrix). "<br>";
        $path = array();
        $prev = array();
        $matrix5 = '';
        $m = '';
        //алгорит Флойда-Уоршелла для нахождения минимального пути между каждой парой элементов
        $count = 0; // переменная для подсчета всех шагов выполнения алгоритма
        for ($k = 0; $k < count($matrix); $k++) {
            for ($i = 0; $i < count($matrix); $i++) {
                for ($j = 0; $j < count($matrix); $j++) {
                    $count++;
                    if ($matrix[$i][$k] && $matrix[$k][$j] && $i != $j) {
                        if ($matrix[$i][$k] + $matrix[$k][$j] < $matrix[$i][$j] || $matrix[$i][$j] == 0) {
                            $matrix[$i][$j] = $matrix[$i][$k] + $matrix[$k][$j];
                            $R[$i][$j] = $R[$i][$k];      
                        }
                    }
                }
            }
        }
        array_push($path, $start + 1);
        if ($R != -1) {
            while ($start != $last) {
               
                $start = $R[$start][$last];
                array_push($path, $start + 1);
            }
            
        }   
        
        // замена всех 0 не находящихся на главной диагонали на бесконечность (INF)
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                if($i != $j and $matrix[$i][$j] == 0) {
                    $matrix[$i][$j] = "INF";
                }
                $matrix4 = $matrix4.$matrix[$i][$j]." ";
            }
            $matrix4 = $matrix4."<br>";
        }
        $q = '';
        for ($i = 0; $i < count($path); $i++) {
            $q[$i] = $path[$i];
            
            $_SESSION['let'] = "Маршрут от стартовой до конечной вершины:<br>". $q . "";
        }
        $_SESSION['final'] = "Матрица конечных путей :<br>" . $matrix4. "<br>Количество шагов выполнения алгоритма: <br>" . $count . "<br>";
        
        header('Location: ../index.php');
    } 
    else {
        header('Location: ../index.php');
    }

?>