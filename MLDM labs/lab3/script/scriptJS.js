var error_message = "";
// Функция валидации
function validation(firstSet, secondSet, relation) {
    let a = firstSet.split(' ');
    let b = secondSet.split(' ');
    let rel = relation.split(', ');
    let valid = true;
    if(firstSet.length > 0 && secondSet.length > 0 && relation.length > 0) {
        if(a.length != 4 || b.length != 4) {
            error_message = "Размер множеств должен быть равен четырём элементам!"
            valid = false;
        }
        for(let j = 0; j < rel.length; j++) {
            if(rel.length != 4) {
                error_message = "Размер матрицы отношения должен иметь длину А + B!"
                valid = false;
                break;
            }
            if(!(rel[j][0] == a[0] || rel[j][0] == a[1] || rel[j][0] == a[2] || rel[j][0] == a[3])) {
                error_message = "Не хватает элементов множества А!";
                valid = false;
                break;
            } 
            if(!(rel[j][1] == b[0] || rel[j][1] == b[1] || rel[j][1] == b[2] || rel[j][1] == b[3])) {
                error_message = "Не хватает элементов множества B!";
                valid = false;
                break;
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
    let setA = document.getElementById('firstSet');
    let setB = document.getElementById('secondSet');
    let relation = document.getElementById('relationships');
    let resultArray = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
    let res = true;
    if (!(validation(setA.value, setB.value, relation.value))) {
        alert(error_message);
    }
}