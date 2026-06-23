<?php
//CONEXION LOCAL 
    //$mysqli = new mysqli("localhost", "root", "", "intranet"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
    //date_default_timezone_set('America/Bogota');
    //$mysqli->set_charset('utf8');
//CONEXION SERVIDOR
    $mysqli = new mysqli("localhost", "desarrollo_delta", "*Delta2021*", "intranet"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
    date_default_timezone_set('America/Bogota');
    $mysqli->set_charset('utf8');
?>