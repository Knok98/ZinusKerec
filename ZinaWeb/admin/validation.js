function validity() {
    let password = document.getElementById('password').value;
    if (password.length() > 8) {
        if (elements(password)) {
            document.getElementById('msg').innerHTML = 'Heslo musí obsahovat velká, malá písmena a čísla';
        }
        else { document.getElementById('msg').innerHTML = ''; }
    } else { document.getElementById('msg').innerHTML = 'Heslo musí obsahovat více jak 8 znaků '; }
}

function rewind() {
    let password = document.getElementById('password').value;
    let passwordRew = document.getElementById('rewind').value;
    if (password === passwordRew) {
        document.getElementById('submit').removeAttribute('disabled');
    }
    else { document.getElementById('msg').innerHTML = 'Hesla se neschoduji'; }
}

function elements(str){
    let pattern = new RegExp(
        "^(?=.*[a-z])(?=.*[A-Z])(?=,*\\d).+$"
    );
    return pattern.test(str);
}