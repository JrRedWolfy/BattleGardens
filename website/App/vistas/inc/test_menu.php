<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NOMBRE_SITIO?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/elements.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/creator_pages.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <script src="<?php echo RUTA_URL?>/js/show_elements.js"></script>
</head>
<body>

<!-- <img src="<?php echo RUTA_URL?>/img/iconos/exampleLogo.png" alt=""> -->

<!-- BOTON QUE ABRE EL MENU LATERAL DEL ARQUITECTO -->
<div id="rule_arquitecto" class="ml-open ov-arq">
  <button id="open_arquitecto" onclick="openArquitect(true);">Click this</button>
  <div class="open-f fv-arq">

  </div>
</div>

<!-- MENU LATERAL DE ARQUITECTO -->
<div id="menu_arquitecto" class="mv_arq menu_flotante">
  <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [5])): ?>
  <div class="head_arquitecto">
    <h3>¿Quien Soy?</h3> 
  </div>

  <p>Hola, mi sobrenombre es Howler Bandog.</p>
  <p>Al tiempo que este proyecto se desarrolla, soy un estudiante en un grado de Desarrollo de Aplicaciones Web.</p>

  <h3>Battle Gardens</h3>
  <p>He elegido Battle Gardens como mi proyecto final de curso puesto que ha sido una idea que siempre he llevado conmigo y al fin tener la oportunidad de crear algo unico, algo que se sienta mio, algo por lo que vale invertir tiempo.</p>

  <?php else: ?>
  <div class="head_arquitecto">
    <h3>Mesa del <?php echo $datos["usuarioSesion"]->nombre?></h3> 
  </div>

  <div class="content_arquitecto">
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1])): ?>
    <a href="<?php echo RUTA_URL?>/arquitecto/vista_usuario" class="categoria_arq">Usuarios</a>
    <?php endif ?>
    <a href="<?php echo RUTA_URL?>/arquitecto/vista_publicacion" class="categoria_arq">Publicaciones</a>
    <a href="<?php echo RUTA_URL?>/arquitecto/vista_evento" class="categoria_arq">Eventos</a>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 3])): ?>
    <a href="<?php echo RUTA_URL?>/arquitecto/vista_extraviado" class="categoria_arq">Extraviados</a>
    <a href="<?php echo RUTA_URL?>/arquitecto/vista_artefacto" class="categoria_arq">Artefactos</a>
    <?php endif ?>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 2])): ?>
    <a href="<?php echo RUTA_URL?>/arquitecto/vista_historia" class="categoria_arq">Historias</a>
    <?php endif ?>
  </div>

  <?php endif ?>

  <div class="footer_mf fv-arq">

  </div>
</div>

<!-- BOTON QUE ABRE EL MENU LATERAL DEL PERFIL -->
<div id="rule_perfil" class="ml-open ov-per">
  <button id="open_perfil" onclick="openPerfil(true);">Click this</button>
  <div class="open-f fv-per">

  </div>
</div>


<!-- MENU LATERAL DE PERFIL -->
<div id="menu_perfil" class="mv_per menu_flotante">
  
  <div class="head_arquitecto">
    <h3><?php echo $datos["usuarioSesion"]->nickname?></h3> 
  </div>

  <div class="content_arquitecto">
    
    <a href="<?php echo RUTA_URL?>/site/profile" class="categoria_arq">Mi Pefil</a>
    
    <a href="<?php echo RUTA_URL?>/arquitecto/vista_publicacion" class="categoria_arq">Accesibilidad</a>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 3])):?>
    <a href="<?php echo RUTA_URL?>/arquitecto/vista_extraviado" class="categoria_arq">Modo Tester</a>
    <?php endif ?>

    <a href="<?php echo RUTA_URL?>/arquitecto/vista_artefacto" class="categoria_arq">Libro de Usuario</a>

    <a href="<?php echo RUTA_URL?>/login/logout" class="categoria_arq">Cerrar Sesion</a>
    
  </div>


  <div class="footer_mf fv-per">

  </div>
</div>



<!-- Menu de Arquitecto Basico Horizontal -->
<nav class="creator_nav">
  <ul class="nav_container">
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1])): ?>
    <li><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_usuario">Usuarios</a></li>
    <?php endif ?>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 3])): ?>
    <li><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_extraviado">Extraviados</a></li>
    <li><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_artefacto">Artefactos</a></li>
    <?php endif ?>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 2])): ?>
    <li><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_historia">Historias</a></li>
    <?php endif ?>
    <li><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_evento">Eventos</a></li>
    <li><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_publicacion">Publicaciones</a></li>

  </ul>
</nav>