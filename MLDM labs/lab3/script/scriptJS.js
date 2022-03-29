var error_message = "";
// Функция валидации
function validation(firstSet, secondSet, relation) {
    let a = firstSet.split(' ');
    let b = secondSet.split(' ');
    let rel = relation.split(', ');
    let valid = true;
    if(firstSet.length > 0 && secondSet.length > 0 && relation.length > 0) {
        if(a.length != 4) {
            error_message = "Размер первого множества должен быть равен четырём!"
            valid = false;
        }
        if(b.length != 4) {
            error_message = "Размер второго множества должен быть равен четырём!"
            valid = false;
        }
        if(rel.length != 4) {
            error_message = "Размер матрицы отношения должен иметь длину А + B!"
            valid = false;
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
    let setA = document.getElementById('firstSet');
    let setB = document.getElementById('secondSet');
    let relation = document.getElementById('relationships');
    let resultArray = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
    let res = true;
    if (validation(setA.value, setB.value, relation.value)) {
        
    }
    else {
        alert(error_message);
    }
    // if (!(validation(setA.value, setB.value, relation.value))) {
    //     alert(error_message);
    // }
}