<?php
include ("../conexion.php");
$obs_class = new reporte_horas($con);

class reporte_horas 
{
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function datos_horas_reportes($documento_usuario)
    {
        $obj_dtos = new datosReporte($this->con);
        $datos_horas = $obj_dtos->cantidad_horas_reportadas($documento_usuario);
        return  json_encode($datos_horas);
    }

}

if (isset($_POST['peticion']) && $_POST['peticion'] == 'datos_horas_reportadas') {
    require_once ("../models/datosReporte.php");
    session_start();
    echo $obs_class->datos_horas_reportes($_SESSION['intranet_documento']);
}
