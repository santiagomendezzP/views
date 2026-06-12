<?php
include "conexion.php";
session_start();
$car= $_SESSION['intranet_cargo'];
$pro= $_SESSION['intranet_proyecto'];


$consul =mysqli_query($con,"SELECT  `cargo` FROM cargos WHERE id_cargo = '$car'");
$nom =mysqli_fetch_array($consul);
$nom_car = $nom['cargo'];


$consul =mysqli_query($con,"SELECT  `proyecto` FROM proyecto WHERE id_proyecto = '$pro'");
$nom =mysqli_fetch_array($consul);
$nom_pro = $nom['proyecto'];

$consul =mysqli_query($con,"SELECT  `lider` FROM c_costos WHERE id_proyecto = '$pro'");
$idJ =mysqli_fetch_array($consul);
$id_pro = $idJ['lider'];

$consul =mysqli_query($con,"SELECT * FROM usuario WHERE id_usuario = '$id_pro'");
$datos_jefe =mysqli_fetch_array($consul);
$nombre = $datos_jefe['nombres'];
$apellido = $datos_jefe['apellidos'];
$id_cargo_j = $datos_jefe['cargo'];
$correo_jefe = $datos_jefe['correo'];
$nombre_completo = $nombre." ".$apellido;

$consul =mysqli_query($con,"SELECT  `cargo` FROM cargos WHERE id_cargo = '$id_cargo_j'");
$nom =mysqli_fetch_array($consul);
$nom_car_j = $nom['cargo'];


?>

