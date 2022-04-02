var error_message = "";
// Функция валидации
function validation(firstSet, secondSet, relation) {
    let a = firstSet.split(' ');
    let b = secondSet.split(' ');
    let rel = relation;
    let valid = true;
    if(firstSet.length > 0 && secondSet.length > 0 && relation.length > 0) {
        if(a.length != 4 || b.length != 4) {
            error_message = "Размер множеств должен быть равен четырём элементам!"
            valid = false;
        }
        for(let i = 0; i < rel.length; i++) {
            if(rel.length != 4) {
                error_message = "Размер матрицы отношения должен иметь длину А + B!"
                valid = false;
                break;
            }
            if(rel[i].length != 2) {
                error_message = "Размер элемента должен быть равен 2!"
                valid = false;
                break;
            }
            switch (rel[i][0]) {
                case a[0]:
                case a[1]:
                case a[2]:
                case a[3]:
                    break;
                    
                default:
                valid = false;
                error_message = "Не хватает элементов множества А!";
            }
            switch (rel[i][1]) {
                case b[0]:
                case b[1]:
                case b[2]:
                case b[3]:
                    break;

                default:
                valid = false;
                error_message = "Не хватает элементов множества B!";
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
    let setA = document.getElementById('firstSet').value;
    let setB = document.getElementById('secondSet').value;
    let relat = document.getElementById('relationships').value.split(',');
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
        for (let i = 0; i < relat.length; i++){
            if (Array.from(setA).indexOf(relat[i][0]) >= 0 && Array.from(setB).indexOf(relat[i][1]) >= 0) {
                resultArray[Array.from(setA).indexOf(relat[i][0])][Array.from(setB).indexOf(relat[i][1])] = 1;
            }
        }
        let sumA = 0;
        let sumB = 0;
        for (let i = 0; i < resultArray.length; i++){
            sumA = 0;
            sumB = 0;
            for (let j = 0; j < resultArray[0].length; j++){
                sumA += resultArray[i][j];
                sumB += resultArray[j][i];
            }
            if (sumA != 1) {
                finalA = false;
            }
            if (sumB != 1) {
                finalB = false;
            }
        }
        for (let i = 1; i < resultArray.length + 1; i++){
            document.getElementById('results' + i).innerHTML = resultArray[i - 1].join('');
        }
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