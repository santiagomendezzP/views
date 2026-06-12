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
    <link rel="stylesheet" href="../../assets/css/ambiental-css.css">
    <link rel="stylesheet" href="../../global/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="../../global/vendor/slick-carousel/slick.css">
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
    <style>
    
    </style>
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
      <div class="navbar-container container-fluid" >
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
                      <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true"role="tablist">
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
                    <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">  SG-VIDAS </span>
                  </a>
                  </li>
                  <li class="site-menu-item" id="site_bienestar">
                    <a class="animsition-link" href="../s_admin/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Nuestra sede</span>
                    </a>
                  </li>
                  <li class="site-menu-item" id="site_innovacion">
                    <a class="animsition-link" href="../innovacion/?<?php echo mt_rand(); ?>">
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Innovamos para crecer</span>
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
            <div class="site-menubar-section"></div>
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
      <div>
        <div>
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
        </div>
      </div>
    </div>
    <!-- InstanceBeginEditable name="body" -->
    <!-- Page Content -->
    <script>
      $("#site_site_modulos").addClass("active open");
      $("#site_nos_ciudamos").addClass("active");
    </script>
    <div class="page">
      <div class="page-main">
        <div class="page-header p-0"></div>
        <div class="page-content pr-0 pl-0">
          <div class="panel panel-bordered">
            <div class="panel-heading p-0">
              <nav class="site-navbar navbar navbar-default navbar-mega nav-scroll" style="position: fixed; z-index: 999; width: 100%;">
                <!-- <div class="navbar-header" style="background-size: 50% 70%; background: #0f6faa;">
                  <button type="button" class="navbar-toggler collapsed" data-target="#sst-collapse" data-toggle="collapse">
                    <i class="icon wb-more-horizontal" aria-hidden="true"></i>
                  </button>          
                  <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu"></div>
                </div> -->
                <div class="navbar-container container-fluid" style="background: #00000038;">
                  <div class="collapse navbar-collapse navbar-collapse-toolbar" id="sst-collapse" style="background: initial;">
                    <!-- Navbar Toolbar -->
                    <?php
                      if($_SESSION['intranet_usuario'] == 'raul.enciso' || $_SESSION['intranet_usuario'] == 'andrea.camacho' || $_SESSION['intranet_usuario'] == 'erika.poveda' || $_SESSION['intranet_usuario'] == 'david.patiño') {
                        ?>
                        <a class="btn" style="background-color: white; color: #005197;" data-toggle="modal" data-target="#crearSeccionSst" data-crear_seccion='crear' title="click para crear">
                          <span class="fas fa-folder-plus"></span>
                        </a>
                        <a class="btn" style="background-color: white; color: #005197; border-color: white;" data-toggle="modal" data-target="#verregistros" data-ver_registros='verregistros' title="click para ver registros">
                        <i class="icon  wb-eye" ></i>
                        </a>
                        <a class="btn" style="background-color: white; color: #005197;" data-toggle="modal" data-target="#EliminarSeccionSst" data-eliminars='Eliminar' title="click para Eliminar sección">
                          <span class="fas fa-folder-minus"></span>
                        </a>
                        <?php 
                      }
                    ?>
                    <ul class="nav navbar-toolbar navbar-toolbar-right padding-left-80 margin-left-80">
                      <?php
                        $mysqli = new mysqli("localhost", "desarrollo_delta", "*Delta2021*", "intranet");
                        $mysqli->set_charset('utf8');
                        $sql_sst_secciones = mysqli_query($mysqli,"SELECT `id_seccion`,`seccion` FROM `sst_secciones` WHERE `estado_seccion` = '0' ORDER BY `id_seccion` DESC");
                        while($rowSecciones = mysqli_fetch_array($sql_sst_secciones)){
                          ?>
                          <li class="nav-item dropdown design-2">
                            <a href="<?php echo '#' . $rowSecciones['id_seccion']?>" class="nav-link item-scroll" data-animation="scale-up" role="button"><?php echo $rowSecciones['seccion']?></a>
                          </li>
                          <?php
                            if($_SESSION['intranet_usuario'] == 'raul.enciso' || $_SESSION['intranet_usuario'] == 'andrea.camacho' || $_SESSION['intranet_usuario'] == 'erika.poveda' || $_SESSION['intranet_usuario'] == 'david.patiño') {
                              ?>
                              <a class="btn" style="background-color: transparent; margin-right: 20px;" data-toggle="modal" data-target="#CrearPublicacionSst" data-publicacion='<?php echo $rowSecciones['id_seccion'];?>' data-usuario_intra='<?php echo $_SESSION['intranet_usuario'];?>' data-id_seccion='<?php echo $rowSst['id']; ?>' title="click para editar">
                              <i class="fas fa-plus" style="background-color: transparent; color: white; border-color: #3e8ef7;"></i>
                              </a>
                              <?php
                            }
                          ?>
                          <?php
                        }
                      ?>
                      <!-- <li class="nav-item dropdown design-2">
                        <a class="nav-link" data-toggle="dropdown" data-animation="scale-up" role="button">Comités de apoyo ⇩</a>
                        <ul class="dropdown-menu dropdown-menu-media" role="menu">
                          <li class="list-group" role="presentation">
                            <div class="" data-role="container">
                              <div class="" data-role="content">
                                <a href="#CDC" class="list-group-item item-scroll">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-users"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Comité de convivencia</h6>
                                    </div>
                                  </div>
                                </a>
                                <a href="#Copasst" class="list-group-item item-scroll">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-users-cog"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Comité COPASST</h6>
                                    </div>
                                  </div>
                                </a>
                                <a href="#Bemergencia" class="list-group-item item-scroll">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-users-cog"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Brigada de emergencia</h6>
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </li> -->
                      <li class="nav-item dropdown design-2">
                        <a class="nav-link" href="#" data-toggle="dropdown" data-animation="scale-up" role="button">¡Cuidémonos! ⇩</a>
                        <ul class="dropdown-menu dropdown-menu-media" role="menu">
                          <li class="list-group" role="presentation">
                            <div class="" data-role="container">
                              <div class="" data-role="content">
                                <a href="#Tversion" class="list-group-item item-scroll">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="far fa-comments"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Accidente de trabajo</h6>
                                    </div>  
                                  </div>
                                </a>
                                <a href="#Svial" class="list-group-item item-scroll">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-heartbeat"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Seguridad vial</h6>
                                    </div>
                                  </div>
                                </a>
                                <a href="#Ccampaña" class="list-group-item item-scroll">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Cronograma de campañas</h6>
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown design-2">
                        <a href="#Rtrabajo" class="nav-link item-scroll" data-animation="scale-up" role="button">Riesgos en mi trabajo</a>
                      </li>
                      <li class="nav-item dropdown design-2">
                        <a class="nav-link" href="#" data-toggle="dropdown" data-animation="scale-up" role="button" title="¿Conóce lo que debe hacer en caso de emergencia?">En caso de emergencia ⇩</a>
                        <ul class="dropdown-menu dropdown-menu-media" role="menu">
                          <li class="list-group" role="presentation">
                            <div data-role="container">
                              <div data-role="content">
                                <a href="../../views/transacciones/" target="_blank" class="list-group-item" role="menuitem">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-paper-plane"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Reportar accidente laboral</h6>
                                    </div>
                                  </div>
                                </a>
                                <a href="#Natural" class="list-group-item item-scroll" role="menuitem">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-file-signature"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Por causas naturales</h6>
                                    </div>
                                  </div>
                                </a>
                                <a href="#Tecnologia" class="list-group-item item-scroll" role="menuitem">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-network-wired"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">En caso de incendio</h6>
                                    </div>
                                  </div>
                                </a>
                                <a href="#Social" class="list-group-item item-scroll" role="menuitem">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-users"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Por causas sociales</h6>
                                    </div>
                                  </div>
                                </a>
                                <a href="#Trabajo" class="list-group-item item-scroll" role="menuitem">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Por accidente de trabajo</h6>
                                    </div>
                                  </div>
                                </a>
                                <a href="#Sevacuacion" class="list-group-item item-scroll" role="menuitem">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading"> Simulacro de evacuación </h6>
                                    </div>
                                  </div>
                                </a>
                                <a href="#Pencuentro" class="list-group-item item-scroll" role="menuitem">
                                  <div class="media">
                                    <div class="media-left padding-right-10">
                                      <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Punto de encuentro</h6>
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
              <BR>
              <BR>
              <BR>
              <BR>
            </div>
            <!-- inicio pausas activas -->
            <style type="text/css">
              .columna {
                width:33%;
                float:left;
              }
              @media (max-width: 500px) {
                .columna {
                  width:auto;
                  float:none;
                }
              }
            </style>
            <center>
            <br>
            <br>
       
       <!-- <div class="tab-pane animation-slide-top" id="CDC">
              <div class="page-header">
                <h3 class="page-title" style="background-color: #eef4fd; margin-right: 600px; margin-left: 600px; color: #393939;"> Comité de convivencia</h3>
                <ol class="breadcrumb"></ol>
              </div>
              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="slider exampleAutoplay" style="z-index: 777">
                  <div>
                    <img src="./../imagenes_sst/Comite_de_convivencia_2023.png" alt="Cargando..." >
                  </div>
                </div>
              </di -->
          <!--     <div class="col-xs-12 col-md-12 col-lg-12" >
                <video id="player" poster="" width="1000" height="500" playsinline controls crossorigin>
                  <source type="video/mp4" src="./../videos_sst/comite_de_convivencia.mp4">
                </video>
              </div>
            </div> -->



            <!-- copasst  -->



       <!-- <div class="tab-pane animation-slide-top" id="Copasst">
              <div class="page-header">
                <h3 class="page-title" style="background-color: #eef4fd; margin-right: 600px; margin-left: 600px; color: #393939;"> Copasst</h3>
                <ol class="breadcrumb"></ol>
              </div>
              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="slider exampleAutoplay" style="z-index: 777">
                  <div>
                    <img src="./../imagenes_sst/comite_de_sst_2023.png" alt="Cargando..." >
                  </div>
                </div>
              </div>
        
            </div>
 -->

       <!-- <div class="tab-pane animation-slide-top" id="Bemergencia">
              <div class="page-header">
                <h3 class="page-title" style="background-color: #eef4fd; margin-right: 600px; margin-left: 600px; color: #393939;"> Brigada de emergencias</h3>
                <ol class="breadcrumb"></ol>
              </div>
              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="slider exampleAutoplay" style="z-index: 777">
                  <div>
                    <img src="./../imagenes_sst/Brigada de Emergencia 2023.png" alt="Cargando..." width="1000" height="80%">
                  </div>
                </div>
              </div>
        
            </div> -->

            <?php
// 1. Usa consultas parametrizadas para mayor seguridad
$stmt = $mysqli->prepare("SELECT * FROM `sst` WHERE `estado_publicacion` = ? ORDER BY `id` DESC");
$estado_publicacion = 0;
$stmt->bind_param("i", $estado_publicacion);
$stmt->execute();
$result = $stmt->get_result();

while ($rowSst = $result->fetch_assoc()) {
    ?>
    <div id="<?php echo htmlspecialchars($rowSst['id_seccion']); ?>" style="margin-left: 50px; padding: 30px;">
        <?php
        // 2. Consulta las secciones de forma eficiente
        $stmt_secciones = $mysqli->prepare("SELECT * FROM `sst_secciones` WHERE `id_seccion` = ? ORDER BY `id_seccion` DESC");
        $stmt_secciones->bind_param("s", $rowSst['id_seccion']);
        $stmt_secciones->execute();
        $secciones_result = $stmt_secciones->get_result();
        while ($rowSstSecciones = $secciones_result->fetch_assoc()) {
            ?>
            <div style="background-color: #eef4fd; margin-right: 600px; margin-left: 600px;">
                <h1 style="color: #393939;"><?php echo htmlspecialchars($rowSstSecciones['seccion']); ?></h1>
            </div>
            <?php
        }

        // 3. Control de acceso centralizado
        $usuarios_permitidos = ['raul.enciso', 'andrea.camacho', 'erika.poveda', 'julio.fuentes', 'david.patiño'];
        if (in_array($_SESSION['intranet_usuario'], $usuarios_permitidos)) {
            ?>
            <p class="page-header">
                <a class="btn" style="background-color: transparent; color: #3e8ef7; border-color: #3e8ef7;" 
                   data-toggle="modal" data-target="#editarSeccionSst" 
                   data-id_seccion="<?php echo htmlspecialchars($rowSst['id']); ?>" 
                   title="click para editar">
                    <span class="cambioColor">Editar</span>
                </a>
                <a class="btn" style="background-color: transparent; color: #3e8ef7; border-color: #3e8ef7;" 
                   data-toggle="modal" data-target="#eliminarSeccionSst" 
                   data-ideliminarseccion="<?php echo htmlspecialchars($rowSst['id']); ?>" 
                   title="click para eliminar">
                    <span class="cambioColor">Eliminar</span>
                </a>
            </p>
            <?php
        }
        ?>
        <h3><?php echo htmlspecialchars($rowSst['titulo']); ?></h3>
        <div class="tab-pane animation-scale-up">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <?php
                // 4. Renderizado de contenido basado en tipo
                switch ($rowSst['type']) {
                    case 'video':
                        ?>
                        <video src="./../videos_sst/<?php echo htmlspecialchars($rowSst['name']); ?>" 
                               width="1000" height="500" 
                               poster="<?php echo $rowSst['name_poster'] ? "./../imagenes_sst/" . htmlspecialchars($rowSst['name_poster']) : ''; ?>" 
                               controls>
                        </video>
                        <?php
                        break;

                    case 'imagen':
                        ?>
                        <img src="./../imagenes_sst/<?php echo htmlspecialchars($rowSst['name']); ?>" width="1000" height="100%" alt="">
                        <?php
                        break;

                    case 'pdf':
                        ?>
                        <iframe src="./../pdf_sst/<?php echo htmlspecialchars($rowSst['name']); ?>" width="1000" height="500"></iframe>
                        <?php
                        break;

                    case 'xlsx':
                        ?>
                        <img src="./../xlsx_sst/icon_xlsx.png">
                        <a href="./../xlsx_sst/<?php echo htmlspecialchars($rowSst['name']); ?>" download="<?php echo htmlspecialchars($rowSst['titulo']); ?>.xlsx">⚫︎ Descargar</a>
                        <?php
                        break;

                    default:
                        echo '';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
?>
            
            <!-- <div class="row mt-50" id="pactivas"> -->
            <!-- descomentar -->
            <!-- <div class="row mt-50" id="Copasst">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" > <h3 style="background-color: #eef4fd; margin-right: 600px; margin-left: 600px; color: #393939;"> Comité de convivencia COPASST </h3> </div>
              <div class="form-row col-xs-12 col-md-12 col-lg-12">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                  <div class="slider exampleAutoplay" style="z-index: 777">
                    <div>
                      <img src="../../assets/images/sst/copasst1.PNG" alt="Cargando..." width="1000" height="100%">
                    </div>
                    <div>
                      <img src="../../assets/images/sst/copasst2.PNG" alt="Cargando..." width="1000" height="100%">
                    </div>
                    <div>
                      <img src="../../assets/images/sst/comite_paritario.jpg" alt="Cargando..." width="1000" height="100%">
                    </div>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
              </div>
            </div>
            <div class="row mt-50" id="Bemergencia">
              <div class="form-row col-xs-12 col-md-12 col-lg-12">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                  <div class="slider exampleAutoplay" style="z-index: 777">
                    <div>
                      <img src="../../assets/images/sst/brigada_de_emergencias_20211.png" alt="Cargando..." width="1000" height="100%">
                    </div>
                    <div>
                      <img src="../../assets/images/sst/brigada_de_emergencias_20212.png" alt="Cargando..." width="1000" height="100%">
                    </div>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
              </div>
            </div> -->

            <!-- descomentar -->
            <div class="row mt-50" style="padding-right: 10%; padding-left: 10%" id="Tversion">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1> Riesgos en mi trabajo </h1> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p>Los riesgos laborales son las posibilidades de que un trabajador sufra una enfermedad o un accidente vinculado a su trabajo. Así, entre los riesgos laborales están las enfermedades profesionales y los accidentes laborales.
                </p><br><button class="btn btn-primary btn-outline tips" type="button" data-toggle="modal" data-target="#modalTics">TIPS</button>
              </div>
              <br>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1> Reglamento de Higiene y Seguridad Industrial </h1> </div>
              <div class="col-xs-12 col-md-12 col-lg-12" >

              <iframe src='./../pdf_sst/Reglamento_de_Higiene_y_Seguridad_Industrial_.pdf' width="1000" height="500"></iframe>

              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1> Plan para la Prevención, Preparación y Respuesta ante Emergencias</h1> </div>
              <div class="col-xs-12 col-md-12 col-lg-12" >

              <iframe src='./../pdf_sst/Plan para la Prevención Preparación y Respuesta ante Emergencias - V7 9-12-2024 1.pdf' width="1000" height="500"></iframe>

              </div>
            <div class="row mt-50" style="padding-left: 10%; padding-right: 10%;" id="Natural">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1> Por causas naturales </h1> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left"> <h3> En caso de sismo: </h3> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul style="list-style: none; text-align: justify;">
                  <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Mantenga la calma.</li>
                  <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Siga las instrucciones de la brigada de emergencia.</li>
                  <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Evite desplazamientos innecesarios durante el movimiento telúrico, procure ubicarse específica y únicamente en un lugar seguro donde debe.</li>
                  <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Mantenerse hasta que pase el movimiento y usted esté completamente seguro que puede salir sin riesgo.</li>
                  <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Debe refugiarse, agachado y cubierto, protegiéndose de posibles elementos que puedan caer y producirle alguna lesión.</li>
                  <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Se debe estar pendiente de posibles replicas antes de empezar un desplazamiento.</li>
                  <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> En caso de quedar atrapado, trate de dejar una señal que alerte a las personas que pasan o al equipo de búsqueda y rescate.</li>
                  <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> En caso de encontrarse en un espacio abierto, busque refugio e inicie el desplazamiento al punto de encuentro de acuerdo con las indicaciones anteriores, evitando estar o realizar desplazamiento cerca de fuentes de energía, transformadores, arboles frágiles, etc.</li>
                  <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Mantenga en lo posible, en permanente comunicación con los brigadistas, trabajadores y/o con Seguridad y Salud en el Trabajo.</li>
                  <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Una vez la brigada, de la orden de evacuación, proceda a evacuar de forma ordenada.</li>
                </ul>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left"> <h3> En caso de inundación: </h3> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul style="list-style: none; text-align: justify;">
                  <li>
                    <a style="text-decoration: none; color: #76838F"> Por favor incluir el siguiente texto en la sección que se especifica en el asunto: </a>
                    <br><br>
                    <ul style="list-style: none; text-align: justify;">
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i> Identificar la emergencia,  la fuente generadora y la ruta de evacuación.</li>
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Siga las instrucciones de la brigada de emergencia durante toda la emergencia.</li>
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Realizar notificación interna de la situación al COE y área ambiental.</li>
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Suspender las actividades si la inundación es muy grande.</li>
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Si es posible, suspender el suministro de agua en el punto de la emergencia, en caso de ser por rompimiento de tubería.</li>
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Restringir el acceso por áreas aledañas al punto de la inundación.</li>
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Informar a las áreas vecinas sobre la ocurrencia de la emergencia.</li>
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> En caso de presentarse algún herido a causa de la emergencia active la brigada de primeros auxilios.</li>
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Identificar la emergencia y la fuente generadora y de ser necesario la ruta interna.</li>
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Como último recurso use tapones para sellar los desagües que se estén rebosando o que estén regresando agua.</li>
                      <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. </i> Ubique los elementos tóxicos, reactivos en gabinetes cerrados y fuera del alcance del agua.</li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row mt-50" id="Tecnologia">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1> En caso de incendio </h1> </div>
              <div class="form-row col-xs-12 col-md-12 col-lg-12 mt-30">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                  <div class="slider exampleAutoplay" style="z-index: 777">
                    <div>
                      <img src="../../assets/images/sst/sst_tec-1.jpg" alt="Cargando..." width="80%" height="80%">
                    </div>
                    <div>
                      <img src="../../assets/images/sst/sst_tec-2.jpg" alt="Cargando..." width="80%" height="80%">
                    </div>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
              </div>
            </div>
            <div class="row mt-50" style="padding-left: 10%; padding-right: 10%;" id="Social">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1> Por causas sociales </h1> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left"> <h3> En caso de amenaza: </h3> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul style="list-style: none; text-align: justify;">
                  <li><i class="fas fa-exclamation-circle">. </i> Frente a la materialización de la amenaza, recuerde que su integridad física se encuentra en peligro y que hay expertos que pueden controlar la situación.</li>
                  <li><i class="fas fa-exclamation-circle">. </i> Siga las indicaciones que sean asignadas por los expertos (autoridad competente). Evacue las instalaciones y dirija al personal al punto de encuentro.</li>
                  <li><i class="fas fa-exclamation-circle">. </i> En caso de explosión, procure protegerse en lugares seguros, alejado de ventanas y puertas de vidrio.</li>
                  <li><i class="fas fa-exclamation-circle">. </i> En caso de que se presente un herido, active la brigada de primeros auxilios.</li>
                  <li><i class="fas fa-exclamation-circle">. </i> Frente a una situación de protesta, recuerde que siempre está en peligro su integridad física.</li>
                  <li><i class="fas fa-exclamation-circle">. </i> Trate de protegerse siempre en un lugar seguro alejado de ventanas y puertas de vidrio, ya que pueden ser rotas y los vidrios proyectados causar lesiones.</li>
                  <li><i class="fas fa-exclamation-circle">. </i> Se deben cerrar las instalaciones de la empresa, en lo posible bloquear acceso como ventanas y puertas alternas evitando que los manifestantes ingresen y generen daños materiales.</li>
                  <li><i class="fas fa-exclamation-circle">. </i> En lo posible y si la situación lo permite, los colaboradores deberán retirarse de la edificación, protegiendo su integridad todo el tiempo.</li>
                  <li><i class="fas fa-exclamation-circle">. </i> En caso de incendio, remítase al procedimiento de actuación frente a la situación, mantenga cerca extintores y úselos según la necesidad del evento.</li>
                  <li><i class="fas fa-exclamation-circle">. </i> En caso de presentarse lesionados en el lugar, active la de primeros auxilios.</li>
                </ul>
              </div>
              <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left"> <h3> En caso de sismo: </h3> </div> -->
              <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul style="list-style: none; text-align: justify;">
                </ul>
              </div> -->
            </div>
            <div class="row mt-50" style="padding-left: 10%; padding-right: 10%;" id="Trabajo">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1> Por accidente de trabajo </h1> </div>
              <div class="form-row col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-30">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <ul style="list-style: none; text-align: justify;">
                    <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. “Caídas a distinto nivel, Sobre esfuerzos”.</li>
                    <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. Identificar las causas y el tipo de accidente ocurrido.</li>
                    <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. Asegurar el área de ocurrencia del accidente, restringiendo los accesos y alteraciones de la escena.</li>
                    <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. En caso de presentarse algún herido a causa del accidente active la brigada de primeros auxilios</li>
                    <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. Realizar el control de la fuente generadora del accidente.</li>
                    <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. Si se trata de una situación de que puede generar consecuencias colectivas, alertar a las áreas vecinas y activar el procedimiento operativo normalizado que se requiera.</li>
                    <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. Suspender actividades de trabajo, si es necesario.</li>
                    <li><i class="fas fa-plus-square btn btn-round btn-danger btn-xs"> </i>. Informar al personal de Seguridad y Salud en el Trabajo de la empresa para realizar el reporte del accidente.</li>
                  </ul>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                  <img src="../../assets/images/sst/accidentelaboral.jpg" style="max-height: 80%; max-width: 80%;" alt="Cargando..." data-toggle="modal" data-target="#modalAccidentelaboral">
                </div>
              </div>
            </div>
            <div class="row mt-50" id="Sevacuacion">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1> Simulacro de evacuación </h1> </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <img src="../../assets/images/sst/Sevacuacion.jpg" alt="Cargando...">
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
            </div>
            <div class="row mt-50" style="padding-left: 10%; padding-right: 10%;" id="Pencuentro">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1> Punto de encuentro </h1> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p>Con el fin de realizar el conteo de los colaboradores evacuados y comprobar si todos lograron salir, los ocupantes de las distintas áreas deben reunirse en el punto de encuentro establecido por la Compañía, hasta que su correspondiente brigadista con el apoyo de los supervisores efectúe el conteo y se comunique cualquier otra decisión. <br> <br> Conozca el punto de encuentro:  <br><br> <button class="btn btn-primary btn-outline" data-toggle="modal" data-target="#modalPoint"><i class="fas fa-map-marked-alt"></i></button></p>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <div class="site-action" id="scroll-up" title="Ve al inicio">
              <button class="btn btn-primary btn-floating">
                <i class="fas fa-angle-double-up"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--VER REGISTROS SST-->
    <div class="modal fade" id="verregistros" tabindex="-1" role="dialog" aria-labelledby="verregistrosTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="verregistrosTitle">PUBLICACIONES</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="ver_registros"></div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#verregistros').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var verregis = button.data('ver_registros')
        $(".verregis").val(verregis); +
        $.post("./../edicion_sst/Ver_registros.php", { verregis: verregis }, 
        function(data) {
          $(".ver_registros").html(data);
        })
      })
    </script>
    <!--ELIMINAR SECCION SST-->
    <div class="modal fade" id="eliminarSeccionSst" tabindex="-1" role="dialog" aria-labelledby="eliminarSeccionSstTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="eliminarSeccionSstTitle">ELIMINAR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="verEliminar"></div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#eliminarSeccionSst').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_seccionEliminar = button.data('ideliminarseccion')
        $(".id_seccion_eliminar").val(id_seccionEliminar); +
        $.post("./../edicion_sst/Eliminar_seccion.php", {
          id_seccionEliminar: id_seccionEliminar
        }, function(data) {
          $(".verEliminar").html(data);
        })
      })
    </script>
    <!--EDITAR SECCION SST-->
    <div class="modal fade" id="editarSeccionSst" tabindex="-1" role="dialog" aria-labelledby="editarSeccionSstTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editarSeccionSstTitle">EDITAR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="ver"></div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#editarSeccionSst').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_seccion = button.data('id_seccion')
        $(".id_seccion_campo").val(id_seccion); +
        $.post("./../edicion_sst/Editar_seccion.php", {
          id_seccion: id_seccion
        }, function(data) {
          $(".ver").html(data);
        })
      })
    </script>
    <!--CREAR PUBLICACIÓN SST-->
    <div class="modal fade" id="CrearPublicacionSst" tabindex="-1" role="dialog" aria-labelledby="CrearPublicacionSstTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="CrearPublicacionSstTitle">CREAR PUBLICACIÓN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="crear_publicacion">
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#CrearPublicacionSst').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var usuario_crea = button.data('usuario_intra')
        var publicacion = button.data('publicacion')
        $(".publicacion_campo").val(publicacion); +
        $.post("./../edicion_sst/Crear_publicacion.php", {publicacion: publicacion, usuario_crea: usuario_crea}, 
        function(data) {
          $(".crear_publicacion").html(data);
        })
      })
    </script>
    <!--CREAR SECCION SST-->
    <div class="modal fade" id="crearSeccionSst" tabindex="-1" role="dialog" aria-labelledby="crearSeccionSstTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="crearSeccionSstTitle">CREAR SECCIÓN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="crear"></div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#crearSeccionSst').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var seccion = button.data('crear_seccion')
        $(".seccion_campo").val(seccion); +
        $.post("./../edicion_sst/Crear_seccion.php", {seccion: seccion}, 
        function(data) {
          $(".crear").html(data);
        })
      })
    </script>
    <!-- ELIMINAR SECCION CREADA SST-->
    <div class="modal fade" id="EliminarSeccionSst" tabindex="-1" role="dialog" aria-labelledby="EliminarSeccionSstTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EliminarSeccionSstTitle">ELIMINAR SECCIÓN CREADA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="Eliminarseccion"></div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#EliminarSeccionSst').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_Eliminar = button.data('eliminars')
        $(".id_Eliminar").val(id_Eliminar); +
        $.post("./../edicion_sst/Eliminar_seccion_creada.php", {
          id_Eliminar: id_Eliminar
        }, function(data) {
          $(".Eliminarseccion").html(data);
        })
      })
    </script>
    <!--- Ventana Emergente // Modals -->
    <!-- Modal Tips -->
    <div class="modal fade" id="modalTics">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close btn btn-outline-dark btn-lg" data-dismiss="modal">
              <i class="fas fa-times-circle"></i>
            </button>
          </div>
          <div class="modal-body">
            <img src="../../assets/images/sst/tips.jpg" alt="" width="80%" height="80%">
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <!-- Modal Accidente de trabajo -->
    <div class="modal fade modal-fill-in" id="modalAccidentelaboral">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header"></div>
          <div class="modal-body">
            <form>
              <div class="form-row col-xs-12">
                <div class="form-group col-xs-12">
                  <img src="../../assets/images/sst/accidentelaboral.jpg" style="height: 100%;width: 100%;" alt="Cargando...">
                </div>
              </div>
              <div class="form-row-col-xs-12">
                <div class="form-group col-xs-12 text-right">
                  <button data-dismiss="modal" type="button" class="btn btn-dark btn-round"><i class="icon wb-close"></i></button>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <!-- Modal Punto de encuentro -->
    <div class="modal fade" id="modalPoint">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
          </div>
          <div class="modal-body"><img src="../../assets/images/sst/Salida_de_emergencia.png" alt="" width="100%" height="100%"></div>
          <div class="modal-fotter"></div>
        </div>
      </div>
    </div>
    <!-- End Page -->
    <!-- InstanceEndEditable -->
    <!-- Footer -->
   <footer class="site-footer">
      <div class="site-footer-legal">© 2022 <a href="https://bit.ly/2OBdVf4"> Delta A Salud S.A.S BIC</a></div>
      <div class="site-footer-right">
        <!-- Crafted with effort and dedication --> Hecho con esfuerzo y dedicación <i class="red-600 wb wb-wrench"></i> para los trabajadores de <a href="https://bit.ly/2OBdVf4"> Delta A Salud SAS BIC</a>.
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
    <script src="../../global/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="../../global/vendor/slick-carousel/slick.js"></script>
    <script src="../../assets/js/mines-scroll-js.js"></script>
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
    <script src="../../global/js/Plugin/owl-carousel.js"></script>
    <script>
      (function (global, factory) {
        if (typeof define === "function" && define.amd) {
          define('/uikit/carousel', ['jquery', 'Site'], factory);
        } else if (typeof exports !== "undefined") {
          factory(require('jquery'), require('Site'));
        } else {
          var mod = {
            exports: {}
          };
          factory(global.jQuery, global.Site);
          global.uikitCarousel = mod.exports;
        }
      })(this, function (_jquery, _Site) {
        'use strict';
        var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

        (0, _jquery2.default)(document).ready(function ($$$1) {
          (0, _Site.run)();
          // Example Slick Autoplay
          // ----------------------
          $$$1('.exampleAutoplay').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            adaptiveHeight: true,
            responsive: [{
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
              }
            }, {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            }, {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            }],
            autoplaySpeed: 2000
          });
        });
      });
    </script>
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
  <!-- InstanceEnd -->
</html>