<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<a href="<?php echo RUTA_URL?>/arquitecto/add_evento"><button><i class="fa fa-plus"></i> Nuevo Evento</button></a>

<h1>Eventos :3</h1>
<!--<?php print_r($datos["total_eventos"]) ?>-->

<?php foreach($datos["total_eventos"] as $evento):?>

    <div>
        <h4>#<?php echo $evento->id?> | <?php echo $evento->titulo?></h4>
        <p><?php echo $evento->autor?></p>
        <p><?php echo $evento->ultima_mod?></p>
        <p><?php echo $evento->tipo?></p>
        <p><?php echo $evento->progreso?></p>
        <button><a href="<?php echo RUTA_URL?>/arquitecto/add_evento/<?php echo $evento->id?>">EDITAR</a></button>
        <button><a href="<?php echo RUTA_URL?>/arquitecto/del_evento/<?php echo $evento->id?>">BORRAR</a></button>
    </div> <br>


<?php endforeach ?>




<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>