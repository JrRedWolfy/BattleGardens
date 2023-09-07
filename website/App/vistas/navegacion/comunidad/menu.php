<?php if(isset($datos["usuarioSesion"])){
    require_once RUTA_APP.'/vistas/inc/header_base.php';
} else{
    require_once RUTA_APP.'/vistas/inc/header_nolog.php'; 
}?>

<style>
    .mosaico {
        background-image: url("<?php echo RUTA_URL?>/img/varios/fondo_bg_large.jpg");
        background-repeat: repeat-y;
        background-size: 100% auto;
        min-height: 100vh;
    }

</style>

<div class="mosaico">

    <div class="center-block gray-sc">
        <h2>COMUNIDAD</h2>
    </div>

    <div class="items-expositor">

        <div class="expo-item">
            <a href="#">
                <img src="<?php echo RUTA_URL?>/img/varios/plains_bg.jpg" alt="">
                <h3>Pendiente</h3>
            </a>
        </div>

        <div class="expo-item">
            <a href="#">
                <img src="<?php echo RUTA_URL?>/img/varios/plains_bg.jpg" alt="">
                <h3>Pendiente</h3>
            </a>
        </div>

        <div class="expo-item">
            <a href="#">
                <img src="<?php echo RUTA_URL?>/img/varios/plains_bg.jpg" alt="">
                <h3>Pendiente</h3>
            </a>
        </div>

    </div>
    

    <main class="work_box lore-box">

        <article class="two">
            <h2>TODAVIA NO SE HA IMPLEMENTADO ESTA PESTAÑA</h2>
        </article>

    </main>

    <div id="lore-nexus">

    </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>