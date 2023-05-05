<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<div class="work_box">
  
    <form action="<?php echo RUTA_URL?>/arquitecto/add_usuario" method="POST" onsubmit="return true">

        <label name="nick" for="">Usuario</label>
        <input name="nick" type="text"><br>

        <label name="email" for="">Email</label>
        <input name="email" type="text"><br>

        <label name="clave" for="">Contraseña</label>
        <input name="clave" type="text"><br>

        <label name="confirmacion" for="">Confirmacion Contraseña</label>
        <input name="confirmacion" type="text"><br>

        <label for="">Rol</label>
        <select name="rol" id="">
            <?php foreach($datos['tipos_usuario'] as $tipo): ?>
            <option value="<?php echo $tipo->id?>"><?php echo $tipo->nombre?></option>
            <?php endforeach ?>
        </select>

        <button type="submit" class="verde"><i class="fa fa-plus"></i>Crear</button>

    
    </form>
  
</div>




<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>