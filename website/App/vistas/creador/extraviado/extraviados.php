<?php require_once RUTA_APP.'/vistas/inc/test_menu.php'?>
<div id="leyend_panel">
<a href="<?php echo RUTA_URL?>/arquitecto/add_extraviado"><button><i class="fa fa-plus"></i> Nuevo Extraviado</button></a>
</div>

<!-- Panel que contiene los filtros de busqueda -->
<div id="filter_panel">




  <div class="">

    <select name="ordenes" id="order_types" onchange="cambio_dir(true);">
      <option value="nombre" selected>Nombre</option>
      <option value="creador">Creador</option>
      <option value="fecha">Fecha</option>
    </select>
    <button id="boton_orden" type="button" class="btn" onclick="ordenar();" name="bajar">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
        <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
      </svg>
    </button>


    <input type="search" class="color_input" id="buscador" name="buscador" placeholder="Buscador" aria-label="Search" onkeyup="mod_show()">
    <button onclick="busqueda();"><i class="fa fa-search"></i></button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filter_modal">
      <i class="fa fa-filter"></i>
    </button>
  </div>

  <!-- Button trigger modal -->
  

    <?php ?>

    <!-- Paginacion -->
    <input disabled id="page_controller" name="extraviado" value="0" hidden>

    <div id="filter_controller"></div>
    <!-- Lista de Elementos -->
    
    <div id="contenido_panel" class="listacards">

    </div>

    <div id="page_panel">

    </div>
    

</div>


<!-- Modal -->
<div class="modal fade" id="filter_modal" tabindex="-1" aria-labelledby="filter_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Filtros</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
        <select name="filtros" id="filter_types">
            <option value="creador" selected>Creador</option>
            <option value="fecha">Fecha</option>
            <option value="progreso">Progreso</option>
        </select>

        <hr>

        <div class="options_panel">

          <div id=autor_area>
            <?php foreach($datos["fil_autor"] as $autor):?>
            <button class="filter_button" onclick="toggleFilter('<?php echo $autor->autor?>',5, 'autor_border')"><?php echo $autor->autor?></button>
            <?php endforeach ?>
          </div>

          <div id=fecha_area>
            <?php foreach($datos["fil_fecha"] as $fecha):?>
            <button class="filter_button" onclick="toggleFilter('<?php echo $fecha->fecha?>',3, 'fecha_border')"><?php echo $fecha->fecha?></button>
            <?php endforeach ?>
          </div>

          <div id=progeso_area>
            <?php foreach($datos["fil_progreso"] as $progreso):?>
            <button class="filter_button" onclick="toggleFilter('<?php echo $progreso->nombre?>',4, 'progreso_border')"><?php echo $progreso->nombre?></button>
            <?php endforeach ?>
          </div>
            <!-- Aqui vienen toggles con los posibles filtros, simplemente se clica en los que se quieren aplicar -->

            


        </div>

      </div>
    </div>
  </div>
</div>





<script>

  window.onload=caja_fuerte(<?php echo json_encode($datos["total_extraviados"])?>, <?php echo $datos["usuarioSesion"]->id_rol?>, <?php echo json_encode(RUTA_URL)?>); // Aqui pasamos el array en cuestion recibido por PHP

  window.onload=busqueda(); // Se estructuran los items

  //window.onload=save_config(); // Cargar los datos de Accesibilidad

</script>





<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>