<?php
$consecutivo =$_POST['consecutivo'];
$año =$_POST['año'];
$mes = $_POST['mes'];
$fecha = $año."-".$mes;
$id = $_POST['id'];
$campos = "*";
$tables = "reporte_horas";
$tableConsol = "consolidado_horas";
$query = mysqli_query($con,"SELECT $campos FROM  $tables WHERE proyecto ='$id' AND estado_ges_hu= 3 AND fecha_registro LIKE '$fecha%'");
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
                        </tr>
                    </thead>
                    <tbody>            
                        <?php
                        while($row=mysqli_fetch_array($query)){
                            $ids =$row['id_reporte'];
                            $doc =$row['documento'];
                            $query2 = mysqli_query($con,"SELECT $campos FROM  $tableConsol WHERE id_reporte ='$ids'");
                            while($fila=mysqli_fetch_array($query2)){
                                    $hora_extra_diu= $fila['hora_extra_diu'];
                                    $hora_extra_noct= $fila['hora_extra_noct'];
                                    $hora_extra_diu_dom= $fila['hora_extra_diu_dom'];
                                    $hora_extra_noct_dom= $fila['hora_extra_noct_dom'];
                                    $recargo_noct= $fila['recargo_noct'];
                                    $recargo_noct_dom= $fila['recargo_noct_dom'];
                                    $recargo_diur_dom= $fila['recargo_diur_dom'];
                                ?>
                                <tr>  
                                    <td><font size ="3", color ="black">9</td>                                               
                                    <td><font size ="3", color ="black"><?php echo $doc;?></td>
                                    <td><font size ="3", color ="black">C</td>                          
                                    <td><font size ="3", color ="black"><?php echo $hora_extra_diu;?></td>                                               
                                    <td><font size ="3", color ="black"><?php echo $consecutivo;?></td>
                                    <?php 
                                    $query3 = mysqli_query($con,"SELECT * FROM `detalle_reporte` WHERE `id_reporte` ='$ids'");
                                    $array = mysqli_fetch_array($query3);
                                    $codigo_concepto = $array['codigo_concepto'];

                                    if ($codigo_concepto = 9) {
                                        $query4  = mysqli_query($con,"SELECT * FROM `detalle_reporte` WHERE `id_reporte` ='$ids' AND `codigo_concepto` = 9");
                                        $array2 = mysqli_fetch_array($query4);
                                        $hora_inicio_he = $array2['hora_inicio_he'];
                                        $hora_fin_he = $array2['hora_fin_he'];
                                       ?>
                                        <td><font size ="3", color ="black"><?php echo $hora_inicio_he;?></td>
                                        <td><font size ="3", color ="black"><?php echo $hora_fin_he;?></td>                                                 
                                        <?php
                                    }else{
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>           
                                        <?php
                                    }
                                    ?>
                                    <!-------------------------------------------------->         
                                </tr>
                                <tr>
                                    <?php $consecutivo ++;?>                                 
                                    <td><font size ="3", color ="black">100</td>  
                                    <td><font size ="3", color ="black"><?php echo $doc;?></td>                                                                                       
                                    <td><font size ="3", color ="black">C</td>                                                                                       
                                    <td><font size ="3", color ="black"><?php echo $hora_extra_noct;?></td>                                               
                                    <td><font size ="3", color ="black"><?php echo $consecutivo;?></td>   
                                    <?php                                            
                                    if ($codigo_concepto = 100) {
                                        $query4  = mysqli_query($con,"SELECT * FROM `detalle_reporte` WHERE `id_reporte` ='$ids' AND `codigo_concepto` = 100");
                                        $array2 = mysqli_fetch_array($query4);
                                        $hora_inicio_he = $array2['hora_inicio_he'];
                                        $hora_fin_he = $array2['hora_fin_he'];
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo $hora_inicio_he;?></td>
                                        <td><font size ="3", color ="black"><?php echo $hora_fin_he;?></td>                                                 
                                        <?php
                                    }else{
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>           
                                        <?php
                                    }
                                    ?>                                               
                                    <!-------------------------------------------------->         
                                </tr>
                                <tr>
                                <?php $consecutivo ++;?> 
                                    <td><font size ="3", color ="black">205</td>       
                                    <td><font size ="3", color ="black"><?php echo $doc;?></td>                                                                                       
                                    <td><font size ="3", color ="black">C</td>                                                                                       
                                    <td><font size ="3", color ="black"><?php echo $hora_extra_diu_dom;?></td>                                               
                                    <td><font size ="3", color ="black"><?php echo $consecutivo;?></td>                                               
                                    <?php                                            
                                    if ($codigo_concepto = 205) {
                                        $query4  = mysqli_query($con,"SELECT * FROM `detalle_reporte` WHERE `id_reporte` ='$ids' AND `codigo_concepto` = 205");
                                        $array2 = mysqli_fetch_array($query4);
                                        $hora_inicio_he = $array2['hora_inicio_he'];
                                        $hora_fin_he = $array2['hora_fin_he'];
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo $hora_inicio_he;?></td>
                                        <td><font size ="3", color ="black"><?php echo $hora_fin_he;?></td>                                                 
                                        <?php
                                    }else{
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>           
                                        <?php
                                    }
                                    ?>                                                   
                                    <!-------------------------------------------------->         
                                </tr>
                                <tr>
                                <?php $consecutivo ++;?> 
                                    <td><font size ="3", color ="black">201</td>       
                                    <td><font size ="3", color ="black"><?php echo $doc;?></td>                                                                                       
                                    <td><font size ="3", color ="black">C</td>                                                                                       
                                    <td><font size ="3", color ="black"><?php echo $hora_extra_noct_dom;?></td>                                               
                                    <td><font size ="3", color ="black"><?php echo $consecutivo;?></td>                                               
                                    <?php                                            
                                    if ($codigo_concepto = 201) {
                                        $query4  = mysqli_query($con,"SELECT * FROM `detalle_reporte` WHERE `id_reporte` ='$ids' AND `codigo_concepto` = 201");
                                        $array2 = mysqli_fetch_array($query4);
                                        $hora_inicio_he = $array2['hora_inicio_he'];
                                        $hora_fin_he = $array2['hora_fin_he'];
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo $hora_inicio_he;?></td>
                                        <td><font size ="3", color ="black"><?php echo $hora_fin_he;?></td>                                                 
                                        <?php
                                    }else{
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>           
                                        <?php
                                    }
                                    ?>                                                   
                                    <!-------------------------------------------------->         
                                </tr>
                                <tr>
                                <?php $consecutivo ++;?> 
                                    <td><font size ="3", color ="black">5055</td>       
                                    <td><font size ="3", color ="black"><?php echo $doc;?></td>                                                                                       
                                    <td><font size ="3", color ="black">C</td>                                                                                       
                                    <td><font size ="3", color ="black"><?php echo $recargo_noct;?></td>                                               
                                    <td><font size ="3", color ="black"><?php echo $consecutivo;?></td>                                               
                                    <?php                                            
                                    if ($codigo_concepto = 5055) {
                                        $query4  = mysqli_query($con,"SELECT * FROM `detalle_reporte` WHERE `id_reporte` ='$ids' AND `codigo_concepto` = 5055");
                                        $array2 = mysqli_fetch_array($query4);
                                        $hora_inicio_rec = $array2['hora_inicio_rec'];
                                        $hora_fin_rec = $array2['hora_fin_rec'];
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo $hora_inicio_rec;?></td>
                                        <td><font size ="3", color ="black"><?php echo $hora_fin_rec;?></td>                                                 
                                        <?php
                                    }else{
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>           
                                        <?php
                                    }
                                    ?>                                                   
                                    <!-------------------------------------------------->         
                                </tr>
                                <tr>
                                <?php $consecutivo ++;?> 
                                    <td><font size ="3", color ="black">5872</td>       
                                    <td><font size ="3", color ="black"><?php echo $doc;?></td>                                                                                       
                                    <td><font size ="3", color ="black">C</td>                                                                                       
                                    <td><font size ="3", color ="black"><?php echo $recargo_noct_dom;?></td>                                               
                                    <td><font size ="3", color ="black"><?php echo $consecutivo;?></td>                                               
                                    <?php                                            
                                    if ($codigo_concepto = 5872) {
                                        $query4  = mysqli_query($con,"SELECT * FROM `detalle_reporte` WHERE `id_reporte` ='$ids' AND `codigo_concepto` = 5872");
                                        $array2 = mysqli_fetch_array($query4);
                                        $hora_inicio_rec = $array2['hora_inicio_rec'];
                                        $hora_fin_rec = $array2['hora_fin_rec'];
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo $hora_inicio_rec;?></td>
                                        <td><font size ="3", color ="black"><?php echo $hora_fin_rec;?></td>                                                 
                                        <?php
                                    }else{
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>           
                                        <?php
                                    }
                                    ?>                                                     
                                    <!-------------------------------------------------->         
                                </tr>
                                <tr>
                                <?php $consecutivo ++;?> 
                                    <td><font size ="3", color ="black">5879</td>       
                                    <td><font size ="3", color ="black"><?php echo $doc;?></td>                                                                                       
                                    <td><font size ="3", color ="black">C</td>                                                                                       
                                    <td><font size ="3", color ="black"><?php echo $recargo_diur_dom;?></td>                                               
                                    <td><font size ="3", color ="black"><?php echo $consecutivo;?></td>                                               
                                    <?php                                            
                                    if ($codigo_concepto = 5879) {
                                        $query4  = mysqli_query($con,"SELECT * FROM `detalle_reporte` WHERE `id_reporte` ='$ids' AND `codigo_concepto` = 5879");
                                        $array2 = mysqli_fetch_array($query4);
                                        $hora_inicio_rec = $array2['hora_inicio_rec'];
                                        $hora_fin_rec = $array2['hora_fin_rec'];
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo $hora_inicio_rec;?></td>
                                        <td><font size ="3", color ="black"><?php echo $hora_fin_rec;?></td>                                                 
                                        <?php
                                    }else{
                                        ?>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>
                                        <td><font size ="3", color ="black"><?php echo '00:00';?></td>           
                                        <?php
                                    }
                                    ?>                                                 
                                    <!-------------------------------------------------->         
                                </tr>
                                <?php
                            }
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