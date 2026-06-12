	
  <?php
	/* Connect To Database*/
	require_once ("../conexion.php");
  include ('../html/datos.php');
  $obj = new Datos();
        $id_r = $_POST['id'];
        $campos = "*";
        $tableConsol = "consolidado_horas";

        $consul = mysqli_query($con,"SELECT $campos FROM  $tableConsol WHERE id_reporte ='$id_r'");
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
    
     

<?php
        $i=0;
        while($row = mysqli_fetch_array($consul)){
          $nombre_solicitante = $obj->nombre_solicitante($con,$id_r);
          $documento_solicitante = $obj->documento_solicitante($con,$id_r);
          $correo_solicitante = $obj->correo_solicitante($con,$documento_solicitante);
          $hora_extra_diu = $row['hora_extra_diu'];
          $hora_extra_noct = $row['hora_extra_noct'];
          $hora_extra_diu_dom = $row['hora_extra_diu_dom'];
          $hora_extra_noct_dom = $row['hora_extra_noct_dom'];
          $recargo_noct = $row['recargo_noct'];
          $recargo_noct_dom = $row['recargo_noct_dom'];
          $recargo_diur_dom = $row['recargo_diur_dom'];
          $estado_vice = $row['estado_vice'];
          
          $i++;}
        ?>
  <button class="btn" style='background-color: white;' id="atras" name="atras"><br><img src="./ajax/left-arrow.png" width= "30px;" alt=""></button>
	<div class="container">
        <div class="row">
                <div class="col-sm-4">
                    <div class="table-responsive">        
                        <table id="consolidado" class="table table-hover" cellspacing="0" width="100%">
                        <tr>
                          <th><font size ="2">HORAS EXTRAS DIURNAS:</th>
                            <td><font  color="#2d2d2d"><center><?php echo $hora_extra_diu;?></center></td>
                        </tr>
                        <tr>
                          <th><font size ="2">HORAS EXTRAS NOCTURNAS:</th>
                            <td><font color="#2d2d2d"><center><?php echo $hora_extra_noct;?></center></td>
                        </tr>
                        <tr>
                          <th><font size ="2">HORAS EXTRAS DIURNAS DOMINICALES O FESTIVAS:</th>
                            <td><font color="#2d2d2d"><center><?php echo $hora_extra_diu_dom;?></center></td>
                        </tr>
                        <tr>
                          <th><font size ="2">HORAS EXTRAS NOCTURNAS DOMINICALES O FESTIVAS:</th>
                            <td><font color="#2d2d2d"><center><?php echo $hora_extra_noct_dom;?></center></td>
                        </tr>
                        <tr>
                          <th><font size ="2">RECARGOS NOCTURNOS ORDINARIOS:</th>
                            <td><font color="#2d2d2d"><center><?php echo $recargo_noct;?></center></td>
                        </tr>
                        <tr>
                          <th><font size ="2">RECARGO NOCTURNO DOMINICALES O FESTIVOS:</th>
                            <td><font color="#2d2d2d"><center><?php echo $recargo_noct_dom;?></center></td>
                        </tr>
                        <tr>
                          <th><font size ="2">RECARGO DIURNO DOMINICAL O FESTIVO:</th>
                            <td><font color="#2d2d2d"><center><?php echo $recargo_diur_dom;?></center></td>
                        </tr>
                        <tr>
                          <th><font size ="2">ESTADO:</th>
                          <?php 
                          if($estado_vice == 3){
                            ?>
                            <td>
                              <button class="btn btn-success">APROBADO</button>
                            </td>
                            <?php 
                          }else if($estado_vice == 4){
                            ?>
                            <td>
                              <button class="btn btn-danger">DENEGADO</button>
                            </td>
                            <?php 
                          }else{
                            ?>
                            <td>
                              <button class="btn" style="background-color: #E3B104; color: #ffffff;">PENDIENTE</button>
                            </td>
                            <?php 
                          }?>
                        </tr>
                        </table>
                    </div>
                </div>
                <?php if ($estado_vice == 0) {
                  ?>
                  <button type="button" id="finalizar" name="finalizar" class="btn btn-outline-success"  style="height: 38px;"  
                  data-toggle="modal" 
                  data-target="#aprobar_con_vice" 
                  data-id_r='<?php echo $id_r; ?>'
                  data-correo_solicitante_vice_data='<?php echo $correo_solicitante; ?>'
                  data-nombre_solicitante_vice_data='<?php echo $nombre_solicitante; ?>'>APROBAR</button>
                  <?php
                }else{

                }
                ?>
        </div>
      </div>
      <script src="./js/detalle_horas_vice.js"></script> 
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
                url:'./ajax/listar_horas_vice.php',
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