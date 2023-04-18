<?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [5])): ?>

<div>

   

    <h3>¿Quien Soy?</h3>
    <p>Hola, mi nombre es Howler Bandog.</p>
    <p>Al tiempo que este proyecto se desarrolla, soy un estudiante en un grado de Desarrollo de Aplicaciones Web.</p>

    <h3>Battle Gardens</h3>
    <p>He elegido Battle Gardens como mi proyecto final de curso puesto que ha sido una idea que siempre he llevado conmigo y al fin tener la oportunidad de crear algo unico, algo que se sienta mio, algo por lo que vale invertir tiempo.</p>
</div>

<?php else: ?>

<h3>Mesa del <?php echo $datos["usuarioSesion"]->nombre?></h3>  

<nav class="hide" id="architect_table">
    <ul>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1])): ?>
        <li><a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_usuario">Usuarios</a></li>
    <?php endif ?>
    <!--Todos-->
        <li><a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_publicacion">Publicaciones</a></li>
    <!--Todos-->
        <li><a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_evento">Eventos</a></li>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 3])): ?>
    <!--Creador-->
        <li><a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_extraviado">Extraviados</a></li>
    <!--Creador-->
        <li><a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_artefacto">Artefactos</a></li>
    <?php endif ?>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 2])): ?>
    <!--Lore Master-->
        <li><a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_historia">Historias</a></li>
    <!--Lore Master-->
        <li><a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_mundo">Mundos</a></li>
    <?php endif ?>
  </ul>
  
</nav>

<?php endif ?>