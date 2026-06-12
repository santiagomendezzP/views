<?php 
session_start();
?>
<style>
  /* Unos pequeños estilos CSS para darle algo más de vida a la tabla */
  table table{ background: rgba(0,0,0,0.1); }
  table thead{ background: rgba(10,51,181,0.5);}
  table thead th{transition: ease 0.6s;}
  table thead th:hover{ background: rgba(10,51,181,1); }
  table thead th div{ color: rgba(255,255,255,0.9); font-weight: bold; font-family: cursive;}
  table tbody td{ color:rgba(0,0,0,1); }
</style>
<div class="table-responsive">
	<table class="table table-striped table-border table-hover" id="table_reportes">
		<thead>
			<th title=" Fecha de citación "><div> Fecha </div></th>
			<th title="Nombre del visitante"><div>Nombre</div></th>
			<th title="Número de documento del visitante "><div>Cédula</div></th>
			<th title=""><div>Proceso</div></th>
			<th><div> C. Costos </div></th>
			<th><div>Cargo</div></th>
			<th><div>Asistencia</div></th>
			<th><div>¿Aprobo?</div></th>
			<th><div>Hoja de vida</div></th>
			<th><div>Encargado</div></th>
		</thead>
		<tfoot>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
		</tfoot>
	</table>
</div>
<?php
	if (isset($_SESSION['intranet_permitions']) && isset($_SESSION['loggedin_intranet'])){
		if (in_array("Autorización de visitas",$_SESSION['intranet_permitions']) || in_array("Verificación de entrada",$_SESSION['intranet_permitions']) && $_SESSION['loggedin_intranet'] === true){
			echo '<script src="../../controller/segurity/crud-segurity.js"></script>';
		}else{
			header('location:../home/?'.password_hash(mt_rand(), PASSWORD_DEFAULT));
		}
	}else{
		header('location:../../views/?'.password_hash(mt_rand(), PASSWORD_DEFAULT));
	}
?>
<script>
	$(document).ready(function(){
		generateTransportes('tipo_visita','ENTREVISTA');
		$("#btn_formulario").hide();
	});

/* Actualiza la tabla de reportes */
setInterval(function(){table_reportes.ajax.reload();},15000);
</script>