<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>


<h1>Publicaciones :3</h1>
<a href="<?php echo RUTA_URL?>/arquitecto/add_publicacion"><button><i class="fa fa-plus"></i> Nueva Publicación</button></a>

<?php print_r($datos["total_publicaciones"]) ?>




<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>