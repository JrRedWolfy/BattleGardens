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
        <h2>UNIVERSO</h2>
    </div>

    <div class="items-expositor">

        <?php $i = 0;?>
        <?php foreach($datos['expositor'] as $historia):?>
        <?php switch($i){case 0: $img = 'tree_bg.jpg'; break; case 1: $img = 'plains_bg.jpg'; break; case 2: $img = 'mountain_bg.jpg'; break;};?>

        <div class="expo-item">
            <a href="<?php echo RUTA_URL?>/site/universo/<?php echo $historia->id?>">
                <img src="<?php echo RUTA_URL?>/img/varios/<?php echo $img?>" alt="">
                <h3><?php echo $historia->titulo?></h3>
            </a>
        </div>

        <?php $i = $i + 1;?>
        <?php endforeach ?>

    </div>
    

    <main class="work_box lore-box">

        <article class="two">
            <h2><?php echo $datos['historia']->titulo?></h2>
            <hr>
            <br>
            <p class="lore-txt"><?php echo $datos['historia']->contenido?></p>
        </article>

    </main>

    <div id="lore-nexus">

    </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>