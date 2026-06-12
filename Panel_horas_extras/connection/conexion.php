<?php 

	class conectar{
		
		//aca van mis atributos
		private $host="localhost";
		private $usuario = 'root';
		private $password = '';
		private $bd = 'intranet';
		
		public function conexion(){
			$conexion = mysqli_connect($this->host,$this->usuario,$this->password,$this->bd);
			$conexion->set_charset('utf8');
			return $conexion;
		}
	}
