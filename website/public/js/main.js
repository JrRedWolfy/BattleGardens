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
            alert("deseleccionar: " + actual);
            document.getElementById(item+"Input"+actual).removeAttribute("checked");
            break;
        }
    }

    // Determina si hay que dibujar o borrar
    if (n == actual) {
        alert("No se dibuja");
        draw = false;
        document.getElementById(item+"Input0").setAttribute("checked", true);
    } else {
        document.getElementById(item+"Input0").removeAttribute("checked");
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

// ANIMACION PARA ABRIR EL MENU ARQUITECTO
function openArquitect(open){



    let menuTimer = null;
    let elem = document.getElementById("menu_arquitecto");
    let btn = document.getElementById("rule_arquitecto");
    let pos = 0;
    clearInterval(menuTimer);

    if (open == true){
        pos = -300;
        

        menuTimer = setInterval(plusFrame, 0.1);
        document.getElementById("open_arquitecto").setAttribute("onclick", "openArquitect(false);");

    } else {
        pos = 0;

        menuTimer = setInterval(minuFrame, 0.1);
        document.getElementById("open_arquitecto").setAttribute("onclick", "openArquitect(true);");
    }

    function minuFrame() {
        
        if (pos <= -300) {
        clearInterval(menuTimer);
        } else {
            
        pos = pos - 4;
        elem.style.left = pos + "px";
        posBtn = parseInt(pos)+300;
        btn.style.left = posBtn + "px";
        }
    }

    function plusFrame() {
        if (pos >= 0) {
        clearInterval(menuTimer);
        } else {
        pos = pos + 4;
        elem.style.left = pos + "px";
        posBtn = parseInt(pos)+300;
        btn.style.left = posBtn + "px";
        }
    }
}

function openPerfil(open){



    let menuTimer = null;
    let elem = document.getElementById("menu_perfil");
    let btn = document.getElementById("rule_perfil");
    let pos = 0;
    clearInterval(menuTimer);

    if (open == true){
        pos = -300;
        

        menuTimer = setInterval(plusFrame, 0.1);
        document.getElementById("open_perfil").setAttribute("onclick", "openPerfil(false);");

    } else {
        pos = 0;

        menuTimer = setInterval(minuFrame, 0.1);
        document.getElementById("open_perfil").setAttribute("onclick", "openPerfil(true);");
    }

    function minuFrame() {
        
        if (pos <= -300) {
        clearInterval(menuTimer);
        } else {
            
        pos = pos - 4;
        elem.style.right = pos + "px";
        posBtn = parseInt(pos)+300;
        btn.style.right = posBtn + "px";
        }
    }
    
    function plusFrame() {
        if (pos >= 0) {
        clearInterval(menuTimer);
        } else {
        pos = pos + 4;
        elem.style.right = pos + "px";
        posBtn = parseInt(pos)+300;
        btn.style.right = posBtn + "px";
        }
    }
}