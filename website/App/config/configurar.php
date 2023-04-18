<?php

    // *** Desarrollo *** //
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // *** Desarrollo *** //


    //Ruta de la aplicación
    define('RUTA_APP', dirname(dirname(__FILE__)));

    //Ruta url, Ejemplo: http://localhost/atletismo
    define('RUTA_URL', 'http://localhost/battlegardens/website');

    DEFINE('NOMBRE_SITIO', 'Battle Gardens');

    // echo dirname(dirname(__FILE__))."<br>";
    // echo dirname(__FILE__)."<br>";
    // echo RUTA_APP."<br>";
    // echo RUTA_URL;

    //Configuración de la Base de datos
    define('DB_HOST', 'localhost');
    define('DB_USUARIO', 'root');
    define('DB_PASSWORD', '');
    define('DB_NOMBRE', 'battlegardens');
?>