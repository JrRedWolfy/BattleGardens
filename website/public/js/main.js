//console.log("Hola mundo");
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
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
    item = rate.getAttribute("name");
    n = parseInt(rate.getAttribute("value"));
    lista = document.getElementsByName(item);
    draw = true;


    for (let b = 4; 4 >= 0; b--){
        if (lista[b].getAttribute("class", "star checked")){
            lista[b].removeAttribute("checked");
            actual = b;
            draw = false;
            break;
        }
    }

    if (n == actual) {
        alert("como??" + n + actual);
        draw = false;
    }
    

    if (draw){
        for(let i = 1; i <= n; i++){
            document.getElementById(item+i).classList.add("checked");
        }
        document.getElementById(item+"Input"+n).setAttribute("checked", true);
    }
}