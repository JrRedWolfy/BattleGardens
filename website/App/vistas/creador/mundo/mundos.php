<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>


<h1>Mundos :3</h1>

<!-- Lista de Mundos -->
<?php foreach($datos["total_mundos"] as $mundo):?>

<div class="work_card">
    <button id="<?php echo $mundo->id?>"><?php echo $mundo->nombre?></button>
    <span><?php echo $mundo->sobrenombre?></span>
</div>

<?php endforeach?>

<br>
<br>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>