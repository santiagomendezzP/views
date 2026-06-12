<?php
/** 
 * @author David Santiago patiño caceres Delta A Salud Developer. 
 * */
class nombres {

    public function nombre_pro($con, $id){
        
        $consul =mysqli_query($con,"SELECT  `proyecto` FROM c_costos WHERE id_proyecto = '$id'");
        $ret =mysqli_fetch_array($consul);
        $nom_pro = $ret['proyecto'];
        return $nom_pro;
    }
    public function nombre_car($con, $id){
        
        $consul =mysqli_query($con,"SELECT `cargo` FROM cargos WHERE id_cargo = '$id'");
        $ret =mysqli_fetch_array($consul);
        $nom_car = $ret['cargo'];
        return $nom_car;
    }
    public function nombre_jefe($con, $id_jefe){
        
        $consul =mysqli_query($con,"SELECT `nombres`,`apellidos`FROM usuario WHERE id_usuario = '$id_jefe'");
        $nom_j =mysqli_fetch_array($consul);
        $nom_jefe = $nom_j['nombres']."".$nom_j['apellidos'];
        return $nom_jefe;
    }

}

?>