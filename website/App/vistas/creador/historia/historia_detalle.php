<?php require_once RUTA_APP.'/vistas/inc/header_creador.php'?>

<div class="fullscreen">
<form action="<?php echo RUTA_URL?>/arquitecto/add_historia<?php if($this->datos['historia']->id != 0): echo "/".$this->datos['historia']->id; endif?>" method="POST" onsubmit="return true">
<div class="work_box">
  
  <div class="one work_card">

      <h2>Ubicacion</h2>

      <div class="element_view">
        <img id="mundo_img" src="<?php echo RUTA_URL?>/img/iconos/<?php echo $datos["historia"]->world_img?>" alt="">
      </div>

      <select name="mundo_select" id="mundo_select" onchange="swap_world();">
        <?php foreach($datos["mundos"] as $mundo):?>
          <?php if($datos["historia"]->mundo != $mundo->nombre):?>
            <option name="<?php echo $mundo->img?>" value="<?php echo $mundo->id?>"><?php echo $mundo->nombre?></option>
          <?php else:?>
            <option name="<?php echo $mundo->img?>" value="<?php echo $mundo->id?>" selected><?php echo $mundo->nombre?></option>
          <?php endif?>
        <?php endforeach ?>
      </select>

    <h2>Involucrados</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#desvinculados" onclick="fetch_desvinculados();"></button>
    <hr>
    <?php if ($this->datos["editar"] == "no"):?>
      <p>Mientras no hayas Guardado la Historia NO podras crear relacciones.</p>
    <?php endif?>
    <p></p>
  </div>
  <div class="two evento work_card">
    <h2>Historia</h2>
    

      <div class="element_view">
        <label for="titulo" class="l-form">TITULO</label>
        <input id="titulo" type="text" name="titulo" value="<?php echo $this->datos['historia']->titulo?>" placeholder="Titulo">
      </div>

      <div class="element_view">
        <label for="contenido" class="l-form">NARRACION</label>
        <textarea name="contenido" id="contenido"><?php echo $this->datos["historia"]->contenido?></textarea>
      </div>
        

        <button type="submit" class="verde"><i class="fa fa-save"></i>Guardar</button>
    
  </div>
  <div class="thr work_card">
    <h2>Historias relaccionadas</h2>
    <button class="verde"><i class="fa fa-plus"></i></button>
    <hr>
    <?php if ($this->datos["editar"] == "no"):?>
      <p>Mientras no hayas Guardado la Historia NO podras crear relacciones.</p>
    <?php endif?>
  </div>
</div>
</form>
</div>

<div class="modal fade" id="desvinculados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <div class="modal-header mh-c">
        <h1 class="modal-title fs-5" id="exampleModalLabel">LISTA DE DESVINCULADOS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body mb-c">

        <div id="desvinculados_lista" class="unk-cardlist">

        </div>

      </div>
    </div>
  </div>
</div>


<script>

let thisId = <?php echo $datos["historia"]->id?>;

async function fetch_desvinculados(){
   
   await fetch(`<?php echo RUTA_URL?>/arquitecto/get_desvinculados/<?php echo $datos["historia"]->id?>`, {
       method: "GET",
   })
   .then((resp) => resp.json())
   .then(function(data) {
     if(data){
       prepare_unk(data, "historia");
     } else {
       alert("Ha surgido un error inesperado");
     }
   })
 }


 async function add_relaccion(id, command=0){

   if(id != -1){
     if (command == 1){
       document.getElementById("unkBox"+id).remove();
     } else {
       document.getElementById("knwBox"+id).remove();
     }
   }
  
  await fetch(`<?php echo RUTA_URL?>/arquitecto/set_vinculo/`+id+`/`+thisId+`/`+command, {
      method: "GET",
  })
  .then((resp) => resp.json())
  .then(function(data) {
    if(data){
     //prepare_knw(data);

    } else {
      alert("Ha surgido un error inesperado");
    }
  })
}





</script>




    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>