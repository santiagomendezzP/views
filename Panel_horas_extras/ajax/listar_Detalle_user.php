<?php
	/* Connect To Database*/
  require_once ("../conexion.php");

    $id = $_POST['id'];
    $estaI=$_POST['estado'];
    $campos = "*";
    $tables = "detalle_reporte";
    $tableConsol = "consolidado_horas";


    $query = $con->prepare("SELECT a.*, r.proyecto FROM detalle_reporte a, reporte_horas r WHERE a.id_reporte = r.id_reporte AND a.id_reporte = ? ");
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();

    $consul = mysqli_query($con,"SELECT $campos FROM  $tableConsol WHERE id_reporte ='$id'");
    
    ?>
    <link rel="stylesheet" href="main_adm.css">  
      
      <!--datables CSS básico-->
      <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
     <!--datables estilo bootstrap 4 CSS-->  
     <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
            
     <!--font awesome con CDN-->  
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
       
    <button class="btn" style='background-color: white;' id="atras" name="atras"><br><img src="./ajax/left-arrow.png" width= "30px;" alt=""></button>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">        
            <table id="example" class="table table-hover" cellspacing="0" width="100%">
              <thead>
                  <tr>
                    <th><font size ="2", color ="#2d2d2d">FECHA</th>
                    <th><font size ="2", color ="#2d2d2d">NOMBRE DÍA</th>
                    <th><font size ="2", color ="#2d2d2d">HORA DE ENTRADA</th>
                    <th><font size ="2", color ="#2d2d2d">TIEMPO DE ALMERZO O CENA</th>
                    <th><font size ="2", color ="#2d2d2d">HORA DE SALIDA</th>
                    <th><font size ="2", color ="#2d2d2d">HORAS TRABAJADAS</th>
                    <th><font size ="2", color ="#2d2d2d">HORA INICIO HORAS EXTRAS</th>
                    <th><font size ="2", color ="#2d2d2d">HORA FIN HORAS EXTRAS</th>
                    <th><font size ="2", color ="#2d2d2d">HORAS EXTRAS</th>
                    <th><font size ="2", color ="#2d2d2d">HORA INICIO RECARGO</th>
                    <th><font size ="2", color ="#2d2d2d">HORA FIN RECARGO</th>
                    <th><font size ="2", color ="#2d2d2d">HORAS RECARGO </th>
                    <th><font size ="2", color ="#2d2d2d">ACTIVIDAD </th>
                    <th><font size ="2", color ="#2d2d2d">OBSERVACIÓN JEFE </th>
                    <th><font size ="2", color ="#2d2d2d">ESTADO JEFE</th>
                    <th><font size ="2", color ="#2d2d2d">ESTADO GESTIÓN HUMANA</th>
                    <th><font size ="2", color ="#2d2d2d">EDITAR</th>
                  </tr>
              </thead>
              <tbody>            
                <?php 	
                          $finales=0;
                          while($fila = mysqli_fetch_array($result)){
                            $id_h = $fila['id_hora'];
                            $fecha = $fila['fecha'];
                            $dia = $fila['nombre_dia'];
                            $horaE = $fila['hora_entrada'];
                            $almuerzo = $fila['tiempo_almuerzo'];
                            $horaS = $fila['hora_salida'];
                            $horaDia = $fila['horas_dia'];
                            $horaEx = $fila['horas_extras'];
                            $horaR = $fila['horas_recargo'];
                            $act = $fila['actividad'];
                            $estado_j = $fila['estado_jefe'];
                            
                            $estado_g = $fila['estado_ges_hu'];
                            $actividad = $fila['actividad'];
                            $observacion_jefe = $fila['observacion_jefe'];
                            

                            $codigo_concepto = $fila['codigo_concepto'];
                            
                            $finales++;
                            
                            ?>
                            <tr>
                            <td><font size ="2", color ="black"><?php echo $fecha;?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $dia;?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $horaE;?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $almuerzo;?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $horaS;?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $horaDia;?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $fila['hora_inicio_he'];?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $fila['hora_fin_he'];?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $horaEx;?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $fila['hora_inicio_rec'];?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $fila['hora_fin_rec'];?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $horaR;?></td>                                               
                               <td><font size ="2", color ="black"><?php echo $act;?></td>                                              
                               <td><font size ="2", color ="black"><textarea cols="10" rows="5" readonly><?php echo $observacion_jefe;?></textarea></td>                                              
                              <?php 
                                if($estado_j == 0 || $estado_j==2){
                                  ?>
                                  <td><button class="btn btn-primary orange-background white-sm">PENDIENTE</button></td>
                                  <?php 
                                }elseif($estado_j == 4){
                                  ?>
                                  <td><button class="btn btn-danger">DENEGADO</button></td>
                                  <?php 
                                }else{ 
                                  ?>
                                    <td><button class="btn btn-success">APROBADO</button></td>
                                  <?php 
                                }
                                ?>               
                                <?php  
                                if($estado_g == 0 || $estado_g==2){ 
                                  ?>
                                  <td><button class="btn btn-primary orange-background white-sm">PENDIENTE</button></td>
                                  <?php 
                                }elseif($estado_g == 4){ 
                                  ?>
                                  <td><button class="btn btn-danger">DENEGADO</button></td>
                                  <?php 
                                }else{ 
                                  ?>
                                  <td><button class="btn btn-success">APROBADO</button></td>
                                  <?php 
                                }
                                ?>   
                                <!------------------------------------------------------------>
                                <?php 
                                if($estado_j == 0 || $estado_j == 4 ){?>
                                  <td>
                                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal_modificar'
                                    data-fecha='<?php echo $fecha ?>' 
                                    data-dia_ds='<?php echo $dia;?>'
                                    data-hora_extrada='<?php echo $horaE ?>'
                                    data-hora_salida='<?php echo $horaS?>'
                                    data-horas_dia='<?php echo $horaDia ?>' 
                                    data-hora_extra='<?php echo $horaEx?>'  
                                    data-hora_recargo='<?php echo $horaR ?>' 
                                    data-actividad='<?php echo $act?>'  
                                    data-obvser='<?php echo $actividad ?>' 
                                    data-id='<?php echo $id_h?>' 
                                    data-est='<?php echo $estaI;?>'
                                    data-almuerzo_dat='<?php echo $almuerzo;?>'
                                    data-hora_inicio_he_dat='<?php echo $fila['hora_inicio_he'];?>'
                                    data-hora_fin_he_dat='<?php echo $fila['hora_fin_he'];?>'
                                    data-hora_inicio_rec_dat='<?php echo $fila['hora_inicio_rec'];?>'
                                    data-hora_fin_rec_dat='<?php echo $fila['hora_fin_rec'];?>'
                                    data-codigo_concepto_extras_dat='<?php echo $fila['codigo_concepto'];?>'
                                    data-codigo_concepto_recargo_dat='<?php echo $fila['codigo_concepto'];?>'
                                    data-codigo_concepto_hora='<?php echo $fila['codigo_concepto'];?>'
                                    data-proyecto='<?php echo $fila['proyecto'];?>'
                                    data-id_r='<?php echo $id;?>'>
                                    <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                      <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                      <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                    </svg>
                                </button>
                                  </td>            
                                  <?php 
                                }else{
                                  ?>
                                  <td></td>
                                  <?php
                                }
                                ?>
                              </tr>    
                              <?php
                            }
                            ?>        
                          </tbody>
                          <tfoot>
                          <tr>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                            <th>Start date</th>
                          </tr>
                        </table>                  
                      </div>
                </div>
              </div>  
         <script src="./js/detalle_horas_user.js"></script>     
         <script>
          $( "#atras" ).click(function() {
            $(function() {
              load(1);
            });
            function load(page){
              var query=$("#q").val();
              var per_page=10;
              var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
              $("#loader").fadeIn('slow');
              $.ajax({
                url:'./ajax/listar_repo.php',
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
          });
         </script>
  <script>
$(document).ready(function(){

    //inialize datatable
    $('#example tfoot th').each(function(){
                var titles = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="busqueda"'+titles+'"/>');
     });
    
    var datas = $('#example').DataTable({
      stateSave: true,
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

    	


        "lengthMenu": [[5,8,10, 25, 50,100, -1], [5,8,10, 25, 50,100, "All"]],
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
<!----------------- TABLA 2 ------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
        <?php
        $i=0;
        while($row = mysqli_fetch_array($consul)){
          $hora_extra_diu = $row['hora_extra_diu'];
          $hora_extra_noct = $row['hora_extra_noct'];
          $hora_extra_diu_dom = $row['hora_extra_diu_dom'];
          $hora_extra_noct_dom = $row['hora_extra_noct_dom'];
          $recargo_noct = $row['recargo_noct'];
          $recargo_noct_dom = $row['recargo_noct_dom'];
          $recargo_diur_dom = $row['recargo_diur_dom'];
          $estado_jef = $row['estado_jefe'];
          $estado_vi = $row['estado_vice'];
          $estado_g = $row['estado_geren'];
          $estado_ges_hu = $row['estado_ges_hu'];
          
          $i++;}
        ?>
	<div class="container">
        <div class="row">
                <div class="col-sm-5">
                    <div class="table-responsive">        
                        <table id="consolidado" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <tr>
                          <th><font size ="2">HORAS EXTRAS DIURNAS:</th>
                            <td><font  color="black"><?php echo $hora_extra_diu;?></td>
                          <th><font size ="2">ESTADO JEFE:</th>
                          <?php if($estado_jef == 0 || $estado_jef==2){ ?>
                                <td><button class="btn btn-primary orange-background white-sm">Pendiente</button></td>
                                <?php }
                                 elseif($estado_jef == 4){ ?>
                                    <td><button class="btn btn-danger">DENEGADO</button></td>
                                <?php } 
                                else{ ?>
                                    <td><button class="btn btn-success">APROBADO</button></td>
                                <?php }?>
                        </tr>
                        <tr>
                          <th><font size ="2">HORAS EXTRAS NOCTURNAS:</th>
                            <td><font color="black"><?php echo $hora_extra_noct;?></td>
                            <th><font size ="2">ESTADO GESTION HUMANA:</th>
                          <?php if($estado_ges_hu == 0 || $estado_ges_hu==2){ ?>
                                <td><button class="btn btn-primary orange-background white-sm">Pendiente</button></td>
                                <?php }
                                 elseif($estado_ges_hu == 4){ ?>
                                    <td><button class="btn btn-danger">DENEGADO</button></td>
                                <?php } 
                                else{ ?>
                                    <td><button class="btn btn-success">APROBADO</button></td>
                                <?php }?>
                        </tr>
                        <tr>
                          <th><font size ="2">HORAS EXTRAS DIURNAS DOMINICALES O FESTIVAS:</th>
                          <td><font color="black"><?php echo $hora_extra_diu_dom;?></td>
                          <?php if($estaI != 1){ ?>
                          <th><font size ="2">ESTADO VICEPRESIDENTE:</th>
                                <?php if($estado_vi == 0 || $estado_vi==2){ ?>
                                <td><button class="btn btn-primary orange-background white-sm">Pendiente</button></td>
                                
                                <?php }
                                 elseif($estado_vi == 4){ ?>
                                    <td><button class="btn btn-danger">DENEGADO</button></td>
                                <?php } 
                                else{ ?>
                                    <td><button class="btn btn-success">APROBADO</button></td>
                                <?php }
                                }?>  
                        </tr>
                        <tr>
                          <th><font size ="2">HORAS EXTRAS NOCTURNAS DOMINICALES O FESTIVAS:</th>
                            <td><font color="black"><?php echo $hora_extra_noct_dom;?></td>
                            <?php if($estaI == 3){ ?>
                          <th><font size ="2">ESTADO GERENTE:</th>
                                  <?php if($estado_g == 0 || $estado_g==2){ ?>
                                <td><button class="btn btn-primary orange-background white-sm">Pendiente</button></td>
                                
                                <?php }
                                 elseif($estado_g == 4){ ?>
                                    <td><button class="btn btn-danger">DENEGADO</button></td>
                                <?php } 
                                else{ ?>
                                    <td><button class="btn btn-success">APROBADO</button></td>
                                <?php }
                                }?>  
                        </tr>
                        <tr>
                          <th><font size ="2">RECARGOS NOCTURNOS ORDINARIOS:</th>
                            <td><font color="black"><?php echo $recargo_noct;?></td>
                        </tr>
                        <tr>
                          <th><font size ="2">RECARGO NOCTURNO DOMINICALES O FESTIVOS:</th>
                            <td><font color="black"><?php echo $recargo_noct_dom;?></td>
                        </tr>
                        <tr>
                          <th><font size ="2">RECARGO DIURNO DOMINICAL O FESTIVO:</th>
                            <td><font color="black"><?php echo $recargo_diur_dom;?></td>
                        </tr>
                        <?php if($estaI == 1){
                           if($estado_jef == 0 || $estado_jef == 4 ){?>
                            <tr>
                            <th><font size ="2">EDITAR</th>
                                <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modifi_con'
                                     data-hora_extra_diu='<?php echo $hora_extra_diu ?>' data-hora_extra_noct='<?php echo $hora_extra_noct?>' 
                                     data-hora_extra_diu_dom='<?php echo $hora_extra_diu_dom ?>' data-hora_extra_noct_dom='<?php echo $hora_extra_noct_dom?>'
                                     data-recargo_noct='<?php echo $recargo_noct?>' data-recargo_noct_dom='<?php echo $recargo_noct_dom?>' 
                                     data-recargo_diur_dom='<?php echo $recargo_diur_dom ?>' data-est='<?php echo $estaI;?>' data-id_r='<?php echo $id;?>'
                                     ><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                     <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                     <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg></button></td>
                            </tr>
                            <?php }?>
                        <?php }?>
                    <!------------------------------------------------------------------------------------------------------------------------------->
                    <!------------------------------------------------------------------------------------------------------------------------------->
                        <?php if($estaI == 2){
                           if($estado_jef == 0 || $estado_jef == 4){?>
                            <tr>
                            <th><font size ="2">EDITAR</th>
                                <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modifi_con'
                                     data-hora_extra_diu='<?php echo $hora_extra_diu ?>' data-hora_extra_noct='<?php echo $hora_extra_noct?>' 
                                     data-hora_extra_diu_dom='<?php echo $hora_extra_diu_dom ?>' data-hora_extra_noct_dom='<?php echo $hora_extra_noct_dom?>'
                                     data-recargo_noct='<?php echo $recargo_noct?>' data-recargo_noct_dom='<?php echo $recargo_noct_dom?>' 
                                     data-recargo_diur_dom='<?php echo $recargo_diur_dom ?>' data-est='<?php echo $estaI;?>' data-id_r='<?php echo $id;?>'
                                     ><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                     <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                     <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg></button></td>
                            </tr>
                            <?php }?>
                        <?php }?>
                    <!------------------------------------------------------------------------------------------------------------------------------->
                    <!------------------------------------------------------------------------------------------------------------------------------->
                        <?php if($estaI == 3){
                           if($estado_jef == 0 || $estado_jef == 4){?>
                            <tr>
                            <th><font size ="2">EDITAR</th>
                                <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modifi_con'
                                     data-hora_extra_diu='<?php echo $hora_extra_diu ?>' data-hora_extra_noct='<?php echo $hora_extra_noct?>' 
                                     data-hora_extra_diu_dom='<?php echo $hora_extra_diu_dom ?>' data-hora_extra_noct_dom='<?php echo $hora_extra_noct_dom?>'
                                     data-recargo_noct='<?php echo $recargo_noct?>' data-recargo_noct_dom='<?php echo $recargo_noct_dom?>' 
                                     data-recargo_diur_dom='<?php echo $recargo_diur_dom ?>' data-est='<?php echo $estaI;?>' data-id_r='<?php echo $id;?>'
                                     ><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                     <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                     <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg></button></td>
                            </tr>
                            <?php }?>
                        <?php }?>
                      
                        </table>
                      </div>
                    </div>
                  </div>
                </div>