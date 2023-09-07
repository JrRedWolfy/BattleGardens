<?php require_once RUTA_APP.'/vistas/inc/header_creador.php'?>

<div class="fullscreen">
<div class="work_box">
  <div class="one work_card">
    <h2>Requisito</h2>
    <button class="verde"><i class="fa fa-plus"></i></button>
    <hr>

    <?php if ($this->datos["editar"] == "no"):?>
      <p>Mientras no hayas Guardado el Evento NO podras crear relacciones.</p>
    <?php endif?>

  </div>
  <div class="two evento work_card">
    <h2>Evento</h2>
    <form action="<?php echo RUTA_URL?>/arquitecto/add_evento/<?php echo $this->datos['evento']->id ?>" method="POST">

        
        <div class="element_view">
        <label for="titulo" class="l-form">NOMBRE</label>
        <input id="titulo" type="text" name="titulo" value="<?php echo $this->datos['evento']->titulo?>" placeholder="Titulo">
        </div>

        <div class="element_view">
          <label for="tipo_select" class="l-form">TIPO EVENTO</label>
        <select name="tipo_select" id="tipo_select">
        <?php foreach($datos["tipos"] as $tipo):?>
          <?php if($datos["evento"]->tipo != $tipo->id):?>
            <option value="<?php echo $tipo->id?>"><?php echo $tipo->nombre?></option>
          <?php else:?>
            <option value="<?php echo $tipo->id?>" selected><?php echo $tipo->nombre?></option>
          <?php endif?>
        <?php endforeach ?>
        </select>

        </div>
        

        
        <div class="element_view">
        <label for="contenido" class="l-form">CONTENIDO</label>
        <textarea id="contenido" name="contenido" onkeyup="read_symbl(this);" id=""><?php echo $this->datos["evento"]->contenido?></textarea>
        </div>

        
        
        <div id="resultado">

        </div>

        <button type="submit" class="verde"><i class="fa fa-save"></i>Guardar</button>
    </form>
  </div>
  <div class="thr work_card">
    <h2>Activadores</h2>

    <?php if ($this->datos["editar"] == "no"):?>
    <div class="element_view">
      <label for="arquetipo" class="l-form">Arquetipo</label>
    <select name="" id="arquetipo">
      <option value="binario" selected>BINARIO</option>
      <option value="recurso">RECURSOS</option>
      <option value="stat">EQUIPO</option>
      <option value="mundo">MUNDOS</option>
      <option value="maquina">MAQUINARIA</option>
    </select>
    </div>
    
    <button type="button" class="btn btn-primary" onclick="fetch_arquetipo();"></button>
    <?php endif?>
    <hr>

    
      
    

    <div id="activadores_lista">



    </div>

  </div>
</div>
</div>


<script>

  let thisId = <?php echo $datos["evento"]->id?>;

  window.onload=fetch_arquetipo();

  async function fetch_arquetipo(){
    

    var opcion = document.getElementById("arquetipo").selectedIndex;
    var opciones = document.getElementById("arquetipo").options;
    let arquetipo = opciones[opcion].value;
   
    await fetch(`<?php echo RUTA_URL?>/arquitecto/get_arquetipo/<?php echo $datos["evento"]->id?>/`+arquetipo, {
       method: "GET",
   })
   .then((resp) => resp.json())
   .then(function(data) {
     if(data){
      prepare_activadores(data);

     } else {
       alert("Ha surgido un error inesperado");
     }
   })
   
 }

</script>

    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>