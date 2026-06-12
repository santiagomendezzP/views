<?php
$consecutivo =$_POST['consecutivo'];
$año =$_POST['año'];
$mes = $_POST['mes'];
$fecha = $año."-".$mes;
$id = $_POST['id'];
$campos = "*";
$tables = "reporte_horas";
$tableConsol = "consolidado_horas";
$query = mysqli_query($con,"SELECT $campos FROM  $tables WHERE proyecto ='$id' AND estado_jefe= 3 and fecha_registro LIKE '$fecha%'");
?>
</style>  
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,  -scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />        
    <!-- Bootstrap CSS -->
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main_adm.css">  
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="/atatables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">  
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
</head> 
<body> 
<!--Ejemplo tabla con DataTables-->
<div class="container" style="background-color: white;">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><font size ="3", color ="#2d2d2d">CODIGO CONCEPTO</th>
                            <th><font size ="3", color ="#2d2d2d">IDENTIFICACIÓN</th>
                            <th><font size ="3", color ="#2d2d2d">TIPO</th>
                            <th><font size ="3", color ="#2d2d2d">VALOR CANTIDAD</th>
                            <th><font size ="3", color ="#2d2d2d">CONSECUTIVO</th>
                            <th><font size ="3", color ="#2d2d2d">HI</th>
                            <th><font size ="3", color ="#2d2d2d">HF</th>
                            <th><font size ="3", color ="#2d2d2d">FECHA</th>
                            <th><font size ="3", color ="#2d2d2d">FECHA APROBACIÓN</th>
                        </tr>
                    </thead>
                    <tbody>            
                        <?php
                        while($row=mysqli_fetch_array($query)){
                            $ids =$row['id_reporte'];
                            $doc =$row['documento'];
                            $fecha_aprobacion=$row['fecha_aprobacion'];
                            $query2 = mysqli_query($con,"SELECT * FROM `detalle_reporte` WHERE `id_reporte` ='$ids'");
                            while ($row2 = mysqli_fetch_assoc($query2)) {
                                $codigo_concepto = $row2['codigo_concepto']; 
                                $valor_horas = 0;
                                $hora_i = '00:00:00';
                                $hora_f = '00:00:00';
                                switch ($codigo_concepto) {
                                    case 9:
                                        $hora_i = $row2['hora_inicio_he'];
                                        $hora_f = $row2['hora_fin_he'];
                                        $valor_horas = $row2['horas_extras'];
                                        break;
                                    case 100:
                                        $hora_i = $row2['hora_inicio_he'];
                                        $hora_f = $row2['hora_fin_he'];
                                        $valor_horas = $row2['horas_extras'];
                                        break;
                                    case 201:
                                        $hora_i = $row2['hora_inicio_he'];
                                        $hora_f = $row2['hora_fin_he'];
                                        $valor_horas = $row2['horas_extras'];
                                        break;
                                    case 205:
                                        $hora_i = $row2['hora_inicio_he'];
                                        $hora_f = $row2['hora_fin_he'];
                                        $valor_horas = $row2['horas_extras'];
                                        break;
                                    case 5055:
                                        $hora_i = $row2['hora_inicio_rec'];
                                        $hora_f = $row2['hora_fin_rec'];
                                        $valor_horas = $row2['horas_recargo'];
                                        break;
                                    case 5872:
                                        $hora_i = $row2['hora_inicio_rec'];
                                        $hora_f = $row2['hora_fin_rec'];
                                        $valor_horas = $row2['horas_recargo'];
                                        break;
                                    case 5879:
                                        $hora_i = $row2['hora_inicio_rec'];
                                        $hora_f = $row2['hora_fin_rec'];
                                        $valor_horas = $row2['horas_recargo'];
                                        break;
                                  }   
                                ?>
                                <tr>  
                                    <td><font size ="3", color ="black"><?php echo $codigo_concepto ?></td>                                               
                                    <td><font size ="3", color ="black"><?php echo $doc;?></td>
                                    <td><font size ="3", color ="black">C</td>             
                                    <td><font size ="3", color ="black"><?php echo $valor_horas;?></td>                                               
                                    <td><font size ="3", color ="black"><?php echo $ids;?></td>
                                    <td><font size ="3", color ="black"><?php echo $hora_i;?></td>                                                 
                                    <td><font size ="3", color ="black"><?php echo $hora_f;?></td>                                                 
                                    <td><font size ="3", color ="black"><?php echo $row2['fecha'];?></td>                                                 
                                    <td><font size ="3", color ="black"><?php echo $fecha_aprobacion;?></td>                                                 
                                </tr>
                                <?php 
                            }
                            ?>
                            <?php
                            // $consecutivo++;
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