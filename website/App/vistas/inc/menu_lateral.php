


<input type="checkbox" class="checkbox" id="menu-toogle"/>
<label for="menu-toogle" class="menu-toogle"></label>

<?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [5])): ?>
    <h3>¿Quien Soy?</h3>
    <p>Hola, mi nombre es Howler Bandog.</p>
    <p>Al tiempo que este proyecto se desarrolla, soy un estudiante en un grado de Desarrollo de Aplicaciones Web.</p>

    <h3>Battle Gardens</h3>
    <p>He elegido Battle Gardens como mi proyecto final de curso puesto que ha sido una idea que siempre he llevado conmigo y al fin tener la oportunidad de crear algo unico, algo que se sienta mio, algo por lo que vale invertir tiempo.</p>

<?php else: ?>

    

<nav class="nav">

    <h3>Mesa del <?php echo $datos["usuarioSesion"]->nombre?></h3> 

    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1])): ?>
  <a href="<?php echo RUTA_URL?>/arquitecto/vista_usuario" class="nav__item current">Usuarios</a>
  <?php endif ?>
  <a href="<?php echo RUTA_URL?>/arquitecto/vista_publicacion" class="nav__item">Publicaciones</a>
  <a href="<?php echo RUTA_URL?>/arquitecto/vista_evento" class="nav__item">Eventos</a>
  <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 3])): ?>
  <a href="<?php echo RUTA_URL?>/arquitecto/vista_extraviado" class="nav__item">Extraviados</a>
  <a href="<?php echo RUTA_URL?>/arquitecto/vista_artefacto" class="nav__item">Artefactos</a>
  <?php endif ?>
  <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 2])): ?>
  <a href="<?php echo RUTA_URL?>/arquitecto/vista_historia" class="nav__item">Historias</a>
  <?php endif ?>
</nav>

<?php endif ?>


