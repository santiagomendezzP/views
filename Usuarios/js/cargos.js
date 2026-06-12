		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/listar_cargos.php',
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
		 

		  var cargo = button.data('cargo');
		  $('#cargo').val(cargo)

		  var nom_pro_ = button.data('nom_pro_');
		  $('#ccostos').val(nom_pro_);

		  var jefe_ = button.data('jefe_');
		  $('#jefe').val(jefe_);
          
          var id_cargo_ = button.data('id_cargo_');
		  $('#id_cargo').val(id_cargo_)

		   var id_funcion_ = button.data('id_funcion_');
		  $('#id_funcion').val(id_funcion_)

		  var nom_fun = button.data('funciones_c');
		  $('#funciones_c').val(nom_fun)

		  

		})

		$('#agregarGeneralModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  	
		  var id = button.data('id_proyecto');
		  $('#id_proyecto').val(id)

		  var id_cargo = button.data('id_cargo');
		  $('#id_cargo').val(id_cargo)

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

		 
		  var id_cargoo = button.data('id_cargoo');
		  $('#id_cargo_').val(id_cargoo)

		 
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
		

