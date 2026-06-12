<?php
session_start();
	if (isset($_SESSION['loggedin_intranet'])) {
		if ($_SESSION['loggedin_intranet'] === true){
			include_once '../../personalizada/conexion.php';
			include_once '../../models/segurity/Visitante.php';
			include_once '../../models/segurity/Solicitante.php';
			/* Objeto conexion */
			$conexion = new Conexion;
			$conectar = $conexion->conectionPDO();
			/* Objetos operadores */
			$solicitante = new Solicitante($conectar);
		}else if ($_SESSION['loggedin_intranet'] === false){
			header('location:../change_pswd.php');
		}
	}else{
		session_destroy();
		header('location:../');
	}
?>
<style>
	/* Unos pequeños estilos CSS para darle algo más de vida a la tabla */
	table table{ background: rgba(0,0,0,0.1); }
	table thead{ background: rgba(10,51,181,0.5);}
	table thead th{transition: ease 0.6s;}
	table thead th:hover{ background: rgba(10,51,181,1); }
	table thead th .style_table{ color: rgba(255,255,255,0.9); font-weight: bold; font-family: cursive;}
	table tbody td{ color:rgba(0,0,0,1); }
</style>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table_solicitante">
  	<thead>
  		<th><div class="style_table">Visitante</div></th>
  		<th><div class="style_table">Documento</div></th>
  		<th><div class="style_table">Tipo Visita</div></th>
  		<th title="En está fecha llega el visitante"><div class="style_table">Fecha</div></th>
  		<th class="text-center"><div class="style_table">Opciones</div></th>
  	</thead>
  </table>
</div>




<div class="modal fade" id="modalDescargable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Descargar reporte</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h4>Seleccione el intervalo de fechas deseado</h4>
              <div class="mb-3">
                  <label for="fechaInicio" class="form-label">Desde: </label>
                  <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
              </div>
              <div class="mb-3">
                  <label for="fechaSalida" class="form-label">Hasta: </label>
                  <input type="date" class="form-control" id="fechaFin" name="fechaFin" required>
              </div>
              <button class="btn btn-primary" style="
                margin-top: 15px;
                background: linear-gradient(to right, #074680, #0089ca);
                border: none;
                color: white;
                padding: 8px 18px;
                font-size: 12px;
                cursor: pointer;
                border-radius: 5px;
                transition: background 0.3s ease;"
                onmouseover="this.style.background = 'linear-gradient(to right, #063b6e, #007ab8)';"
                onmouseout="this.style.background = 'linear-gradient(to right, #074680, #0089ca)';" id="generarInforme" name="generarInforme">
                Generar Informe
              </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalVisitante">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <form id="formVisitante">
          <input type="hidden" name="idForm" id="idForm" value="0" readonly>
          <div class="form-row col-sm-12">
            <div class="form-group col-sm-6">
              <label><strong> Nombre del visitante </strong></label>
              <input class="form-control" type="text" name="name" id="name" placeholder="Nombre del visitante" required>
            </div>
            <div class="form-group col-sm-6">
              <label for="cc"><strong>No. de documento </strong></label>
              <input class="form-control" type="text" name="document" id="document" placeholder="Documento del visitante" required>
            </div>
          </div>
          <div class="form-row col-sm-12">
            <div class="form-group col-sm-6">
              <label><strong>Fecha de visita</strong></label>
              <input type="date" name="fvisita" id="fvisita" class="form-control" required>
            </div>
            <div class="form-group col-sm-6">
              <label><strong>Hora de visita</strong></label>
              <input type="time" name="hvisita" id="hvisita" class="form-control">
            </div>
          </div>
          <div class="form-row col-sm-12">
            <legend class="form-group col-form-label col-sm-3 pt-0"><strong>¿Visita frecuente?</strong></legend>
            <div class="form-group col-sm-3">
              <div class="form-check">
                <input class="form-check-input addSalida" type="radio" value="Si" name="programar">
                <label class="form-check-label">
                  Si.
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input addSalida" type="radio" value="No" name="programar" checked>
                <label class="form-check-label">
                  No.
                </label>
              </div>
            </div>
            <div class="form-group col-sm-6">
              <div class="card my-4" id="programable">
                <div class="card-body">
                  <div class="form-group col-sm-6">
                    <label><strong> Fecha de salida </strong></label>
                    <input type="date" class="form-control" name="ffrecuente" id="ffrecuente">
                  </div>
                  <div class="form-group col-sm-6">
                    <label><strong> Hora de salida </strong></label>
                    <input type="time" class="form-control" name="hfrecuente" id="hfrecuente">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row col-sm-12">
            <div class="form-group col-sm-6">
              <label><strong>Tipo de visita</strong></label>
              <select id="tvisita" class="form-control" data-live-search="true" required>
                <option value="" selected>Seleccione visita</option>
                <?php foreach ($solicitante->readTvisit() as $tvisits){?>
                <option value="<?php echo $tvisits->getId(); ?>"><?php echo htmlentities($tvisits->getTipovisita()); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-sm-6">
              <label><strong>Motivo visita <?php if (mb_strtolower($_SESSION['intranet_proyecto']) == 'gestión para el talento'){ echo " / ó centro de costos"; }; ?> </strong></label>
              <select id="mvisita" class="form-control" name="mvisita" required>
                <option value="" selected>-- Selecciona --</option>
              </select>
            </div>
          </div>
          <div class="form-row col-sm-12" id="addC_Cv">
            <div class="form-group col-sm-6">
                <label><strong><div id="emp-cargo"> </div></strong></label>
              	<input type="text" class="form-control" name="empresa" id="empresa">
            </div>
            <div class="form-group col-sm-6">
              <label class="cv" title="¿De donde viene la hoja de vida?"><strong> ¿Hoja de vida? </strong></label>
              <input type="text" class="form-control cv" name="cv" id="cv">
            </div>
          </div>
          <div class="form-row col-sm-12">
            <div class="form-group col-sm-6">
              <label><strong>EPS</strong></label>
              <select class="form-control" name="eps" id="eps" required>
                <option value="" selected>Seleccione eps</option>
                <?php foreach ($solicitante->readEps() as $eps){?>
                <option value="<?php echo $eps->getEps(); ?>"><?php echo htmlentities($eps->getEps()); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-sm-6">
              <label><strong>ARL</strong></label>
              <select class="form-control" name="arl" id="arl" required>
                <option value="" selected>Seleccione arl</option>
                <?php foreach ($solicitante->readArl() as $arl):?>
                <option value="<?php echo $arl->getArl(); ?>"><?php echo htmlentities($arl->getArl()); ?></option>
                <?php endforeach; ?>
              </select> 
                   
           <?php if ($_SESSION['intranet_usuario'] == 'julio.fuentes'  || $_SESSION['intranet_usuario'] == 'luz.aguillon' || $_SESSION['intranet_usuario'] == 'LADY.FORERO' || $_SESSION['intranet_usuario'] == 'raul.enciso') { ?>


              <div class="form-line">
                  <label><strong>Adjuntar soporte de ARL</strong></label>
                  <input type="file" name="SOPORTES" id="SOPORTES" style="border-color: inherit; color: #404040;">
              </div>

            <?php }  ?>
              <div id="mostrar"></div>

          </div>
          <div class="form-row col-sm-12">
            <legend class="form-group col-form-label col-sm-3 pt-0"><strong> ¿Vehículo? </strong></legend>
            <div class="form-group col-sm-3">
              <div class="form-check">
                <input class="form-check-input addVehicle" type="radio" value="Si" name="agendar">
                <label class="form-check-label">
                  Si, reservar.
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input addVehicle" type="radio" value="No" name="agendar" checked>
                <label class="form-check-label">
                  No, no reservar.
                </label>
              </div>
            </div>
            <div class="form-group col-sm-6">
              <!-- lista desplegable de vehiculos -->
              <div class="card my-4" id="listVehicle">
                <div class="card-body">
                  <div class="form-group col-sm-6">
                    <select class="form-control" name="vehiculo" id="vehiculo">
                      <option value=""> -- Selecciona -- </option>
                      <option>CARRO</option>
                      <option>MOTO</option>
                      <option>BICICLETA</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" value="" name="placa" id="placa" placeholder="Placa ejemplo: AAA000">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row col-sm-12">
            <legend class="form-group col-form-label col-sm-3 pt-0"><strong> ¿Alguna observación? </strong></legend>
            <div class="form-group col-sm-3">
              <div class="form-check">
                <input class="form-check-input addImplemento" type="radio" value="Si" name="elementos">
                <label class="form-check-label">
                  Si.
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input addImplemento" type="radio" value="No" name="elementos" checked>
                <label class="form-check-label">
                  No.
                </label>
              </div>
            </div>
            <div class="form-group col-sm-6">
              <div class="card my-4" id="listImplemento">
                <div class="card-body">
                  <textarea class="form-control" name="implementos" id="implementos" rows="2" cols="15" placeholder="El area de seguridad estará al tanto de estas observaciones"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row col-xs-12">
            <input type="hidden" name="parentesco" id="parentesco" readonly>
            <input type="hidden" name="numeroEmer" id="numeroEmer" readonly>
            <input type="hidden" name="infoSalud" id="infoSalud" readonly>
          </div>
          <div class="form-row col-sm-12">
          	<div class="form-group col-sm-6 text-left">
          		<button type="button" data-dismiss="modal" class="btn btn-dark"><i class="icon wb-close"></i> Cerrar </button>
          	</div>
          	<div class="form-group col-sm-6 text-right">
          		<button type="submit" id="submit" class="btn btn-primary" disabled>Ok <i class="icon wb-tag"></i> </button>
          	</div>
          </div>
        </form>


        <script>
          $("#submit").click(function(){
              var formData = new FormData();
              var files = $('#SOPORTES')[0].files[0];
              formData.append('file',files);
              $.ajax({
                  type:"POST",
                  url:"./recibe_soportes.php",
                  data: formData,
                  contentType: false,
                  processData: false,
                  success:function(data){
                      $("#mostrar").html(data);
                  }
              });
          });
        </script>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>




<div class="modal fade modal-fill-in" id="modalReasignar" style="background-color: #c2c2c2;">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <form id="formAsignar">
          <input type="hidden" id="idasignar" name="idForm" readonly>
          <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-xs-12 col-sm-12 col-md-12 text-center">
              <i class="icon wb-info btn-round btn-info btn-lg"></i>
            </div>
          </div>
          <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-xs-12 col-sm-12 col-md-12 text-center">
              <label>Selecciona el usuario que atendera la solicitud del visitante: <br><strong><span id="nameAsignar"></span></strong></label>
              <select name="usuario" class="form-control" required>
                <option value="">-- Selecciona al usuario --</option>
                <?php foreach ($solicitante->reasignarUsuario() as $users):?>
                <option value="<?php echo $users->getUsuario(); ?>"><?php echo $users->getNombre(); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-xs-6 col-sm-6 col-md-6 text-left">
              <button type="button" class="btn btn-dark btn-round" data-dismiss="modal" title="Cerrar"><i class="icon wb-close"></i></button>
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-6 text-right">
              <button type="submit" class="btn btn-primary btn-round" id="submit" title="Reasignar"><i class="icon wb-check"></i></button>
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

$( "#generarInforme" ).on( "click", function() {
    var fechaInicio = $("#fechaInicio").val();
    var fechaFin = $("#fechaFin").val();
    
    if (!fechaInicio || !fechaFin) {
        // Muestra un modal de SweetAlert2
        toastr.warning('Por favor, complete todos los campos.');
    }else{

    $.ajax({
            type: 'POST',
            url: 'informe.php', // Reemplaza con la ruta correcta de tu script PHP
            data: { fechaInicio: fechaInicio, fechaFin: fechaFin },
            success: function(response) {
                // Crear un enlace temporal y hacer clic en él para iniciar la descarga
                var a = document.createElement('a');
                var data_type = 'data:application/csv;charset=utf-8,' + encodeURIComponent(response);
                a.href = data_type;
                a.download = 'datos.csv';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            }
        });
    }
});

	/* Funciones para el formulario dinamico */
	$(document).ready(function(){
	  	$("#btn_formulario").show();
		$("#programable").hide();
		$("#listVehicle").hide();
		$("#listImplemento").hide();
	  	$("#addC_Cv").hide();
	  	$(".cv").hide();
	});
  $('#document').keyup(function(){
    var query = $(this).val();
        
        // Hacer la solicitud Ajax al servidor
        $.ajax({
            type: 'POST',
            url: 'filtros.php', // Reemplaza con la ruta correcta de tu script PHP
            data: { query: query },
            success: function(response) {
              if (query == '') {
                $('#name').val('');
                
              }else{

                $('#name').val(response);
              }
            }
        });
  });
	$(".addSalida").change(function(){
		if ($(this).val() == 'Si'){
	    	$("#ffrecuente").prop("required",true);
			$("#programable").show();
		}else if ($(this).val() == 'No'){
	    	$("#ffrecuente").val('');$("#hfrecuente").val('');
	    	$("#ffrecuente").prop("required",false);
			$("#programable").hide();
		}
	});
	$(".addVehicle").change(function(){
		if ($(this).val() == 'Si'){
			$("#vehiculo").prop('required',true);
			$("#listVehicle").show();
		}else if ($(this).val() == 'No'){
	    $("#placa").val('');
			$("#vehiculo").prop('required',false);$("select").prop("option:selected",$("#vehiculo").val(""));
			$("#listVehicle").hide();
		}
	});
	$(".addImplemento").change(function(){
		if ($(this).val() == 'Si'){
			$("#implementos").prop('required',true);
			$("#listImplemento").show();
		}else if ($(this).val() == 'No'){
	    $("#implementos").val('');
			$("#implementos").prop('required',false);
			$("#listImplemento").hide();
		}
	});
	function openModals(that){
	  	$("#idForm").val('0');$("#fsalida").val('');$("#hsalida").val('');$("#placa").val('');$("#implementos").val('');
	  	$("#addC_Cv").hide();$(".cv").hide();$("#listImplemento").hide();$("#listVehicle").hide();$("#programable").hide();
	  	$("#emp-cargo").text('');
		  $("#formVisitante").trigger('reset');
	  	$("#empresa").prop("required",false); $("#cv").prop("required",false);$("#ffrecuente").prop("required",false);$("#vehiculo").prop('required',false);$("#implementos").prop('required',false);
		  $(that).modal("show");
	}
 
  // function openModal(that) {
  //     $(that).modal("show");
  // }

//setInterval(function(){ tableSolicitante.ajax.reload(null,false); },15000);
</script>