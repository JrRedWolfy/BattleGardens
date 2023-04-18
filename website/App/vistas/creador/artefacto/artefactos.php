<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>


<h1>Artefactos :3</h1>
<?php print_r($datos["total_artefactos"]) ?>

<a href="<?php echo RUTA_URL?>/arquitecto/add_artefacto"><button><i class="fa fa-plus"></i> Nuevo Artefacto</button></a>


<?php foreach($datos["total_artefactos"] as $artefacto):?>

    <div class="work_card">
        <button id="<?php echo $artefacto->id?>"><?php echo $artefacto->nombre?></button>
        <span>Creador: <?php echo $artefacto->autor?></span>
    </div>

<?php endforeach?>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>