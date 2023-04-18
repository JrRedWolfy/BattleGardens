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



<nav class="topnav" id="myTopnav">
  <ul>
    <li><a href="<?php echo RUTA_URL?>/site">Home</a></li>
    <li><a href="<?php echo RUTA_URL?>/site/noticias">News</a></li>
    <li><a href="<?php echo RUTA_URL?>/site/universo">Universo</a></li>
    <li><a href="<?php echo RUTA_URL?>/site/comunidad">Comunidad</a></li>
    <li><a href="<?php echo RUTA_URL?>/site/comunidad">Mi Perfil</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
        <li><a class="dropdown-item" href="#">Preferencias</a></li>
        <li><a class="dropdown-item" href="<?php echo RUTA_URL?>/login/logout">Cerrar Sesion</a></li>
      </ul>
    </li>
    <li class="icon" onclick="myFunction();"><i class="fa-solid fa-bars"></i></li>
  </ul>
  
</nav>
 
<div onclick="mesa_arquitecto();">
<i class="fa-solid fa-gear"></i>
</div>
    
<button id="cerrar_sesion" type="button" class="btn btn-outline-danger btn-sm ml-auto"><a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL?>/login/logout">Cerrar Sesion</a></button>
  