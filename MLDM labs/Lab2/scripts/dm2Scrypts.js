var error_message = "";
// Функция валидации (проверка логического ввода матриц)
function validation(mas) {
    let valid = true;
    if(mas.length > 0) {
        let bool = mas.split('\n');
        // проверка на валидацию
        for(let i = 0; i < bool.length; i++) {
            for(let j = 0; j < bool.length; j++) {
                if(bool[i][j] != '1' && bool[i][j] != '0') {
                    error_message = "В матрице могут быть только 0 и 1!";
                    valid = false;
                    break;
                }
                if(bool.length != bool[i].length) {
                    error_message = "Матрица должна быть квадратной!";
                    valid = false;
                    break;
                }
            }
        }
    }
   else  {
       error_message = "Поле не должно быть пустым!"
       valid = false;
   }
    return valid;
}

function sets() {
    let arr = document.getElementById('matrix');
    if (validation(arr.value)) { //true
        let map = arr.value.split('\n');
        let temp; // переменная, которая хранит значение перемножения матрицы саму на себя
        let reflex = true,
            symmetry = true,
            skewSymmetry = true,
            transitivity = true; // переменные логического типа
        for(let i = 0; i < map.length; i++) {
            for(let j = 0; j < map.length; j++) {
                // симметричность
                if(map[i][j] != map[j][i]) { // элементы симметричны отн. главной диагонали
                    symmetry = false;
                    break;
                }
                // кососимметричность
                if(map[i][j] == map[j][i]) { // элементы несимметричны отн. главной диагонали
                    skewSymmetry = false;
                    break;
                }
            }
        }
        for(let i = 0; i < map.length; i++) {
            //рефлексивность
            if(map[i][i] == '0') { // элементы на главной оси равны 1, тут обратное условие
                reflex = false;
                break;
            }
        }
        // транзитивность
        for(let i = 0; i < map.length; i++) {
            for(let j = 0; j < map.length; j++) {
                temp = 0;
                for(let k = 0; k < map.length; k++) {
                    temp += map[i][k] * map[k][j]; //  перемноение матрицы самой на себя
                }
            }
        }
        if (temp > 1) {
            temp = 1; // если больше 1, то возвращаем бинарный вид
        }
        for(let i = 0; i < map.length; i++) {
            for(let j = 0; j < map.length; j++) {
                for(let k = 0; k < map.length; k++) {
                    if (!(temp == '1' && map[i][j] == '1')) { // значение произведения  и элементы должны быть равны 1, тут обратное
                        transitivity = false;
                        break;
                    }
                }
            }
        }
        // вывод данных в html файл
        if(symmetry == true) {
            document.getElementById('symmetry').innerHTML = "Симметрична";
        }
        else {
            document.getElementById('symmetry').innerHTML = "Не симметрична";
        }
        if(reflex == true) {
            document.getElementById('reflexivity').innerHTML = "Рефлексивна";
        }
        else {
            document.getElementById('reflexivity').innerHTML = "Не рефлексивна";
        }
        if(transitivity == true) {
            document.getElementById('transitivity').innerHTML = "Транзитивна";
        }
        else {
            document.getElementById('transitivity').innerHTML = "Не транзитивна";
        }
        if(skewSymmetry == true) {
            document.getElementById('skewSymmetry').innerHTML = "Кососимметрична";
        }
        else {
            document.getElementById('skewSymmetry').innerHTML = "Не кососимметрична";
        }
    }
    // вывод ошибки при validation == false
    else {
        alert(error_message);
    }
}