//console.log("Hola mundo");

const RUTA_URL = "http://localhost";

/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */

window.addEventListener("resize", function() {
    if (window.matchMedia("(min-width: 800px)").matches) {
        display_nav(true);
    } else {
        
    }
});


function display_nav(auto = false) {
    navRV = document.getElementById("responsive-nav");

    if (auto == true){
        navRV.style.display="none";
    } else {

        if (navRV.style.display == "none"){
            navRV.style.display="block";
        } else {
            navRV.style.display="none";
        }
    }
}

// POPOVERS

function show_progress(block){

    for (let i = 1; i<= 5; i++){

        if (document.getElementById("progreso"+i).style.display == "inherit"){
            document.getElementById("progreso"+i).style.display = "none";
        } else if (block == i){
            document.getElementById("progreso"+block).style.display = "inherit";
        }
    }
}

// EVENTO DISPLAY SYMBOLS

function read_symbl(elemen){
    
    texto = elemen.value;

    let rule = "{";
    let endRule = "}";
   
    texto = replaceAll(texto, rule, '<i><img src="'+RUTA_URL+'/img/symbol/');
    //console.log(texto);
    texto = replaceAll(texto, endRule, '32x.ico" height="16px" width="16px"></img></i>');
    //console.log(texto);
   
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
            document.getElementById(item+"Input"+actual).removeAttribute("checked");
            break;
        }
    }

    // Determina si hay que dibujar o borrar
    if (n == actual) {
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

let alreadyOpen = false;
// ANIMACION PARA ABRIR EL MENU ARQUITECTO
function openArquitect(open){


    let menuTimer = null;
    let elem = document.getElementById("menu_arquitecto");
    let elemRPV = document.getElementById("menu_arquitecto_rpv");
    let btn = document.getElementById("rule_arquitecto");
    let pos = 0;
    clearInterval(menuTimer);

    if (open == true){
        pos = -300;
        
        if (alreadyOpen == true){
            openPerfil(false);
        }

        elemRPV.style.zIndex = 50;
        btn.style.zIndex = 60;

        menuTimer = setInterval(plusFrame, 0.1);
        document.getElementById("open_arquitecto").setAttribute("onclick", "openArquitect(false);");
        alreadyOpen = true;
    } else {
        pos = 0;

        elemRPV.style.zIndex = -5;
        btn.style.zIndex = 10;

        menuTimer = setInterval(minuFrame, 0.1);
        document.getElementById("open_arquitecto").setAttribute("onclick", "openArquitect(true);");
        alreadyOpen = false;
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
    let elemRPV = document.getElementById("menu_perfil_rpv");
    let btn = document.getElementById("rule_perfil");
    let pos = 0;
    clearInterval(menuTimer);

    if (open == true){
        pos = -300;
        if (alreadyOpen == true){
            openArquitect(false);
        }
        
        elemRPV.style.zIndex = 50;
        btn.style.zIndex = 60;

        menuTimer = setInterval(plusFrame, 0.1);
        document.getElementById("open_perfil").setAttribute("onclick", "openPerfil(false);");
        alreadyOpen = true;

    } else {
        pos = 0;

        elemRPV.style.zIndex = -5;
        btn.style.zIndex = 10;

        menuTimer = setInterval(minuFrame, 0.1);
        document.getElementById("open_perfil").setAttribute("onclick", "openPerfil(true);");
        alreadyOpen = false;
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

// FUNCION PARA ACTUALIZAR MUNDO SELECCIONADO

function swap_world(){
    let elem = document.getElementById("mundo_select");
    let imgPick = elem.options[elem.selectedIndex].getAttribute("name");
    document.getElementById("mundo_img").setAttribute("src", RUTA_URL+"/img/iconos/"+imgPick);
}

// FUNCION PARA ACTUALIZAR RAREZA SELECCIONADO

function swap_ring(){
    let elem = document.getElementById("rareza_select");
    let colorPick = elem.options[elem.selectedIndex].getAttribute("name");
    document.getElementById("rare_ring").style.backgroundColor = colorPick;
}

// FUNCIONES AJAX RELATED PARA MANIOBRAR RELACCIONES

function prepare_unk(data, subject=""){


    if (subject == "historia"){
        objeto = "desvinculados";
    } else {
        objeto = "desconocidos";
    }


    let unklt = document.getElementById(objeto+"_lista");

    unklt.innerHTML = "";

    for(i = 0; i < data[objeto].length; i++){
        arraySon = Object.values(data[objeto][i]);

        let newBox = document.createElement("div");
        newBox.classList.add("unk-box");
        newBox.setAttribute("id", "unkBox"+arraySon[0]);

        let newBoxImg = document.createElement("div");
        newBoxImg.classList.add("unk-imgs");

        let divImg = document.createElement("div");
        divImg.classList.add("unk-show");

        let newImg = document.createElement("img");
        newImg.setAttribute("src", RUTA_URL + "/img/iconos/" + arraySon[2]);
        
        divImg.appendChild(newImg);
        newBoxImg.appendChild(divImg);

        divImg = document.createElement("div");
        divImg.classList.add("world-show");

        newImg = document.createElement("img");
        newImg.setAttribute("src", RUTA_URL + "/img/iconos/" + arraySon[3]);

        divImg.appendChild(newImg);
        newBoxImg.appendChild(divImg);

        
        divInfo = document.createElement("div");
        divInfo.classList.add("unk-info");

        newh4 = document.createElement("h4");
        let text = document.createTextNode(arraySon[1]);
        newh4.appendChild(text);

        divInfo.appendChild(newh4);

        let newButton = document.createElement("button");
        newButton.setAttribute("type", "button");
        if (subject == "historia"){
            newButton.setAttribute("onclick", "add_relaccion("+arraySon[0]+", 1);");
        } else {
            newButton.setAttribute("onclick", "add_conocido("+arraySon[0]+", 1);");
        }
        
        newButton.innerHTML = '<i class="fa fa-plus"></i> Añadir';


        divInfo.appendChild(newButton);

        newBox.appendChild(newBoxImg);
        newBox.appendChild(divInfo);
        unklt.appendChild(newBox);

        //alert(arraySon);

    }
}

function prepare_knw(data){
    let knwlt = document.getElementById("conocidos_lista");

    knwlt.innerHTML = "";

    for(i = 0; i < data["conocidos"].length; i++){
        arraySon = Object.values(data["conocidos"][i]);

        let newBox = document.createElement("div");
        newBox.classList.add("knw-box");
        newBox.setAttribute("id", "knwBox"+arraySon[0]);

        let divImg = document.createElement("div");
        divImg.classList.add("knw-show");

        let newImg = document.createElement("img");
        newImg.setAttribute("src", RUTA_URL + "/img/iconos/" + arraySon[2]);
        
        divImg.appendChild(newImg);
        newBox.appendChild(divImg);

        divInfo = document.createElement("div");
        divInfo.classList.add("knw-info");

        newh4 = document.createElement("h4");
        let text = document.createTextNode(arraySon[1]);
        newh4.appendChild(text);

        newInput = document.createElement("input");
        newInput.setAttribute("value", arraySon[0]);
        newInput.setAttribute("name", "conocido[]");
        newInput.setAttribute("hidden", "true");

        divInfo.appendChild(newh4);
        divInfo.appendChild(newInput);

        let newArea = document.createElement("textarea");
        newArea.setAttribute("name", "motivo[]");
        newArea.setAttribute("placeholder", "¿Por que se conocen?");
        newArea.innerText = arraySon[3];

        divInfo.appendChild(newArea);

        let newButton = document.createElement("button");
        newButton.setAttribute("type", "button");
        newButton.setAttribute("onclick", "add_conocido("+arraySon[0]+", 0);");
        newButton.innerHTML = '<i class="fa fa-minus"></i> Quitar';

        divInfo.appendChild(newButton);

        newBox.appendChild(divInfo);
        knwlt.appendChild(newBox);

        //alert(arraySon);

    }

}

// AÑADIR IMAGEN AL FORM de EXTRAVIADO

function load_img( iconoN = "icono_default"){

    let imgName = iconoN+".jpg";

    document.getElementById("icon_img").setAttribute("src", RUTA_URL+"/img/iconos/"+imgName);
    document.getElementById("imagen_input").setAttribute("value", imgName);
}

// CREAR LA LISTA DE ELEMENTOS

function prepare_activadores(data){
    let actlt = document.getElementById("activadores_lista");

    actlt.innerHTML = "";

    for(i = 0; i < data["arquetipo"].length; i++){
        arraySon = Object.values(data["arquetipo"][i]);

        let newBox = document.createElement("div");
        newBox.classList.add("knw-box");
        newBox.setAttribute("id", "knwBox"+arraySon[0]);

        let divImg = document.createElement("div");
        divImg.classList.add("activator-show");

        let newImg = document.createElement("img");
        newImg.setAttribute("src", RUTA_URL + "/img/iconos/" + arraySon[2]);
        
        divImg.appendChild(newImg);
        newBox.appendChild(divImg);

        divInfo = document.createElement("div");
        divInfo.classList.add("knw-info");

        newh4 = document.createElement("h4");
        let text = document.createTextNode(arraySon[1]);
        newh4.appendChild(text);

        newInput = document.createElement("input");
        newInput.setAttribute("value", arraySon[0]);
        newInput.setAttribute("name", "conocido[]");
        newInput.setAttribute("hidden", "true");

        divInfo.appendChild(newh4);
        divInfo.appendChild(newInput);


        newInput = document.createElement("input");
        newInput.setAttribute("name", "cantidad[]");
        newInput.setAttribute("placeholder", "cantidad");
        newInput.classList.add("form-control");
        if (arraySon[3] != "recurso" && arraySon[3] != "stat"){
            newInput.setAttribute("hidden", "true");
            newInput.setAttribute("value", "0");
        }
        newInput.innerText = arraySon[3];

        divInfo.appendChild(newInput);

        let newButton = document.createElement("button");
        newButton.setAttribute("type", "button");
        newButton.setAttribute("onclick", "remove_activador("+arraySon[0]+");");
        newButton.innerHTML = '<i class="fa fa-minus"></i> Quitar';

        divInfo.appendChild(newButton);

        newBox.appendChild(divInfo);
        actlt.appendChild(newBox);

        //alert(arraySon);

    }
}

function remove_activador(id){
    document.getElementById("knwBox"+id).remove();
}
