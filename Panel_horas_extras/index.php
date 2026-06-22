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
    <!-- <link rel="stylesheet" href="../../assets/css/sweetalert.css"> -->
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
    <link rel="stylesheet" href="../../assets/css/qsomos_css.css">
    <!-- Plugins Js -->
    
    <!-- InstanceEndEditable -->
    <script src="../../assets/js/Plugin/skintools.js"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="../../global/fonts/brand-icons/brand-icons.min.css">
    <link rel="stylesheet" href="../../global/fonts/web-icons/web-icons.min.css">
    <!-- Scripts -->
    <script src="../../global/vendor/breakpoints/breakpoints.js"></script>
    <!-- SCRIPT PERSONALIZADOS -->
    <script src="js/dayjs.min.js"></script>
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
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif"> Bienestar a la carta </span>
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
    <style type="text/css"> 
      #fondo{
        position: absolute; 
        top: 0; 
        left: 0; 
        width: 100%; 
        z-index: -1
      }
			.bt {
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0.16, rgb(207, 207, 207)), color-stop(0.79, rgb(252, 252, 252)));
			background-image: -moz-linear-gradient(center bottom, rgb(207, 207, 207) 16%, rgb(252, 252, 252) 79%);
			background-image: linear-gradient(to top, rgb(207, 207, 207) 16%, rgb(252, 252, 252) 79%);
			padding: 3px;
			border: 1px solid #c4c4c4;
			color: black;
			text-decoration: none;
			}
      .swal2-styled.swal2-confirm {
        border: 0;
        border-radius: 0.25em;
        background: initial;
        background-color: #005197;
        color: #fff;
        font-size: 1em;
      }
      .bt{
        background: linear-gradient(135deg, #005095);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 12px 28px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all .3s ease;
        box-shadow: 0 4px 12px rgba(0, 140, 205, .25);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-width: 160px;
      }
      .bt:hover{
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(0, 140, 205, .35);
      }
      .bt:active{
        transform: translateY(0);
      }
      #vaciar{
        background: linear-gradient(135deg, #ff8d10);
        box-shadow: 0 4px 12px rgba(255, 141, 16, .25);
      } 
      #vaciar:hover{
        box-shadow: 0 8px 18px rgba(255, 141, 16, .35);
      }
      .botones-acciones{
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 20px;
      }
      {
      .enviar{
        background: linear-gradient(135deg, #28a745);
        box-shadow: 0 4px 12px rgba(40, 167, 69, .25);
      }
      }
    </style>
    <script>
      $("#site_reportar_horas").addClass("active");
    </script>
    <div class="page" style="background-color: white;">
      <div class="container" id="container" style="background-color: white;">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2>Horas extras</b></h2>
              </div>
              <div class="col-sm-6"></div>
            </div>
          </div>
          <div class='col-sm-4 pull-right'>
            <div id="custom-search-input">
              <div class="input-group col-md-12">
                  <input type="hidden" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);"/>
                  <span class="input-group-btn"></span>
              </div> 
            </div>
          </div>
          <div class="botones-acciones">
            <button type="button" class="bt" id="boton_agregar" data-toggle="modal" data-target="#ModalHoras">Agregar hora</button>
            <button  class="bt" id="vaciar" name="vaciar" style="display: flex; margin: auto;">Limpiar</button>
          </div>
          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalConso">Consolidado de horas</button> -->
          <div class='clearfix'></div>
          <hr>
          <div id="loader"></div><!-- Carga de datos ajax aqui -->
          <div id="resultados"></div><!-- Carga de datos ajax aqui -->
          <div class='outer_div'></div><!-- Carga de datos ajax aqui -->
        </div>
      </div>
      <!-- Edit Modal HTML -->
      <?php 
        include ("html/modal_adj_horas.php"); 
        include ("html/modal_consolidado.php"); 
        include ("html/modal_enviar.php"); 
        include ("html/modal_eliminar.php"); 
        include ("html/modal_modificar.php");
      ?>
      <?php 
      if(!isset($_SESSION['reporte']) || !isset($_SESSION['consolidado'])){
      }
      ?>
      <button type="button" class="btn btn-success enviar" data-toggle="modal" data-target="#enviar" id="enviar" name="enviar" style="display: flex; margin: auto; margin-top: 5px;" >Enviar</button>
      <?php  
      if(isset($_POST['vaciar'])){
        unset($_SESSION['reporte']);
        unset($_SESSION['contador']);
        unset($_SESSION['consolidado']);
        echo "<script type='text/javascript'></script>";
      }
      ?>
      <script type="text/javascript"></script>
      <script src="js/horas.js"></script>
      <script src="js/mod.js"></script>
      <script src="js/calcular_diferencia_horas.js"></script>
    </div>
    <!-- End Page -->
    <!-- InstanceEndEditable -->
    <!-- Footer -->
   <footer class="site-footer">
      <div class="site-footer-legal">© 2024 <a href="https://bit.ly/2OBdVf4"> Delta A Salud S.A.S BIC</a></div>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- SCRIPTS PERSONALIZADOS -->
    <script src="./sweetAlert.js"></script>
    <script src="js/index_funciones.js"></script>
    <script src="js/dayjs.min.js"></script>
    <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
      $.ajax({
        method: "POST",
        url: "controller/controlador_reporte_horas.php",
        data: { peticion: "datos_horas_reportadas" },
        success: function (datos) {
          var o = JSON.parse(datos); //A la variable le asigno el json decodificado
          // console.log(o);
          var horas_extras = o[0]['horas_extras'];
          if (horas_extras == null) {
            horas_extras = 0;
          }
          if (horas_extras >= 48) {
            $("#boton_agregar").prop("disabled",true);
            $('#boton_agregar').hide();
            $("#enviar").prop("disabled",true);
            $('.enviar').hide();
          }else if( horas_extras < 48){
            $("#boton_agregar").prop("disabled",false);
            $('#boton_agregar').show();
            $("#enviar").prop("disabled",false);
            $('.enviar').show();
          }
          Swal.fire({
            title: '<strong>¡Importante!</strong>',
            icon: 'warning',
            html:
              '<p style="text-align: justify;">Tenga en cuenta que: “El límite máximo diario de las horas extras a reportar es de 2 horas y su máximo mensual corresponde a 48 horas”.</p>' +
              '<p>Horas extras reportadas al momento:</p>' +
              '<strong><h3 style="color:red;">'+horas_extras+'</h3></strong>',
            showCloseButton: true,
            focusConfirm: false,
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i>'
          })
        },
      });
    </script>
    <script>
$(document).ready(function() {
    

    $('.calc').on('change input', function() {
        calcularTodo();
    });

    function calcularTodo() {
        var hEntrada = $('#hora').val();
        var hSalida = $('#hora_sal').val();
        var almTurno = parseInt($('#almuerzo').val()) || 0;

        if (hEntrada && hSalida) {
            var ent = new Date("2026-01-01 " + hEntrada);
            var sal = new Date("2026-01-01 " + hSalida);
            if (sal < ent) sal.setDate(sal.getDate() + 1);
            
            var minTurno = Math.floor((sal - ent) / 1000 / 60) - almTurno;
            if (minTurno < 0) minTurno = 0;
            
            $('#horas_dia').val(Number((minTurno / 60).toFixed(2)).toString());
        }

        var hInicioHE = $('#hora_inicio_he').val();
        var hFinHE = $('#hora_fin_he').val();

        if (hInicioHE && hFinHE) {
            var iniHE = new Date("2026-01-01 " + hInicioHE);
            var finHE = new Date("2026-01-01 " + hFinHE);
            if (finHE < iniHE) finHE.setDate(finHE.getDate() + 1);
            
            var minBrutosHE = Math.floor((finHE - iniHE) / 1000 / 60);
            var horasBrutasHE = minBrutosHE / 60;

            if (horasBrutasHE > 5) {
                $('#div_almuerzo_he').show();
                $('#almuerzo_he').prop('required', true);
            } else {
                $('#div_almuerzo_he').hide();
                $('#almuerzo_he').prop('required', false);
                $('#almuerzo_he').val('0');
            }

            var almHE = parseInt($('#almuerzo_he').val()) || 0;
            var minEfectivosHE = minBrutosHE - almHE;
            if (minEfectivosHE < 0) minEfectivosHE = 0;

            $('#horas_extras').val(Number((minEfectivosHE / 60).toFixed(2)).toString());
        }
    }

    $('#agregar').click(function(e){
        if ($('#div_almuerzo_he').is(':visible') && $('#almuerzo_he').val() == '0') {
            e.preventDefault(); 
            Swal.fire({
                target: document.getElementById('ModalHoras'),
                icon: 'error',
                title: 'Campo Obligatorio',
                text: 'Las horas extras superan las 5 horas. Debe seleccionar un tiempo de almuerzo.'
            });
            return false;
        }

        Swal.fire({
            target: document.getElementById('ModalHoras'),
            position: 'center',
            icon: 'success',
            title: 'Agregado correctamente',
            showConfirmButton: false,
            timer: 1800
        });
    });

    $.ajax({
        method: "POST",
        url: "controller/controlador_reporte_horas.php",
        data: { peticion: "datos_horas_reportadas" },
        success: function (datos) {
            var o = JSON.parse(datos);
            var horas_extras = o[0]['horas_extras'];
            if (horas_extras == null) {
                horas_extras = 0;
            }
            if (horas_extras >= 48) {
                $("#div_horas_recargo_habilitado").css("display","block");
                $("#div_horas_extras_recargo").css("display","none");
            } else if( horas_extras < 48){
                $("#div_horas_extras_recargo").css("display","block");
                $("#div_horas_recargo_habilitado").css("display","none");
            }
        },
    });
});


function hCheck(nameSelect) {
    if(nameSelect){
        var horasExtrasValue = document.getElementById("horasExtras").value;
        if(horasExtrasValue == nameSelect.value){
            document.getElementById("div_horas_extras").style.display = "block";
            document.getElementById("div_horas_recargo").style.display = "none";
        } else {
            document.getElementById("div_horas_extras").style.display = "none";
            document.getElementById("div_horas_recargo").style.display = "block";
        }
    } else {
        document.getElementById("div_horas_recargo").style.display = "none";
        document.getElementById("div_horas_extras").style.display = "none";
    }
}
</script>
  </body>
</html>