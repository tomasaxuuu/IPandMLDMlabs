<?php
    session_start();
    
    // считывание матрицы смежности && преобразование строки в массив
    $matrix = preg_split('/[\n]/', $_POST['array']);
    for ($i = 0; $i < count($matrix); $i++) {
        $matrix[$i] = trim($matrix[$i]);
        $matrix[$i] = explode(" ", $matrix[$i]);
    }
    
    // считывание кол-ва вершин графа
    $points = trim(($_POST['firstTop']), " ");

    //функция валидации
    function validation($matrix, $points) {
        $_SESSION['text'] = "";
        if(strlen($points) == 0 or count($matrix) == 0) {
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
        if (!is_numeric($points)) {
            $_SESSION['text'] = "Кол-во вершин должно состоять из цифр!";
            return false;
        }
        if ($points != count($matrix)) {
            $_SESSION['text'] = "Число вершин не сходится с графом!";
            return false;
        }
        return true;
    }
    
    if(validation($matrix, $points)) {
        $input = ''; // для вывода введенной матрицы
        $path = ''; // хранение конечных путей
        $count = 0; // переменная для подсчета всех шагов выполнения алгоритма
        $prev = array(); // пустой массив маршрутов
        $outPath = ''; // для вывода маршрутов

        //вывод введенной матрицы смежности
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                $input = $input.$matrix[$i][$j]." ";
            }
            $input = $input."<br>";
        }
    
        // инициалиацзия массива маршрутов от 1 до последней вершины
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                $prev[$i][$j] = $i + 1;
            }
            $prev[$i][$j] = -1;
        }

        //алгорит Флойда-Уоршелла для нахождения минимального пути между каждой парой элементов
        for ($k = 0; $k < count($matrix); $k++) {
            for ($i = 0; $i < count($matrix); $i++) {
                for ($j = 0; $j < count($matrix); $j++) {
                    $count++;
                    if ($matrix[$i][$k] && $matrix[$k][$j] && $i != $j) {
                        if ($matrix[$i][$k] + $matrix[$k][$j] < $matrix[$i][$j] || $matrix[$i][$j] == 0) {
                            $matrix[$i][$j] = $matrix[$i][$k] + $matrix[$k][$j]; // конечные пути
                            $prev[$i][$j] = $prev[$k][$j]; // заносим в массив маршрутов сами маршруты       
                        }
                    }
                }
            }
        }

        // замена всех 0 не находящихся на главной диагонали на бесконечность (INF)
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                if($i != $j and $matrix[$i][$j] == 0) {
                    $matrix[$i][$j] = "INF"; // отсутствие пути
                }
                $path = $path.$matrix[$i][$j]." ";
            }
            $path = $path."<br>";
        }

        // вывод всех маршрутов
        for ($i = 0; $i < count($prev); $i++) {
            for ($j = 0; $j < count($prev); $j++) {
                if($i == $j) {
                    $prev[$i][$j] = "INF"; // отсутствие маршрута
                }
                $outPath = $outPath.$prev[$i][$j]." ";
            }
            $outPath = $outPath."<br>";
        }
        
        $_SESSION['matrix'] = "Введенная матрица:<br>" . $input. "<br>Количество вершин матрицы:<br>" . count($matrix). "<br>";
        $_SESSION['final'] = "Матрица конечных путей:<br>" . $path. "<br>Количество шагов выполнения алгоритма:<br>" . $count . "<br>";
        $_SESSION['let'] = "Матрица всех маршрутов из 1-ой вершины в последнюю<br> по алгоритму Флойда - Уоршелла:<br>" . $outPath. "";

        header('Location: ../index.php');
    } 
    else {
        header('Location: ../index.php');
    }

?>