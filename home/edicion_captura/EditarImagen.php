
<?php
$mysqli = new mysqli("localhost", "desarrollo_delta", "*Delta2021*", "intranet"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
$mysqli->set_charset('utf8');
?>
<?php
if (isset($_POST['id_imagen'])) {
	$id_imagen = $_POST['id_imagen'];
	$sql = mysqli_query($mysqli, "SELECT * FROM `captura` WHERE  `imagen_ID` = '$id_imagen'");
	while ($row = mysqli_fetch_array($sql)) {
		$ct = '$c';
		$m = 'Seleccionar';
		$titulo_imagen = $row['imagen_Marca'];
		$tipo_imagen = $row['imagen_Tipo'];
		$nombre_imagen = $row['imagen_Img'];
		$link_imagen = $row['link'];

		if ($link_imagen == 'modelo/insert_bteam.php?c=$ct') {
			$m = 'El mejor equipo';
		} elseif ($link_imagen == 'modelo/insert_innovacion.php?c=$ct') {
			$m = 'Un paso adelante';
		} elseif ($link_imagen == 'modelo/insert_sst.php?c=$ct') {
			$m = 'Pautas SST';
		} elseif ($link_imagen == 'modelo/insert_quines.php?c=$ct') {
			$m = 'Quiénes somos';
		} elseif ($link_imagen == 'modelo/insert_soporte.php?c=$ct') {
			$m = 'Soporte TI';
		} elseif ($link_imagen == 'modelo/insert_transacciones.php?c=$ct') {
			$m = 'MIS TRANSACCIONES';
		} elseif ($link_imagen == 'modelo/insert_como_vamos.php?c=$ct') {
			$m = 'COMO VAMOS';
		} elseif ($link_imagen == 'modelo/insert_formacion.php?c=$ct') {
			$m = 'Formacion';
		}



		echo "<form method ='post' action='Edicion_captura/Actualizar.php' enctype='multipart/form-data' class='form-horizontal'>
		    <table class='table table-bordered table-responsive'>
				<tr>
					<td>
						<label class='control-label'>Titulo0.</label>
					</td>
					<td>
						<input type= 'hidden' name = 'id_imagen' id = 'id_imagen' value = '$id_imagen'> 
						<input class='form-control' type='text' name='user_name' id='user_name' value='$titulo_imagen' required />
					</td>
				</tr>
				<tr>
					<td>
						<label class='control-label'>Tipo.</label>
					</td>
					<td>
						<input class='form-control' type='text' name='user_job' id='user_job' value='$tipo_imagen' required />
					</td>
				</tr>
				<tr>
					<td>
						<label class='control-label'>Link.</label>
					</td>
					<td>
						<select class='form-control' id='link' name='link' value='$link_imagen'>
							<option value ='$link_imagen;'>$m</option>

							<option value='modelo/insert_quienes.php?c=$ct'>Quiénes somos</option>  
							<option value='modelo/insert_bteam.php?c=$ct'>El mejor equipo</option>
							<option value='modelo/insert_como_vamos.php?c=$ct'>Como vamos</option>
							<option value='modelo/insert_c_planeta.php?c=$ct'>Gestión ambiental</option>
							<option value='modelo/insert_soporte.php?c=$ct'>Soporte IT</option>    
							<option value='modelo/insert_sst.php?c=$ct'>Pautas SST</option> 
							<option value='modelo/insert_bfolder.php?c=$ct'>SG-VIDAS</option> 
							<option value='modelo/insert_for_all.php?c=$ct'>De interés para todos</option> 
							<option value='modelo/insert_s_admin.php?c=$ct'>Nuestra sede</option>
							<option value='modelo/insert_innovacion.php?c=$ct'>Innovamos para crecer</option>
							<option value='modelo/insert_transacciones.php?c=$ct'>Mis Transacciones</option>
							<option value='modelo/insert_formacion.php?c=$ct'>Formación virtual</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label class='control-label'>Imágen.</label>
					</td>
					<td>
						<p><img src='edicion_captura/imagenes/$nombre_imagen' height='150' width='150' /></p>
						<input class='input-group' type='file' name='user_image' id='user_image' accept='image/*'/>
					</td>
				</tr>
				<tr>
					<td>
						<button type='submit' name='btn_save_updates' id='btn_save_updates' class='btn btn-default'> <span class='glyphicon glyphicon-save'></span> Actualizar </button>
						<a class='btn btn-default' href='index.php'> <span class='glyphicon glyphicon-backward'></span> cancelar </a>
					</td>
				</tr>
		    </table>
		</form>";
	}
}
?>