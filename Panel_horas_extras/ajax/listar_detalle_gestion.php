	
  <?php
	/* Connect To Database*/
    require_once ("../conexion.php");
    include ('../html/datos.php');
    $obj = new Datos();
    $id_r = $_POST['id'];
    $campos = "*";
    $tables = "detalle_reporte";
    $tableConsol = "consolidado_horas";

    $query = $con->prepare("SELECT $campos FROM  $tables WHERE id_reporte = ? ");
    $query->bind_param('i', $id_r);
    $query->execute();
    $query2 = $query->get_result();

    $consul = mysqli_query($con,"SELECT $campos FROM  $tableConsol WHERE id_reporte ='$id_r'");
    if (isset($_SESSION['horas_actuales_gestion'])) {
      unset($_SESSION['horas_actuales_gestion']);
    }
	?>


      
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


		 <!--Ejemplo tabla con DataTables-->
    <button class="btn" style='background-color: white;' id="atras_gest" name="atras_gest"><br><img src="./ajax/left-arrow.png" width= "30px;" alt=""></button>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="prueba" class="table table-hover " cellspacing="0" width="100%">
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
                              <th><font size ="2", color ="#2d2d2d">APROBAR </th>
                            </tr>
                        </thead>
                        <tbody>            
                          <?php 	
                          $finales=0;
                          
                          while($fila = mysqli_fetch_array($query2)){
                            $id = $fila['id_hora'];
                            $fecha = $fila['fecha'];
                            $nombre_solicitante = $obj->nombre_solicitante($con,$id_r);
                            $documento_solicitante = $obj->documento_solicitante($con,$id_r);
                            $correo_solicitante = $obj->correo_solicitante($con,$documento_solicitante);
                            $dia = $fila['nombre_dia'];
                            $horaE = $fila['hora_entrada'];
                            $almuerzo = $fila['tiempo_almuerzo'];
                            $horaS = $fila['hora_salida'];
                            $horaDia = $fila['horas_dia'];
                            $horaEx = $fila['horas_extras'];
                            $horaR = $fila['horas_recargo'];
                            $act = $fila['actividad'];
                            $estado = $fila['estado_ges_hu'];
                            
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
                               <?php if($estado == 3 ){?>       
                                <td><button class="btn btn-success">APROBADO</button></td>
                               <?php }
                                elseif($estado == 4){ ?>
                                <td><button class="btn btn-danger">DENEGADO</button></td>id_r_gestion
                                <?php } else{?>
                                <td>
                                  <button class="btn btn-primary Gray-background white-sm" 
                                  data-toggle="modal"
                                  data-target="#aprobar_hora" 
                                  data-id='<?php echo $id;?>'
                                  data-nombre_solicitante_data_gest='<?php echo $nombre_solicitante;?>'
                                  data-correo_solicitante_data_gest='<?php echo $correo_solicitante;?>'
                                  data-id_r_gestion='<?php echo $id_r;?>'>
                                  <i class="fas fa-cog"></i></button>
                                </td>                       
                               <?php }?>
                             </tr>
                  
                                  
                          <?php                   
                         } 
                         //  finaliza
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
            </tr>

                       </table>                  
            </div>
          </div>
        </div>  
      </div>
      <script src="./js/detalle_horas_gest.js"></script>

<script>
$(document).ready(function(){

//inialize datatable
$('#prueba tfoot th').each(function(){
            var titles = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder="busqueda"'+titles+'"/>');
 });

var datas = $('#prueba').DataTable({
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
  $estado_ges = $row['estado_ges_hu'];
  
  $i++;
}
?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">        
        <table id="consolidado" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th><font size ="2">HORAS EXTRAS DIURNAS:</th>
              <th><font size ="2">HORAS EXTRAS NOCTURNAS:</th>
              <th><font size ="2">HORAS EXTRAS DIURNAS DOMINICALES O FESTIVAS:</th>
              <th><font size ="2">HORAS EXTRAS NOCTURNAS DOMINICALES O FESTIVAS:</th>
              <th><font size ="2">RECARGOS NOCTURNOS ORDINARIOS:</th>
              <th><font size ="2">RECARGO NOCTURNO DOMINICALES O FESTIVOS:</th>
              <th><font size ="2">RECARGO DIURNO DOMINICAL O FESTIVO:</td>
              <th><font size ="2">ESTADO:</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><font  color="black"><center><?php echo $hora_extra_diu;?></center></td>
              <td><font color="black"><center><?php echo $hora_extra_noct;?></center></td>
              <td><font color="black"><center><?php echo $hora_extra_diu_dom;?></center></td>
              <td><font color="black"><center><?php echo $hora_extra_noct_dom;?></center></td>
              <td><font color="black"><center><?php echo $recargo_noct;?></center></td>
              <td><font color="black"><center><?php echo $recargo_noct_dom;?></center></td>
              <td><font color="black"><center><?php echo $recargo_diur_dom;?></center></td>
              <?php 
              if($estado_ges == 3){
                ?>
                <td><button class="btn btn-success">APROBADO</button></td>
                <?php 
              }else if ($estado_ges == 4) {
                ?>
                <td><button class="btn btn-danger">DENEGADO</button></td>
                <?php
              }else{
                ?>
                <td><button class="btn" style="background-color: #E3B104; color: #ffffff;">PENDIENTE</button></td>
                <?php 
              }
              ?>
            </tr>
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
            </tr>
          </tfoot>
        </table>
      </div>
    </div>  
  </div>
</div>
<script>
$(document).ready(function(){

//inialize datatable
$('#consolidado tfoot th').each(function(){
  var titles = $(this).text();
  $(this).html('<input type="text" class="form-control" placeholder="busqueda"'+titles+'"/>');
});

var datas = $('#consolidado').DataTable({
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



<?php 
$con1=mysqli_query($con,"SELECT COUNT(*) AS numrows FROM detalle_reporte WHERE id_reporte = '$id_r'");
if ($fi= mysqli_fetch_array($con1)){
  $numrows1 = $fi['numrows'];
} 
$con2=mysqli_query($con,"SELECT COUNT(*) AS numrows FROM detalle_reporte WHERE id_reporte = '$id_r' && estado_ges_hu = 3");
if ($fil= mysqli_fetch_array($con2)){
  $numrows2 = $fil['numrows'];
} 
if($numrows1 == $numrows2 && $estado_ges <3){
  ?>
  <button type="button" id="finalizar" name="finalizar" class="btn btn-outline-success"  style="height: 38px;" 
    data-toggle="modal" 
    data-target="#aprobar_con_gest" 
    data-id_r='<?php echo $id_r; ?>'
    data-nombre_solicitante_data_gest_con='<?php echo $nombre_solicitante;?>'
    data-correo_solicitante_data_gest_con='<?php echo $correo_solicitante;?>'
    >APROBAR</button>
  <?php 
}
?>

