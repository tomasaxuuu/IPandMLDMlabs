var error_message = "";
// Функция валидации (проверка логического ввода матриц)

function qvalidate(mes) {
    let mass = true;
    if (mes.length > 0) {
        mass = mes.split(" ");
        for (let i = 0; i < mass.length; i++){
            if (mass[i].length != 3) {
                error_message = 'Размер элемента должен быть равен 3 символам!';
                mass = false;
                break;
            }
            if(!(mass[i][0] < 'A' || mass[i][0] > 'z')) {
                error_message = 'Первый элемент должен быть цифрой!';
                mass = false;
                break;
            }
            if(!(mass[i][0] < 'A' || mass[i][0] > 'z')) {
                error_message = 'Второй элемент должен быть цифрой!';
                mass = false;
                break;
            }
            if (mass[i][0] % 2 == 0) {
                error_message = 'Первый элемент должен быть нечетной цифрой!';
                mass = false;
                break;
            }
            if (mass[i][2] < "A" || mass[i][0] > "z") {
                error_message = 'Третий элемент должен быть буквой!';
                mass = false;
                break;
            }
        }
    }
    else {
        error_message = "Массив не должен быть пустым!";
    }
        return mass;
    }

// Основаная функция для подсчета

function myFunc() {
    var mas_1 = document.getElementById('matrix1');
    var mas_2 = document.getElementById('matrix2');
    if ((qvalidate(mas_1.value)) == false) {
        alert(error_message);
    }
    if ((qvalidate(mas_2.value)) == false) {
        alert(error_message);
    }
}