<?php
session_start();
if (isset($_SESSION['intranet_usuario'])){
  include_once '../../personalizada/conexion.php';
  include_once '../../models/segurity/Visitante.php';
  include_once '../../models/segurity/Seguridad.php';
}
/* Objeto conexion */
$conexion = new Conexion();
$conectar = $conexion->conectionPDO();
/* Objetos operadores */
$seguridad = new Seguridad($conectar);
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
	<table class="table table-striped table-bordered" id="table_seguridad">
		<thead>
			<th title="Nombre del visitante"><div>Visitante</div></th>
			<th title="Documento del visitante"><div>Documento</div></th>
			<th title="Tipo de visita"><div>Tipo de visita</div></th>
			<th title="Nombre del usuario encargado del visitante"><div>Encargado</div></th>
			<th title="Vehículo"><div>Vehículo</div></th>
			<th title="Fecha en que llega el visitante"><div>Fecha de visita</div></th>
			<th><div>Opciones</div></th>
		</thead>
	</table>
</div>
<!-- =================== -->
<!-- Modals -->
<!-- =================== -->
<div class="modal fade" id="modalAutorizar">
	<div class="modal-dialog modal-lg">
	  	<div class="modal-content">
	    	<div class="modal-header"></div>
	    	<div class="modal-body">
	        	<form name="formAutorizar" id="formAutorizar">
	        		<input type="hidden" name="do" id="do" readonly>
	        		<div class="form-row col-xs-12 col-sm-12 col-md-12">
	        			<div class="form-group col-xs-6 col-sm-6 col-md-6">
		        			<button type="button" class="btn btn-dark btn-outline btn-round" style="cursor: auto;" title="Número de solicitud"><i class="icon wb-file"></i></button>
		        			<span class="badge badge-info up" title="Número de solicitud">
		        				<input type="button" name="idform" id="idform" style="border: none; background: initial; max-width: 100%; cursor: auto;" value="0" readonly>
		        			</span>
	        			</div>
	        			<div class="form-group col-xs-6 col-sm-6 col-md-6 text-right">
	        				<button type="button" class="btn btn-round btn-outline btn-dark btn-md" data-dismiss="modal" aria-label="Close" title="Cerrar">		                            
								<i class="icon wb-close"></i>
					        </button>
	        			</div>
	        		</div>
		        	<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
				  	  		<label>¿Quién solicita?</label>
							<input type="text" class="form-control" id="trabajador" placeholder="Nombres de solicitador" disabled>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label>Cargo</label>
							<input type="text" class="form-control" id="cargo" placeholder="Cargo de solicitador" disabled>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label>Fecha y hora de la solicitud <i class="icon wb-time btn btn-outline btn-round btn-info btn-xs" style="cursor:auto;"></i></label>
					  		<input type="text" class="form-control" id="fsolicitud" placeholder="Fecha de la solicitud" disabled>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<div class="form-row col-xs-12 col-sm-12 col-md-12">
								<div class="form-group col-xs-6 col-sm-6 col-md-6">
									<label for="">Fecha de visita</label>
									<input type="date" class="form-control" id="fvisit" placeholder="Fecha de visita" readonly>
								</div>
								<div class="form-group col-xs-6 col-sm-6 col-md-6">
									<label for="">Hora de visita</label>					
									<input type="time" class="form-control" id="hvisit" placeholder="Hora de visita" readonly>
								</div>
							</div>					 	
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label><span class="empresa" id="emp_cargo">Empresa o cargo</span></label>
							<input type="text" id="empresa" class="form-control empresa" readonly>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6" id="addProgramable">
							<div class="form-row col-xs-12 col-sm-12 col-md-12">
								<div class="form-group col-xs-6 col-sm-6 col-md-6">
									<label class="frecuente">Fecha frecuente</label>
									<input type="date" id="ffrecuente" class="form-control frecuente" readonly>
								</div>
								<div class="form-group col-xs-6 col-sm-6 col-md-6">
									<label class="frecuente">Hora frecuente</label>
									<input type="time" id="hfrecuente" class="form-control frecuente" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="putvisitname">Visitante</label>
						  	<input type="text" class="form-control" id="visitante" placeholder="Nombre del visitante" readonly>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="putvisitdoc">Documento</label>
						  	<input type="text" class="form-control" name="documento" id="documento" placeholder="Documento del visitante">
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-3 col-sm-3 col-md-3">
							<label>EPS</label>
						 	<select class="form-control" name="eps" id="eps" required>
						 		<option value="">-- Selecciona --</option>
						 		<?php foreach ($seguridad->readEps() as $eps):?>
						 		<option value="<?php echo $eps->getEps(); ?>"><?php echo $eps->getEps(); ?></option>
						 		<?php endforeach; ?>
				            </select>
						</div>
						<div class="form-group col-xs-3 col-sm-3 col-md-3">
							<label for="visitarl">ARL</label>					 	
						 	<select class="form-control" name="arl" id="arl" required>
						 		<option value="">-- Selecciona --</option>
						 		<?php foreach ($seguridad->readArl() as $arl):?>
						 		<option value="<?php echo $arl->getArl(); ?>"><?php echo $arl->getArl(); ?></option>
						 		<?php endforeach; ?>
				            </select>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label>Tipo de visita</label>
							<input type="button" class="form-control" id="tvisit" readonly>
							<i class="fas fa-id-card-alt" id="carnet"></i>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-3 col-sm-3 col-md-3">
						  <label>Vehículo</label>
							<select name="vehiculo" id="vehiculo" class="form-control">
								<option value="">-- NO AGENDAR -- </option>
								<option>CARRO</option>
								<option>MOTO</option>
								<option>BICICLETA</option>
							</select>
						</div>
						<div class="form-group col-md-3 col-sm-3 col-md-3">
							<label>Placa</label>
							<input type="text" name="placa" id="placa" class="form-control" placeholder="---000">
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label class="mvisit">Motivo visita</label>
							<input type="text" id="mvisit" class="form-control" readonly>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label>Contacto de emergencia</label>
							<input type="text" class="form-control" name="contacto" id="contacto" placeholder="Contacto de emergencia" required>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label>Parentesco</label>
							<select name="parentesco" id="parentesco" class="form-control" required>
								<option value="" selected> -- Selecciona -- </option>
								<option>FAMILLIAR</option>
								<option>CONOCIDO</option>
								<option>AMIGO</option>
							</select>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<div class="form-row col-xs-12 col-sm-12 col-md-12">
								<div class="form-group col-xs-6 col-sm-6 col-md-6">
									<label>Carnet</label>
									<select name="carnet" class="form-control">
										<option value="">-- selecciona --</option>
										<?php foreach ($seguridad->readCarnets() as $carnet):?>
										<option value="<?php echo $carnet->getNormas(); ?>"><?php echo $carnet->getNormas();?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group col-xs-6 col-sm-6 col-md-6">
									<label>Casillero</label>
									<select name="casillero" id="casillero" class="form-control">
										<option value=""> -- Selecciona -- </option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<div class="form-row col-xs-12 col-sm-12 col-md-12">
								<div class="form-group col-xs-6 col-sm-6 col-md-6">
									<label>Escoge la foto</label>
									<input type="file" class="form-control btn-dark" name="foto" id="foto" required accept="image/png, image/jpeg">
								</div>
								<div class="form-group col-xs-6 col-sm-6 col-md-6">
									<label for="id_normas" title="El visitante ha leìdo las normas de seguridad?">¿Normas de seguridad?</label><br>
									<input type="checkbox" name="normas" id="id_normas" value="SI" required title='Click para "Si"'> Si.
								</div>
							</div>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label>Novedad por parte del solicitante</label>
							<textarea id="novedad" rows="3" class="form-control" title="En este campo el trabajador(Solicitante) te dejara una nota de lo que ingresa el visitante." readonly></textarea>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label>Información de salud</label>
							<textarea name="salud" id="salud" rows="3" placeholder="¿Qué estado de salud identifíca?" class="form-control" required title="Este campo es obligatorio, debes poner una información de salud breve del visitante"></textarea>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<label>Observaciones</label>
							<textarea name="obs" id="obs" rows="3" placeholder="Pon alguna observación" class="form-control" required title="Campo opcional"></textarea>
						</div>
					</div>
	 				<div class="form-row col-xs-12 col-sm-12 col-md-12">
	 					<div class="form-group col-xs-6 col-sm-6 col-md-6 text-left">
	 						<button type="button" class="btn btn-warning" id="putWait">Poner en espera</button>
	 					</div>
	 					<div class="form-group col-xs-6 col-sm-6 col-md-6 text-right">
	  						<button type="submit" class="btn btn-primary">Verificar ingreso</button>
	 					</div>
	 				</div>
				</form>
			</div>
			<div class="modal-footer">
    		</div>
		</div>
	</div>
</div>
<div class="modal fade modal-fill-in" id="modalSalida" style="background-color: #c2c2c2;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body">
				<form id="formSalida">
					<div class="form-row col-xs-12">
	        			<div class="form-group col-xs-6">
		        			<button type="button" class="btn btn-dark btn-outline btn-round" style="cursor: auto;" title="Número de solicitud"><i class="icon wb-file"></i></button>
		        			<span class="badge badge-info up" title="Número de solicitud">
		        				<input type="button" name="id" class="idform" style="border: none; background: initial; max-width: 100%; cursor: auto;" value="0" readonly>
		        			</span>
	        			</div>
	        			<div class="form-group col-xs-6 text-right">
	        				<button type="button" class="btn btn-round btn-outline btn-dark btn-md" data-dismiss="modal" aria-label="Close" title="Cerrar">		                            
								<i class="icon wb-close"></i>
					        </button>
	        			</div>
	        		</div>
					<div class="form-row col-xs-12">
						<div class="form-group col-xs-6">
							<label>Implementos y/o novedades por parte del encargado</label>
							<textarea id="msmencargado" cols="15" rows="5" class="form-control" readonly></textarea>
						</div>
						<div class="form-group col-xs-6">
							<label> Visitante <div id="visitanteSalida"></div></label>
							<img src="../../assets/images/procesbar/usuarios.png" id="imgSalida" alt="" style="max-width: 100%; max-height: 100%">
						</div>
					</div>
					<div class="form-row col-xs-12">
						<div class="form-group col-xs-6">
							<label> Observaciones: </label>
							<textarea name="oldobs" id="oldobs" cols="15" rows="5" class="form-control" readonly></textarea>
						</div>
						<div class="form-group col-xs-6">
							<label> Agrega otra observación </label>
							<input type="text" maxlength="100" id="newobs" value=" " class="form-control">
						</div>
					</div>
					<div class="form-row col-xs-12">
						<div class="form-group col-xs-6">
							<label class="norma">Casillero y carnet</label>
							<input type="text" class="form-control norma" id="norma" readonly>
						</div>
						<div class="form-group col-xs-6">
							<button type="submit" class="btn btn-primary">Verificar salida</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalImprevisto">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body">
				<form id="formImprevisto">
					<input type="hidden" name="do" value="a" readonly>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="">Nombre del visitante</label>
							<input type="text" name="name" id="nameimprevisto" maxlength="50" class="form-control" required>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="">Documento del visitante</label>
							<input type="text" name="documento" id="imprevistoDocumento" maxlength="25" class="form-control" required>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="">EPS</label>
							<select name="eps" class="form-control" required>
								<option value=""> -- Selecciona -- </option>
								<?php foreach ($seguridad->readEps() as $eps):?>
						 		<option value="<?php echo $eps->getEps(); ?>"><?php echo $eps->getEps(); ?></option>
						 		<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="">ARL</label>
							<select name="arl" class="form-control" required>
								<option value=""> -- Selecciona -- </option>
								<?php foreach ($seguridad->readArl() as $arl):?>
						 		<option value="<?php echo $arl->getArl(); ?>"><?php echo $arl->getArl(); ?></option>
						 		<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for=""> Observaciones </label>
							<textarea name="obs" class="form-control" cols="30" rows="10" required></textarea>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<label for="">A quien visita</label>
							<input type="text" maxlength="40" name="trabajador" class="form-control" required>
							<label for="photo"> Foto </label>
							<input type="file" class="form-control" name="foto" id="photo" placeholder="Cargar la foto" title="Carga la foto del imprevisto" required accept="image/png, image/jpeg">
						</div>
					</div>
					<div class="form-row col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<button type="button" data-dismiss="modal" class="btn btn-dark">Cancelar</button>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-6">
							<button class="btn btn-warning">Registrar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<?php
	if (isset($_SESSION['intranet_permitions']) && isset($_SESSION['loggedin_intranet'])){
		if (!in_array("Verificación de entrada",$_SESSION['intranet_permitions']) && $_SESSION['loggedin_intranet'] === true){
			header("location:../home/?".mt_rand());
		}else if (in_array("Verificación de entrada",$_SESSION['intranet_permitions'])){
			echo '<script src="../../controller/segurity/crud-seguridad.js"></script>';
		}else{
			header('location:../home/?'.password_hash(mt_rand(), PASSWORD_DEFAULT));
		}
	}else{
		header('location:../../views/?'.password_hash(mt_rand(), PASSWORD_DEFAULT));
	}
?>
<script>
	$(document).ready(function(){
		updateTable('1','1');
	});
	function openModals(modals){
		$(modals).modal("show");
	}
	function openIngreso(thats){
		$("#formAutorizar").trigger("reset");
		var that = thats.split("░╠");
		 $("#idform").val(that[0]);
		 $("#trabajador").val(that[1]);
		 $("#cargo").val(that[2]);
		 $("#fsolicitud").val(that[3]);
		 $("#fvisit").val(that[4]);
		 $("#hvisit").val(that[5]);
		 $("#empresa").val(that[6]);
		 if (that[7] == "" || that[7] == "0000-00-00"){ $(".frecuente").hide();	$("#ffrecuente").val('');$("#hfrecuente").val('');
		 }else{	$(".frecuente").show();	$("#ffrecuente").val(that[7]);$("#hfrecuente").val(that[8]); }
		 $("#visitante").val(that[9]);
		 $("#documento").val(that[10]);
		 $("select").prop("option:selected",$("#eps").val(that[11]));
		 $("select").prop("option:selected",$("#arl").val(that[12]));
		 $("#tvisit").val(that[13]);
		 /*Condicional formulario dinamico*/
		 // Variacion de texto en la etiqueta label y cajas de texto en cuanto cargo o visita segun el tipovisita
		 if (that[13] == "VIP" || that[13] == "PERSONAL"){
		 	$("#emp_cargo").text('');$(".mvisit").text("Motivo visita");$(".empresa").hide();
		 }else if (that[13] == "CLIENTE" || that[13]=="PROVEEDOR"){
		 	$("#emp_cargo").text("Empresa");$(".empresa").show();$(".mvisit").text("Motivo visita");
		 }else if (that[13] == "ENTREVISTA"){
		 	$("#emp_cargo").text("Cargo que aspira el visitante");$(".empresa").show();$(".mvisit").text("Centro de costos");
		 }else {
		 	$("#emp_cargo").text('');$(".empresa").hide();$(".mvisit").text("Motivo visita");
		 }
		 /*Condicional para la tuda visual del carnet*/
		 if (that[13] == "VIP" || that[13] == "PERSONAL" || that[13] == "CLIENTE"){$("#carnet").css({color:"green"});}else if (that[13] == "PROVEEDOR"){$("#carnet").css({color:"orange"});}else if(that[13] == "ENTREVISTA"){$("#carnet").css({color:"red"});}else{$("#carnet").css({color:'red'})}

		 $("#select").prop("option:selected",$("#vehiculo").val(that[14]));
		 $("#placa").val(that[15]);
		 $("#mvisit").val(that[16]);
		 $("#novedad").html(that[17]);
		$("#contacto").val(that[19]);
		$("#salud").val(that[21]);
		$("select").prop("option:selected",$("#parentesco").val(that[22]));

		 openModals('#modalAutorizar');
	}
</script>