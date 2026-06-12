<?php 
//datos para modal enviar
        require ("conexion.php");
        $id_cargo = $_SESSION['intranet_cargo'];
        $id_proyecto = $_SESSION['intranet_proyecto'];
        $id_jefe = $_SESSION['intranet_jefe'];
        //nombre cargo
        $consul =mysqli_query($con,"SELECT  `cargo` FROM cargos WHERE id_cargo = '$id_cargo'");
        $nom =mysqli_fetch_array($consul);
        $nom_car = $nom['cargo'];

        // NOMBRE PROYECTO
                
        $consulta_proyecto = mysqli_query($con,"SELECT * FROM `c_costos` WHERE `id_proyecto` = '$id_proyecto'");
        $array_proyecto = mysqli_fetch_array($consulta_proyecto);
        $nom_proyecto = $array_proyecto['proyecto'];
        //JEFES PARA TUTELAS 
        if($id_proyecto == 32 ){
                //nombre jefe 
                
                $jefes_tutelas = "<input type='text' class='form-control' value='ELIS YOSEPH CORREDOR ALCOCER' readonly> <br>";
                $jefes_tutelas = $jefes_tutelas."<input type='text' class='form-control' value='JENNY ALEXANDRA CABALLERO ALONSO' readonly> <br>";
                $jefes_tutelas = $jefes_tutelas."<input type='text' class='form-control' value='LEIDY JOHANA VASQUEZ TOCASUCHYL' readonly>";
                

        }else{
                //nombre jefe 
                
                $consul =mysqli_query($con,"SELECT  `nombres`,`apellidos`FROM usuario WHERE id_usuario = '$id_jefe'");
                $nom_j =mysqli_fetch_array($consul);
                $nom_jefe = $nom_j['nombres']." ".$nom_j['apellidos'];
                
        }
?>