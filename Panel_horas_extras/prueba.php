<?php

include ("./conexion.php");


$query_documentos = mysqli_query($con,"SELECT DISTINCT( `documento`) FROM `reporte_horas` WHERE `proyecto` = 26 AND `estado_jefe` = 0  ");

while ($row = mysqli_fetch_assoc($query_documentos)) {
    /*traemos id reportes*/

        $query_reportes= mysqli_query($con,"SELECT a.`id_reporte`, b.`codigo_concepto`, COUNT(b.codigo_concepto), sum(b.horas_extras) as 'horas_extras' , sum(b.horas_recargo) as 'horas_recargo' FROM `reporte_horas` a, detalle_reporte b 
        WHERE a.documento = '$row[documento]' AND a.`estado_jefe` = 0 AND a.`fecha_registro`  BETWEEN '2021-12-20' AND '2022-01-22' AND a.id_reporte = b.id_reporte GROUP by b.codigo_concepto  ");
        
        $res=0;
        $codigo_antes= '';
        echo "Documento:  $row[documento] <br>";
        while ($fila = mysqli_fetch_assoc($query_reportes)) {
            $total= $fila['horas_extras']==0||$fila['horas_extras']==''?$fila['horas_recargo']:$fila['horas_extras'];
                echo "codigo concepto: $fila[codigo_concepto]    total $total<br>";
        }   
}



/*
recargo_noct 


recargo_noct_dom 


recargo_diur_dom 
*/
