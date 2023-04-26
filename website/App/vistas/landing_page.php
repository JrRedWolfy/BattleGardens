<?php if(isset($datos["usuarioSesion"])){
    require_once RUTA_APP.'/vistas/inc/header.php';
} else{
    require_once RUTA_APP.'/vistas/inc/header_no_login.php'; 
}?>

<?php if (isset($datos["usuarioSesion"])&&($datos["usuarioSesion"]->id_rol >= 1)){
    require_once RUTA_APP.'/vistas/inc/menu_lateral.php';
}?>

<?php print_r($datos) ?>

<?php if(isset($datos["usuarioSesion"])):?>
    <button id="game_starter">PLAY</button>
<?php endif?>

<h2>¿Que es Battle Gardens RM?</h2>
<p>Battle Gardens es uno de mis proyectos personales, nace de la necesidad de jugar a un juego entretenido que cuente una historia, invierta tiempo en su mundo y en sus personajes. </p>
<img src="" alt="">

<h2>Como se Juega</h2>
<p>Tal Pascual, si todavia te quedan dudas, siempre puedes descargar el manual de usuario en el pie de pagina.</p>
<img src="" alt="">





<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>