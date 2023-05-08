<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>


<h1>Artefactos :3</h1>
<?php print_r($datos["total_artefactos"]) ?>

<a href="<?php echo RUTA_URL?>/arquitecto/add_artefacto"><button><i class="fa fa-plus"></i> Nuevo Artefacto</button></a>

<div class="item_block">
<?php foreach($datos["total_artefactos"] as $artefacto):?>

    
    <div class="itemcard">
        <a href="<?php echo RUTA_URL?>/arquitecto/add_artefacto/<?php echo $artefacto->id?>">
            <div class="itemcard_title">
                <h5><?php echo $artefacto->nombre?></h5>
            </div>
                
            <div class="itemcard_body">
                <ul>
                    <li>Progreso: <?php echo $artefacto->progreso?></li>
                    <li>Creador: <?php echo $artefacto->autor?></li>
                    <li>Fecha: <?php echo $artefacto->fecha?></li>
                </ul>

            </div>
        </a>

        <div class="itemcard_extra">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alter_artefacto" onclick="place_id('<?php echo $artefacto->id?>', 'accion_artefacto')">Eliminar</button>
        </div>
            

    </div>
    
    

<?php endforeach?>
</div>

<!-- Modal -->
<div class="modal fade" id="alter_artefacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <div class="modal-body">
            <form action="<?php echo RUTA_URL?>/arquitecto/dismiss_artefacto" method="POST">
        
                <input id="accion_artefacto" name="id" type="text" value="">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </form>
        </div>

  
    </div>
  </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>