		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/listar_funciones.php',
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
		
           	var documento_fun = button.data('documento_fun_data');
		  	$('#documento_fun').val(documento_fun);
           
            var funciones_ = button.data('funciones');
		  	$('#funciones').val(funciones_);

		})
	
		$('#eliminarusuarioModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
		  	
        	var documento_fun_borrar = button.data('documento_fun_borrar_data');
			$('#documento_fun_borrar').val(documento_fun_borrar);		   
		})

