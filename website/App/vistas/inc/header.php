<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NOMBRE_SITIO?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/6952d14819.js" crossorigin="anonymous"></script>
    <!--link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'-->
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="<?php echo RUTA_URL?>/site" class="active">Home</a>
  <a href="<?php echo RUTA_URL?>/site/noticias">News</a>
  <a href="<?php echo RUTA_URL?>/site/universo">Universo</a>
  <a href="<?php echo RUTA_URL?>/site/comunidad">Comunidad</a>
  <a href="#about">Soporte</a>
  <div class="dropdown">
    <button class="dropbtn"><a href="<?php echo RUTA_URL?>/site/profile"></a>
      <i class="fa fa-user"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Editar Perfil</a>
      <a href="#">Preferencias</a>
      <a href="<?php echo RUTA_URL?>/login/logout">Cerrar Sesion</a>
    </div>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>  

<button onclick="mesa_arquitecto();">ROLES Powers</button>