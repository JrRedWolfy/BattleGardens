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
    actual = 0;

    
    // Calcula el actual y lo deselecciona
    for (let b = 4; b >= 0; b--){
        if (lista[b].getAttribute("class") == "star checked"){
            actual = b+1;
            document.getElementById(item+"Input"+actual).setAttribute("checked", false);
            break;
        }
    }

    // Determina si hay que dibujar o borrar
    if (n == actual) {
        draw = false;
        document.getElementById(item+"Input0").setAttribute("checked", true);
    } else {
        document.getElementById(item+"Input0").setAttribute("checked", false);
    }


    // Borra las estrellas
    lista.forEach(stat => {
        stat.classList.remove("checked");
    });
    
    // Dibuja las estrellas hasta la seleccionada y aplica el check
    if (draw){
        for(let i = 1; i <= n; i++){
            document.getElementById(item+i).classList.add("checked");
        }
        document.getElementById(item+"Input"+n).setAttribute("checked", true);
    }

}

// MODALES PARA ELIMINAR FUNCION AUX

function place_id(id, item){
    document.getElementById(item).value = id;
}