		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/listar_usuarios.php',
				data: parametros,
				beforeSend: function(objeto){
					$("#loader").html("Cargando...");
				},
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
		$('#editgeneralModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  	
		   var id = button.data('id_usuario');
		  $('#id_u').val(id)

		  var nombre = button.data('nombre');
		  $('#nombre').val(nombre)

		  var apellido = button.data('apellido');
		  $('#apellido').val(apellido)

		  var usuario = button.data('usuario');
		  $('#usuario').val(usuario)

		  var tipo_documento = button.data('nombre_tipo');
		  $('#tipo_documento').val(tipo_documento)

		  var codigo = button.data('codigo');
		  $('#codigo').val(codigo)

		  var fecha_nacimiento = button.data('fecha_nacimiento');
		  $('#fecha_nacimiento').val(fecha_nacimiento)
		  
		  var ingreso_delta = button.data('ingreso_delta');
		  $('#ingreso_delta').val(ingreso_delta)

		  var correo = button.data('correo');
		  $('#correo').val(correo)

		  var c_costos = button.data('c_costos');
		  $('#ccostos').val(c_costos);

		  var genero = button.data('genero');
		  $('#genero_tipo').val(genero);

		  var perfil = button.data('perfil');
		  $('#perfil_tipo').val(perfil);

		  var cargo = button.data('cargo');
		  $('#nombre_car').val(cargo);

		  var salario = button.data('salario');
		  $('#salario').val(salario);

		  var auxilio_salarial = button.data('auxilio_salarial');
		  $('#auxilio_salarial').val(auxilio_salarial);

		  var consecutivo = button.data('consecutivo');
		  $('#consecutivo').val(consecutivo);

		  var lugar_trabajo_tipo = button.data('lugar_trabajo_tipo');
		  $('#lugar_trabajo_tipo').val(lugar_trabajo_tipo);

		  var correo_personal = button.data('correo_personal');
		  $('#correo_personal').val(correo_personal)

		  var contrato_termino = button.data('contrato_termino');
		  $('#contrato_termino').val(contrato_termino)

		  var jefe_inmediato = button.data('data_jefe_inmediato');
		  $('#jefe_inmediato').val(jefe_inmediato)

		  var horario_trabajador = button.data('data_horario_trabajador');
		  $('#horario_trabajador').val(horario_trabajador)

		  

		})

		$('#cambiarclaveModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  	
		  var id_usuario = button.data('id_usuario');
		  $('#id_usuarios_clave').val(id_usuario)

		  var usuario_ = button.data('usuario_');
		  $('#usuario_').val(usuario_)

		  var nombres = button.data('nombre_');
		  $('#nombres').val(nombres)

		  var apellidos = button.data('apellido_');
		  $('#apellido_').val(apellidos)

		  var codigo = button.data('codigo');
		  $('#codigo_clave').val(codigo)

		  var correo = button.data('correo');
		  $('#correo_clave').val(correo)

		 
		})
		$('#eliminarusuarioModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  	
		  var id_usuario = button.data('id_usuario');
		  $('#id_usuarios_eliminar').val(id_usuario)

		   
		})
		

		$('#deleteGeneralModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal

		  var id = button.data('id')
		  $('#delete_id').val(id)

		   var id_usuario = button.data('id_usuario');
		  $('#id_usuario').val(id_usuario)

		  var correo_solicitante = button.data('correo_solicitante') 
		  $('#correo_ss').val(correo_solicitante)

		  var nombre_jefe_inmediato = button.data('nombre_jefe_inmediato') 
		  $('#nombre_jefe_inmediato_s').val(nombre_jefe_inmediato)
		})
		
		

		
		
		$( "#add_general" ).submit(function( event ) {
			var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "ajax/guardar_m1.php",
				data: parametros,
				beforeSend: function(objeto){
					$("#resultados").html("Enviando...");
				},
				success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addgeneralModal').modal('hide');
				}
			});
			event.preventDefault();
		});
		

