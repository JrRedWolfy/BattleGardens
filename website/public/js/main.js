//console.log("Hola mundo");

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
}


function mesa_arquitecto() {
    var x = document.getElementById("architect_table");
    if (x.className === "hide") {
        x.classList.remove("hide");
      x.className += "show";
    } else {
      x.className = "hide";
    }
}

function read_symbl(elemen){

    var RUTA_URL = "http://localhost/battlegardens/website";
    
    texto = elemen.value;

    let rule = "{";
    let endRule = "}";
   
    texto = replaceAll(texto, rule, '<i><img src="'+RUTA_URL+'/img/symbol/');
    console.log(texto);
    texto = replaceAll(texto, endRule, '32x.ico" height="16px" width="16px"></img></i>');
    console.log(texto);
   
    document.getElementById("resultado").innerHTML = texto;

}

function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}


function set_stat(rate){

    draw = true;
    n = parseInt(rate.getAttribute("value"));

    actual = document.getElementsByClassName("star checked");
    if (actual.length == n){
        draw = false;
    }

    item = rate.getAttribute("name");
    lista = document.getElementsByName(item);
    lista.forEach(stat => {
        stat.classList.remove("checked");
        stat.removeAttribute("checked");
    });

    if (draw){
        for(let i = 1; i <= n; i++){
            document.getElementById(item+i).classList.add("checked");
        }
        document.getElementById(item+"Input"+n).setAttribute("checked", true);
    }
}