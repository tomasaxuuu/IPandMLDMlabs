var error_message = "";

// Функция валидации (проверка логического ввода матриц)
function Validation(mes) {
    let mass = true;
    if (mes.length > 0) {
        mass = mes.split(" ");
        // проверка на валидацию
        for (let i = 0; i < mass.length; i++){
            if (mass[i].length != 3) {
                error_message = 'Размер элемента должен быть равен 3 символам!';
                mass = false;
                break;
            }
            if (!(mass[i][0] < 'A' || mass[i][0] > 'z')) {
                error_message = 'Первый элемент должен быть цифрой!';
                mass = false;
                break;
            }
            if (!(mass[i][1] < 'A' || mass[i][1] > 'z')) {
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

// Основаная функция для работы с множествами и выполнением действий
function Sets() {
    var mas_1 = document.getElementById('matrix1');
    var mas_2 = document.getElementById('matrix2');
    if (Validation(mas_1.value) && Validation(mas_2.value)) { // true
        const mas_1_set = new Set(mas_1.value.split(" "));
        const mas_2_set = new Set(mas_2.value.split(" ")); // создание двух множеств
        let union = [...new Set([...mas_1_set, ...mas_2_set])]; // объеденение двух множеств
        let intersection = (mas_1.value.split(" ")).filter(x => (mas_2.value.split(" ")).includes(x)); // пересечение двух множеств
        let difference_one = (mas_1.value.split(" ")).filter(x => !mas_2.value.split(" ").includes(x)); // дополнение A\B
        let difference_two= (mas_2.value.split(" ")).filter(x => !mas_1.value.split(" ").includes(x)); // дополнение B\A
        let symmetrical_difference = mas_1.value.split(" ").filter(x => !mas_2.value.split(" ").includes(x)).concat(mas_2.value.split(" ").filter(x => !mas_1.value.split(" ").includes(x))); // симметричная разность двух множеств
        // вывод результатов в документ при условии true
        document.getElementById('union').innerHTML = [...union.values()];
        document.getElementById('intersection').innerHTML = [...intersection.values()];
        document.getElementById('difference_AB').innerHTML = [...difference_one.values()];
        document.getElementById('difference_BA').innerHTML = [...difference_two.values()];
        document.getElementById('symmetrical_difference').innerHTML = [...symmetrical_difference.values()];
    }  
    // false - вывод ошибок
    else {
        alert(error_message);
    }
}