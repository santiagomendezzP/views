		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/listar_centro_de_costos.php',
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
		  	
		   var id = button.data('id_proyecto');
		  $('#id_proyecto').val(id)

		  var codigo = button.data('codigo');
		  $('#codigo').val(codigo)

	
		  var proyecto = button.data('proyecto');
		  $('#ccostos').val(proyecto);

		  var perfil = button.data('perfil');
		  $('#perfil_tipo').val(perfil);

		  var lider = button.data('lider');
		  $('#lider').val(lider);



		})

		$('#cambiarclaveModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  	
		  var id_usuario = button.data('id_usuario');
		  $('#id_usuarios_clave').val(id_usuario)

		  var correo = button.data('correo');
		  $('#correo_clave').val(correo)

		 
		})
		$('#eliminarccostosModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  	
		   var id_proyecto = button.data('id_proyecto_');
		  $('#id_proyecto_').val(id_proyecto)

		  var codigo = button.data('codigo');
		  $('#codigo').val(codigo)

	
		  var proyecto = button.data('proyecto');
		  $('#ccostos').val(proyecto);

		  var perfil = button.data('perfil');
		  $('#perfil_tipo').val(perfil);

		  var lider = button.data('lider');
		  $('#lider').val(lider);

		   
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
		

