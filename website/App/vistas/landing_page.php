<?php if(isset($datos["usuarioSesion"])){
    require_once RUTA_APP.'/vistas/inc/header_base.php';
} else{
    require_once RUTA_APP.'/vistas/inc/header_nolog.php'; 
}?>

<div class="main-screen">
    <img id="bgmain-image" src="<?php echo RUTA_URL?>/img/varios/fondo_bg_large.jpg" alt="">
    <?php if(isset($datos["usuarioSesion"])):?>
        <button id="game_starter" data-bs-toggle="modal" data-bs-target="#game_start"><i class="fa fa-rocket" aria-hidden="true"></i></button>
    <?php endif?>

    <div class="info-panel">
        <h2>¿Que es Battle Gardens RM?</h2>
        <p>Battle Gardens es uno de mis proyectos personales, nace de la necesidad de jugar a un juego entretenido que cuente una historia, invierta tiempo en su mundo y en sus personajes. </p>

        <h2>Como se Juega</h2>
        <p>Tal Pascual, si todavia te quedan dudas, siempre puedes descargar el manual creando un perfil de usuario en tu pestaña de usuario.</p>
    </div>
</div>

<div class="main-screen-rpv">
    <div class="relative-box">
        <img id="bgmain-image-rpv" src="<?php echo RUTA_URL?>/img/varios/fondo_bg_small.jpg" alt="">
        <?php if(isset($datos["usuarioSesion"])):?>
            
            <button id="game_starter_rpv" data-bs-toggle="modal" data-bs-target="#game_start"><i class="fa fa-rocket" aria-hidden="true"></i></button>
            
        <?php endif?>
    </div>

    <div class="info-panel-rpv">
    <h2>¿Que es Battle Gardens RM?</h2>
    <p>Battle Gardens es uno de mis proyectos personales, nace de la necesidad de jugar a un juego entretenido que cuente una historia, invierta tiempo en su mundo y en sus personajes. </p>

    <h2>Como se Juega</h2>
    <p>Tal Pascual, si todavia te quedan dudas, siempre puedes descargar el manual creando un perfil de usuario en tu pestaña de usuario.</p>
    </div>
</div>

<?php if(isset($datos["usuarioSesion"])):?>
      
<div class="modal fade" id="game_start" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header mh-c">
            <h1 class="modal-title fs-5" id="exampleModalLabel">START</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body mb-c">
            
            <div class="element_view">
                <h4>Oof...</h4>
                <p>Temo que he de darle malas noticias.</p>
                <p>De momento el juego continua en desarrollo</p>
            </div>
        </div>
        </div>
    </div>
</div>


        
<?php endif?>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>