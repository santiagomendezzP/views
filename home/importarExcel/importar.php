<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<!-- <input type="file" name="archivo">
		<input type="submit" name="importar"> -->
	</form>
</body>
</html>
<?php
	require 'conexion.php';
	if(isset($_POST["importar"])){
		//LIBRERIA EXCEL 
		require_once ('PHPExcel/Classes/PHPExcel/IOFactory.php');
		require_once ('PHPExcel/Classes/PHPExcel.php');
		//OBTENER LIBRERIA 
		$archivo = $_FILES["archivo"]["name"];
		$archivo_ruta = $_FILES["archivo"]["tmp_name"];
		$archivo_guardado = "COPIA_".$archivo;
		if (copy($archivo_ruta, $archivo_guardado)) {
			echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la importacion con éxito\", \"success\");});</script>";
		}else{
			echo "NO COPIADO";
		}
		$objPHPExcel = PHPExcel_IOFactory::load($archivo_guardado);
		//cargar hoja de calculo
		$objPHPExcel -> setActiveSheetIndex(0);
		$num_filas = $objPHPExcel -> setActiveSheetIndex(0) -> getHighestRow();
		for ($i=2; $i <= $num_filas; $i++) {
			//DATOS EXCEL
			$documento_trabajador = $objPHPExcel -> getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
			$documento_jefe = $objPHPExcel -> getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
			$sql = mysqli_query($mysqli,"SELECT * FROM `usuario` WHERE `codigo` = '$documento_jefe'");
			while($row = mysqli_fetch_assoc($sql)){
				$id_jefe = $row['id_usuario'];

			}
			$update =  "UPDATE `usuario` SET `id_jefe_inmediato` = '$id_jefe' WHERE `codigo` = '$documento_trabajador' ";
			$resultado = $mysqli->query($update);
		}
	}
?>
<!-- <script>
	function redireccionar(){window.location="../beneficios_contabilidad_gestionH.php";}
	setTimeout ("redireccionar()", 10);
</script> -->