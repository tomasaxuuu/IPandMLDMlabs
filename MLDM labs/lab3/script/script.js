var error_message = "";
// Функция валидации
function validation(firstSet, secondSet, relation) {
    let a = firstSet.split(' ');
    let b = secondSet.split(' ');
    let rel = relation;
    let valid = true;
    if(firstSet.length > 0 && secondSet.length > 0 && relation.length > 0) {
        if(a.length != 4 || b.length != 4) {
            error_message = "Размер множеств A и B должен быть равен четырём элементам!"
            valid = false;
        }
        for(let i = 0; i < rel.length; i++) {
            // проверка размерности каждого элемента
            if(rel[i].length != 2) {
                error_message = "Размер элемента отношения должен быть равен 2!"
                valid = false;
                break;
            }
            // проверка первого на принадлежность к множеству А
            switch (rel[i][0]) {
                case a[0]:
                case a[1]:
                case a[2]:
                case a[3]:
                    break;
                    
                default:
                valid = false;
                error_message = "Отношения должно быть вида AjBj, AjBj, AjBj, AjBj";
            }
            // проверка второго на приадлежность к множеству B
            switch (rel[i][1]) {
                case b[0]:
                case b[1]:
                case b[2]:
                case b[3]:
                    break;

                default:
                valid = false;
                error_message = "Отношения должно быть вида AjBj, AjBj, AjBj, AjBj";
            }
        }
    }
    else {
        error_message = "Не должно быть ни одного пустого поля!"
        valid = false;
    }
    return valid;
}

//основная функция
function rel() {
    let setA = document.getElementById('firstSet').value.trim();
    let setB = document.getElementById('secondSet').value.trim();
    let relat = document.getElementById('relationships').value.trim().split(', ');
    // массив из 0 для записи в него матрицы отношений
    let resultArray = [
        [0, 0, 0, 0], 
        [0, 0, 0, 0], 
        [0, 0, 0, 0], 
        [0, 0, 0, 0]
    ];
    let finalA = true;
    let finalB = true;
    if (validation(setA, setB, relat)) {
        setA = setA.split(' ');
        setB = setB.split(' ');
        // построение матрицы отношений
        for (let i = 0; i < relat.length; i++){
            // проверка каждого элемента из матрицы отношений на наличие в множествах A и B
            if (Array.from(setA).indexOf(relat[i][0]) >= 0 && Array.from(setB).indexOf(relat[i][1]) >= 0) {
                // ставим 1 на пересечении
                resultArray[Array.from(setA).indexOf(relat[i][0])][Array.from(setB).indexOf(relat[i][1])] = 1;
            }
        }
        // подсчет суммы в строках для определения функций
        let sumA = 0;
        let sumB = 0;
        for (let i = 0; i < resultArray.length; i++){
            sumA = 0;
            sumB = 0;
            for (let j = 0; j < resultArray[i].length; j++){
                sumA += resultArray[i][j];
                sumB += resultArray[j][i];
            }
            // если сумма != 1, то это не функция
            if (sumA != 1) {
                finalA = false;
            }
            if (sumB != 1) {
                finalB = false;
            }
        }
        // вывод матрицы отношений
        for (let i = 1; i < resultArray.length + 1; i++){
            document.getElementById('results' + i).innerHTML = resultArray[i - 1].join('');
        }
        // вывод сообщений о функциях
        if (finalA) {
            document.getElementById('AB').innerHTML = "Отношение является функцией (A к B)";
        }
        else {
            document.getElementById('AB').innerHTML = "Отношение не является функцией (A к B)";
        }
        if (finalB) {
            document.getElementById('BA').innerHTML = "Отношение является функцией (B к A)";
        }
        else {
            document.getElementById('BA').innerHTML = "Отношение не является функцией (B к A)";
        }
    }
    else {
        alert(error_message);
    }
}