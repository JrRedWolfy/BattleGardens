<?php if(isset($datos["usuarioSesion"])){
    require_once RUTA_APP.'/vistas/inc/header.php';
} else{
    require_once RUTA_APP.'/vistas/inc/header_no_login.php'; 
}?>

<?php print_r($datos) ?>


<h2>¿Que es Battle Gardens RM?</h2>
<p>Battle Gardens es uno de mis proyectos personales, nace de la necesidad de jugar a un juego entretenido que cuente una historia, invierta tiempo en su mundo y en sus personajes. </p>
<img src="" alt="">

<h2>Como se Juega</h2>
<p>Tal Pascual, si todavia te quedan dudas, siempre puedes descargar el manual de usuario en el pie de pagina.</p>
<img src="" alt="">

<?php if (isset($datos["usuarioSesion"])&&($datos["usuarioSesion"]->id_rol >= 1)){
    print_r($datos["usuarioSesion"]);
    require_once RUTA_APP.'/vistas/inc/menu_lateral.php';
}?>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>