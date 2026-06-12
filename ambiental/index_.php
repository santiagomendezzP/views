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
    <link rel="stylesheet" href="./ambiental_css.css">
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
    <link rel="stylesheet" href="../../global/vendor/magnific-popup/magnific-popup.css">
    
    <!-- Plugins Js -->
    <script rel="stylesheet" href="../../global/fonts/font-awesome/js/all.min.js"></script>
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
  <body class="animsition" onload="zoom()">
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
    <script>
      $("#site_site_modulos").addClass("active open");
      $("#site_medio_ambiente").addClass("active");
    </script>
    <link rel="stylesheet" href="../../assets/css/ambiental-css.css">
    <div class="page">
      <div class="page-content p-0">
        <div class="panel panel-bordered p-0">
          <div class="panel-heading p-0">
            <nav class="site-navbar navbar navbar-default navbar-mega bg-green_3 nav-scroll" style="background: linear-gradient(#029214, white 250%); position: fixed; z-index: 999; width: 100%">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 views-icon-tag"><i class="fas fa-dove"></i> <i class="fas" style="font-size: 50px"> Gestión ambiental </i> <i class="fas fa-tint mr-50 pr-50"></i></div>
              <ul class="nav navbar-toolbar ml-50">
                <li class="nav-item dropdown design-1 ml-50">
                  <a class="nav-link scroll-up" href="javascript:void(0)" title="" aria-expanded="false" data-animation="scale-up" role="button">Nuestro compromiso</a>
                </li>
                <li class="nav-item dropdown design-1">
                  <a href="#Hcarbono" class="nav-link item-scroll" title="" aria-expanded="false" data-animation="scale-up" role="button">Huella de carbono</a>
                </li>
                <li class="nav-item dropdown design-1">
                  <a href="#Aamb" class="nav-link" data-toggle="dropdown" title="" aria-expanded="false" data-animation="scale-up" role="button">Actividades ambientales ⇩</a>
                  <ul class="dropdown-menu">
                    <li class="list-group">
                      <a href="#Sarboles" class="list-group-item item-scroll"><i class="fas fa-tree"></i> Siembras empresariales</a>
                      <a href="#Ceco" class="list-group-item item-scroll"><i class="fas fa-hiking"></i> Caminatas ecológicas</a>
                      <a href="#Galeria" class="list-group-item item-scroll"><i class="icon wb-gallery"></i> Galeria</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown design-1">
                  <a href="#Downpress" class="nav-link item-scroll" title="" aria-expanded="false" data-animation="scale-up" role="button">Capacitaciones</a>
                </li>
                <li class="nav-item dropdown design-1">
                  <a class="nav-link" data-toggle="dropdown" data-animation="scale-up" role="button">Actitud ambiental ⇩</a>
                  <ul class="dropdown-menu dropdown-menu-media" role="menu">
                    <li class="list-group" role="presentation">
                      <div class="" data-role="container">
                        <div class="" data-role="content">
                          <a href="#Cresiduos" class="list-group-item item-scroll" role="menuitem">
                            <div class="media">
                              <div class="media-left padding-right-10">
                                <i class="icon wb-bookmark"></i>
                              </div>
                              <div class="media-body">
                                <h6 class="media-heading">Separación de los residuos</h6>
                              </div>
                            </div>
                          </a>
                          <a href="#Crazonable" class="list-group-item iitem-scroll" role="menuitem">
                            <div class="media">
                              <div class="media-left padding-right-10">
                                <i class="icon wb-bookmark"></i>
                              </div>
                              <div class="media-body">
                                <h6 class="media-heading">Consumo responsable</h6>
                              </div>
                            </div>
                          </a>
                          <a href="#Pambientales" class="list-group-item iitem-scroll" role="menuitem">
                            <div class="media">
                              <div class="media-left padding-right-10">
                                <i class="icon wb-bookmark"></i>
                              </div>
                              <div class="media-body">
                                <h6 class="media-heading">Proyectos ambientales</h6>
                              </div>
                            </div>
                          </a>
                          <a href="#Aprendamos" class="list-group-item item-scroll" role="menuitem">
                            <div class="media">
                              <div class="media-left padding-right-10">
                                <i class="icon wb-bookmark"></i>
                              </div>
                              <div class="media-body">
                                <h6 class="media-heading">Aprendamos</h6>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
          <br>
          <div class="panel-body mt-50 pr-0 pl-0 pt-50">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Nuestro compromiso </h1> </div>
            <div class="row mt-20 img-amb-1">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"></div>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p class="text-center txt-white"> <br><br><br><br><br><br> En Delta A Salud estamos comprometidos con la protección del medio ambiente, reconociendo la importancia de desarrollar estrategias de gestión ambiental para mitigar el impacto negativo generado por la Empresa. <br><br><br><br><br><br></p></div>
            </div>
            <p style="margin-top: 10px; margin-left:40px; font-size: 1.1em; color:black;">En Delta A Salud SAS BIC, hemos desarrollado los siguientes programas, con el fin de reducir los impactos ambientales generados por nuestra operación: </p>
            <center>
              <div style="width:1000px;">
                <img src="../../assets/images/ambiental/portaada de programas .png" style="height: 500px;">
              </div>
            </center>
            <center>
              <div style="width:1000px;">
                <p style="font-size: 23px; color:black;">Implementamos el aprovechamiento de los residuos orgánicos para la elaboración de compostaje, usando el 100% de los residuos de alimentos que se generan en la Empresa.</p>
              </div>
            </center>
          </div>
            <div class="row mt-20" id="Hcarbono">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Gestión y medición de la Huella de Carbono </h1> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> <h3 class="txt-green_1 pl-25"> ¿Qué es la Huella de carbono? </h3> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-40 pl-40 pr-40"> 
                <p class="pl-50 pr-20" style="color: black;"> Según la Corporación Ambiental Empresarial (CAEM) la huella de carbono es un indicador que permite cuantificar la cantidad de Gases Efecto Invernadero generados por una organización, persona o producto según su consumo, alimentación, hábitos y forma de movilización. </p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> <h3 class="txt-green_1 pl-25"> ¿Cómo medimos la huella de carbono en Delta A Salud SAS BIC? </h3> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-40 pl-40 pr-40"> 
                <p class="pl-50 pr-20" style="color: black;">Hacemos el seguimiento y la cuantificación de nuestro consumo de energía y papel, también tenemos en cuenta la recarga de los extintores y los viajes aéreos de los trabajadores de la Empresa. </p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> <h3 class="txt-green_1 pl-25"> ¿Qué se hace con los resultados obtenidos de la medición de la Huella de Carbono? </h3> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-40 pl-40 pr-40"> 
                <p class="pl-50 pr-20" style="color: black;"> Implementamos actividades encaminadas a la reducción y compensación de gran parte de las emisiones de Gases Efecto Invernadero que genera nuestra Empresa, por medio de las siembras empresariales y nuestro programa ¡-menos papel, + árboles!. </p>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> <h3 class="txt-green_1 pl-25"> ¿Cómo los trabajadores pueden contribuir? </h3> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-40 pl-40 pr-40"> 
                <p class="pl-50 pr-20" style="color: black;"> Como trabajadores de Delta A Salud SAS BIC, tenemos la responsabilidad de participar en las actividades lideradas por el proceso de Gestión Ambiental y apropiar las practicas de: </p>
                <ul style="color: black;">
                  <li><i class="fab fa-pagelines">.</i>Ahorro y uso eficiente del agua y la energía</li>
                  <li><i class="fab fa-pagelines">.</i>Separación adecuada de los residuos</li>
                  <li><i class="fab fa-pagelines">.</i>Consumo responsable y consciente de los insumos y materiales, tanto en casa como en el trabajo</li>
                </ul>
              </div>
            </div>
            <div class="row mt-40 img-amb-3" id="Sarboles">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="pt-40 pb-20 text-white"> Siembras empresariales </h1>
              <p class="pl-50 pr-20 txt-white">Como parte de las actividades de nuestro Plan de Trabajo de Gestión Ambiental y con el fin de ratificar nuestro compromiso con la preservación y cuidado del ambiente, participamos en las siguientes siembras empresariales:</p></div>
            </div>
            <!-- galeria siembra -->
              <div class="row" style="margin-left: 3%;margin-right: 3%;" id="Galeria_siembra">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Galería </h1> </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                  <div class="btn-group">
                    <ul class="nav nav-tabs nav-tabs-line" role="tablist" id="galleryAmbiental">
                      <li class="nav-item" role="presentation">
                        <a class="active nav-link" href="#" aria-controls="exampleList" aria-expanded="true" role="tab" data-filter="*">Todas</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#" aria-expanded="false" role="tab" data-filter="siembra_2015"> Septiembre de 2015 </a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#" aria-expanded="false" role="tab" data-filter="siembra_2017"> Noviembre de 2017 </a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#" aria-expanded="false" role="tab" data-filter="siembra_2018"> Mayo de 2018 </a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#" aria-expanded="false" role="tab" data-filter="siembra_2019"> Mayo de 2019 </a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#" aria-expanded="false" role="tab" data-filter="siembra_2021"> Abril de 2021 </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">
                  <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" data-plugin="filterable" data-filters="#galleryAmbiental">
                    <li data-type="siembra_2015">
                      <p class="pl-50 pr-20" style="color: black;">En compañía de la Fundación Mariposa, el día 6 de septiembre de 2015 se hizo la siembra de 290 árboles en el predio La Granja Ubicado en Útica, Cundinamarca. Durante la jornada tuvimos la participación de nuestros trabajadores y sus familias.</p>
                    </li>
                    <li data-type="siembra_2015">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2015/20150906_130931.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2015/20150906_130931.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2015">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2015/20150906_131009.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2015/20150906_131009.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2015">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2015/20150906_133650.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2015/20150906_133650.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2015">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2015/20150906_134109.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2015/20150906_134109.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2015">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2015/20150906_135856.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2015/20150906_135856.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2015">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2015/20150906_135859.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2015/20150906_135859.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <p class="pl-50 pr-20" style="color: black;">El día 26 de noviembre de 2017 se hizo la siembra de 80 árboles en el Eco Parque Jaime Duque, esta actividad se llevó a cabo en compañía de los trabajadores de Delta A Salud SAS BIC y la Fundación Parque Jaime Duque.</p>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (12).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (12).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (124).jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (124).jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (126).jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (126).jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (13).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (13).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (143).jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (143).jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (22).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (22).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (23).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (23).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (29).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (29).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (32).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (32).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (35).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (35).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (39).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (39).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (40).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (40).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (42).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (42).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (50).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (50).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (52).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (52).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (58).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (58).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (62).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (62).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (65).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (65).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (72).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (72).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (74).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (74).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (81).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (81).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (85).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (85).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (89).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (89).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2017">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2017/26_nov (92).JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2017/26_nov (92).JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <p class="pl-50 pr-20" style="color: black;">En compañía de la Corporación Ambiental Empresarial CAEM, el día 31 de mayo de 2018 se llevo a cabo la siembra de 250 árboles en el Parque Metropolitano Canoas, en este evento tuvimos la participación de los trabajadores de Delta A Salud SAS BIC y sus familias.</p>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG-20190401-WA0017.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG-20190401-WA0017.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_111421.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_111421.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_115459.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_115459.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_115541.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_115541.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_115611.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_115611.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_115714.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_115714.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_120012.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_120012.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_120044.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_120044.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_120615.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_120615.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_121115.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_121115.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_122432.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_122432.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190331_130130.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190331_130130.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2018">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2018/IMG_20190402_051953.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2018/IMG_20190402_051953.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <p class="pl-50 pr-20" style="color: black;">Durante la jornada laboral del 28 de mayo de 2019 nos unimos a la iniciativa “Adopta un Árbol” liderada por el Jardín Botánico de Bogotá, la siembra se hizo en el separador vial ubicado sobre la calle 116.</p>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG-6696.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG-6696.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG_20190528_101056.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG_20190528_101056.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG_20190528_101150.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG_20190528_101150.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG_20190528_102052.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG_20190528_102052.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG_20190528_102327.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG_20190528_102327.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG_6479.JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG_6479.JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG_6535.JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG_6535.JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG_6568.JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG_6568.JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG_6588.JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG_6588.JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG_6645.JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG_6645.JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2019">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2019/IMG_6653.JPG" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2019/IMG_6653.JPG"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2021">
                      <p class="pl-50 pr-20" style="color: black;">El 22 de abril de 2021 participamos en la siembra de 700 frailejones en el Páramo de Sumapaz en colaboración con el batallón de Alta Montaña.</p>
                    </li>
                    <li data-type="siembra_2021">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0000.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0000.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2021">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0001.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0001.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2021">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0014.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0014.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2021">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0015.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0015.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2021">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0016.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0016.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2021">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0017.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0017.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2021">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0018.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0018.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2021">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0019.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0019.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                    <li data-type="siembra_2021">
                      <div class="card card-shadow">
                        <figure class="card-img-top overlay-hover overlay">
                          <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0020.jpg" alt="...">
                          <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2021/IMG-20210422-WA0020.jpg"></a>
                          </figcaption>
                        </figure>
                        <div class="card-block">
                          <h4 class="card-title"></h4>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            
            <!-- fin siembras -->
            <div class="row mt-40 img-amb-7" id="Ceco">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="pt-40 pb-20 text-white"> Caminatas ecológicas </h1>
              <p class="pl-50 pr-20 txt-white">Con el fin de transmitir a los colaboradores de Delta A Salud el respeto por las diferentes formas de vida ambiental y la importancia de las mismas dentro de los diversos ecosistemas, se realizó una caminata ecológica en el Humedal de Córdoba el día 10 de junio de 2018.</p></div>
            </div>
            <div class="row" style="margin-left: 3%;margin-right: 3%;" id="Galeria">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Galería </h1> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <div class="btn-group">
                  <ul class="nav nav-tabs nav-tabs-line" role="tablist" id="galleryAmbiental2">
                    <li class="nav-item" role="presentation">
                      <a class="active nav-link" href="#" aria-controls="exampleList" aria-expanded="true" role="tab" data-filter="*">Todas</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" href="#" aria-expanded="false" role="tab" data-filter="caminata"> Caminatas ecológicas </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">
                <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" data-plugin="filterable" data-filters="#galleryAmbiental2">
                  <li data-type="caminata">
                    <div class="card card-shadow">
                      <figure class="card-img-top overlay-hover overlay">
                        <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/ANEXO_08_cam.JPG" alt="...">
                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                          <a class="icon wb-search" href="../../assets/images/ambiental/ANEXO_08_cam.JPG"></a>
                        </figcaption>
                      </figure>
                      <div class="card-block">
                        <h4 class="card-title"></h4>
                      </div>
                    </div>
                  </li>
                  <li data-type="caminata">
                    <div class="card card-shadow">
                      <figure class="card-img-top overlay-hover overlay">
                        <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/ANEXO_09_cam.JPG" alt="...">
                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                          <a class="icon wb-search" href="../../assets/images/ambiental/ANEXO_09_cam.JPG"></a>
                        </figcaption>
                      </figure>
                      <div class="card-block">
                        <h4 class="card-title"></h4>
                      </div>
                    </div>
                  </li>
                  <li data-type="caminata">
                    <div class="card card-shadow">
                      <figure class="card-img-top overlay-hover overlay">
                        <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/ANEXO_10_cam.JPG" alt="...">
                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                          <a class="icon wb-search" href="../../assets/images/ambiental/ANEXO_10_cam.JPG"></a>
                        </figcaption>
                      </figure>
                      <div class="card-block">
                        <h4 class="card-title"></h4>
                      </div>
                    </div>
                  </li>
                  <li data-type="caminata">
                    <div class="card card-shadow">
                      <figure class="card-img-top overlay-hover overlay">
                        <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/ANEXO_11_cam.JPG" alt="...">
                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                          <a class="icon wb-search" href="../../assets/images/ambiental/ANEXO_11_cam.JPG"></a>
                        </figcaption>
                      </figure>
                      <div class="card-block">
                        <h4 class="card-title"></h4>
                      </div>
                    </div>
                  </li>
                  <li data-type="caminata">
                    <div class="card card-shadow">
                      <figure class="card-img-top overlay-hover overlay">
                        <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/ANEXO_12_cam.JPG" alt="...">
                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                          <a class="icon wb-search" href="../../assets/images/ambiental/ANEXO_12_cam.JPG"></a>
                        </figcaption>
                      </figure>
                      <div class="card-block">
                        <h4 class="card-title"></h4>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <br>
            <div class="row mt-50" id="Downpress">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Capacitaciones </h1> 
                <p class="pl-50 pr-20" style="color: black; text-align: justify;">Desde el proceso de Gestión Ambiental, hacemos capacitaciones con el fin de concientizar a todos nuestros trabajadores frente al cuidado y la preservación del ambiente, lo anterior, mediante la ejecución de capacitaciones en la plataforma Moodle, campañas, charlas informativas, envió de “Aprendamos”, conmemoración de fechas especiales ambientales y el desarrollo de la Semana Ambiental. </p>
              </div>
              <!-- <div class="col-sm-12 text-center">
                <a href="../../DOCUMENTOS/DELTAASALUD/GESTIÓN AMBIENTAL/PresentacionSGA.pptx" target="_blank" class="btn btn-animate btn-animate-vertical btn-primary btn-md">
                  <span><i class="icon wb-download" aria-hidden="true"></i>Descargar Presentación</span>
                </a>
              </div> -->
            </div>
            <div class="row mt-50 ml-30 mr-30" id="Cresiduos">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h1 class="txt-green_1 mt-50">Sep<i class="fas fa-recycle" style="font-size: 70%"></i>ración de los residuos</h1>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: justify;">
                <p style="text-align: justify; color: black;">Con el fin de hacer la adecuada separación de los residuos que se generan en la Empresa y dar cumplimiento al código de colores establecido en la Resolución 2184 de 2019, en Delta A Salud SAS BIC implantamos el uso de los siguientes contenedores: </p>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                  <img src="../../assets/images/ambiental/ProgramasAmbientales_2.png" alt="Cargando..." width="60%" height="50%">
                </div>
              </div>
            </div>
            <div class="row mt-50 ml-30 mr-30" id="Crazonable">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h1 class="txt-green_1 mt-50">Consumo responsable</h1>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: justify;">
                <p style="text-align: justify; color: black;">Nuestro compromiso como trabajadores es tomar conciencia y ser responsables frente a nuestras prácticas de consumo, por lo anterior, debemos: </p>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                  <img src="../../assets/images/ambiental/Tips de Consumo Responsable.png" alt="Cargando...">
                </div>
              </div>
            </div>
            <div class="row mt-40 img-amb-8" id="Pambientales">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="pt-40 pb-20 text-white"> Proyectos ambientales </h1>
              <p class="pl-50 pr-20 txt-white">Como parte de nuestro compromiso con el ambiente y la mejora continua de nuestro Sistema de Gestión Ambiental, desarrollamos proyectos ambientales enfocados en la reducción de la huella de carbono y el consumo responsable: </p></div>
            </div>
            <div class="row mt-50 ml-30 mr-30" id="Ecomovilidad">
              <div class="form-row col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">         
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div style="color:black;"><h2 style="color:rgb(22 66 33)">Cambio de luminarias fluorescentes: </h2>  El proyecto consiste en el cambio de todas las luminarias fluorescentes por luminarias LED, las cuales consumen menos energía y mejoran la iluminación en los puestos de trabajo. </div>
                  <br>
                </div> 
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div style="color:black;"><h2 style="color:rgb(22 66 33)">Eco movilidad:</h2>  El 18 de septiembre de 2019 nos unimos al gran reto por la sostenibilidad, “Llegar al trabajo en Bici”, convocado por la secretaria Distrital de Ambiente en el marco de la Semana ECO empresarial.</div>
                  <br>
                </div>
              </div>
              <div class="form-row col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div style="color:black;"><h2 style="color:rgb(22 66 33)">¡- papel, + árboles!:</h2>Este proyecto fue diseñado con el fin de reducir al máximo el consumo de papel en el desarrollo de las actividades de nuestra Empresa. Adicionalmente, incluir las nuevas tecnologías en nuestros procesos administrativos y de solicitudes de los trabajadores. </div>
                  <br>
                </div>
              </div>
            </div>
            <div class="row mt-40 img-amb-9" id="Aprendamos">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 style="color: #054e0f;"> Aprendamos </h1>
                <div class="row mt-50 ml-30 mr-30">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1">  </h1> 
                    <div class="row" style="margin-left: 3%;margin-right: 3%;" id="Galeria">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">
                        <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" data-plugin="filterable" data-filters="#galleryAmbiental3">
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/Compostaje 1.png" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/Compostaje 1.png"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">Compostaje 1</h4>
                              </div>
                            </div>
                          </li>
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/Compostaje 2.png" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/Compostaje 2.png"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">Compostaje 2</h4>
                              </div>
                            </div>
                          </li>
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/Compromiso con el medio ambiente 2.png" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/Compromiso con el medio ambiente 2.png"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">Compromiso con el medio ambiente 1</h4>
                              </div>
                            </div>
                          </li>
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/Compromiso con el medio ambiente 1.png" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/Compromiso con el medio ambiente 1.png"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">Compromiso con el medio ambiente 2</h4>
                              </div>
                            </div>
                          </li>
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/Manejo de residuos 1.png" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/Manejo de residuos 1.png"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">Manejo de residuos 1</h4>
                              </div>
                            </div>
                          </li>
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/Manejo de residuos 2.png" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/Manejo de residuos 2.png"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">Manejo de residuos 2</h4>
                              </div>
                            </div>
                          </li>
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/Residuos posconsumo.png" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/Residuos posconsumo.png"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">Residuos posconsumo</h4>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <div class="site-action" id="scroll-up" title="Ve al inicio">
              <button class="btn btn-success btn-floating">
                <i class="fas fa-angle-double-up"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
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
    <!-- Gallery -->
    <script src="../../global/vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="../../global/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
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
    <!-- Filter Gallery  -->
	<script src="../../global/js/Plugin/owl-carousel.js"></script>
    <script src="../../global/js/Plugin/filterable.js"></script>
    <!-- InstanceEndEditable -->
	  <script src="../../controller/notifications/notify.js"></script>
    <script type="text/javascript">
      function zoom(){
        setTimeout(function (){

          document.body.style.zoom = "101%" 
        }, 3000);

      }
    </script>
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