<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NOMBRE_SITIO?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo RUTA_URL?>/img/varios/hats.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/cleanup.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/elements.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/creator_pages.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <!-- <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <script src="<?php echo RUTA_URL?>/js/show_elements.js"></script>
</head>
<body class="<?php echo $datos["accesibilidad"]->color?> <?php echo $datos["accesibilidad"]->letra?>">

<!-- <img src="<?php echo RUTA_URL?>/img/iconos/exampleLogo.png" alt=""> -->

<!-- BOTON QUE ABRE EL MENU LATERAL DEL ARQUITECTO -->
<div id="rule_arquitecto" class="ml-open ov-arq">
  <img id="open_arquitecto" onclick="openArquitect(true);" src="<?php echo RUTA_URL?>/img/varios/hats.png" alt="">
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

  <div class="footer_mf">

  </div>
</div>

<!-- MENU LATERAL DE ARQUITECTO RESPONSIVE -->
<div id="menu_arquitecto_rpv" class="menu_flotante_rpv" style="z-index: -1;">
  <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [5])): ?>
  <div class="head_flotante">
    <h3>¿Quien Soy?</h3> 
  </div>

  <p>Hola, mi sobrenombre es Howler Bandog.</p>
  <p>Al tiempo que este proyecto se desarrolla, soy un estudiante en un grado de Desarrollo de Aplicaciones Web.</p>

  <h3>Battle Gardens</h3>
  <p>He elegido Battle Gardens como mi proyecto final de curso puesto que ha sido una idea que siempre he llevado conmigo y al fin tener la oportunidad de crear algo unico, algo que se sienta mio, algo por lo que vale invertir tiempo.</p>

  <?php else: ?>
  <div class="head_flotante">
    <h3>Mesa del <?php echo $datos["usuarioSesion"]->nombre?></h3> 
  </div>

  <div class="content_flotante">
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

  <div class="footer_flotante">

  </div>
</div>


<!-- BOTON QUE ABRE EL MENU LATERAL DEL PERFIL -->
<div id="rule_perfil" class="ml-open ov-per">
  <img id="open_perfil" onclick="openPerfil(true);" src="<?php echo RUTA_URL?>/img/varios/default_user.png" alt="">
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
    
    <a type="button" class="categoria_arq" data-bs-toggle="modal" data-bs-target="#accesibilidad_panel">Accesibilidad</a>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 3])):?>
    <a href="<?php echo RUTA_URL?>/arquitecto/vista_extraviado" class="categoria_arq">Modo Tester</a>
    <?php endif ?>

    <a href="<?php echo RUTA_URL?>" class="categoria_arq">Libro de Usuario</a>

    <a href="<?php echo RUTA_URL?>/login/logout" class="categoria_arq">Cerrar Sesion</a>
    
  </div>
  <div class="footer_mf">

  </div>
</div>

<!-- MENU LATERAL DE PERFIL RESPONSIVE-->
<div id="menu_perfil_rpv" class="menu_flotante_rpv" style="z-index: -1;">
  
  <div class="head_flotante">
    <h3><?php echo $datos["usuarioSesion"]->nickname?></h3> 
  </div>

  <div class="content_flotante">
    
    <a href="<?php echo RUTA_URL?>/site/profile" class="categoria_arq_rpv">Mi Pefil</a>
    
    <a type="button" class="categoria_arq_rpv" data-bs-toggle="modal" data-bs-target="#accesibilidad_panel">Accesibilidad</a>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 3])):?>
    <a href="<?php echo RUTA_URL?>/arquitecto/vista_extraviado" class="categoria_arq_rpv">Modo Tester</a>
    <?php endif ?>

    <a href="<?php echo RUTA_URL?>" class="categoria_arq_rpv">Libro de Usuario</a>

    <a href="<?php echo RUTA_URL?>/login/logout" class="categoria_arq_rpv">Cerrar Sesion</a>
    
  </div>
  <div class="footer_flotante">

  </div>
</div>





<!-- Menu de Arquitecto Basico Horizontal -->
<nav class="creator_nav">
  <ul class="nav_container">
    <li class="responsive_icon"><button class="responsive_btn" onclick="display_nav();"><i class="fa fa-bars" aria-hidden="true"></i></button></li>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1])): ?>
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_usuario">Usuarios</a></li>
    <?php endif ?>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 3])): ?>
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_extraviado">Extraviados</a></li>
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_artefacto">Artefactos</a></li>
    <?php endif ?>
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 2])): ?>
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_historia">Historias</a></li>
    <?php endif ?>
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_evento">Eventos</a></li>
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/arquitecto/vista_publicacion">Publicaciones</a></li>

  </ul>

  <ul id="responsive-nav" class="nav_container_rpsv" style="display: none;">
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

<div class="modal fade" id="accesibilidad_panel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header mh-c">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ACCESIBILIDAD</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body mb-c">
        
        <div class="element_view">
            <label for="colores" class="l-form">CONTRASTE</label>
            <select id="colores" name="color_select" onchange="fetch_color(this);">
              <option value="base" <?php echo ($datos['accesibilidad']->color == 'base') ? 'selected': '';?>>NORMAL</option>
              <option value="cyber" <?php echo ($datos['accesibilidad']->color == 'cyber') ? 'selected': '';?>>MEDIO</option>
              <option value="monocrom" <?php echo ($datos['accesibilidad']->color == 'monocrom') ? 'selected': '';?>>ALTO</option>
            </select>
        </div>
        <div class="element_view">
        <label for="font-size" class="l-form">TAMAÑO LETRA</label>
            <select id="font-size" name="size_select" onchange="fetch_letra(this);">
              <option value="pequena" <?php echo ($datos['accesibilidad']->letra == 'pequena') ? 'selected': '';?>>PEQUEÑA</option>
              <option value="mediana" <?php echo ($datos['accesibilidad']->letra == 'mediana') ? 'selected': '';?>>MEDIANA</option>
              <option value="grande" <?php echo ($datos['accesibilidad']->letra == 'grande') ? 'selected': '';?>>GRANDE</option>
            </select>
        </div>
        
      </div>
    </div>
  </div>
</div>

