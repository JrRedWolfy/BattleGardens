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
    <button><a href="<?php echo RUTA_URL?>/arquitecto/del_historia/<?php echo $historia->id?>">BORRAR</a></button>
</div> <br>


<?php endforeach ?>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>