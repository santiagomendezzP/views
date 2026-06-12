<?php
 
class validaciones{ 

    public function valida($dia, $ced){
        $con = new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet");
        if($dia == "Mon"){
                $fecha = date("Y-m-d");
                $consul =mysqli_query($con,"SELECT  * FROM test WHERE cedula = '$ced' and (fecha like '$fecha%')");
                $numero = mysqli_num_rows($consul);
            
        }
        if($dia == "Tue"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM test WHERE cedula = '$ced' and (fecha like '$fecha%' or fecha like '$lun%' and cedula = '$ced')");
                $numero = mysqli_num_rows($consul);
            
        }
        if($dia == "Wed"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 2 days"));
                $mar = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM test WHERE  cedula = '$ced' and (fecha like '$fecha%' or fecha like '$lun%' or fecha like '$mar%')");
                $numero = mysqli_num_rows($consul);
              
            
        }
        if($dia == "Thu"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 3 days"));
                $mar = date("Y-m-d",strtotime($fecha."- 2 days"));
                $mie = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM test WHERE cedula = '$ced' and (fecha like '$fecha%' or fecha like '$lun%' or fecha like '$mar%' or fecha like '$mie%')");
                $numero = mysqli_num_rows($consul);
            
        }
        if($dia == "Fri"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 4 days"));
                $mar = date("Y-m-d",strtotime($fecha."- 3 days"));
                $mie = date("Y-m-d",strtotime($fecha."- 2 days"));
                $jue = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM test WHERE cedula = '$ced' and (fecha like '$fecha%' or fecha like '$lun%' or fecha like '$mar%' or fecha like '$mie%' or fecha like '$jue%')");
                $numero = mysqli_num_rows($consul);
            
        }

        if($dia == "Sat"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 5 days"));
                $mar = date("Y-m-d",strtotime($fecha."- 4 days"));
                $mie = date("Y-m-d",strtotime($fecha."- 3 days"));
                $jue = date("Y-m-d",strtotime($fecha."- 2 days"));
                $vie = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM test WHERE cedula = '$ced' and (fecha like '$fecha%' or fecha like '$lun%' or fecha like '$mar%' or fecha like '$mie%' or fecha like '$jue%' or fecha like '$vie%' )");
                $numero = mysqli_num_rows($consul);
            
        }

        if($dia == "Sun"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 6 days"));
                $mar = date("Y-m-d",strtotime($fecha."- 5 days"));
                $mie = date("Y-m-d",strtotime($fecha."- 4 days"));
                $jue = date("Y-m-d",strtotime($fecha."- 3 days"));
                $vie = date("Y-m-d",strtotime($fecha."- 2 days"));
                $sab = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM test WHERE cedula = '$ced' and  (fecha like '$fecha%' or fecha like '$lun%' or fecha like '$mar%' or fecha like '$mie%' or fecha like '$jue%' or fecha like '$vie%'  or fecha like '$sab%')");
                $numero = mysqli_num_rows($consul);
            
        }
        return $numero;

    }
    public function valida_tabla2($dia, $id){
        $con = new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet");
        if($dia == "Mon"){
                $fecha = date("Y-m-d");
                $consul =mysqli_query($con,"SELECT  * FROM escuesta_semanal WHERE id_usuario = '$id' and (fecha like '$fecha%')");
                $numero = mysqli_num_rows($consul);
            
        }
        if($dia == "Tue"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM escuesta_semanal WHERE id_usuario = '$id' and (fecha like '$fecha%' or fecha like '$lun%' and id_usuario = '$id')");
                $numero = mysqli_num_rows($consul);
            
        }
        if($dia == "Wed"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 2 days"));
                $mar = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM escuesta_semanal WHERE  id_usuario = '$id' and (fecha like '$fecha%' or fecha like '$lun%' or fecha like '$mar%')");
                $numero = mysqli_num_rows($consul);
              
            
        }
        if($dia == "Thu"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 3 days"));
                $mar = date("Y-m-d",strtotime($fecha."- 2 days"));
                $mie = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM escuesta_semanal WHERE id_usuario = '$id' and (fecha like '$fecha%' or fecha like '$lun%' or fecha like '$mar%' or fecha like '$mie%')");
                $numero = mysqli_num_rows($consul);
            
        }
        if($dia == "Fri"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 4 days"));
                $mar = date("Y-m-d",strtotime($fecha."- 3 days"));
                $mie = date("Y-m-d",strtotime($fecha."- 2 days"));
                $jue = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM escuesta_semanal WHERE id_usuario = '$id' and (fecha like '$fecha%' or fecha like '$lun%' or fecha like '$mar%' or fecha like '$mie%' or fecha like '$jue%')");
                $numero = mysqli_num_rows($consul);
            
        }

        if($dia == "Sat"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 5 days"));
                $mar = date("Y-m-d",strtotime($fecha."- 4 days"));
                $mie = date("Y-m-d",strtotime($fecha."- 3 days"));
                $jue = date("Y-m-d",strtotime($fecha."- 2 days"));
                $vie = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM escuesta_semanal WHERE id_usuario = '$id' and (fecha like '$fecha%' or fecha like '$lun%' or fecha like '$mar%' or fecha like '$mie%' or fecha like '$jue%' or fecha like '$vie%' )");
                $numero = mysqli_num_rows($consul);
            
        }

        if($dia == "Sun"){
                $fecha = date("Y-m-d");
                $lun = date("Y-m-d",strtotime($fecha."- 6 days"));
                $mar = date("Y-m-d",strtotime($fecha."- 5 days"));
                $mie = date("Y-m-d",strtotime($fecha."- 4 days"));
                $jue = date("Y-m-d",strtotime($fecha."- 3 days"));
                $vie = date("Y-m-d",strtotime($fecha."- 2 days"));
                $sab = date("Y-m-d",strtotime($fecha."- 1 days"));
                $consul =mysqli_query($con,"SELECT  * FROM escuesta_semanal WHERE id_usuario = '$id' and  (fecha like '$fecha%' or fecha like '$lun%' or fecha like '$mar%' or fecha like '$mie%' or fecha like '$jue%' or fecha like '$vie%'  or fecha like '$sab%')");
                $numero = mysqli_num_rows($consul);
            
        }
        return $numero;

    }
}


?>