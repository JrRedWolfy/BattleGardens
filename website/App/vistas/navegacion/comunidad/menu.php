<?php if(isset($datos["usuarioSesion"])){
    require_once RUTA_APP.'/vistas/inc/header.php';
} else{
    require_once RUTA_APP.'/vistas/inc/header_no_login.php'; 
}?>

<?php if (isset($datos["usuarioSesion"])&&($datos["usuarioSesion"]->id_rol >= 1)){
    print_r($datos["usuarioSesion"]);
    require_once RUTA_APP.'/vistas/inc/menu_lateral.php';
}?>

<button><a href="<?php echo RUTA_URL?>/site/create_fanmade">COMPARTIR</a></button>

<h2>Estas en Comunidad :3</h2>
<p> En comunidad podras encontrar todo tipo de contenido hecho por y para fans. Historias nunca antes contadas, dibujos geniales y sobretodo, un lugar perfecto para compartir tu punto de vista.</p>

<div class="expositor">
    <div class="card">
        <h4>Titulo 1</h4>
        <img src="<?php echo RUTA_URL?>/public/img/iconos/Ryoz.png" alt="" width="100" height="100">

    </div>

    <div class="card">
        <h4>Titulo 2</h4>
        <img src="<?php echo RUTA_URL?>/public/img/iconos/Ryoz.png" alt="" width="100" height="100">

    </div>

    <div class="card">
        <h4>Titulo 3</h4>
        <img src="<?php echo RUTA_URL?>/public/img/iconos/Ryoz.png" alt="" width="100" height="100">

    </div>

    <div class="card">
        <h4>Titulo 4</h4>
        <img src="<?php echo RUTA_URL?>/public/img/iconos/Ryoz.png" alt="" width="100" height="100">

    </div>

</div>

<div class="utilities_panel">
    <select name="filter" id="" onchange="">
        <option value=""></option>
        <option value="">Arte</option>
        <option value="">Historias</option>
        <option value="">Temas</option>
        <option value="">Publicaciones</option>
    </select>

    <input type="text" name="buscador"><button><i class="fa fa-search"></i></button>

</div>
<div class="parameter_panel">

</div>

<div class="items_panel">

</div>







<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>