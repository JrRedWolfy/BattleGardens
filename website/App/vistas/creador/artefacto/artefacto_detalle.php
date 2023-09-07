<?php require_once RUTA_APP.'/vistas/inc/header_creador.php'?>

<div class="fullscreen">
<form method="post" onsubmit="return validar_artefacto()" action="<?php echo RUTA_URL ?>/arquitecto/add_artefacto/<?php echo $datos["artefacto"]->id?>">
<div class="work_box">
<div class="artefacto-view work_card">
    <h2>ICONO</h2>
    
    <div class="element_view">
      <div id="rare_ring" style="background-color: <?php echo $datos["artefacto"]->color?>;">
        <button type="button" id="new_img" data-bs-toggle="modal" data-bs-target="#place_img" onclick=""><i class="fa fa-plus"></i></button>
        <img id="icon_img" src="<?php echo RUTA_URL?>/img/iconos/<?php echo $datos["artefacto"]->icon?>" alt="">
      </div>
      <input id="imagen_input" name="imagen" type="text" value="<?php echo $datos["artefacto"]->icon ?>" hidden>
    </div>
        
    <select name="rareza_select" id="rareza_select" onchange="swap_ring();">
        <?php foreach($datos["rarezas"] as $rareza):?>
          <?php if($datos["artefacto"]->rareza != $rareza->id):?>
            <option name="<?php echo $rareza->color?>" value="<?php echo $rareza->id?>"><?php echo $rareza->nombre?></option>
          <?php else:?>
            <option name="<?php echo $rareza->color?>" value="<?php echo $rareza->id?>" selected><?php echo $rareza->nombre?></option>
          <?php endif?>
        <?php endforeach ?>
      </select>
        
  </div>


  <div class="artefacto-info work_card">
    <h2>Artefacto</h2>
    
    <div class="element_view">
      <label  class="l-form" for="nombre">NOMBRE</label>
      <input id="nombre" type="text" name="nombre" value="<?php echo $this->datos['artefacto']->nombre?>" placeholder="Titulo">
    </div>

    <div class="element_view">
      <label for="descripcion" class="l-form">ORIGEN</label>
      <textarea name="descripcion" id="descripcion" cols="50" rows="80"><?php echo $this->datos['artefacto']->descripcion?></textarea>
    </div>

    <button type="submit" class=""><i class="fa fa-save"></i>Guardar</button>
    
  </div>
  <div class="artefacto-game work_card">
    <h2>Stats</h2>
      <div class="element_view">
          <label for="" class="l-form">CARISMA</label>
          <div class="rating">
          <?php for($i = 0; $i <= 5; $i++):?>
            <?php if($i == 0):?>
              <?php if(($datos["editar"] == "no")||($datos["artefacto"]->carisma == 0)):?>
                <input id="carInput<?php echo $i?>" type="radio" name="carInput" value="<?php echo $i?>" checked hidden>
              <?php else:?>
                <input id="carInput<?php echo $i?>" type="radio" name="carInput" value="<?php echo $i?>"hidden>
              <?php endif?>
            <?php else:?>
              <?php if($datos["artefacto"]->carisma >= $i):?>
                <?php if($datos["artefacto"]->carisma == $i):?>
                  <input id="carInput<?php echo $i?>" type="radio" name="carInput" value="<?php echo $i?>" checked hidden>
                <?php else:?>
                  <input id="carInput<?php echo $i?>" type="radio" name="carInput" value="<?php echo $i?>" hidden>
                <?php endif?>
                <label id="car<?php echo $i?>" class="star checked" name="car" value="<?php echo $i?>" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
              <?php else:?>
                <input id="carInput<?php echo $i?>" type="radio" name="carInput" value="<?php echo $i?>" hidden>
                <label id="car<?php echo $i?>" class="star" name="car" value="<?php echo $i?>" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
              <?php endif?>
            <?php endif?>
          <?php endfor ?>
          </div>
        </div>

        <div class="element_view">
      <label for="" class="l-form">FUERZA</label>
      <div class="rating">
      <?php for($i = 0; $i <= 5; $i++):?>
        <?php if($i == 0):?>
          <?php if(($datos["editar"] == "no")||($datos["artefacto"]->fuerza == 0)):?>
            <input id="fueInput<?php echo $i?>" type="radio" name="fueInput" value="<?php echo $i?>" checked hidden>
          <?php else:?>
            <input id="fueInput<?php echo $i?>" type="radio" name="fueInput" value="<?php echo $i?>"hidden>
          <?php endif?>
        <?php else:?>
          <?php if($datos["artefacto"]->fuerza >= $i):?>
            <?php if($datos["artefacto"]->fuerza == $i):?>
              <input id="fueInput<?php echo $i?>" type="radio" name="fueInput" value="<?php echo $i?>" checked hidden>
            <?php else:?>
              <input id="fueInput<?php echo $i?>" type="radio" name="fueInput" value="<?php echo $i?>" hidden>
            <?php endif?>
            <label id="fue<?php echo $i?>" class="star checked" name="fue" value="<?php echo $i?>" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <?php else:?>
            <input id="fueInput<?php echo $i?>" type="radio" name="fueInput" value="<?php echo $i?>" hidden>
            <label id="fue<?php echo $i?>" class="star" name="fue" value="<?php echo $i?>" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <?php endif?>
        <?php endif?>
      <?php endfor ?>
      </div>
      </div>

      <div class="element_view">
      <label for="" class="l-form">INTELIGENCIA</label>
      <div class="rating">
      <?php for($i = 0; $i <= 5; $i++):?>
        <?php if($i == 0):?>
          <?php if(($datos["editar"] == "no")||($datos["artefacto"]->inteligencia == 0)):?>
            <input id="intInput<?php echo $i?>" type="radio" name="intInput" value="<?php echo $i?>" checked hidden>
          <?php else:?>
            <input id="intInput<?php echo $i?>" type="radio" name="intInput" value="<?php echo $i?>"hidden>
          <?php endif?>
        <?php else:?>
          <?php if($datos["artefacto"]->inteligencia >= $i):?>
            <?php if($datos["artefacto"]->inteligencia == $i):?>
              <input id="intInput<?php echo $i?>" type="radio" name="intInput" value="<?php echo $i?>" checked hidden>
            <?php else:?>
              <input id="intInput<?php echo $i?>" type="radio" name="intInput" value="<?php echo $i?>" hidden>
            <?php endif?>
            <label id="int<?php echo $i?>" class="star checked" name="int" value="<?php echo $i?>" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <?php else:?>
            <input id="intInput<?php echo $i?>" type="radio" name="intInput" value="<?php echo $i?>" hidden>
            <label id="int<?php echo $i?>" class="star" name="int" value="<?php echo $i?>" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <?php endif?>
        <?php endif?>
      <?php endfor ?>
      </div>
      </div>

      <div class="element_view">
      <label for="" class="l-form">DESVENTURA</label>
      <div class="rating">
      <?php for($i = 0; $i <= 5; $i++):?>
        <?php if($i == 0):?>
          <?php if(($datos["editar"] == "no")||($datos["artefacto"]->desventura == 0)):?>
            <input id="forInput<?php echo $i?>" type="radio" name="forInput" value="<?php echo $i?>" checked hidden>
          <?php else:?>
            <input id="forInput<?php echo $i?>" type="radio" name="forInput" value="<?php echo $i?>"hidden>
          <?php endif?>
        <?php else:?>
          <?php if($datos["artefacto"]->desventura >= $i):?>
            <?php if($datos["artefacto"]->desventura == $i):?>
              <input id="forInput<?php echo $i?>" type="radio" name="forInput" value="<?php echo $i?>" checked hidden>
            <?php else:?>
              <input id="forInput<?php echo $i?>" type="radio" name="forInput" value="<?php echo $i?>" hidden>
            <?php endif?>
            <label id="for<?php echo $i?>" class="star checked" name="for" value="<?php echo $i?>" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <?php else:?>
            <input id="forInput<?php echo $i?>" type="radio" name="forInput" value="<?php echo $i?>" hidden>
            <label id="for<?php echo $i?>" class="star" name="for" value="<?php echo $i?>" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <?php endif?>
        <?php endif?>
      <?php endfor ?>
      </div>
      </div>
  </div>

</div>
</form>

<div class="modal fade" id="place_img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header mh-c">
        <h1 class="modal-title fs-5" id="exampleModalLabel">IMAGEN</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body mb-c">

        <div class="element_view">
          <label for="" class="l-form">PREVISUALIZACION</label>
          <img id="preview_img" src="<?php echo RUTA_URL?>/img/iconos/artefacto_icono_default.jpg" alt="">
        </div>
        
        
        <form id="form_image" action="" method="post" enctype="multipart/form-data">
          <div class="element_view">
            <label for="test_name" class="l-form">NOMBRE de ICONO <sup>*</sup></label>
            <input type="text" id="test_name" name="test_name" class="form-control form-control-lg <?php echo empty($data['errors']['test_name']) ? '' : 'is-invalid'; ?>" value="<?php echo $data['test_name'] ?? ''; ?>" />
          </div>
          <div class="element_view">
            <label for="myFiles" class="l-form">IMAGEN <sup>*</sup></label></label>
            <input type="file" accept="image/*" id="myFiles" name="files[]" multiple class="form-control form-control-lg <?php echo empty($data['errors']['files']) ? '' : 'is-invalid'; ?>" />  
          </div>
          <button type="submit">PREVISUALIZAR</button>
          <button id="guardar_img" type="button" onclick="load_img();">GUARDAR</button>
        </form>
        
        

      </div>
    </div>
  </div>
</div>



</div>

<script>
  
  const form = document.getElementById('form_image');

/**
 * Add an onclick-listener to the whole form, the callback-function
 * will always know what you have clicked and supply your function with
 * an event-object as first parameter, `addEventListener` creates this for us
 */
form.addEventListener('submit', function(event){
    //Prevent the event from submitting the form, no redirect or page reload
    event.preventDefault();
   
    if (document.getElementById("test_name").value != ""){
      let formattedFormData = new FormData(form);
      fetch_image(formattedFormData);
    }
});

async function fetch_image(formattedFormData){ /*FUNCIONA!!*/

 await fetch(`<?php echo RUTA_URL?>/images/upload`, {
     method: "POST",
     body: formattedFormData
 })
 .then((resp) => resp.json())
 .then(function(data) {
   if(data){
    document.getElementById("preview_img").setAttribute("src", "<?php echo RUTA_URL?>/img/iconos/"+data["test_name"]+".jpg");
    document.getElementById("guardar_img").setAttribute("onclick", "load_img('"+data["test_name"]+"');");
  } else {
     alert("Ha surgido un error inesperado");
   }
 })
}
</script>
    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>