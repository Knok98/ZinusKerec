function hodiny() {
    const date = new Date();
    let vysledek = date.getHours() + " h " + date.getMinutes() + " min " + date.getSeconds() + " sec";
    document.getElementById("result").innerHTML = vysledek;
    refresh();
}

//setTimeout slouzi k opetovnemu volani funkce v urcitem casovem horizontu v milisekundach
function refresh() {
    let ref=1000;
    mytime = setTimeout("hodiny()", ref);
}



function kalk(button) {
    let x = parseFloat(document.getElementById("x").value);
    let y = parseFloat(document.getElementById("y").value);
    let operator = document.getElementById("operator").value;
    let result = null;
    switch (operator) {
        case "+":
            result = x + y;
            break;
        case "-":
            result = x - y;
            break;
        case "*":
            result = x * y;
            break;
        case "/":
            result = x / y;
            break;
        case "%":
            result = x % y;
            break;
        default:
            alert("Enter valid operator");
    }
    document.getElementById("calcRes").innerHTML = result;
    button.style.display="none";
}