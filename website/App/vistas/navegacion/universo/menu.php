<?php if(isset($datos["usuarioSesion"])){
    require_once RUTA_APP.'/vistas/inc/header.php';
} else{
    require_once RUTA_APP.'/vistas/inc/header_no_login.php'; 
}?>

<?php if (isset($datos["usuarioSesion"])&&($datos["usuarioSesion"]->id_rol >= 1)){
    print_r($datos["usuarioSesion"]);
    require_once RUTA_APP.'/vistas/inc/menu_lateral.php';
}?>

<h2>Estas en Universo :3</h2>
<main>
    <article>

    </article>

    <article>

    </article>

    <article>

    </article>

    <article>

    </article>

    <article>
        
    </article>

</main>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>