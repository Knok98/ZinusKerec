function doplnit(){
    let inputcislo=document.getElementById("cislo");
    if(inputcislo.value.search("@")==-1){
        inputcislo.value=inputcislo.value+"@"
    }
}
function showResult(){
    let spanResult
}