<?php require_once RUTA_APP.'/vistas/inc/header_creador.php'?>

<div class="fullscreen">

<div class="center-block">
    <h2>NUEVO USUARIO</h2>
</div>

    <div id="filter_panel" class="work_box">

        <div class="two">
            <form action="<?php echo RUTA_URL?>/arquitecto/add_usuario" method="POST" onsubmit="return true">

            <div class="element_view">
            <label class="l-form" for="rol">Rol</label>
            <select name="rol" id="rol">
                <?php foreach($datos['tipos_usuario'] as $tipo): ?>
                <option value="<?php echo $tipo->id?>"><?php echo $tipo->nombre?></option>
                <?php endforeach ?>
            </select>
            </div>
            <div class="element_view">
            <label name="nick" class="l-form" for="nick">Usuario</label>
            <input id="nick" name="nick" type="text"><br>
            </div>
            <div class="element_view">
            <label name="email" class="l-form" for="email">Email</label>
            <input id="email" name="email" type="text"><br>
            </div>
            <div class="element_view">
            <label name="clave" class="l-form" for="clave">Contraseña</label>
            <input id="clave" name="clave" type="text"><br>
            </div>
            <div class="element_view">
            <label name="confirmacion" class="l-form" for="confirmacion">Confirmacion Contraseña</label>
            <input id="confirmacion" name="confirmacion" type="text"><br>
            </div>

            <div class="center-block">
            <button type="submit" class="verde"><i class="fa fa-plus"></i>CREAR</button>
            </div>
            

            </form>
        </div>

    </div>
  
</div>




<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>