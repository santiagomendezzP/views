<!DOCTYPE html>
<html class="no-js css-menubar" lang="es"><!-- InstanceBegin template="/Templates/new_tem_intranet.dwt.php" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title> INTRANET </title>
    <!-- InstanceEndEditable -->
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../global/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="../../assets/css/site.min.css">
    <link rel="stylesheet" href="../../assets/css/sweetalert.css">
    <!-- Css -->
    <link rel="stylesheet" href="../../global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../../global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="../../global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="../../global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="../../global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="../../global/css/skintools.min.css">
    <!-- Js -->
    <script src="../../global/vendor/jquery/jquery.js"></script>
    <script src="../../assets/js/newsweet.js"></script>
  	<link rel="stylesheet" href="../../global/vendor/toastr/toastr.css">
    <!-- InstanceBeginEditable name="head" -->
    <!-- Plugins Css -->
    <link rel="stylesheet" href="../../global/fonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../../global/vendor/datatables.net-bs4/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.min.css">
    <!-- Plugins Js -->
    
    <!-- InstanceEndEditable -->
    <script src="../../assets/js/Plugin/skintools.js"></script>
    <!-- Fonts -->
	<link rel="stylesheet" href="../../global/fonts/brand-icons/brand-icons.min.css">
    <link rel="stylesheet" href="../../global/fonts/web-icons/web-icons.min.css">
    <!-- Scripts -->
    <script src="../../global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
<?php
  session_start();
  $menulateral = '';
  $show_notices = "";
  if (isset($_SESSION['loggedin_intranet'])) {
    if ($_SESSION['loggedin_intranet'] === true){
		include_once "../../models/menubar/menuModel.php";
    }else if ($_SESSION['loggedin_intranet'] === false){
      header('location:../../change_pswd.php');
    }else { session_unset(); session_destroy(); header('location:../../'); }
  }else{ session_destroy(); header('location:../../'); }
?>
  <body class="animsition">
      <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <img class="navbar-brand-logo logo-delta" alt="" title="Delta A Salud S.A.S">
          <span class="navbar-brand-text hidden-xs-down"> <strong> INTRANET </strong> </span>
        </div>
      </div>
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
            </li>
            <li class="nav-item dropdown dropdown-fw dropdown-mega">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0);" aria-expanded="false" data-animation="fade" role="button"> <i class="icon wb-grid-4 btn btn-xs btn-round"></i> <i class="icon wb-chevron-down-mini" aria-hidden="true"></i></a>
              <div class="dropdown-menu" role="menu">
                <div class="mega-content">
                  <div class="row">
                    <div class="col-md-4">
                      <h5> Aplicativos </h5>
                      <ul class="blocks-2">
                        <li class="mega-menu m-0">
                          <ul class="list-icons">
                            <li>
                              <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="../calendario/users.php?<?php echo mt_rand(); ?>"> Calendario </a>
                            </li>
                          </ul>
                        </li>
                        <li class="mega-menu m-0">
                          <ul class="list-icons">
                            <li>
                              <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="../noticias/?<?php echo mt_rand(); ?>" class=""> Noticias </a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <h5> Noticias
                        <!-- <span class="badge badge-pill badge-success">1</span> -->
                      </h5>
                      <ul class="blocks-3">
                        <?php echo $show_notices; ?>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <h5 class="mb-0"> <?php echo $welcomes = ($_SESSION['intranet_genero'] == 1 ? 'Bienvenido' : ($_SESSION['intranet_genero'] == 2 ? 'Bienvenida' : '')); ?> </h5>
                      <!-- Accordion -->
                      <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true"
                        role="tablist">
                        <div class="panel">
                          <div class="panel-heading" id="siteMegaAccordionHeadingOne" role="tab">
                            <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion" aria-expanded="false" aria-controls="siteMegaCollapseOne">
                              Canal de comunicación interno
                            </a>
                          </div>
                          <div class="panel-collapse collapse" id="siteMegaCollapseOne" aria-labelledby="siteMegaAccordionHeadingOne" role="tabpanel">
                            <div class="panel-body">
                              A un solo click podrá acceder a las aplicaciones e información de <strong> Delta A Dalud. </strong>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Accordion -->
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <!-- End Navbar Toolbar -->
          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item">
              <a class="nav-link flag" href="javascript:void(0)">
                <span class="flag-icon flag-icon-co"></span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <img src="<?php echo $imgg = (empty($_SESSION['intranet_photo']) || $_SESSION['intranet_photo'] != '' || $_SESSION['intranet_photo'] == null ? '../../global/portraits/users/'.mt_rand(1,9).'.jpg' : 'data:image/jpg;base64,'.$_SESSION['intranet_photo'] ); ?>" alt="Cargando..."><i></i>
                </span>
              </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo $_SESSION['intranet_name']; ?> </a>
                <a class="dropdown-item" href="../profile/?<?php echo mt_rand(); ?>" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Perfil </a>
                <div class="dropdown-divider" role="presentation"></div>
                <a class="dropdown-item" href="../../controller/salida.php" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Cerrar sesión </a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link flag" href="javascript:void(0)">
                <strong> <?php echo $_SESSION['intranet_name'];?> </strong>
              </a>
            </li>
            <li class="nav-item dropdown" id="sidebar_notifications_user">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon wb-bell" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" data-original-title="Notificaciones"></i>
                <span class="badge badge-pill badge-danger up sidebar_count_notifications">0</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <div class="dropdown-menu-header" role="presentation">
                  <h5> Notificaciones </h5>
                  <span class="badge badge-round badge-danger sidebar_count_notifications"></span>
                </div>
                <div class="list-group" role="presentation">
                  <div data-role="container">
                    <div data-role="content" id="sidebar_content_notifications">
                    </div>
                  </div>
                </div>
                <div class="dropdown-menu-footer">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem"> Ver todas las notificaciones </a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon wb-envelope" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" data-original-title=" Mensajes "></i>
                <span class="badge badge-pill badge-info up sidebar_count_messages">0</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <div class="dropdown-menu-header" role="presentation">
                  <h5> Mensajes </h5>
                  <span class="badge badge-round badge-info sidebar_count_messages"></span>
                </div>
                <div class="list-group" role="presentation">
                  <div data-role="container">
                    <div data-role="content" id="sidebar_content_messages">
                    </div>
                  </div>
                </div>
                <div class="dropdown-menu-footer" role="presentation">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem"> Ver todos los mensajes </a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tooltip" data-original-title=" Inicio " data-placement="bottom" href="../home/?<?php echo mt_rand();?>" title=" Inicio ">
                <i class="icon wb-home" aria-hidden="true"></i>
              </a>
            </li>

              <li class="nav-item">
              <a class="nav-link" data-toggle="tooltip" data-original-title=" Inicio " data-placement="bottom" href="../../controller/salida.php" title=" Cerrar sesión ">CERRAR SESIÓN
                <i class="icon wb-exit" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
      </div>
    </nav>
    <div class="site-menubar">
      <div class="site-menubar-body">
        <div>
          <div>
            <ul class="site-menu" data-plugin="menu">
              <li class="site-menu-category small"> Principal </li>
              <li class="site-menu-item has-sub" id="site_site_modulos">
                <a href="javascript:void(0)">
                  <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                  <span class="site-menu-title"> Módulos </span>
                  <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                  <li class="site-menu-item" id="site_quienes_somos">
                    <a class="animsition-link" href="../qsomos/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Quiénes Somos</span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_como_vamos">
                    <a class="animsition-link" href="../gintegral/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Cómo vamos</span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_medio_ambiente">
                    <a class="animsition-link" href="../ambiental/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Gestión ambiental</span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_nos_ciudamos">
                    <a class="animsition-link" href="../sst/?<?php echo mt_rand();?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Pautas de SST</span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_best_team">
                    <a class="animsition-link" href="../bteam/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">El mejor equipo</span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_tecnologia">
                    <a class="animsition-link" href="../ti/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Soporte TI</span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_talento_humano">
                   <a class="animsition-link" href="../bfolder/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif"> SG-VIDAS </span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_bienestar">
                    <a class="animsition-link" href="../s_admin/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Nuestra sede</span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_innovacion">
                    <a class="animsition-link" href="../innovacion/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Innovamos para crecer </span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_transacciones">
                    <a class="animsition-link" href="../transacciones/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Mis transacciones</span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_interes">
                    <a class="animsition-link" href="../for_all/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">De interés para todos</span>  
                    </a>
                  </li>
                </ul>
              </li>
			  <?php	echo $menulateral; ?>
            </ul>
            <div class="site-menubar-section"> 
            </div>
          </div>
        </div>
      </div>    
      <div class="site-menubar-footer">
        <a href="javascript:void(0);" class="" style="cursor: auto;">
			<!-- <span class="icon wb-settings" aria-hidden="true"></span>-->
        </a>
        <a href="../profile/?<?php echo mt_rand(); ?>" class="fold-show" data-placement="top" data-toggle="tooltip" data-original-title=" Perfil ">
          <span class="icon wb-user-circle" aria-hidden="true"></span>
        </a>
        <a href="../../controller/salida.php" class="fold-show" data-placement="top" data-toggle="tooltip" data-original-title=" Cerrar sesión ">
          <span class="icon wb-power" aria-hidden="true"></span>
        </a>
      </div>
    </div>
    <div class="site-gridmenu">
      <div><div>
        <ul>
          <li>
            <a href="../calendario/users.php?<?php echo mt_rand(); ?>">
              <i class="icon wb-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
		  <li>
            <a href="../home/?<?php echo mt_rand(); ?>">
              <i class="icon wb-home"></i>
              <span> Inicio </span>
            </a>
          </li>
        </ul>
      </div></div>
    </div>
    <!-- InstanceBeginEditable name="body" -->
    <!-- Page Content -->
    <?php 
      if (isset($_SESSION['intranet_permitions'])){
        if (!in_array("Verificación de entrada",$_SESSION['intranet_permitions'])){
          header('location:../home/?'.mt_rand());
        }else if (in_array("Verificación de entrada",$_SESSION['intranet_permitions'])){
        }else{
          $conexion = false;
          header('location:../home/?'.mt_rand());
        }
      }else{
        $conexion = false;
        header('location:../home/?'.mt_rand());
      }
    ?>
    <div class="page">
      <div class="page-main">
        <div class="page-header">
          <h1 class="page-title"> Solicitudes de ingreso </h1>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="window.location.href='../home/?<?php echo mt_rand(); ?>';"> Inicio </a></li>
            <li class="breadcrumb-item active"> Aplicativo control de ingreso de visitantes </li>
          </ol>
          <div class="page-header-actions" style="z-index: 999">
            <div class="btn-group btn-group-sm" aria-label="Button group with nested dropdown" role="group">
              <div class="btn-group btn-group-sm" role="group" data-toggle="tooltip" data-placement="bottom" data-original-title=" Opciones ">
                <button type="button" class="btn btn-dark btn-outline dropdown-toggle" id="moreOptions" data-toggle="dropdown" aria-expanded="false">
                  <i class="icon wb-grid-9"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right animate" aria-labelledby="moreOptions" role="menu">
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem" id="actividadVisitantes"> Registros y solicitudes </a>
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem" id="todosVisitantes" > Base de datos </a>
                  <div class="dropdown-divider" role="presentation"></div>
                  <a href="javascript:void(0);" class="dropdown-item"> Actualizar página </a>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-icon btn-info btn-outline btn-round btn-md" data-toggle="tooltip" data-placement="left" data-original-title=" Manual " onclick="$('#modalInfo').modal('show')" >
              <i class="icon wb-library"></i>
            </button>
          </div>
        </div>
        <div class="page-content pr-0 pl-0">
          <div class="panel panel-bordered">
            <div class="panel-heading">
              <h3 class="panel-title"> Registros: </h3>
              <div class="panel-actions" style="z-index: 999">
                <div class="btn-group btn-group-sm" aria-label="Button group with nested dropdown" role="group">
                  <div class="btn-group btn-group-sm visitantesOpciones" role="group" data-toggle="tooltip" data-placement="left" data-original-title=" Opciones ">
                    <button type="button" class="btn btn-dark btn-outline dropdown-toggle" id="moreOptions" data-toggle="dropdown" aria-expanded="false">
                      <i class="icon wb-more-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right animate" aria-labelledby="moreOptions" role="menu">
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="changeTable('all');"> Todos </a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="changeTable('bypass');"> Verificar ingreso </a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="changeTable('inside');"> Visitante en las instalaciones </a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="changeTable('bywayout');"> Verificar salida </a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="changeTable('bywait');"> En espera </a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="changeTable('addimprevisto');"> Imprevistos </a>
                      <div class="dropdown-divider" role="presentation"></div>
                      <a href="javascript:void(0);" class="dropdown-item"> Actualizar página </a>
                    </div>
                  </div>
                  <div class="btn-group btn-group-sm databaseOpciones" role="group" data-toggle="tooltip" data-placement="left" data-original-title=" Opciones ">
                    <button type="button" class="btn btn-dark btn-outline dropdown-toggle" id="moreOptions" data-toggle="dropdown" aria-expanded="false">
                      <i class="icon wb-more-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right animate" aria-labelledby="moreOptions" role="menu">
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="changeTable('finalizados');"> Finalizados </a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="changeTable('inasistentes');"> Inasistentes </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body" id="panel_seguridad">
            </div>
            <div class="panel-footer">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalInfo">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <div class="form-row col-sm-12">
              <div class="form-group col-sm-11 text-center">
                  <h4 class="modal-title">Manual para el area de seguridad <br> Sistema de control de ingreso de visitantes </h4>
              </div>
              <div class="form-group col-sm-1 text-right">
                <button type="button" style="background-color: initial; border: none; cursor: auto;" data-dismiss="modal" ><i class="icon wb-close btn btn-outline btn-round btn-dark"></i></button>
              </div>
            </div>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-row col-xs-12">
                <div class="form-group col-xs-12">
                  <?php echo $welcomes." ".$_SESSION['intranet_name']; ?> al módulo de <strong><b>"Verificación de entradas"</b></strong>, al haber hecho click en este módulo será dirigido automaticamente a la sección de 
                  <div class="btn-group btn-group-xs">
                    <a type="button" class="btn btn-outline btn-default" data-toggle="tooltip" data-original-title="Visitas">
                      <i class="icon wb-user"></i>Visitantes 
                    </a>
                  </div>, en la cual aparece el registro de todas las solicitudes, que están en proceso. <br>
                </div>
                <div class="form-group col-xs-12">
                  En esta sección la tabla de registros incluye los siguientes encabezados: <br>
                </div>
                <div class="form-group col-xs-12">
                  <ul>
                    <li> Visitante: En este campo aparecera el nombre completo (nombres y apellidos) del visitante.</li>
                    <li> Documento: En esta columna estara el número de documento del visitante.</li>
                    <li> Encargado: En esta columna se muestra el encargado del visitante en las instalaciones.</li>
                    <li> Vehículo: Si el solicitante agendo un vehículo se le mostrara de lo contrario le aparecera "NO AGENDA".</li>
                    <li> Fecha de visita: Esta columna le señala la fecha y hora en que el visitante llegara.</li>
                    <li><p> Opciones: Cada visitante cuenta con un control de avance de la solicitud. A continuación, se explica el estatus del avance y el botón que lo representa: </p>
                      <ul>
                        <li><i class='fas fa-sign-in-alt btn btn-outline btn-round btn-dark btn-sm' title='Solicitud reciente'></i> Este botón indica que la solicitud es reciente, por lo tanto, se debe verificar el ingreso o poner en espera, (esta última opción se aplica solo si lo considera un caso especial). En caso de "poner en espera”, es necesario que especifique en <strong><b>“Observaciones”</b></strong> los motivos de la decisión y ponerse en contacto con el encargado de la solicitud. </li>
                        <li><i class='icon wb-user-add btn btn-outline btn-round btn-primary btn-sm' title='Visitante en las instalacinoes de la empresa'></i> Al hacer clic sobre este botón le  muestra la foto de la persona que se encuentra dentro de las instalaciones, el número de contacto en caso de emergencia, su EPS y ARL. Así mismo, contiene un botón de   <strong><b>"salida rápida"</b></strong>, que solo debe aplicarse cuando el solicitante encargado este ausente.</li>
                        <li><i class='icon wb-user-add btn btn-outline btn-round btn-warning btn-sm' title='Visitante frecuente'></i> Este botón aparece si el visitante ha sido marcado como “visitante frecuente”. Cada vez que ingrese o se retire de las instalaciones, solo se debe especificar en “Observaciones” si "Ingresa" o "Sale". El sistema automáticamente almacena la fecha y hora cuando da clic en “Confirmar”.</li>
                        <li><i class='icon wb-user-add btn btn-outline btn-round btn-success btn-sm'></i> Cuando este botón se muestre por favor proceda a la acción de "Verificar salida".</li>
                        <li><i class='icon wb-user-add btn btn-outline btn-round btn-danger btn-sm' title='Visitante en espera'></i> Este ícono señala que la solicitud está en espera, lo cual indica que el solicitante debe realizar alguna acción, de acuerdo con las observaciones del área de seguridad.</li>
                      </ul>
                    </li>
                  </ul><br>
                </div>
                <div class="form-group col-xs-12">
                  Para filtrar los registros según el estatus del visitante, debe hacer clic en el siguiente botón <i class="icon wb-more-vertical"></i> y seleccionar la opción que desee consultar. <br><br>
                  <strong><b> ** </b></strong> Nota aclaratoria “Imprevistos”: Esta opción le permite registrar un visitante que no se ha registrado con antelación. Solo esta habilitada para el perfil del área de seguridad. 
                </div>
                <div class="form-group col-xs-12">
                  Para conocer los registros de solicitudes con estatus “Finalizado” e “Inasistente” diríjase a la sección 
                  <div class="btn-group btn-group-xs">
                    <a type="button" class="btn btn-outline btn-default" data-toggle="tooltip" data-original-title="Resgistros">
                      <i class="icon wb-grid-4"></i> Base de datos
                    </a>
                  </div>, inicialmente la tabla contiene los registros de las solicitudes con estatus de <strong><b>"Finalizado"</b></strong> y para conocer el listado  de solcitudes de visitantes <strong><b>"Inasistentes"</b></strong> de click en el botón <i class="icon wb-more-vertical"></i> y presiones la opción de <strong><b>"Inasistentes"</b></strong>.
                </div>
                <div class="form-group col-xs-12">
                  En esta sección tenga encuenta que en el campo opciones apareceran estos botones: <br>
                </div>
                <div class="form-group col-xs-12">
                  <ul>
                    <li>Este botón <i class='icon wb-user-add btn btn-outline btn-round btn-dark btn-sm'></i> indica que el proceso de control de ingreso se ha completado, por lo tanto, su estatus es "Finalizado".</li>
                    <li>Este botón <i class='fas fa-user-times btn btn-outline btn-round btn-info btn-sm'></i> marca la solicitud del visitante como “  Inasistente".</li>
                  </ul>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <script>
      $("#site_seguridad_recepcion").addClass("active");
      $(document).ready(function(){
        $("#panel_seguridad").load("segurity-view_table.php");
        $(".visitantesOpciones").show();
        $(".databaseOpciones").hide();
      });
      $("#actividadVisitantes").click(function(){
        $("#panel_seguridad").load("segurity-view_table.php");
        $(".visitantesOpciones").show();
        $(".databaseOpciones").hide();
      });
      $("#todosVisitantes").click(function(){
        $("#panel_seguridad").load("seguridad-view_finalizados_inasistentes.php");
        $(".visitantesOpciones").hide();
        $(".databaseOpciones").show();
      });
    </script>
    <!-- End Page -->
    <!-- InstanceEndEditable -->
    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">© 2021 <a href="https://bit.ly/2OBdVf4"> Delta A Salud S.A.S </a></div>
      <div class="site-footer-right">
        <!-- Crafted with effort and dedication --> Hecho con esfuerzo y dedicación <i class="red-600 wb wb-wrench"></i> para los Colaboradores de <a href="https://bit.ly/2OBdVf4"> Delta A Salud</a>.
      </div>
    </footer>
    <!-- Core  -->
    <script src="../../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="../../global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="../../global/vendor/bootstrap/bootstrap.js"></script>
    <script src="../../global/vendor/animsition/animsition.js"></script>
    <script src="../../global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="../../global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="../../global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="../../global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    <!-- Plugins -->
    <script src="../../global/vendor/slidepanel/jquery-slidePanel.js"></script>
	<script src="../../global/vendor/toastr/toastr.js"></script>
    <!-- InstanceBeginEditable name="Plugins js" -->
    <script src="../../global/vendor/datatables/dataTable.min.js"></script>
    <script src="../../global/vendor/datatables/dataTableButtons.min.js"></script>
    <script src="../../global/vendor/datatables/buttonsFlash.min.js"></script>
    <script src="../../global/vendor/datatables/jszip.min.js"></script>
    <script src="../../global/vendor/datatables/pdfmake.min.js"></script>
    <script src="../../global/vendor/datatables/vsf_fonts.js"></script>
    <script src="../../global/vendor/datatables/buttonHtml5.min.js"></script>
    <script src="../../global/vendor/datatables/buttonsPrint.min.js"></script>
    <script src="../../global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.min.js"></script>

    <!-- InstanceEndEditable -->
    <!-- Scripts -->
    <script src="../../global/js/Component.js"></script>
    <script src="../../global/js/Plugin.js"></script>
    <script src="../../global/js/Base.js"></script>
    <script src="../../global/js/Config.js"></script>
    <script src="../../assets/js/Section/Menubar.js"></script>
    <script src="../../assets/js/Section/GridMenu.js"></script>
    <script src="../../assets/js/Section/Sidebar.js"></script>
    <script src="../../assets/js/Section/PageAside.js"></script>
    <script src="../../assets/js/Plugin/menu.js"></script>
    
    <script src="../../global/js/config/colors.js"></script>
    <script>Config.set('assets', '../../assets');</script>
    
    <!-- Page -->
    <script src="../../assets/js/Site.js"></script>
    <script src="../../global/js/Plugin/asscrollable.js"></script>
    <script src="../../global/js/Plugin/slidepanel.js"></script>
    <script src="../../global/js/Plugin/switchery.js"></script> 
    <!-- InstanceBeginEditable name="JS" -->
    
    <!-- InstanceEndEditable -->
	  <script src="../../controller/notifications/notify.js"></script>
    <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
  </body>
<!-- InstanceEnd --></html>