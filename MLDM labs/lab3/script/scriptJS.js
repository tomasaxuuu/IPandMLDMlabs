var error_message = "";
// Функция валидации
function validation(firstSet, secondSet, relation) {
    let a = firstSet.split(' ');
    let b = secondSet.split(' ');
    let rel = relation.split(' ');
    let valid = true;
    if(firstSet.length > 0 && secondSet.length > 0 && relation.length > 0) {
        for (let i = 0; i < a.length; i++){
            if(a[i].length != 4) {
                error_message = "Размер первого множества должен быть равен четырём!"
                valid = false;
            }
        }
        for (let i = 0; i < b.length; i++){
            if(b[i].length != 4) {
                error_message = "Размер второго множества должен быть равен четырём!"
                valid = false;
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
    if (!(validation(setA.value, setB.value, relation.value))) {
        alert(error_message);
    }
}