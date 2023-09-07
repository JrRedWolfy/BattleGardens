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
<body class="base mediana">

<!-- BOTON QUE ABRE EL MENU LATERAL DE ABOUT ME -->
<div id="rule_arquitecto" class="ml-open ov-arq">
  <img id="open_arquitecto" onclick="openArquitect(true);" src="<?php echo RUTA_URL?>/img/varios/hats.png" alt="">
  <div class="open-f fv-arq">

  </div>
</div>

<!-- MENU LATERAL DE ABOUT ME -->
<div id="menu_arquitecto" class="mv_arq menu_flotante">
  <div class="head_arquitecto">
    <h3>¿Quien Soy?</h3> 
  </div>

  <div class="about-me">

    <p>Hola, mi sobrenombre es Howler Bandog.</p>
    <p>Al tiempo que este proyecto se desarrolla, soy un estudiante en un grado de Desarrollo de Aplicaciones Web.</p>

    <h4>Battle Gardens</h4>
    <p>He elegido Battle Gardens como mi proyecto final de curso puesto que ha sido una idea que siempre he llevado conmigo y al fin tener la oportunidad de crear algo unico, algo que se sienta mio, algo por lo que vale invertir tiempo.</p>

  </div>

  <div class="footer_mf">

  </div>
</div>

<!-- MENU LATERAL DE ABOUT ME RESPONSIVE -->
<div id="menu_arquitecto_rpv" class="menu_flotante_rpv" style="z-index: -5;">
  <div class="head_flotante">
    <h3>¿Quien Soy?</h3> 
  </div>

  <div class="content_flotante">


    <p>Hola, mi sobrenombre es Howler Bandog.</p>
    <p>Al tiempo que este proyecto se desarrolla, soy un estudiante en un grado de Desarrollo de Aplicaciones Web.</p>

    <h3>Battle Gardens</h3>
    <p>He elegido Battle Gardens como mi proyecto final de curso puesto que ha sido una idea que siempre he llevado conmigo y al fin tener la oportunidad de crear algo unico, algo que se sienta mio, algo por lo que vale invertir tiempo.</p>

  </div>

  <div class="footer_flotante">

  </div>
</div>


<!-- BOTON QUE ABRE EL LOGIN -->
<div id="rule_perfil" class="ml-open ov-per">
  <img id="open_perfil" data-bs-toggle="modal" data-bs-target="#login_panel" src="<?php echo RUTA_URL?>/img/varios/default_user.png" alt="">
  <div class="open-f fv-per">

  </div>
</div>



<!-- Menu de Website Basico Horizontal -->
<nav class="creator_nav">
  <ul class="nav_container">
    <li class="responsive_icon"><button class="responsive_btn" onclick="display_nav();"><i class="fa fa-bars" aria-hidden="true"></i></button></li>
    
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/site/home">Home</a></li>
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/site/universo">Universo</a></li>
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/site/comunidad">Comunidad</a></li>

  </ul>

  <ul id="responsive-nav" class="nav_container_rpsv" style="display: none;">
    
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/site/home">Home</a></li>
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/site/universo">Universo</a></li>
    <li class="nav_block"><a class="nav_item" href="<?php echo RUTA_URL?>/site/comunidad">Comunidad</a></li>

  </ul>

</nav>


<!-- MODAL PARA LOGEARSE -->
<div class="modal fade" id="login_panel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header mh-c">
        <h1 class="modal-title fs-5" id="exampleModalLabel">INICIAR SESION</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body mb-c">
        <form method="post" action="<?php echo RUTA_URL ?>/login">

          <div class="element_view">
            <label for="nickname" class="l-form">Nickname </label>
            <input id="nickname" type="text" name="nickname" class="form-control" placeholder="" required >
          </div>

          <div class="element_view">
            <label for="password" class="l-form">Contraseña</label>
            <input id="password" type="password" name="clave" class="form-control"  placeholder="" required>
          </div>

          <!-- Dado que esto ahora esta en un modal, quizas habria que... hacer un fetch -->

          
          <?php if(isset($datos['error']) && $datos['error'] == "error_1"): ?> 
            <div class="alert alert-danger" role="alert">
              Usuario o contraseña incorrecto!!
            </div>
          <?php endif?>

          <br>
          <input type="submit" class="btn btn-success" value="Login"></input>
        </form>

        
      </div>
    </div>
  </div>
</div>