<?php 
class Datos{

    public function correo_jefe($con,$id_jefe){
        $consulta = mysqli_query($con,"SELECT * FROM `usuario` WHERE `id_usuario` = '$id_jefe'");
        $array = mysqli_fetch_assoc($consulta);

        if (isset($array['correo'])) {
            $correo_jefe = $array['correo'];
            return  $correo_jefe;
        }
    }

    public function nombre_solicitante($con,$id_r){
        $consulta = mysqli_query($con,"SELECT * FROM `reporte_horas` WHERE `id_reporte` = '$id_r'");
        $array = mysqli_fetch_assoc($consulta);

        if (isset($array['nombre_trabajador'])) {
            $nombre_solicitante = $array['nombre_trabajador'];
            return  $nombre_solicitante;
        }
    }
    
    public function documento_solicitante($con,$id_mentiritas){
        $consulta = mysqli_query($con,"SELECT * FROM `reporte_horas` WHERE `id_reporte` = '$id_mentiritas'");
        $array = mysqli_fetch_assoc($consulta);

        if (isset($array['documento'])) {
            $documento_solicitante = $array['documento'];
            return  $documento_solicitante;
        }
    }

    public function correo_solicitante($con,$documento_solicitante){
        $consulta = mysqli_query($con,"SELECT `correo` FROM `usuario` WHERE `codigo` = '$documento_solicitante'");
        $array = mysqli_fetch_assoc($consulta);

        if (isset($array['correo'])) {
            return  $array['correo'];
        }
    }
    
}
?>