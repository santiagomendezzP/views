
<?php 
session_start();
?>
<style>
	/* Unos pequeños estilos CSS para darle algo más de vida a la tabla */
	table{ background: rgba(0,0,0,0.1); }
	thead{ background: rgba(10,51,181,0.5);}
	thead th{transition: ease 0.6s;}
	thead th:hover{ background: rgba(10,51,181,1); }
	thead th:hover div:before{ transform: scale(1);}
	thead th div{ color: rgba(255,255,255,0.9); font-weight: bold; font-family: cursive;}
	thead th div:before{ content:""; position: absolute; background:white; width: 80%; height: 5%; bottom:10%; transform: scale(0); transition: ease 0.6s;}
	tbody td{ color:rgba(0,0,0,1); }
</style>
<div class="table-responsive">
	<table class="table table-striped table-hover" id="table_database">
		<thead>
			<th><div>Visitante</div></th>
			<th><div>Documento</div></th>
			<th><div>Tipo visita</div></th>
			<th><div>Encargado</div></th>
			<th><div>Fecha de visita</div></th>
			<th><div>Opciones</div></th>
		</thead>
	</table>
</div>
<div class="modal fade" id="modalViews">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" >
					<i class="fas fa-times-circle btn-outline-dark" title="Cerrar"></i>
				</button>
				<h4 class="modal-title">Procedimineto del visitante</h4>
			</div>
			<div class="modal-body">
				<form class="form" id="formViews">
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<i class="icon wb-clipboard btn btn-lg" title="Número de solicitud" style="cursor: auto;"></i>
							<span class="badge badge-info up" title="Número de solicitud"><input type="button" value="0" id="id" style="cursor: auto; background-color: initial; border: none;" disabled></span>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6 text-right">
							<img src="../../assets/images/procesbar/usuarios.png" style="width: 100px; height: 100px" alt="Cargando..." id="foto">
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">¿Quién solicita?</label>
							<input type="text" class="form-control" id="solicitante" readonly>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Cargo</label>
							<input type="text" class="form-control" id="cargo" readonly>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Fecha y hora</label>
							<input type="text" class="form-control" id="solicitud" readonly placeholder="Fecha y hora de la solicitud">
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-4">
							<label for="">Visitante</label>
							<input type="text" class="form-control" id="visitante" readonly>
						</div>
						<div class="form-group col-xs-4">
							<label for="">Fecha de visita</label>
							<input type="text" class="form-control" id="fvisita" readonly>
						</div>
						<div class="form-group col-xs-4">
							<label for="">Hora de visita</label>
							<input type="text" class="form-control" id="hvisita" readonly>
						</div>	
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12" id="addFrecuente">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for=""> Fecha visita frecuente </label>
							<input type="text" id="ffrecuente" class="form-control" readonly>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="">Hora visita frecuente</label>
							<input type="text" id="hfrecuente" class="form-control" readonly>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Documento</label>
							<input type="text" class="form-control" id="documento" readonly>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">EPS</label>
							<input type="text" class="form-control" id="eps" readonly>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">ARL</label>
							<input type="text" class="form-control" id="arl" readonly>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Vehículo</label>
							<input type="text" class="form-control" id="vehiculo" readonly>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Placa</label>
							<input type="text" class="form-control" id="placa" readonly>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Tipo visita</label>
							<input type="text" class="form-control" id="tvisit" readonly>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Contacto de emergencia</label>
							<input type="text" class="form-control" id="contacto" readonly>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Parentesco</label>
							<input type="text" class="form-control" id="parentesco" readonly>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Motivo visita</label>
							<input type="text" class="form-control" id="mvisit" readonly>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Implementos y/o novedades del solicitante</label>
							<textarea id="implemento" cols="40" rows="3" readonly class="form-control">
							</textarea>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Observaciones por parte de seguridad</label>
							<textarea id="obs" cols="40" rows="3" readonly class="form-control">
							</textarea>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label for="">Estado de salud</label>
							<textarea id="salud" cols="40" rows="3" readonly class="form-control">
							</textarea>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="">Permite ingreso</label>							
							<input type="text" readonly class="form-control" id="ingreso">
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for=""><i class="fas fa-hourglass-half"></i></label>							
							<input type="text" readonly class="form-control" id="timeingreso">
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">				
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="">Permite salida</label>							
							<input type="text" readonly class="form-control" id="salida">
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for=""><i class="fas fa-hourglass-half"></i></label>							
							<input type="text" readonly class="form-control" id="timesalida">
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="normas">¿Casillero y carnet?</label>
							<input type="text" id="norma" class="form-control" disabled>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="">Empresa</label>
							<input type="text" id="empresa" class="form-control" readonly>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">				
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		tableDatabase('estado','4');
	});
	function openView(thats){
		var that = thats.split("░╠");
		$("#formViews").trigger("reset");
		$("#id").val(that[0]);
		$("#solicitante").val(that[1]);
		$("#cargo").val(that[2]);
		$("#solicitud").val(that[3]);
		$("#fvisita").val(that[4]);
		$("#hvisita").val(that[5]);
		$("#empresa").val(that[6]);
		if (that[7] == '0000-00-00' || that[7] == null || that[7] == ""){
			$("#addFrecuente").hide();
			$("#ffrecuente").val("");$("#hfrecuente").val("");
		}else{
			$("#addFrecuente").show();
			$("#ffrecuente").val(that[7]);$("#hfrecuente").val(that[8]);
		}
		$("#visitante").val(that[9]);
		$("#documento").val(that[10]);
		$("#eps").val(that[11]);
		$("#arl").val(that[12]);
		$("#tvisit").val(that[13]);
		$("#vehiculo").val(that[14]);
		$("#placa").val(that[15]);
		$("#mvisit").val(that[16]);
		$("#implemento").html(that[17]);
		if (that[18] == ''){
			$("#foto").attr("src","../../assets/images/procesbar/usuarios.png");
		}else{
			$("#foto").attr("src","../../assets/images/seguridad/"+that[18]);
		}
		$("#contacto").val(that[19]);
		$("#obs").val(that[20]);
		$("#salud").val(that[21]);
		$("#parentesco").val(that[22]);
		$("#ingreso").val(that[23]);
		$("#timeingreso").val(that[24]);
		$("#timesalida").val(that[25]);
		$("#salida").val(that[26]);
		$("#norma").val(that[27]);

		$("#modalViews").modal("show");
	}
</script>
<?php
	if (isset($_SESSION['intranet_permitions']) && isset($_SESSION['loggedin_intranet'])){
		if (in_array("Verificación de entrada",$_SESSION['intranet_permitions']) && $_SESSION['loggedin_intranet'] === true){
			echo '<script src="../../controller/segurity/crud-seguridad.js"></script>';
		}else{
			header('location:../home/?'.password_hash(mt_rand(), PASSWORD_DEFAULT));
		}
	}else{
		header('location:../../views/?'.password_hash(mt_rand(), PASSWORD_DEFAULT));
	}
?>