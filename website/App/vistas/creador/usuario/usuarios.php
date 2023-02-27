<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>


<h1>Usuarios :3</h1>


<!-- Crear Usuario -->
<form class="box_work" method="POST" action="<?php echo RUTA_URL?>/arquitecto/add_usuario">
    <label name="nick" for="">Usuario</label>
    <input name="nick" type="text">

    <label name="email" for="">Email</label>
    <input name="email" type="text">

    <label name="clave" for="">Contraseña</label>
    <input name="clave" type="text">

    <label name="confirmacion" for="">Confirmacion Contraseña</label>
    <input name="confirmacion" type="text">

    <label for="">Rol</label>
    <select name="rol" id="">
        <?php foreach($datos['tipos_usuario'] as $tipo): ?>
        <option value="<?php echo $tipo->id?>"><?php echo $tipo->nombre?></option>
        <?php endforeach ?>
    </select>

    <button type="submit"><i class="fa fa-plus"></i>Crear</button>

</form>


<!-- Lista de Usuarios -->
<?php foreach($datos["total_usuarios"] as $usuario):?>

<div class="work_card">
    <button id="<?php echo $usuario->nickname?>"><?php echo $usuario->nickname?></button>
    <span><?php echo $usuario->id_rol?></span>
</div>

<?php endforeach?>




<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>