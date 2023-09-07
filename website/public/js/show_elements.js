let listado = []; // Variable donde se guardan los datos (Es global para todas las hojas JS)
let arrayMaestro = []; // Array de Soporte para no alterar los datos Originales
let nItems = 4; // Numero de Elementos mostrados en cada Pagina
let rol = 0;
let url= "";
let indicador = "";

// Funcion que toma el array de objetos obtenido por PHP
function caja_fuerte(arrayElementos, permiso, direccion, indicar){
  url=direccion;

  indicador = indicar;
  
  rol = permiso;
  
  listado = arrayElementos.slice();
}

function busqueda(){ // A cualquier cambio en la busqueda se llama a esta funcion
  arrayMaestro = listado.slice();

  console.log(arrayMaestro);

  if(document.getElementById("filter_controller") != ""){
    filtrar(); // Primero se filtra el array
  }

  if(document.getElementById("buscador").value.trim() != ""){
    buscar(); // Entonces se compara el resultado 
  }

  //ordenar();  Entonces se ordenan los items
  

  page_maker();
  listar_elementos();// Por ultimo se paginan los resultados
  // Se le envia con un parametro falso indicando que no es una ejecucion automatica. La cual se hace al cargar la pagina
  //actual_page = parseInt(document.getElementById("page_controller").value)+1;
  //document.getElementById("page_"+actual_page).classList.add("active_page");
}





// Funcion que segmenta el array dependiendo de el numero de elementos que queramos mostrar en cada pagina.
function lista_page(page){
  let chunk = [];

  for (i = 0; i < nItems; i++){
    if (arrayMaestro[parseInt(page*nItems)+i] != null){
      chunk.push(arrayMaestro[parseInt(page*nItems)+i]);
    } else {
      break;
    }
  }
  return chunk;
}

function listar_elementos(){ 

  

  document.getElementById("contenido_panel").innerHTML = "";

  let elemen = document.getElementById("page_controller");
  page = elemen.value;
  arrayActual = lista_page(page);

  item = elemen.name;


  // DE AQUI EN ADELANTE TODO ESTA CORRECTO

  


  for(n = 0; n < arrayActual.length; n++){

    

    arraySon = Object.values(arrayActual[n]);

    //alert(arraySon);

    let divBox = document.createElement("div");
    divBox.classList.add("cajabase");


    let divProgreso = document.createElement("div");
    divProgreso.classList.add("cajalateral");
    divProgreso.setAttribute("style", "background-color: " + arraySon[5] + "; border: 2px solid #0000009a;");

    //style=" color: red; "

    let divMain = document.createElement("div");
    divMain.classList.add("cajamain");


    let divTitulo = document.createElement("div");
    divTitulo.classList.add("cajatitulo");
    let text = document.createTextNode("#" + arraySon[0] + " | " + arraySon[1]);
    divTitulo.appendChild(text);


    let divInfo = document.createElement("div");
    divInfo.classList.add("cajainfo");

    let newUl = document.createElement("ul");
    let newLi = document.createElement("li");
    text = document.createTextNode("Creador: " + arraySon[2]);
    newLi.appendChild(text);
    newUl.appendChild(newLi);

    newLi = document.createElement("li");
    text = document.createTextNode("Año: " + arraySon[3]);
    newLi.appendChild(text);
    newUl.appendChild(newLi);

    newLi = document.createElement("li");
    text = document.createTextNode("Progreso: " + arraySon[4]);
    newLi.appendChild(text);
    newUl.appendChild(newLi);

    divInfo.appendChild(newUl);

    let divBotones = document.createElement("div");
    divBotones.classList.add("cajabotones");


    let botonDelete = document.createElement("button");
    botonDelete.classList.add("cajaboton");
    botonDelete.setAttribute("data-bs-toggle", "modal");
    botonDelete.setAttribute("data-bs-target", "#confirmar_delete");
    botonDelete.setAttribute("onclick", "place_id(" + arraySon[0] + ", 'eliminar_elemento');");


    newI = document.createElement("i");
    newI.classList.add("fa", "fa-trash");

    botonDelete.appendChild(newI);


    let botonEdit = document.createElement("button");
    botonEdit.classList.add("cajaboton");

    let aEdit = document.createElement("a");
    aEdit.setAttribute("href", url + "/arquitecto/add_" + indicador + "/" + arraySon[0]);

    newI = document.createElement("i");
    newI.classList.add("fa", "fa-paint-brush");

    aEdit.appendChild(newI);
    botonEdit.appendChild(aEdit);

    let botonConfig = document.createElement("button");
    botonConfig.classList.add("cajaboton");

    newI = document.createElement("i");
    newI.classList.add("fa", "fa-cog");

    botonConfig.appendChild(newI);

    divBotones.appendChild(botonDelete);
    divBotones.appendChild(botonEdit);
    divBotones.appendChild(botonConfig);
      


    divMain.appendChild(divTitulo);
    divMain.appendChild(divInfo);

    divBox.appendChild(divProgreso);
    divBox.appendChild(divMain);
    divBox.appendChild(divBotones);

    document.getElementById("contenido_panel").appendChild(divBox);

  }
  
}


// Funcion que inserta los filtros escogidos en la caga de filtraje
function toggleFilter(filtro, ranura, tipo){

  // Comprobamos si ese filtro ya existe primero

  let filterBtns = document.getElementById("filter_controller").getElementsByTagName("button");
  //alert(filterBtns.length);
  //console.log(filterBtns);
  let exist = false;
  for (i = 0; i < filterBtns.length; i++){
    if (filterBtns[i].innerText == filtro){
      exist = true;
      break;
    }
  }

  // Lo introducimos si no existe

  if (exist == false){
    let text = document.createTextNode(filtro);
    let newButton = document.createElement("button");
    newButton.appendChild(text);
    newButton.setAttribute("name", ranura);
    newButton.setAttribute("onclick", "removeFilter(this);")
    newButton.classList.add("filter_button", tipo);
  
    document.getElementById("filter_controller").appendChild(newButton);
  }
}

// Funcion para remover un filtro indeseado
function removeFilter(element){
  element.remove();
}

// FUNCION para filtrar por categorias los distintos elementos (Funcion: 100%)
function filtrar(){ 

  filtros = document.getElementById("filter_controller").getElementsByTagName('button');

  // Filtrar Autor, entonces fecha, entonces progreso (O ++ Y)

  let filtroAutor = [];
  let filtroFecha = [];
  let filtroProgreso = [];
  let filtrarSon = [];

  // Recogemos los filtros en arrays divididos por categoria
  for (n = 0; n < filtros.length; n++){
    arrayFiltro = [filtros[n].innerHTML, filtros[n].name];
    switch (filtros[n].name){
      case "2":
        
        filtroAutor.push(arrayFiltro);
        break;
      case "3":
        filtroFecha.push(arrayFiltro);
        break;
      case "4":
        filtroProgreso.push(arrayFiltro);
        break;
    }
  }

  for (i = 1; i <= 3; i++){
    if ((i == 1 && filtroAutor.length == 0)||(i == 2 && filtroFecha.length == 0)||(i == 3 && filtroProgreso.length == 0)){
      // Evitamos descartar ningun elemento cuando no hay filtras para X categoria
    } else {
      for (n = 0; n < arrayMaestro.length; n++){
        arraySon = Object.values(arrayMaestro[n]);
        check = false;
  
        switch (i){
          case 1:
            for (s = 0; s < filtroAutor.length; s++){
              filtrarSon = Object.values(filtroAutor[s]);
              if (arraySon[filtrarSon[1]] == filtrarSon[0]){
                check = true;
                break;
              }
            }
            break;
          case 2:
            for (s = 0; s < filtroFecha.length; s++){
              filtrarSon = Object.values(filtroFecha[s]);
              if (arraySon[filtrarSon[1]] == filtrarSon[0]){
                check = true;
                break;
              }
            }
            break;
          case 3:
            
            for (s = 0; s < filtroProgreso.length; s++){
              filtrarSon = Object.values(filtroProgreso[s]);
              if (arraySon[filtrarSon[1]] == filtrarSon[0]){
                check = true;
                break;
              }
            }
            break;
        }
    
        if (check == false) {
          arrayMaestro.splice(n, 1);
          n = n-1;
        }
      }
    }
  }
}

// Este trozo de codigo se encarga de eliminar cualquier tilde no deseada de la busqueda para que resulte mas comodo
const quitarEspeciales = (str) => {
  return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}


// FUNCION para buscar por el nombre o id de los distintos elementos (Funcion: 100%)
function buscar(){

  search = quitarEspeciales(document.getElementById("buscador").value.toUpperCase().trim()); // Toma el contenido del buscador y lo reescribe en mayusculas y sin caracteres especiales para hacer la posterior Comparacion

  if (search != ""){ // Comprueba que se este buscando algo
    for (i = 0; i < arrayMaestro.length; i++){
      arraySon = Object.values(arrayMaestro[i]);
      
      // Si tu busqueda es por el id, puede hacerse añadiendo un # al principio de la busqueda
      if (search.charAt(0) != "#"){
        nombre = quitarEspeciales(String(arraySon[1]).toUpperCase().trim());
      } else {
        nombre = "#" + quitarEspeciales(String(arraySon[0]).toUpperCase().trim());
      }

      if (nombre.indexOf(search) > -1){
        // Si lo encuentra no lo saca del grupo de resultados de busqueda
      } else {
        arrayMaestro.splice(i, 1);
        i = i-1;
      }
    }
  }
}

function ordenar(){
  // odenar arrayMaestro 

  // Obtenemos el dato y columna por el que se va a ordenar
  var order = document.getElementById("order_types").selectedIndex;
  var opciones = document.getElementById("order_types").options;
  let colum = 0;

  // Establecemos la columna segun la cual ordenamos
  switch (opciones[order].index){
    case 0:
      colum = 1; // Nombre
      break;
    case 1:
      colum = 2; // Autor
      break;
    case 2:
      colum = 6; // Fecha
      break;
  }



  // Obtenemos direccion
  cambio_dir();
  let direction = document.getElementById("boton_orden").name;
  let arrayOrden = [];

  for (i = 0; i < arrayMaestro.length; i++){
    if (i == 0){
      arrayOrden.push(arrayMaestro[i]);
    } else {
      arraySon = Object.values(arrayMaestro[i]);
      
      for (e = 0; e < arrayOrden.length; e++){
        arrayComparacion = Object.values(arrayOrden[e]); 
        // Hasta aqui bien
        let comparacion = [];
        let subject = "";

        if (colum == 6) {
          // Para fechas
          comparacion = [arrayComparacion[colum], arraySon[colum]];
          //alert(comparacion[0] + " comparando con " + comparacion[1]);
          subject = arraySon[colum];
          resultado = comparacion.sort();
          //alert(resultado[0] + " antes que " + resultado[1]);

        } else {
          // Para texto
          comparacion = [quitarEspeciales(arrayComparacion[colum].toUpperCase().trim()), quitarEspeciales(arraySon[colum].toUpperCase().trim())];
          
          subject = quitarEspeciales(arraySon[colum].toUpperCase().trim());
          resultado = comparacion.sort();
        }
        //alert(resultado[0] + " es igual a " + subject);
        
        if (resultado[0] == subject){
          //alert(subject + "Va antes que " + arrayComparacion[colum]);
          
          arrayOrden.splice(e, 0, arrayMaestro[i]); // El 0 es una instruccion que indica Insertar, si fuese un 1 entonces Reemplaza. La e indica el index el el que interactuar
          break;
        } else {
          if (e == arrayOrden.length-1){
            //alert(subject + "Va ultimo");
            arrayOrden.push(arrayMaestro[i]);
            
            e = e+1;
          }
        }
      }
    }
  }

  if (direction == "arriba"){
    arrayOrden = arrayOrden.reverse();
  }

  arrayMaestro = arrayOrden;

  console.log(arrayMaestro);


  //alert("Index: " + direction + "||" + opciones[order].index + " is " + opciones[order].value);
  
}

// Funcion COMPLEMENTARIA necesaria para el funcionamiento de la ordenacion; 
//el parametro indica si se esta reseteando el icono debido a algun cambio en el elemento por el cual ordenar
function cambio_dir(reset = false){
  let boton = document.getElementById("boton_orden");
  if (boton.name == "abajo" && reset != true){
    boton.name = "arriba";
    boton.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-sort-up-alt' viewBox='0 0 16 16'><path d='M3.5 13.5a.5.5 0 0 1-1 0V4.707L1.354 5.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 4.707V13.5zm4-9.5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z'/></svg>";
  } else {
    boton.name = "abajo";
    boton.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-sort-down' viewBox='0 0 16 16'><path d='M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z'/></svg>";
  }
}


function page_maker() {

  max = arrayMaestro.length%nItems;
  if (max == 0){
    max = Math.trunc(arrayMaestro.length/nItems);
  } else {
    max = Math.trunc(arrayMaestro.length/nItems)+1;
  }

  document.getElementById("page_panel").innerHTML ="";

  let newBtn = document.createElement("button");

  if ((max > 1)&&(arrayMaestro.length > nItems)){
    newBtn.classList.add("boton_pag");
    newBtn.id = "page_a";
    newBtn.setAttribute("onclick", 'anterior()');
    newBtn.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-left-fill' viewBox='0 0 16 16'><path d='m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z'/></svg>";
    document.getElementById("page_panel").appendChild(newBtn);

    // Creamos Paginas
    for(i = 1; i <= max; i++){ // PROBLEMAS FUTUROS CON GO_PAGE ESPERADOS
      newBtn = document.createElement("button");
      newBtn.classList.add("boton_pag");
      newBtn.setAttribute("name", i);
      newBtn.id = "page_" + i;
      newBtn.setAttribute("onclick", 'go_page(this)');
      newBtn.innerText = i;
      document.getElementById("page_panel").appendChild(newBtn);
    }

    newBtn = document.createElement("button");
    newBtn.classList.add("boton_pag");
    newBtn.id = "page_s";
    newBtn.setAttribute("onclick", 'siguiente()');
    newBtn.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-right-fill' viewBox='0 0 16 16'><path d='m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z'/></svg>";
    document.getElementById("page_panel").appendChild(newBtn);


  }

  document.getElementById("page_controller").value = "0";
  control_paginacion();
}

function control_paginacion(){
  max = arrayMaestro.length%nItems;
  if (max == 0){
    max = Math.trunc(arrayMaestro.length/nItems);
  } else {
    max = Math.trunc(arrayMaestro.length/nItems)+1;
  }

  page = document.getElementById("page_controller").value;
  
  // Desabilitar Siguiente
  if ((max > 1)&&(arrayMaestro.length > nItems)){
    if(page == max-1){
      document.getElementById("page_s").classList.add("outrange");
    } else {
      document.getElementById("page_s").classList.remove("outrange");
    }
  
    // Desabilitar Anterior
    if(page == 0){
      document.getElementById("page_a").classList.add("outrange");
    } else {
      document.getElementById("page_a").classList.remove("outrange");
    }
  }
}

function clean_pages(lastPage, newPage){
  // Limpiar anterior
  document.getElementById("page_" + lastPage).classList.remove("active_page");

  // Poner nueva
  document.getElementById("page_" + newPage).classList.add("active_page");
}

function go_page(elemen){

  lastPage = parseInt(document.getElementById("page_controller").value)+1;
  clean_pages(lastPage, elemen.name);

  page = parseInt(elemen.name)-1;
  //point_pages(pageLast, page);

  //clean_pages();
  

  document.getElementById("page_controller").value = page;
  
  listar_elementos();
  control_paginacion();

}


function siguiente(){

  page = document.getElementById("page_controller").value;
  page = parseInt(page)+1;

  clean_pages(page, parseInt(page+1));
  
  document.getElementById("page_controller").value = page;
  
  listar_elementos();
  control_paginacion();
}

function anterior(){

  page = document.getElementById("page_controller").value;
  clean_pages(parseInt(page)+1, page);

  page = parseInt(page)-1;

  

  document.getElementById("page_controller").value = page;
  
  listar_elementos();
  control_paginacion();
}