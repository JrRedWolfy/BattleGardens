// ACCESIBILIDAD STUFF

async function fetch_color(elem){

    // Tomamos el color selected
    let colorPick = elem.options[elem.selectedIndex].value;
   
    document.body.classList.add(colorPick);
    // Actualizamos datos de Usuario
    await fetch(RUTA_URL+`/site/set_Pcolor/`+colorPick, {
        method: "GET",
    })
    .then((resp) => resp.json())
    .then(function(data) {
      if(data){

        arraySon = Object.values(data["accesibilidad"]);
        // Actualizamos Css
        document.body.classList.remove(arraySon[0]);
        
      } else {
        alert("Ha surgido un error inesperado");
      }
    })
}

async function fetch_letra(elem){

    // Tomamos el tamaño selected
    let sizePick = elem.options[elem.selectedIndex].value;

    // Actualizamos datos de Usuario
    await fetch(RUTA_URL+`/site/set_Psize/`+sizePick, {
        method: "GET",
    })
    .then((resp) => resp.json())
    .then(function(data) {
      if(data){

        // Actualizamos Css
        document.body.removeAttribute('class');

        arraySon = Object.values(data["accesibilidad"][i]);
        for(i = 0; i < arraySon.length; i++){
            cuerpo.classList.add(arraySon[i]);
        }

      } else {
        alert("Ha surgido un error inesperado");
      }
    })
}