<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<a href="<?php echo RUTA_URL?>/arquitecto/add_historia"><button><i class="fa fa-plus"></i> Nueva Historia</button></a>

<h1>Historias :3</h1>


<?php print_r($datos["total_historias"])?>

<?php foreach($datos["total_historias"] as $historia):?>

<div>
    <h4>#<?php echo $historia->id?> | <?php echo $historia->titulo?></h4>
    <p><?php echo $historia->autor?></p>
    <p><?php echo $historia->fecha?></p>
    <p><?php echo $historia->progreso?></p>
    <button><a href="<?php echo RUTA_URL?>/arquitecto/add_historia/<?php echo $historia->id?>">EDITAR</a></button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmar_delete" onclick="place_id(<?php echo $historia->id?>, 'eliminar_elemento')">BORRAR</button>
</div> <br>


<?php endforeach ?>


<!-- Modal -->
<div class="modal fade" id="confirmar_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <div class="modal-body">
            <form action="<?php echo RUTA_URL?>/arquitecto/del_historia" method="POST">
        
                <input id="eliminar_elemento" name="id" type="text" value="">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </form>
        </div>

  
    </div>
  </div>
</div>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>