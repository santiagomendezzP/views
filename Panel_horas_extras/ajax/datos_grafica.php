<?php
require("../connection/conexion.php");
session_start();
$obj = new conectar();
$mysqli = $obj->conexion();

if(isset($_POST['grafica'])){
    $fecha = date("Y-m-d");
    $fecha_2 = date("Y-m"); 
    $fecha_2 = $fecha_2."-01"; 
    $id_usuario = $_SESSION['intranet_id'];
    if ($_SESSION['intranet_id'] == 481) {
        $id_usuario = 881;
        // $fecha_inicial_carga = '2024-02-01';
        // $fecha_fin_carga = '2024-03-25';
        // $fecha_fin_carga_2 = '2024-03-26';
    }
    

        $contador_fecha = mysqli_query($mysqli,"SELECT estado_jefe,COUNT(`estado_jefe`)FROM `reporte_horas`
                                WHERE `fecha_registro` BETWEEN'$fecha_2'AND'$fecha' and `id_jefe` = '$id_usuario'group by `estado_jefe`");
            echo json_encode([mysqli_fetch_all($contador_fecha)]);
}
if(isset($_POST['tendencias'])){
    $fecha = date("Y-m-d");
    $fecha_2 = date("Y-m"); 
    $fecha_2 = $fecha_2."-01"; 
    $id_usuario = $_SESSION['intranet_id'];
    if ($_SESSION['intranet_id'] == 481) {
        $id_usuario = 881;
        // $fecha_inicial_carga = '2024-02-01';
        // $fecha_fin_carga = '2024-03-25';
        // $fecha_fin_carga_2 = '2024-03-26';
    }
    

        $contador_fecha = mysqli_query($mysqli,"SELECT estado_jefe,COUNT(`estado_jefe`)FROM `reporte_horas`
                                WHERE `fecha_registro` BETWEEN'$fecha_2'AND'$fecha' and `id_jefe` = '$id_usuario'group by `estado_jefe`");
            // echo json_encode([mysqli_fetch_all($contador_fecha)]);
}