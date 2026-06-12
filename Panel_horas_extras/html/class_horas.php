<?php 

class datos_h{
 
    function traer_total_horas($con,$id_r){

        $consulta = mysqli_query($con,"SELECT a.`id_reporte`, sum(b.horas_extras) as 'horas_extras' , sum(b.horas_recargo) as 'horas_recargo', a.fecha_registro FROM `reporte_horas` a, detalle_reporte b WHERE a.id_reporte = $id_r and a.id_reporte = b.id_reporte  GROUP by a.id_reporte ");

        $array = mysqli_fetch_assoc($consulta);
        $total_horas_extras = $array['horas_extras'];
        $total_horas_recargo = $array['horas_recargo'];

        $general_total_horas = ((int)$total_horas_extras + (int)$total_horas_recargo);
        
        return $general_total_horas;
    }
}
?>