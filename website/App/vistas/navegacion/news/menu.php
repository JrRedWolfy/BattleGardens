<?php if(isset($datos["usuarioSesion"])){
    require_once RUTA_APP.'/vistas/inc/header.php';
} else{
    require_once RUTA_APP.'/vistas/inc/header_no_login.php'; 
}?>

<!-- EN DESUSO, DESCONTINUADO -->

<h2>Estas en Noticias </h2>

<?php if (isset($datos["usuarioSesion"])&&($datos["usuarioSesion"]->id_rol >= 1)){
    print_r($datos["usuarioSesion"]);
    require_once RUTA_APP.'/vistas/inc/menu_lateral.php';
}?>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>