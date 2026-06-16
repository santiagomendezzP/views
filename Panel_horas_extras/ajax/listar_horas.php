
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<?php
	/* Connect To Database*/
    require_once ("../conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	    ?>
        <!doctype html>
        <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="shortcut icon" href="#" />  
                <title>Tutorial DataTables</title>
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
                <?php 
                session_start();
                ?>
                <!--Ejemplo tabla con DataTables-->
                <div class="container" style="background-color: white;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">        
                                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><font size ="2", color ="#2d2d2d">FECHA</th>
                                            <th><font size ="2", color ="#2d2d2d">NOMBRE DEL DÍA</th>
                                            <th><font size ="2", color ="#2d2d2d">HORA DE ENTRADA</th>
                                            <th><font size ="2", color ="#2d2d2d">TIEMPO DE ALMUERZO O CENA</th>
                                            <th><font size ="2", color ="#2d2d2d">HORA DE SALIDA</th>
                                            <th><font size ="2", color ="#2d2d2d">TOTAL HORAS DÍA TRABAJADAS</th>
                                            <th><font size ="2", color ="#2d2d2d">HORA INICIAL HORAS EXTRAS</th>
                                            <th><font size ="2", color ="#2d2d2d">HORA FINAL HORAS EXTRAS</th>
                                            <th><font size ="2", color ="#2d2d2d">TOTAL HORAS EXTRAS</th>
                                            <th><font size ="2", color ="#2d2d2d">HORA INICIAL RECARGO</th>
                                            <th><font size ="2", color ="#2d2d2d">HORA FINAL RECARGO</th>
                                            <th><font size ="2", color ="#2d2d2d">TOTAL HORAS RECARGO</th>
                                            <th><font size ="2", color ="#2d2d2d">ACTIVIDAD DESARROLLADA</th>
                                            <th><font size ="2", color ="#2d2d2d">CODIGO CONCEPTO</th>
                                            <th><font size ="2", color ="#2d2d2d">EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_SESSION['reporte'])){
                                            foreach($_SESSION['reporte'] as $indice => $arreglo){
                                        ?>
                                        <tr>

                                        <td><?php echo $arreglo['fecha']; ?></td>
                                        <td><?php echo $arreglo['dia']; ?></td>
                                        <td><?php echo $arreglo['hora']; ?></td>
                                        <td><?php echo $arreglo['almuerzo']; ?></td>
                                        <td><?php echo $arreglo['hora_sal']; ?></td>
                                        <td><?php echo $arreglo['horas_dia']; ?></td>

                                        <td><?php echo $arreglo['hora_inicio_he']; ?></td>
                                        <td><?php echo $arreglo['hora_fin_he']; ?></td>
                                        <td><?php echo $arreglo['horas_extras']; ?></td>

                                        <td><?php echo $arreglo['hora_inicio_rec']; ?></td>
                                        <td><?php echo $arreglo['hora_fin_rec']; ?></td>
                                        <td><?php echo $arreglo['horas_recargo']; ?></td>

                                        <td><?php echo $arreglo['act']; ?></td>
                                        <td><?php echo $arreglo['concepto']; ?></td>

                                        <td>
                                            <?php echo $arreglo['edit']; ?>
                                        </td>

                                        </tr>
                                        <?php}
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
                <!--Ejemplo tabla con DataTables-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">        
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" style="width: 610px;" >
                                    <thead>
                                        <tr>
                                            <th><font size ="2", color ="#2d2d2d">HORAS EXTRAS DIURNAS:</th>
                                            <th><font size ="2", color ="#2d2d2d">HORAS EXTRAS NOCTURNAS:</th>
                                            <th><font size ="2", color ="#2d2d2d">HORAS EXTRAS DIURNAS DOMINICALES O FESTIVAS:</th>
                                            <th><font size ="2", color ="#2d2d2d">HORAS EXTRAS NOCTURNAS DOMINICALES O FESTIVAS:</th>
                                            <th><font size ="2", color ="#2d2d2d">RECARGOS NOCTURNOS ORDINARIOS:</th>
                                            <th><font size ="2", color ="#2d2d2d">RECARGO NOCTURNO DOMINICALES O FESTIVOS:</th>
                                            <th><font size ="2", color ="#2d2d2d">RECARGO DIURNO DOMINICAL O FESTIVO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($_SESSION['consolidado'])){
                                            ?>
                                            <tr>
                                                <td><font size ="2", color ="black"><?php echo $_SESSION['consolidado']['horaExDiu'];?></td>    
                                                <td><font size ="2", color ="black"><?php echo $_SESSION['consolidado']['horaExNoc'];?></td>    
                                                <td><font size ="2", color ="black"><?php echo $_SESSION['consolidado']['horaExDiu_dom'];?></td> 
                                                <td><font size ="2", color ="black"><?php echo $_SESSION['consolidado']['horaExNoc_dom'];?></td>    
                                                <td><font size ="2", color ="black"><?php echo $_SESSION['consolidado']['recargosNoc'];?></td>    
                                                <td><font size ="2", color ="black"><?php echo $_SESSION['consolidado']['recargosNoc_dom'];?></td>    
                                                <td><font size ="2", color ="black"><?php echo $_SESSION['consolidado']['recargosDiu_dom'];?></td>    
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
                        $('#conso tfoot th').each(function(){
                            var titles = $(this).text();
                            $(this).html('<input type="text" class="form-control" placeholder="busqueda"'+titles+'"/>');
                        });
                        var datas = $('#conso').DataTable({
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