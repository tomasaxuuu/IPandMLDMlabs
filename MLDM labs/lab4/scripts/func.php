<?php
    session_start();
    
    // считывание матрицы && преобразование строки в массив
    $matrix = preg_split('/[\r\n]+/', $_POST['array']);
    for ($i = 0; $i < count($matrix); $i++) {
        $matrix[$i] = trim($matrix[$i]);
        $matrix[$i] = explode(" ", $matrix[$i]);
    }
    
    // считывание стартовой и конечных вершин
    $start = (int)$_POST['first'];
    $last = (int)$_POST['last'];
    
    //функция валидации
    function validation($matrix, $start, $last) {
        $_SESSION['textError'] = "";
        if(empty($start) or empty($last) or empty($matrix)) {
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
        if ($start > count($matrix) or $last > count($matrix)) {
            $_SESSION['text'] = "Номер вершины не совпадает с количеством вершин";
            return false;
        }
        if ($start == 0 or $last == 0) {
            $_SESSION['text'] = "Номер вершины не совпадает с количеством вершин";
            return false;
        }
        if (!is_numeric($start)) {
            $_SESSION['text'] = "Номер вершины должен быть цифрой!";
            return false;
        }
        if (!is_numeric($last)) {
            $_SESSION['text'] = "Номер вершины должен быть цифрой!";
            return false;
        }
        return true;
    }
    
    if(validation($matrix, $start, $last)) {
        $start = (int)$_POST['first'] - 1; // стартовая вершина
        $last = (int)$_POST['last'] - 1; // конечная вершина
        $matrixOut = ''; // для вывода матрицы смежности
        $path = array(); // массив маршрутных вершин
        $finalPath= ''; // для вывода маршрута
        $count = 0; // переменная для подсчета всех шагов выполнения алгоритма

        // инициализация массива
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                if($i == $j) {
                    $R[$i][$j] = -1;
                } else {
                    $R[$i][$j] = $j;
                }
            }
        }

        //алгорит Флойда-Уоршелла для нахождения минимального пути между каждой парой элементов
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
        
        // вычисление кратчайшего маршрута от start до last
        array_push($path, $start + 1);
        if ($R != -1) {                 // если есть путь, то заносим в массив
            while ($start != $last) {
                $start = $R[$start][$last];
                array_push($path, $start + 1);
            }
        }   
        
        // замена всех 0 не находящихся на главной диагонали на бесконечность (INF)
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                if($i == $j) {
                    $matrix[$i][$j] = "INF";
                }
                $matrixOut = $matrixOut.$matrix[$i][$j]." ";
            }
            $matrixOut = $matrixOut."<br>";
        }

        //вывод пути
        for ($i = 0; $i < count($path); $i++) {
            $finalPath[$i] = $path[$i];
            $_SESSION['path'] = "Маршрут из " . $finalPath[0]. " вершины до " . $finalPath[strlen($finalPath) - 1] .":<br>". $finalPath . "";
        }

        $_SESSION['outMatrix'] = "Матрица конечных путей :<br>" . $matrixOut. "<br>Количество шагов выполнения алгоритма: <br>" . $count . "<br>";
        
        header('Location: ../index.php');
    } 
    else {
        header('Location: ../index.php');
    }

?>