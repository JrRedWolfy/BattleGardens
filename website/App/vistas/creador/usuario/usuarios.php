<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>


<h1>Usuarios :3</h1>



<button type="button"><a href="<?php echo RUTA_URL?>/arquitecto/add_usuario"><i class="fa fa-plus"></i> Crear Usuario</a></button>



<!-- Lista de Usuarios -->


    <table class="table table-hover table-warning table-striped-columns">
  <thead class="table-secondary">
    <tr>
      <th scope="col">Usuario</th>
      <th scope="col">Email</th>
      <th scope="col">Ultima Sesión</th>
      <th scope="col">Antiguedad</th>
      <th scope="col">Rol</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($datos["total_usuarios"] as $usuario):?>
    <tr>
      <th scope="row"><?php echo $usuario->nickname?></th>
      <td><?php echo $usuario->email?></td>
      <td><?php echo $usuario->ultima_sesion?></td>
      <td><?php if ($usuario->antiguedad != -1){echo $usuario->antiguedad;}else{echo '0';} ?></td>
      <td><?php echo $usuario->rol?></td>
      <td>
        <button><a href="<?php echo RUTA_URL?>/arquitecto/add_usuario">Editar</a></button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmar_bloqueo" onclick="place_id('<?php echo $usuario->nickname?>', 'bloquear_usuario')">Bloquear</button>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>



<!-- Modal -->
<div class="modal fade" id="confirmar_bloqueo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <div class="modal-body">
            <form action="<?php echo RUTA_URL?>/arquitecto/ban_usuario" method="POST">
        
                <input id="bloquear_usuario" name="id" type="text" value="">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </form>
        </div>

  
    </div>
  </div>
</div>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>