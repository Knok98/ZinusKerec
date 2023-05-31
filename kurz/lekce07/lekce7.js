console.log("Ahoj světe");
console.log(10+20);
let number=10;
console.log(number);


let name;
let surName;
let fullName;

let text ="Praha Cooding School";
let vysledek =text.replace("Cooding","COODING");
console.log(vysledek);

text=text.split(" ");
text.reverse();
console.log(text.join(" "));

let vypsat=prohod(true,"Praha Cooding School");
prohod(false,"Praha Cooding School");

function prohod(opravdu,text){
    if(opravdu==true){
        let pole=text.split();
        pole.reverse();
    return pole.join(" ");
    }
    else{
        return text;
    }
}
zaznam(200,"vse je ok")
zaznam(300,"probiha aktualizace")
zaznam(400,"neco se nepovedlo")
function zaznam(x,message){
    let today=new Date;
    message=message+": "+today.getDay()+" " +today.getMonth()+" "+today.getFullYear()
    switch(x,message){
        case 200:
            console.error(message);
            breakl; 
            
        case 300:
            console.warn(message);
            breakl;
        case 400:
            console.log(message);
            breakl;
        default:
            console.log("Undefined error "+message);



    }
   
    

}
function check(x){
    let y=new Date;
    y=y.getDate();
    if(x--)
}
function Vypiscislo(x){
    if(x<10)
    return console.log("Ucet je stary "+x+" roky");
    else{}
}

let today=new Date();
console.log(today.getFullYear());
prohod(true,"Praha Cooding School");

