
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<?php
session_start();
?>

<?php

/* Connect To Database*/
require_once ("../conexion.php");
include("../datos_tablas.php");

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="cargos";
	$campos="*";
	$sWhere=" cargos.id_cargo LIKE '%".$query."' OR cargos.jefe LIKE '%".$query."%' OR cargos.cargo LIKE '%".$query."%' ";

	$sWhere.=" order by cargos.cargo";
	

	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables");
	//loop through fetched data
	
	?>

</style>  
<!doctype html> 
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="#" />  
	<title>Tutorial DataTables</title>
	
	<!-- Bootstrap CSS -->

	<!-- CSS personalizado --> 
	<link rel="stylesheet" href="main_adm.css">  
	
	<!--datables CSS básico-->
	<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
	<!--datables estilo bootstrap 4 CSS-->  
	<link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	
	<!--font awesome con CDN-->  
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
	
</head>
    
  <body> 

		 <!--Ejemplo tabla con DataTables-->
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
		                        <th border="1"><font size ="2", color ="#000">Cargo</th>
								<th><font size ="2", color ="#000">Jefe del cargo</th>
								<th><font size ="2", color ="#000">Centro de costos</th>
							    <th><font size ="2", color ="#000">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php 
								$n = new nombres();
								$finales=0;
								while($row = mysqli_fetch_array($query)){
								$id_cargo=$row['id_cargo'];	
								$funciones=$row['funciones_c'];	
								$cargo=$row['cargo'];
								// $nom_fun= $n->nfun($con,$cargo);
								$jefe=$row['jefe'];	
								$nombre_jefe= $n->nprocar($con,$jefe);
								$proyecto = $row['proyecto'];
								$nom_pro= $n->npro($con,$proyecto);
								$finales++;
							?>	
                            <tr>
                            <td><font size ="2", color ="black"><?php echo $cargo;?></td>
                            <td><font size ="2", color ="black"><?php echo $nombre_jefe;?></td>
                            <td><font size ="2", color ="black"><?php echo $nom_pro;?></td>

      						 <td>

							<?php
							 
							?>
                            
							
							<a href="#"  data-target="#editgeneralModal" class="edit" data-toggle="modal" 


							
							data-cargo="<?php echo $cargo?>"  
							data-nom_pro_="<?php echo $proyecto?>"
							data-jefe_="<?php echo $jefe?>"
							data-id_cargo_="<?php echo $id_cargo; ?>"
							data-id_funcion="<?php echo $id_funcion; ?>"
							data-funciones_c="<?php echo $funciones?>">
							


							<i class="fas fa-edit" style="font-size:20px; color: #ff922b"data-toggle="tooltip" title="Editar"></i>

						    </a>&nbsp;&nbsp;

							
							<a href="#deleteGeneralModal" class="delete" data-toggle="modal"    


							
							data-id_cargoo="<?php echo $id_cargo; ?>">

							<i class="fas fa-trash-alt" style="font-size:20px; color: #B22222"data-toggle="tooltip" title="Eliminar"></i>

						    </a>&nbsp;&nbsp;

		                     </td>

		                 </tr>
		             <?php }}?>
		         </tbody>

		         <tfoot>
		         	<tr>
		         		<th>Start date</th>
		         		<th>Start date</th>
		         		<th>Start date</th>
		         		<th>Start date</th>
		         		
		         	</tr>
		         </table>                  
		        </div>
		    </div>
		</div>  
	</div>    

   
	
	<?php	
		

?>    

	





<script>
	$(document).ready(function(){

    //inialize datatable
    $('#example tfoot th').each(function(){
    	var titles = $(this).text();
    	$(this).html('<input type="text" class="form-control" style=" border-color: #17a2b8;" placeholder="busqueda"'+titles+'"/>');
    });
    
    
    var datas = $('#example').DataTable({
    	'language': {
    		"decimal": "",
    		"emptyTable": "No hay información",
    		"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    		"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
    		"infoFiltered": "(Filtrado de _MAX_ total entradas)",
    		"infoPostFix": "",
    		"thousands": ",",
    		"lengthMenu": "Mostrar _MENU_ Entradas",
    		"loadingRecords": "Cargando...",
    		"processing": "Procesando...",
    		"search": "Buscar:",
    		"zeroRecords": "Sin resultados encontrados",
    		"paginate": {
    			"first": "Primero",
    			"last": "Ultimo",
    			"next": "Siguiente",
    			"previous": "Anterior"
    		}
    	},


    	"lengthMenu": [[5,7,10,13,16,50,100, -1], [5,7,10,13,16,50,100, "All"]],
    	dom:'lBfrtip',
    	buttons:[
    	{
    		extend:    'excelHtml5',
    		text:      '<i class="fas fa-file-excel"></i> ',
    		titleAttr: 'Exportar a Excel',
    		className: 'btn btn-success'
    	},
    	{
    		extend:    'pdfHtml5',
    		text:      '<i class="fas fa-file-pdf"></i> ',
    		titleAttr: 'Exportar a PDF',
    		className: 'btn btn-danger'
    	},
    	{
    		extend:    'print',
    		text:      '<i class="fa fa-print"></i> ',
    		titleAttr: 'Imprimir',
    		className: 'btn btn-info'
    	},

    	]
    });  
    datas.columns().every(function(){   
    	var este = this;
    	$('input',this.footer()).on('keyup change',function(){
    		if(este.search() !== this.value){
    			este
    			.search(this.value)
    			.draw();
    		}               
    	});     
    }); 
});




</script>

	
	
	
     
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>

    
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    
    <!-- código JS propìo-->    

    
    
</body>
</html>
   