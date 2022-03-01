var error_message = "";

function validation(mas) {
    let bool = true;
    if(mas.length > 0) {
        bool = mas.split('\n');
        for(let i = 0; i < bool.length; i++) {
            for(let j = 0; j < bool.length; j++) {
                if(bool[i][j] != '1' && bool[i][j] != '0') {
                    error_message = "В матрице могут быть только 0 и 1!";
                    bool = false;
                }
                if(bool.length != bool[i].length) {
                    error_message = "Матрица должна быть квадратной!";
                    bool = false;
                }
            }
        }
    }
   else  {
       error_message = "Поле не должно быть пустым!"
       bool = false;
   }
    return bool;
}
function sets() {
    var arr = document.getElementById('matrix');
    if ((validation(arr.value)) == false) {
        alert(error_message);
    }
}