<?php 
class nombres{

	public function nCargo($con,$num){

		$consul =mysqli_query($con,"SELECT  `cargo` FROM cargos WHERE id_cargo = '$num'");
		$nom =mysqli_fetch_array($consul);
		$nom_cargo = $nom['cargo'];
		return $nom_cargo;
	}

	public function npro($con,$nom){

		
		$consul =mysqli_query($con,"SELECT  `proyecto` FROM c_costos WHERE id_proyecto = '$nom'");
		$nom =mysqli_fetch_array($consul);
		$nom_pro = $nom['proyecto'];
		return $nom_pro;
		
	}



	public function nprocar($con,$id){

		
		$consul =mysqli_query($con,"SELECT  * FROM usuario WHERE id_usuario = '$id'");
		$nom =mysqli_fetch_array($consul);
		$nom_pro = $nom['nombres']."  ".$nom['apellidos'];
		return $nom_pro;
		
	}

	public function nfun($con,$cargo){

		
		$consul =mysqli_query($con,"SELECT * FROM funciones_c WHERE cargo = '$cargo'");
		$nom =mysqli_fetch_array($consul);
		$nom_fun = $nom['funciones'];
		return $nom_fun;
		
	}

	public function contrato($con,$codigo){

		
		$consul =mysqli_query($con,"SELECT * FROM usuario WHERE codigo = '$codigo'");
		$nom =mysqli_fetch_array($consul);
		$contrato_termino = $nom['contrato_termino'];
		return $contrato_termino;
		
	}

	

	
	public function tipo_documento($num){
		if($num == 1){
			$doc ="Cédula de ciudadanía";
		}elseif($num == 2){
			$doc ="Tarjeta de identidad";
		}elseif($num == 3){
			$doc ="Registro civil";
		}elseif($num == 4){
			$doc ="Cédula de extranjeria";
		}elseif($num == 5){
			$doc ="Pasaporte";
		}
		return $doc;

	}

	public function genero($num){
		if($num == 1){
			$gen ="Masculino";
		}else{
			$gen ="Femenino";
		} 
		return $gen;

	}

	public function perfil($num){
		if($num == 1){
			$pfl ="Administrador";
		}
		elseif($num == 2){ 

			$pfl ="subadministrador";
		}elseif($num == 3){
			$pfl ="usuario";
		
		}elseif($num == 4){
			$pfl ="Seguridad";
	
		}elseif($num == 5){
			$pfl ="Líder seguridad";

	    }else{
			$pfl ="Aprendiz";
	    }
		
		return $pfl;

	}

	public function ltrebajo($num){
		if($num == 1){
			$ltra ="Sede";
		}elseif($num == 2){
			$ltra ="Teletrabajo";
		}elseif($num == 3){
			$ltra ="Trabajo en casa";
		}else{
			$ltra ="vacío";
		} 
		return $ltra;

	}

	public function nombre_jefe($con,$id){
		if($id != 0){

		$sql =  mysqli_query($con,"SELECT * FROM usuario WHERE id_usuario = '$id'");
		$result = mysqli_fetch_assoc($sql);
		$nombre = $result['nombres']." ".$result['apellidos']; 
		} else {
			$nombre = "<p style='color : red;'>No hay jefe asignado</p>";
		}
		return $nombre;
	}
	public function npro_jefe($con,$id){
		
		$consul =mysqli_query($con,"SELECT  `proyecto` FROM c_costos WHERE lider = '$id'");
		$nom =mysqli_fetch_array($consul);
		$nom_pro = $nom['proyecto'];
		return $nom_pro;
		
	}

}

?>