<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>


<h1>Artefactos :3</h1>
<?php print_r($datos["total_artefactos"]) ?>

<a href="<?php echo RUTA_URL?>/arquitecto/add_artefacto"><button><i class="fa fa-plus"></i> Nuevo Artefacto</button></a>

<div class="item_block">
<?php foreach($datos["total_artefactos"] as $artefacto):?>

    <div class="itemcard">
        <div class="itemcard_title">
            <h5><?php echo $artefacto->nombre?></h5>
        </div>
        <div class="itemcard_extra">

        </div>
        <div class="itemcard_body">
            <ul>
                <li>Progreso: <?php echo $artefacto->progreso?></li>
                <li>Creador: <?php echo $artefacto->autor?></li>
                <li>Fecha: <?php echo $artefacto->fecha?></li>
            </ul>

        </div>
        

    </div>

<?php endforeach?>
</div>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>