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
    <style>
    .gal{
    background-color: white;
    color: black;
    padding: 0.715rem 1.429rem;
    border: 1px solid #0000001c;
    }
    .gal:hover {
      background-color: #05920578;
    }
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
      <!-- <div id="imagen_titulo" style="background-color: red;">
        <div class="grid-block" style="background-image: url(../imagenes_ambiental/gestion_ambiental.png); width: 100%; height: 100vh;"></div>
      </div> -->
      <div class="page-content p-0">
        <div class="panel panel-bordered p-0">
          <div class="panel-heading p-0">
            <div id="div_imagen_titulo" style="background-color:red;" >
            <img src="../imagenes_ambiental/gestion_ambiental_titulo.png" alt="Cargando..." style="width: 100%;">
              <!-- <i class="fas fa-dove"></i> <i class="fas" style="font-size: 50px"> Gestión ambiental </i> <i class="fas fa-tint mr-50 pr-50"></i> -->
            </div>
            <nav class="site-navbar navbar navbar-default navbar-mega bg-green_3 nav-scroll" style="background: linear-gradient(#029214, white 250%); width:100%; ">
              <div id="pestañas" style="width:100%;">
                <ul class="nav navbar-toolbar ml-50">  
                  <li class="nav-item dropdown design-1 ml-50">
                    <a href="#nuestro_compromiso" class="nav-link item-scroll"  title="" aria-expanded="false" data-animation="scale-up" role="button">Nuestro compromiso</a>
                  </li>
                  <li class="nav-item dropdown design-1">
                    <a href="#Aamb" class="nav-link" data-toggle="dropdown" title="" aria-expanded="false" data-animation="scale-up" role="button">Huella de carbono ⇩</a>
                    <ul class="dropdown-menu">
                      <li class="list-group">
                        <a href="#Hcarbono" class="list-group-item item-scroll"><i class="fas fa-tree"></i>¿Qué es la Huella de carbono?</a>
                        <a href="#carbono_neutral" class="list-group-item item-scroll"><i class="fas fa-hiking"></i>Carbono neutral</a>
                      </li>
                    </ul>
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
                    <a href="#consumo_sostenible" class="nav-link item-scroll" title="" aria-expanded="false" data-animation="scale-up" role="button">Aplicativo Consumo Sostenible</a>
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
                            <!-- <a href="#Pambientales" class="list-group-item iitem-scroll" role="menuitem">
                              <div class="media">
                                <div class="media-left padding-right-10">
                                  <i class="icon wb-bookmark"></i>
                                </div>
                                <div class="media-body">
                                  <h6 class="media-heading">Proyectos ambientales</h6>
                                </div>
                              </div>
                            </a> -->
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
                  <li class="nav-item dropdown design-1">
                    <a href="#fechas_especiales" class="nav-link item-scroll" title="" aria-expanded="false" data-animation="scale-up" role="button">Fechas especiales</a>
                  </li>
                  <li class="nav-item dropdown design-1">
                    <a href="#incentivos_ambientales" class="nav-link item-scroll" title="" aria-expanded="false" data-animation="scale-up" role="button">Programa incentivos ambientales</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
            <!-- semana ambiental 

           

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
          <h1 class="txt-green_1"> Gran Siembra Delta A Salud </h1> 
            <img src="../../assets/images/ambiental/siembra_2022.png" alt="Cargando..." >
              </div>
         siembra -->


<!--         <div class="row mt-100" id="Downpress" style="padding: 2rem;">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> III Semana Ambiental </h1> 

            <div class="row mt-20 ">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <video src='../videos_ambiental/Apertura III Semana Ambiental.mp4' style='width: 100%;' poster="../videos_ambiental/poster_semana.PNG" controls></video>
              </div>
            </div>
          </div>
        </div> -->


        <!--cierra  -->
            <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="padding-top: 1rem;"> -->
              <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1">"Gran Reciclatón DELTA A SALUD"</h1> </div> -->
              <!-- <img src="../../assets/images/ambiental/Muy pronto.png" alt="Cargando..." style="height: 50%;width: 50%;">
            </div> -->
        
            <div class="row mt-20" id="nuestro_compromiso" style="width: 100%;">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Nuestro compromiso </h1> </div>
              <div class="form-row col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">
                    
                  <div class="col-xs-12 col-sm-12" style="display:flex;">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                      <img src="../../assets/images/ambiental/portaada de programas .png" alt="Cargando..." style="height: 500px; width:100%;">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                    <p class="pl-50 pr-20" style="color: black; font-size: large;"> <br><br><br> En Delta A Salud estamos comprometidos con la protección del medio ambiente, reconociendo la importancia de desarrollar estrategias de gestión ambiental para mitigar el impacto negativo generado por la Empresa. <br><br><br></p>
                    <p class="pl-50 pr-20" style="color: black; font-size: large;">En Delta A Salud SAS BIC, hemos desarrollado los siguientes programas, con el fin de reducir los impactos ambientales generados por nuestra operación:
                    Implementamos el aprovechamiento de los residuos orgánicos para la elaboración de compostaje, usando el 100% de los residuos de alimentos que se generan en la Empresa.</p>
                    </div>
                  </div>
              </div>
              <div class="form-row col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">         
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                  <p class="pl-50 pr-20" style="color: black; font-size: large;">Tras nuestra participación en el PREAD Élite en el año 2023 la Secretaria Distrital del Medio Ambiente nos otorgó el siguiente reconocimiento:</p>
                  <img src="../../assets/images/ambiental/CintaElite (1).png" alt="Cargando..." style="height: 500px;">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div><iframe src="./../pdf_ambiental/DIPLOMA ELITE 2023.pdf" width="100%" height="500"></iframe></div>
                  <br>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div style="margin-left:2rem;">
                  </div>
                </div>
              </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  text-center"> <h3 class="txt-green_1 pl-25">Programa de Excelencia Ambiental Distrital- PREAD </h3> </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-40 pl-40 pr-40"> 
                    <p class="pl-50 pr-20" style="color: black; font-size: large;">"El Programa de Excelencia Ambiental Distrital (PREAD) es el mecanismo de reconocimiento público anual que la Secretaría Distrital de Ambiente otorga a las empresas ubicadas dentro del perímetro urbano del Distrito Capital que se destaquen por su desempeño ambiental y responsabilidad social empresarial con enfoque ambiental en el desarrollo de sus actividades, incentivando el mejoramiento de la calidad ambiental del Distrito y de la calidad de vida de sus habitantes."</p>
                  </div>
                </div>
              <div class="form-row col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">         
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                  <p class="pl-50 pr-20" style="color: black; font-size: large;">Tras nuestra participación en el PREAD Élite en el año 2023 la Secretaria Distrital del Medio Ambiente nos otorgó el siguiente reconocimiento:</p>
                  <img src="../../assets/images/ambiental/CintaElite (1).png" alt="Cargando..." style="height: 500px;">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div><iframe src="./../pdf_ambiental/DIPLOMA ELITE 2023.pdf" width="100%" height="500"></iframe></div>
                  <br>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                <div style="margin-left:2rem;">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-20" id="Hcarbono" style="width: 100%;">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Gestión y medición de la Huella de Carbono </h1> </div>
              <div class="form-row col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">         
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> <h3 class="txt-green_1 pl-25"> ¿Qué es la Huella de carbono? </h3> </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-40 pl-40 pr-40"> 
                    <p class="pl-50 pr-20" style="color: black; font-size: large;"> Según la Corporación Ambiental Empresarial (CAEM) la huella de carbono es un indicador que permite cuantificar la cantidad de Gases Efecto Invernadero generados por una organización, persona o producto según su consumo, alimentación, hábitos y forma de movilización. </p>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> <h3 class="txt-green_1 pl-25"> ¿Cómo medimos la huella de carbono en Delta A Salud SAS BIC? </h3> </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-40 pl-40 pr-40"> 
                    <p class="pl-50 pr-20" style="color: black; font-size: large;">Hacemos el seguimiento y la cuantificación de nuestro consumo de energía y papel, también tenemos en cuenta la recarga de los extintores y los viajes aéreos de los trabajadores de la Empresa. </p>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> <h3 class="txt-green_1 pl-25"> ¿Qué se hace con los resultados obtenidos de la medición de la Huella de Carbono? </h3> </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-40 pl-40 pr-40"> 
                    <p class="pl-50 pr-20" style="color: black; font-size: large;"> Implementamos actividades encaminadas a la reducción y compensación de gran parte de las emisiones de Gases Efecto Invernadero que genera nuestra Empresa, por medio de las siembras empresariales y nuestro programa ¡-papel, + árboles!. </p>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> <h3 class="txt-green_1 pl-25"> ¿Cómo los trabajadores pueden contribuir? </h3> </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-40 pl-40 pr-40"> 
                    <p class="pl-50 pr-20" style="color: black; font-size: large;"> Como trabajadores de Delta A Salud SAS BIC, tenemos la responsabilidad de participar en las actividades lideradas por el proceso de Gestión Ambiental y apropiar las practicas de: </p>
                    <ul style="color: black;font-size: large;">
                      <li><i class="fab fa-pagelines">.</i>Ahorro y uso eficiente del agua y la energía</li>
                      <li><i class="fab fa-pagelines">.</i>Separación adecuada de los residuos</li>
                      <li><i class="fab fa-pagelines">.</i>Consumo responsable y consciente de los insumos y materiales, tanto en casa como en el trabajo</li>
                    </ul>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div>
                    <img src="../../assets/images/ambiental/Huella de carbono.png" style="width: 100%; padding-top: 6rem;">
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-20" id="carbono_neutral" style="width: 100%;">
              <div class="form-row col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">         
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> <h3 class="txt-green_1 pl-25">Carbono neutral</h3> </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-40 pl-40 pr-40"> 
                    <p class="pl-50 pr-20" style="color: black; font-size: large;">Como parte de nuestro compromiso con el ambiente y la mejora continua de nuestro Sistema de Gestión Ambiental, estamos vinculados a la Estrategia Colombia Carbono Neutral, en el marco del Programa Nacional de Carbono Neutralidad, una iniciativa voluntaria del Ministerio de Ambiente y Desarrollo Sostenible, liderada por la Dirección de Cambio Climático y Gestión del Riesgo, que busca dinamizar y fortalecer la gestión de las emisiones de GEI en las organizaciones públicas y privadas, además de resaltar sus acciones, con el propósito de aunar esfuerzos en la construcción de un crecimiento sostenible y bajo en carbono, contribuyendo de esta manera a la consecución de las metas establecidas en la Contribución Determinada a Nivel Nacional y la planificación de pilares para alcanzar el objetivo de carbono neutralidad a 2050. </p>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div><img src="../../assets/images/ambiental/Logo Carbono neutralidad intranet6.png" alt="Cargando..." style="width: 100%; padding-top: 9rem;"></div>
                  <br>
                </div>
              </div>
            </div>
            
            <div class="row mt-40 img-amb-3" id="Sarboles" style="width: 100%;">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="pt-40 pb-20 text-white"> Siembras empresariales </h1>
              <p class="pl-50 pr-20 txt-white">Como parte de las actividades de nuestro Plan de Trabajo de Gestión Ambiental y con el fin de ratificar nuestro compromiso con la preservación y cuidado del ambiente, participamos en las siguientes siembras empresariales:</p></div>
            </div>
            <!-- galeria siembra -->
            <div class="row" style="margin-left: 3%;margin-right: 3%;" id="Galeria_siembra" style="width: 100%;">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Galería </h1> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <div class="btn-group">
                  <ul class="nav nav-tabs nav-tabs-line" role="tablist" id="galleryAmbiental">
                    <li class="nav-item" role="presentation">
                      <button class="gal"  aria-expanded="false" name="siembra" role="tab" data-filter="siembra_2023"> Noviembre de 2023 </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="gal"  aria-expanded="false" name="siembra" role="tab" data-filter="siembra_2015"> Septiembre de 2015 </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="gal"  aria-expanded="false" name="siembra" role="tab" data-filter="siembra_2017"> Noviembre de 2017 </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="gal"  aria-expanded="false" name="siembra" role="tab" data-filter="siembra_2018"> Mayo de 2018 </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="gal"  aria-expanded="false" name="siembra" role="tab" data-filter="siembra_2019"> Mayo de 2019 </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="gal"  aria-expanded="false" name="siembra" role="tab" data-filter="siembra_2021"> Abril de 2021 </button>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">
                <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" id="mostrar_siembra" data-filters="#galleryAmbiental">
                </ul>
              </div>
            </div>
            <div class="row mt-40 img-amb-7" id="Ceco" style="width: 100%;">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="pt-40 pb-20 text-white"> Caminatas ecológicas </h1>
              <p class="pl-50 pr-20 txt-white">Con el fin de transmitir a los colaboradores de Delta A Salud el respeto por las diferentes formas de vida ambiental y la importancia de las mismas dentro de los diversos ecosistemas, se realizó una caminata ecológica en el Humedal de Córdoba el día 10 de junio de 2018.</p></div>
            </div>
            <!-- galeria caminatas -->
            <div class="row" style="margin-left: 3%;margin-right: 3%;" id="Galeria" style="width: 100%;">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Galería </h1> </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <div class="btn-group">
                  <ul class="nav nav-tabs nav-tabs-line" role="tablist" id="galleryCaminata">
                    <li class="nav-item" role="presentation">
                      <button class="gal" aria-expanded="false" name='caminata' role="tab" data-filter="caminatas"> Caminatas ecológicas </button>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">
                <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" id="mostrar_caminata" data-filters="#galleryCaminata">
                </ul>
              </div>
            </div>
            <div class="row mt-50" id="Downpress" style="padding: 2rem;">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Capacitaciones </h1> 
                <p class="pl-50 pr-20" style="color: black; text-align: justify; font-size: large;">Desde el proceso de Gestión Ambiental, hacemos capacitaciones con el fin de concientizar a todos nuestros trabajadores frente al cuidado y la preservación del ambiente, lo anterior, mediante la ejecución de capacitaciones en la plataforma Moodle, campañas, charlas informativas, envió de “Aprendamos”, conmemoración de fechas especiales ambientales y el desarrollo de la Semana Ambiental. </p>
                <div class="row mt-20 ">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <video src='../videos_ambiental/Cambios en sede.mp4' style='width: 100%;' poster="../videos_ambiental/Campaña.png" controls></video>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left" style="padding: 1rem;">
                    <video src='../videos_ambiental/Campaña Energía SOS-tenible(1).mp4' style='width: 100%;' controls></video>
                    <video src='../videos_ambiental/Campaña - Basura.mp4' style='width: 100%;' controls></video>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left" style="padding: 1rem;">
                      <img src="../imagenes_ambiental/al ducharnos durante 10 minutos gastamos 200 litros de agua.png" alt="Cargando..." style="width: 100%;">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <img src="../../assets/images/ambiental/campaña -Basura.png" alt="Cargando..." style="height: 500px;">
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-50" id="consumo_sostenible" style="padding: 2rem;">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Consumo sostenible </h1> 
              <p class="pl-50 pr-20" style="color: black; text-align: justify; font-size: large;">Hemos diseño el aplicativo “Consumo Sostenible” el cual es una herramienta interactiva en la que los trabajadores reportan los consumos de servicios públicos (agua y energía) demostrando la implementación de buenas prácticas de ahorro y uso eficiente de recursos en sus hogares. </p>
              <div class="row mt-20">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                    <div><video src='../videos_ambiental/lanzamiento_consumo.mp4' style='width: 100%; ' controls poster="../videos_ambiental/poster1.PNG"></video></div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                    <div><video src='../videos_ambiental/Instructivo de inscripción + hogares sostenibles.mp4' style='width: 100%; ' controls poster="../videos_ambiental/poster2.PNG"></video></div>
                    <br>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-50 ml-30 mr-30" id="Cresiduos">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h1 class="txt-green_1 mt-50">Sep<i class="fas fa-recycle" style="font-size: 70%"></i>ración de los residuos</h1>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <p style="margin-top: 10px; margin-left:40px; font-size: large; color:black;">Con el fin de hacer la adecuada separación de los residuos que se generan en la Empresa y dar cumplimiento  al código de colores establecido en la Resolución 2184 de 2019, en Delta A Salud SAS BIC implantamos el uso de los siguientes contenedores: </p>
                <img src="../../assets/images/ambiental/ProgramasAmbientales_2.png" alt="Cargando..." style="height: 500px;">
              </div>
            </div>
            <div class="row mt-50 ml-30 mr-30" id="Crazonable">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h1 class="txt-green_1 mt-50">Consumo responsable</h1>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <p style="margin-top: 10px; margin-left:40px; font-size: large; color:black;">Nuestro compromiso como trabajadores es tomar conciencia y ser responsables frente a nuestras prácticas de consumo, por lo anterior, debemos: </p>
                <img src="../../assets/images/ambiental/Consumo responsable-intranet.png" alt="Cargando..." style="height: 500px;">
              </div>
            </div>
            <div class="row mt-40 img-amb-9" id="Aprendamos" style="width: 100%;">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 style="color: #054e0f;"> Aprendamos </h1>
                <div class="row mt-50 ml-30 mr-30">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1">  </h1> 
                    <div class="row" style="margin-left: 3%;margin-right: 3%;" id="Galeria">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">
                        <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" data-plugin="filterable" data-filters="#galleryAmbiental3">
                          
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/!-papel, + arboles¡ tips de ahorro.jpg" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/!-papel, + arboles¡ tips de ahorro.jpg"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">¡-papel, +arboles! tips de ahorro</h4>
                              </div>
                            </div>
                          </li>
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/Ahorro de energía en casa y en el trabajo.png" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/Ahorro de energía en casa y en el trabajo.png"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">Ahorro de energía en casa y en el trabajo</h4>
                              </div>
                            </div>
                          </li>
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/_buenas prácticas de uso de papel higiénico y las toallas de manos.jpg" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/_buenas prácticas de uso de papel higiénico y las toallas de manos.jpg"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">Buenas prácticas de uso de papel higiénico y las toallas de manos</h4>
                              </div>
                            </div>
                          </li>
                          <li data-type="aprendamos_list">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Aprendamos/Separación de residuos en casa y en el trabajo (1).png" alt="...">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="icon wb-search" href="../../assets/images/ambiental/Aprendamos/Separación de residuos en casa y en el trabajo (1).png"></a>
                                </figcaption>
                              </figure>
                              <div class="card-block">
                                <h4 class="card-title">Separación de residuos en casa y en el trabajo</h4>
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
            <div class="row mt-50" id="fechas_especiales">
            <div class="form-row col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">         
              <div class="row mt-20" style="width: 100%;">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Día Mundial del Medio Ambiente </h1> </div>
                  <div>
                    <video src='../videos_ambiental/Dia mundial del medio ambiente 2.mp4' style='width: 100%;' poster="../videos_ambiental/almedio.png" controls></video>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Día Mundial del Agua </h1> </div>
                  <div>
                    <img src="../../assets/images/ambiental/dia_agua_2023.png" alt="Cargando..." style="width: 100%; padding: 3rem; ">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div  id="incentivos_ambientales">
              <div class="row mt-50 ml-30 mr-30">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                  <h1 class="txt-green_1 mt-50">Catálogo de Eco-premios</h1>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                  <div><iframe src="./../pdf_ambiental/Catálogo Versión 02.pdf" width="100%" height="500"></iframe></div>
                </div>
              </div>
              <div class="form-row col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-25">         
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> Programa de incentivos ambientales </h1> </div>
                  <div><iframe src="./../pdf_ambiental/8.4.10 ProgramaIncentivosAmbientalesV1.pdf" width="100%" height="500"></iframe></div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <h1 class="txt-green_1"> ¿Cómo acumular Puntos verdes? </h1> </div>
                  <div><iframe src="./../pdf_ambiental/Cómo acumular Puntos Verdes 2023.pdf" width="100%" height="500"></iframe></div>
                  <br>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                <div style="margin-left:2rem;">
                    
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
    <!-- InstanceEndEditable -->
	  <script src="../../controller/notifications/notify.js"></script>
    <!-- <script type="text/javascript">
      function zoom(){
        setTimeout(function (){
          document.body.style.zoom = "101%" 
        }, 3000);

      }
    </script> -->
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
<script>
$("[name='siembra']").click(function(){
  var boton = $(this);
    var accion = boton.attr('data-filter')
    $.ajax({
        url:'ajax/'+accion+'.php',
        success:function(data){
            $("#mostrar_siembra").html(data).fadeIn('slow');
        }
    })
});
</script>
<script>
$("[name='caminata']").click(function(){
  var boton = $(this);
    var accion = boton.attr('data-filter')
    $.ajax({
        url:'ajax/'+accion+'.php',
        success:function(data){
            $("#mostrar_caminata").html(data).fadeIn('slow');
        }
    })
});
</script>