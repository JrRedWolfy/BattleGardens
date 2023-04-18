<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<div class="work_box">
  <div class="one work_card">
    <h2>Involucrados</h2>
    <button class="verde"><i class="fa fa-plus"></i></button>
    <hr>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa animi accusantium quia voluptatem eum excepturi sequi temporibus minus architecto impedit ullam tenetur blanditiis nam quo, optio unde deserunt praesentium sint ea, nisi autem fugiat. Minus deserunt vitae laudantium at alias.</p>
  </div>
  <div class="two evento work_card">
    <h2>Historia</h2>
    <form action="<?php echo RUTA_URL?>/arquitecto/add_historia" method="POST" onsubmit="return true">

        <input type="text" name="titulo" value="<?php echo $this->datos['historia']->titulo?>" placeholder="Titulo">

        <textarea name="contenido" id=""><?php echo $this->datos["historia"]->contenido?></textarea>

        <select name="mundo" id="">
        <?php foreach($this->datos["mundos"] as $mundo):?>

          <option value="<?php echo $mundo->id?>"><?php echo $mundo->nombre?></option>

        <?php endforeach?>
        </select>

        <button type="submit" class="verde"><i class="fa fa-save"></i>Guardar</button>
    </form>
  </div>
  <div class="thr work_card">
    <h2>Historias relaccionadas</h2>
    <button class="verde"><i class="fa fa-plus"></i></button>
    <hr>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa animi accusantium quia voluptatem eum excepturi sequi temporibus minus architecto impedit ullam tenetur blanditiis nam quo, optio unde deserunt praesentium sint ea, nisi autem fugiat. Minus deserunt vitae laudantium at alias.</p>
  </div>
  <div class="fou work_card">
    <button class="verde">FINALIZAR</i></button>
  </div>
</div>
    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>