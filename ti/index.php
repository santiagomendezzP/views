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
        <a href="javascript:void(0);" class="" style="cursor: auto;"></a>
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
      $("#site_tecnologia").addClass("active");
    </script>
    <div class="page p-0">
      <div class="page-main">
        <div class="page-content pl-0 pt-0 pr-0 pb-0 ml--25">
          <div class="panel panel-bordered">
            <div class="panel-body">
              <!-- Menu-bar-mines -->
              <div class="mines-fixed">
                <header id="header-mines" class="container-mines">
                  <nav id="nav-mines">
                    <a href="../../views/ti/" id="var-mines"></i></a>
                    <ul id="sub-mines">
                      <li id="min-mines">
                        <a href="#inicio" id="a-mines" class="mines-btns-scroll" title="">TICS</a>
                      </li>
                      <li id="min-mines">
                        <a href="#disponibilidad" id="a-mines" class="mines-btns-scroll" title="">Disponibilidad</a>
                      </li>
                      
                      <li id="min-mines">
                        <a href="#servicios" id="a-mines" class="mines-btns-scroll" title="">Servicios</a>
                      </li>
                        <li id="min-mines">
                        <a href="#aplicaciones" id="a-mines" class="mines-btns-scroll" title="">Aplicaciones</a>
                      </li>
                      <li id="min-mines">
                        <a href="#team" id="a-mines" class="mines-btns-scroll" title="">Soporte</a>
                      </li>
                         <li id="min-mines">
                        <a href="#desarrollo" id="a-mines" class="mines-btns-scroll" title="">Desarrollo</a>
                      </li>
                    </ul>
                  </nav>
                </header>
              </div>
              <section class="mines-section a-body-mines mines-content" id="inicio">
                <h1 class="mines-title-left mines-title-lucida titles-white">Gestión de TICS</h1>
                <p class="mines-p-left titles-white p-verdana">Garantizamos la disponibilidad y correcto funcionamiento de todos los elementos que componen la infraestructura tecnológica de Delta A Salud</p>
              </section>   
              <section class="mines-section d-body-mines" id="disponibilidad">
                <h1 class="mines-title-left mines-title-lucida titles-white" style="color:#000";>Alta Disponibilidad</h1>
                <p class="mines-p-left titles-white p-verdana "style="color:#000";>Nuestra infraestructura se encuentra soportada por los principales lideres de la industria y esta diseñada e implementada para garantizar continuidad ininterrumpida ante cualquier falla.</p>           
              </section>
              <section class="mines-section e-body-mines" id="servicios">
                <h1 class="mines-title-left mines-title-lucida titles-white">Arquitectura</h1>
                <p class="mines-p-left titles-white p-verdana">Los principales componentes tecnológicos: </p>
                <p class="mines-p-left titles-white p-verdana">- Servidores , Switchs y Firewalls </p>
                <p class="mines-p-left titles-white p-verdana">- Equipos de computo y Sistemas operativo</p>
                <p class="mines-p-left titles-white p-verdana">- UPS</p>
                <p class="mines-p-left titles-white p-verdana">- Endpoint </p>
                <p class="mines-p-left titles-white p-verdana">- Sistemas de monitoreo y auditoria </p>
              </section>
              <section class="mines-section h-body-mines" id="disponibilidad">
                <h1 class="mines-title-left mines-title-lucida titles-negro" style="color:#005197">Evolucionamos</h1>
                <p class="mines-p-left titles-white p-verdana "style="color:#000;">Creemos en nuestra empresa y por eso nos renovamos tecnológicamente</p>
              </section>
              <section class="mines-section g-body-mines" id="aplicaciones">
                <h1 class="mines-title-left mines-title-lucida titles-negro" style="color:#005197">
                <h1 class="mines-title-left mines-title-lucida titles-negro" style="color:#005197">Soporte aplicaciones</h1>
                <p class="mines-p-left titles-white p-verdana "style="color:#000";>Las aplicaciones son herramientas fundamentales para el desarrollo de las actividades de cada uno de nosotros en la compañía, por eso brindamos soporte operativo, no solo a las aplicaciones propias sino también, a las que son suministradas por el cliente: <br>
                - Sif <br>
                - Sigame <br>
                - Beyond Health <br>
                - Worflow <br>
                - Y TODAS LAS DEMAS <br>
                </p>
              </section>
              <!-- Team -->
              <section id="team" class="pb-5">
                <div class="container">
                  <h5 class="section-title h1">Equipo de tecnología</h5>
                  <div class="row">
                    <!-- Team member -->
                    <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                          <div class="frontside">
                            <div class="card">
                              <div class="card-body text-center">
                                <p><img class=" img-fluid" src="../../assets/images/ti/HURTADOOSCAR.jpg" alt="card image"></p>
                                <p class="card-title">Oscar Hurtado</p>
                                <p class="card-text">Analista de tecnología</p>
                                <p class="card-text">oscar.hurtado@deltasalud.com</p>
                                <p class="card-text">Linea corporativa: 313 463 23 78</p>
                                <p  class="card-text">Extensión telefónica: 1001 </p>
                              </div>
                            </div>
                          </div>
                          <div class="backside">
                            <div class="card">
                              <div class="card-body text-center">
                                <p class="card-title">Oscar Hurtado</p>
                                <p class="card-text">Analista de tecnología</p>
                                <p class="card-text">oscar.hurtado@deltasalud.com</p>
                                <p class="card-text">Linea corporativa: 313 463 23 78</p>
                                <p  class="card-text">Extensión telefónica: 1001 </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                          <div class="frontside">
                            <div class="card">
                              <div class="card-body text-center">
                                <p><img class=" img-fluid" src="../../assets/images/ti/BOTERODAVID.jpg" alt="card image"></p>
                                <p class="card-title">David Botero</p>
                                <p  class="card-text">Director de TICS</p>
                                <p class="card-text">david.botero@deltasalud.com</p>
                                <p  class="card-text">Extensión telefónica: 100 </p>
                              </div>
                            </div>
                          </div>
                          <div class="backside">
                            <div class="card">
                              <div class="card-body text-center">
                                <p class="card-title">David Botero</p>
                                <p  class="card-text">Cordinador de tecnología</p>
                                <p class="card-text">david.botero@deltasalud.com</p>
                                <p  class="card-text">Extensión telefónica: 100 </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                          <div class="frontside">
                            <div class="card">
                              <div class="card-body text-center">
                                <p><img class=" img-fluid" src="../../assets/images/ti/GUZMANDWIN.jpg" alt="card image"></p>
                                <p class="card-title">Jeisson Ruiz</p>
                                <p class="card-text"> Analista I</p>
                                <p class="card-text">jeisson.ruiz@deltaasalud.com</p>
                                <p class="card-text">Linea corporativa: 3102112723 </p>
                                <p  class="card-text">Extensión telefónica: 1001 </p>
                              </div>
                            </div>
                          </div>
                          <div class="backside">
                            <div class="card">
                              <div class="card-body text-center">                 
                                <p class="card-title">Jeisson Ruiz</p>
                                <p class="card-text"> Analista I</p>
                                <p class="card-text">jeisson.ruiz@deltaasalud.com</p>
                                <p class="card-text">Linea corporativa: 3102112723 </p>
                                <p  class="card-text">Extensión telefónica: 1001 </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section>
                <div class="container">
                  <div class="row mbr-justify-content-center">
                    <div class="col-lg-6 mbr-col-md-10">
                      <div class="wrap">
                        <div class="ico-wrap">
                          <span class="mbr-iconfont fas fa-tasks"></span>
                        </div>
                        <div class="text-wrap vcenter">
                          <span>Perseverancia</span>
                          <p>Con gran determinación solucionaremos las necesidades de nuestros usuarios para poder cumplir con son distintas necesidades</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 mbr-col-md-10">
                      <div class="wrap">
                        <div class="ico-wrap">
                          <span class="mbr-iconfont fas fa-user-shield"></span>
                        </div>
                        <div class="text-wrap vcenter">
                          <span>Seguridad</span>
                          <p>Apoyar a nuestro personal en minimizar los impactos de los riesgos a sus datos o a su infraestructura tecnológica, soportados en tecnologías</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 mbr-col-md-10">
                      <div class="wrap">
                        <div class="ico-wrap">
                          <span class="mbr-iconfont fab fa-servicestack"></span>
                        </div>
                        <div class="text-wrap vcenter">
                          <span>Flexibilidad</span>
                          <p>Mediante el servicio continuo del personal de Soporte Técnico podrá contar con las mejores soluciones para superar sus inconvenientes</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 mbr-col-md-10">
                      <div class="wrap">
                        <div class="ico-wrap">
                          <span class="mbr-iconfont fas fa-users-cog"></span>
                        </div>
                        <div class="text-wrap vcenter">
                          <span>Recursos</span>
                          <p>Disponemos de personal especializado en diversas áreas de la informática y la tecnología con amplia experiendia en Soporte Técnico</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <br>
              <section class="mines-section f-body-mines">
                <h1 class="mines-title-left mines-title-verdara titles-white">Brindamos atención a los requerimientos de nuestro cliente interno en las diferentes áreas y proyectos.</h1>
				        <br>
				        <h1 class="mines-title-left mines-title-verdara titles-white">Horario de atención:</h1>
				        <br>
					      <h3 class="mines-title-left mines-title-verdara titles-white">Disponibilidad de atención 7/24, en linéas fijas,  lunes a viernes: 6:30 am a 7:00 pm, fuera de este horario comunicarse a linéas corporativas</h3>
              </section>
              <!-- Desarrollo  -->
              <section id="desarrollo" class="pb-5">
                <div class="container">
                  <link rel="stylesheet" href="../../global/css/ppns.css">
                  <ul class="blocks no-space blocks-100 blocks-xlg-3 blocks-md-2">
                    <li class="widget">
                        <div class="cover overlay overlay-hover">
                          <img src="../../assets/images/innova/GSM.PNG" alt="Cargando"  width="280" height="320" class="cover-image overlay-scale">
                          <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align">
                            <div class="vertical-align-middle">
                              <div class="widget-time">
                                <!--<span>September 12, 2015</span>-->
                              </div>
                                  <h3 class="widget-title margin-bottom-20 ppn-1" style="color: black;" data-toggle="modal" data-target="#modalgcm">G.C.M MIPRES</h3>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="widget">
                        <div class="cover overlay overlay-hover">
                          <img src="../../assets/images/innova/GST.PNG" alt="Cargando" width="280" height="320" class="cover-image overlay-scale">
                          <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align">
                            <div class="vertical-align-middle">
                              <div class="widget-time">
                                <!--<span>September 12, 2015</span>-->
                              </div>
                                  <h3 class="widget-title margin-bottom-20 ppn-1" style="color: black;" data-toggle="modal" data-target="#modalgct">G.C.T TUTELAS</h3>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="widget">
                        <div class="cover overlay overlay-hover">
                          <img src="../../assets/images/innova/CMN.PNG" alt="Cargando" width="280" height="320" class="cover-image overlay-scale">
                          <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align">
                            <div class="vertical-align-middle">
                              <div class="widget-time">
                                <!--<span>September 12, 2015</span>-->
                              </div>  
                                  <h3 class="widget-title margin-bottom-20 ppn-1" style="color: black;" data-toggle="modal" data-target="#modalcmn">GESTOR NOTICIAS C.M</h3>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="widget">
                        <div class="cover overlay overlay-hover">
                          <img src="../../assets/images/innova/inventario.PNG" alt="Cargando" width="280" height="320" class="cover-image overlay-scale">
                          <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align">
                            <div class="vertical-align-middle">
                              <div class="widget-time">
                                <!--<span>September 12, 2015</span>-->
                              </div>  
                                  <h3 class="widget-title margin-bottom-20 ppn-1" style="color: black;"  data-toggle="modal" data-target="#modalinv">INVENTARIO DE ACTIVOS</h3>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="widget">
                        <div class="cover overlay overlay-hover">
                          <img src="../../assets/images/innova/ramazzini.PNG" alt="Cargando" width="280" height="320" class="cover-image overlay-scale">
                          <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align">
                            <div class="vertical-align-middle">
                              <div class="widget-time">
                                <!--<span>September 12, 2015</span>-->
                              </div>  
                                  <h3 class="widget-title margin-bottom-20 ppn-1" style="color: black;" data-toggle="modal" data-target="#modalram">RAMAZZINI</h3>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="widget">
                        <div class="cover overlay overlay-hover">
                          <img src="../../assets/images/innova/oncologia.PNG" alt="Cargando" width="280" height="320" class="cover-image overlay-scale">
                          <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align">
                            <div class="vertical-align-middle">
                              <div class="widget-time">
                                <!--<span>September 12, 2015</span>-->
                              </div>  
                                  <h3 class="widget-title margin-bottom-20 ppn-1" style="color: black;" data-toggle="modal" data-target="#modalonc">RUTA ONCOLÓGICA</h3>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="widget">
                        <div class="cover overlay overlay-hover">
                          <img src="../../assets/images/innova/intranet.PNG" alt="Cargando" width="280" height="320" class="cover-image overlay-scale">
                          <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align">
                            <div class="vertical-align-middle">
                              <div class="widget-time">
                                <!--<span>September 12, 2015</span>-->
                              </div>  
                                  <h3 class="widget-title margin-bottom-20 ppn-1" style="color: white;" data-toggle="modal" data-target="#modalint">INTRANET CORPORATIVA</h3>
                            </div>
                          </div>
                        </div>
                      </li>
                  </ul>
                  <div class="modal fade modal-fill-in" id="modalgcm">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title">
                            <strong>G</strong>estión de <strong>C</strong>onocimiento <strong>M</strong>ipres
                          </h1>
                          <p> Aplicativo de gestión de solicitudes médicas para el área de "mipress" </p>
                        </div>
                        <div class="modal-body"  style="background: url(../../assets/images/innova/GSM1.PNG) center no-repeat; background-size: cover;">
                          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="modal-footer">
                          <div class="form-group col-xs-12 text-right">
                            <button data-dismiss="modal" type="button" class="btn btn-dark btn-round"><i class="icon wb-close"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade modal-fill-in" id="modalgct">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title">
                            <strong>G</strong>estión de <strong>C</strong>onocimiento <strong>T</strong>utelas
                          </h1>
                          <p> Aplicativo de gestión de solicitudes de callcenter para el área de "tutelas".</p>
                        </div>
                        <div class="modal-body"  style="background: url(../../assets/images/innova/GST1.PNG) center no-repeat; background-size: cover;">
                          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="modal-footer">
                          <div class="form-group col-xs-12 text-right">
                            <button data-dismiss="modal" type="button" class="btn btn-dark btn-round"><i class="icon wb-close"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade modal-fill-in" id="modalcmn">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title">
                            <strong>Cuentas <strong>m</strong>édicas <strong>N</strong>oticias
                          </h1>
                          <p> Aplicativo que permite la gestión informativa para "Cuentas médicas"</p>
                        </div>
                        <div class="modal-body"  style="background: url(../../assets/images/innova/CMN1.PNG) center no-repeat; background-size: cover;">
                          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="modal-footer">
                          <div class="form-group col-xs-12 text-right">
                            <button data-dismiss="modal" type="button" class="btn btn-dark btn-round"><i class="icon wb-close"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade modal-fill-in" id="modalinv">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title">
                            <strong>Inventario de activos</strong>
                          </h1>
                          <p>  Aplicativo que permite el control de los activos fijos de la empresa </p>
                        </div>
                        <div class="modal-body"  style="background: url(../../assets/images/innova/inventario1.PNG) center no-repeat; background-size: cover;">
                          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="modal-footer">
                          <div class="form-group col-xs-12 text-right">
                            <button data-dismiss="modal" type="button" class="btn btn-dark btn-round"><i class="icon wb-close"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade modal-fill-in" id="modalram">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title">
                            <strong>Ramazzini</strong>
                          </h1>
                          <p> Aplicativo que realiza la gestión y clasificación de la enfermedades de origen laboral</p>
                        </div>
                        <div class="modal-body"  style="background: url(../../assets/images/innova/ramazzini1.PNG) center no-repeat; background-size: cover;">
                          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="modal-footer">
                          <div class="form-group col-xs-12 text-right">
                            <button data-dismiss="modal" type="button" class="btn btn-dark btn-round"><i class="icon wb-close"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade modal-fill-in" id="modalonc">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title">
                            <strong>Ruta oncológica</strong>
                          </h1>
                          <p> Aplicativo que cumple con informar a la entidad prestadora de servicios el avance del diagnóstico de los pacientes. </p>
                        </div>
                        <div class="modal-body"  style="background: url(../../assets/images/innova/oncologia1.PNG) center no-repeat; background-size: cover;">
                          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="modal-footer">
                          <div class="form-group col-xs-12 text-right">
                            <button data-dismiss="modal" type="button" class="btn btn-dark btn-round"><i class="icon wb-close"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade modal-fill-in" id="modalseg">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title">
                            <strong>Sistema control de ingreso de visitantes</strong>
                          </h1>
                          <p> Este aplicativo facilita la gestión de datos de los visitantes en las instalaciones de la empresa </p>
                        </div>
                        <div class="modal-body"  style="background: url(../../assets/images/innova/seguridad.PNG) center no-repeat; background-size: cover;">
                          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="modal-footer">
                          <div class="form-group col-xs-12 text-right">
                            <button data-dismiss="modal" type="button" class="btn btn-dark btn-round"><i class="icon wb-close"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade modal-fill-in" id="modalint">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title">
                            <strong>Intranet corporativa</strong>
                          </h1>
                          <p> Plataforma web que facilita al trabajador de DeltaASalud conocer la información coorporativa. </p>
                        </div>
                        <div class="modal-body"  style="background: url(../../assets/images/innova/intranet1.PNG) center no-repeat; background-size: cover;">
                          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="modal-footer">
                          <div class="form-group col-xs-12 text-right">
                            <button data-dismiss="modal" type="button" class="btn btn-dark btn-round"><i class="icon wb-close"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- fin desarrollo -->
              <div class="site-action" id="scroll-up" title="Ve al inicio">
                <button class="btn btn-primary btn-floating">
                  <i class="fas fa-angle-double-up"></i>
                </button>
              </div>
            </div>
            <div class="panel-footer"></div>
          </div>
        </div>
      </div>
    </div>
    <style type="text/css">
      body{
          padding-top: 20px;
      }
      #myCarousel .nav a small{
          display: block;
      }
      #myCarousel .nav{
          background: #eee;
      }
      .nav-justified > li > a{
          border-radius: 0px;
      }
      .nav-pills>li[data-slide-to="0"].active a { background-color: #16a085; }
      .nav-pills>li[data-slide-to="1"].active a { background-color: #e67e22; }
      .nav-pills>li[data-slide-to="2"].active a { background-color: #2980b9; }
      .nav-pills>li[data-slide-to="3"].active a { background-color: #8e44ad; }
    </style>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#myCarousel').carousel({
        interval:   4000
        });
        var clickEvent = false;
        $('#myCarousel').on('click', '.nav a', function() {
            clickEvent = true;
            $('.nav li').removeClass('active');
            $(this).parent().addClass('active');    
        }).on('slid.bs.carousel', function(e) {
          if(!clickEvent) {
            var count = $('.nav').children().length -1;
            var current = $('.nav li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if(count == id) {
              $('.nav li').first().addClass('active');  
            }
          }
          clickEvent = false;
        });
      });
    </script> 
    <style type="text/css">
      #team{
          background: #eee !important;
      }
      .btn-primary:hover,
      .btn-primary:focus {
          background-color: #005197;
          border-color: #005197;
          box-shadow: none;
          outline: none;
      }
      .btn-primary {
          color: #fff;
          background-color: #ff4d0e;
          border-color: #ff4d0e;
      }
      section {
          padding: 60px 0;
      }
      section .section-title {
          text-align: center;
          color: #007b5e;
          margin-bottom: 50px;
          text-transform: uppercase;
      }
      #team .card {
          border: none;
          background: #ffffff;
      }
      .image-flip:hover .backside,
      .image-flip.hover .backside {
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
        -o-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        transform: rotateY(0deg);
        border-radius: .25rem;
      }
      .image-flip:hover .frontside,
      .image-flip.hover .frontside {
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -o-transform: rotateY(180deg);
        transform: rotateY(180deg);
      }
      .mainflip {
        -webkit-transition: 1s;
        -webkit-transform-style: preserve-3d;
        -ms-transition: 1s;
        -moz-transition: 1s;
        
        -moz-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        transition: 1s;
        transform-style: preserve-3d;
        position: relative;
      }
      .frontside {
        position: relative;
        z-index: 2;
        margin-bottom: 30px;
      }
      .backside {
        position: absolute;
        top: 0;
        left: 0;
        background: white;
        -webkit-transform: rotateY(-180deg);
        -moz-transform: rotateY(-180deg);
        -o-transform: rotateY(-180deg);
        -ms-transform: rotateY(-180deg);
        transform: rotateY(-180deg);
        -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
      }
      .frontside,
      .backside {
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transition: 1s;
        -webkit-transform-style: preserve-3d;
        -moz-transition: 1s;
        -moz-transform-style: preserve-3d;
        -o-transition: 1s;
        -o-transform-style: preserve-3d;
        -ms-transition: 1s;
        -ms-transform-style: preserve-3d;
        transition: 1s;
        transform-style: preserve-3d;
      }
      .frontside .card,
      .backside .card {
        min-height: 312px;
      }
      .backside .card a {
        font-size: 18px;
        color: #007b5e !important;
      }
      .frontside .card .card-title,
      .backside .card .card-title {
        color: #007b5e !important;
      }
      .frontside .card .card-body img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
      }
      .mines-ol{
        display: block;
        padding: 1px;
        position: absolute; 
        transform: translate(5%,250px);
      }
    </style>
    <style type="text/css">
      section{
        padding-top: 4rem;
        padding-bottom: 5rem;
        background-color: #f1f4fa;
      }
      .wrap{
        display: flex;
        background: white;
        padding: 1rem 1rem 1rem 1rem;
        border-radius: 0.5rem;
        box-shadow: 7px 7px 30px -5px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
      }
      .wrap:hover {
        background: linear-gradient(135deg,#6394ff 0%,#0a193b 100%);
        color: white;
      }
      .ico-wrap {
        margin: auto;
      }
      .mbr-iconfont {
        font-size: 4.5rem !important;
        color: #313131;
        margin: 1rem;
        padding-right: 1rem;
      }
      .vcenter {
        margin: auto;
      }
      .mbr-section-title3 {
        text-align: left;
      }
      h2 {
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
      }
      .display-5 {
        font-family: 'Source Sans Pro',sans-serif;
        font-size: 1.4rem;
      }
      .mbr-bold {
        font-weight: 700;
      }
      p {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        line-height: 25px;
      }
      .display-6 {
        font-family: 'Source Sans Pro',sans-serif;
        font-size: 1rem
      }
    </style>
    <script src="../../assets/js/mines-scroll-js.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/css/atools-css.css">
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
  <!-- InstanceEnd -->
</html>