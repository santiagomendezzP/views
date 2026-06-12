<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<?php
	session_start();
	/* Connect To Database*/
    require_once ("../conexion.php");
    include("./datos_tablas.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
        $campos = "*";
        $tables = "reporte_horas";
        $id = $_SESSION['intranet_id'];
        $query = mysqli_query($con,"SELECT $campos FROM  $tables WHERE `estado_jefe` = 3 && `estado_n` = 2 ");
        $query2 = mysqli_query($con,"SELECT $campos FROM  $tables WHERE `estado_jefe` = 3 && `estado_n` = 3 && `estado_geren` = 3");
        unset($_SESSION['horas_actuales_vice']);
        ?>
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
            <div class="container" style="background-color: white;">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">        
                                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><font size ="2", color ="#2d2d2d">NOMBRE DEL TRABAJADOR</th>
                                        <th><font size ="2", color ="#2d2d2d">MES</th>
                                        <th><font size ="2", color ="#2d2d2d">DOCUMENTO</th>
                                        <th><font size ="2", color ="#2d2d2d">UNIDAD DE SERVICIO</th>
                                        <th><font size ="2", color ="#2d2d2d">CARGO</th>
                                        <th><font size ="2", color ="#2d2d2d">NOMBRE JEFE</th>
                                        <th><font size ="2", color ="#2d2d2d">VER HORAS </th>
                                        <th><font size ="2", color ="#2d2d2d">ESTADO </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $dat = new nombres();
                                    $finales=0;
                                    while($row = mysqli_fetch_array($query)){
                                        $idR = $row['id_reporte'];
                                        $nombre = $row['nombre_trabajador'];
                                        $mes = $row['mes'];
                                        $docum = $row['documento'];
                                        $proy = $row['proyecto'];
                                        $cargo = $row['cargo'];
                                        $jefe = $row['id_jefe'];
                                        $estado = $row['estado_vice'];
                                        $finales++;                            
                                        $Nproy = $dat->nombre_pro($con,$proy);
                                        $Ncarg = $dat->nombre_car($con,$cargo);
                                        $Njefe = $dat->nombre_jefe($con,$jefe);
                                        ?>
                                        <tr>
                                            <td><font size ="2", color ="black"><?php echo $nombre;?></td>    
                                            <td><font size ="2", color ="black"><?php echo $mes;?></td>    
                                            <td><font size ="2", color ="black"><?php echo $docum;?></td>    
                                            <td><font size ="2", color ="black"><?php echo $Nproy;?></td>    
                                            <td><font size ="2", color ="black"><?php echo $Ncarg;?></td>   
                                            <td><font size ="2", color ="black"><?php echo $Njefe;?></td>    
                                            <td><font size ="2", color ="black">
                                                <button id="ver" name="ver"  onclick="ver(<?php echo $idR?>)" class="btn btn-outline-primary" >Ver</button>
                                            </td>
                                            <?php
                                            if($estado == 0 || $estado == 2){
                                                ?>
                                                <td><button class="btn" style="background-color: #E3B104; color: #ffffff;">PENDIENTE</button></td>
                                                <?php
                                            }elseif($estado == 3){
                                                ?>
                                                    <td><button class="btn btn-success">APROBADO</button></td>
                                                <?php
                                            }else{
                                                ?>
                                                <td><button class="btn btn-danger">DENEGADO</button></td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                    }
                                    $finales=0;
                                    while($row = mysqli_fetch_array($query2)){
                                        $idR = $row['id_reporte'];
                                        $nombre = $row['nombre_trabajador'];
                                        $mes = $row['mes'];
                                        $docum = $row['documento'];
                                        $proy = $row['proyecto'];
                                        $cargo = $row['cargo'];
                                        $jefe = $row['id_jefe'];
                                        $estado = $row['estado_vice'];
                                        $finales++;                            
                                        $Nproy = $dat->nombre_pro($con,$proy);
                                        $Ncarg = $dat->nombre_car($con,$cargo);
                                        $Njefe = $dat->nombre_jefe($con,$jefe);
                                        ?>
                                        <tr>
                                            <td><font size ="2", color ="black"><?php echo $nombre;?></td>    
                                            <td><font size ="2", color ="black"><?php echo $mes;?></td>    
                                            <td><font size ="2", color ="black"><?php echo $docum;?></td>
                                            <td><font size ="2", color ="black"><?php echo $Nproy;?></td>    
                                            <td><font size ="2", color ="black"><?php echo $Ncarg;?></td>   
                                            <td><font size ="2", color ="black"><?php echo $Njefe;?></td>    
                                            <td><font size ="2", color ="black">
                                                <button id="ver" name="ver"  onclick="ver(<?php echo $idR?>)" class="btn btn-outline-primary" >Ver</button>
                                            </td>                         
                                            <?php 
                                            if($estado == 0 || $estado == 2){
                                                ?>
                                                <td>
                                                    <button class="btn" style="background-color: #E3B104; color: #ffffff;">PENDIENTE</button>
                                                </td>
                                                <?php 
                                            }elseif($estado == 3){
                                                ?>
                                                <td><button class="btn btn-success">APROBADO</button></td>
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
        </body>
        </html>
        <?php
    }
?> 