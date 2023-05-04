<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<div class="work_box">
  <div class="one work_card">
    <h2>Requisito</h2>
    <button class="verde"><i class="fa fa-plus"></i></button>
    <hr>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa animi accusantium quia voluptatem eum excepturi sequi temporibus minus architecto impedit ullam tenetur blanditiis nam quo, optio unde deserunt praesentium sint ea, nisi autem fugiat. Minus deserunt vitae laudantium at alias.</p>
  </div>
  <div class="two evento work_card">
    <h2>Evento</h2>
    <form action="<?php echo RUTA_URL?>/arquitecto/add_evento/<?php echo $this->datos['evento']->id ?>" method="POST">

        <input type="text" name="titulo" value="<?php echo $this->datos['evento']->titulo?>" placeholder="Titulo">

        <textarea name="contenido" onkeyup="read_symbl(this);" id=""><?php echo $this->datos["evento"]->contenido?></textarea>

        <i><img src="<?php echo RUTA_URL?>/img/symbol/ryoz32x.ico" height="16px" width="16px"></img></i>
        <div id="resultado">

        </div>

        <button type="submit" class="verde"><i class="fa fa-save"></i>Guardar</button>
    </form>
  </div>
  <div class="thr work_card">
    <h2>Activador</h2>
    <button class="verde"><i class="fa fa-plus"></i></button>
    <hr>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa animi accusantium quia voluptatem eum excepturi sequi temporibus minus architecto impedit ullam tenetur blanditiis nam quo, optio unde deserunt praesentium sint ea, nisi autem fugiat. Minus deserunt vitae laudantium at alias.</p>
  </div>
  <div class="fou work_card">
    <button class="verde">FINALIZAR</i></button>
  </div>
</div>
    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>