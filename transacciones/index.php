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
    <link rel="stylesheet" href="../../global/vendor/icheck/icheck.css">
    <link rel="stylesheet" href="../../global/vendor/clockpicker/clockpicker.css">
    <link rel="stylesheet" href="../../global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
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
    <script>
      $(document).ready(function(){
        $("body").addClass("page-aside-fixed page-aside-left");
        $("#site_site_modulos").addClass("active open");
        $("#site_transacciones").addClass("active");
      });
    </script>
    <!-- Page Content -->
    
    <!-- Modals // Ventana emergente -->
    <!-- Modal de solicitud de salida -->
    <div class="page">
      <div class="page-aside">
        <div class="page-aside-switch">
          <i class="icon wb-chevron-left" aria-hidden="true"></i>
          <i class="icon wb-chevron-right" aria-hidden="true"></i>
        </div>
        <div class="page-aside-inner page-aside-scroll">
          <div data-role="container">
            <div data-role="content">
              <br>
              <?php
                if($_SESSION['intranet_usuario'] == 'raul.enciso' || $_SESSION['intranet_usuario'] == 'julio.fuentes') {
                  ?>
                  <a class="btn" style="background-color: transparent; color: #3e8ef7; border-color: #3e8ef7;" data-toggle="modal" data-target="#crearSecciontransacciones" data-crear_seccion='crear' title="click para crear">
                    <span class="cambioColor">Crear una sección</span>
                  </a>
                  <a class="btn" style="background-color: #0f6faa; color: white; border-color: white;" data-toggle="modal" data-target="#verregistros" data-ver_registros='verregistros' title="click para ver registros">
                  <i class="icon  wb-eye" ></i>
                  </a>
                  <a class="btn" style="background-color: transparent; color: #3e8ef7; border-color: #3e8ef7;" data-toggle="modal" data-target="#EliminarSecciontransacciones" data-eliminars='Eliminar' title="click para Eliminar sección">
                    <span class="cambioColor">Eliminar una sección</span>
                  </a>
                  <?php 
                }
                ?>
                <?php
                include_once ("../Conexion/conexion.php");
                $sql_transacciones_secciones = mysqli_query($mysqli, "SELECT `id_seccion`, `seccion` FROM `transacciones_secciones` WHERE `estado_seccion` = '0' ORDER BY `id_seccion` DESC ");
                while($rowSecciones =  mysqli_fetch_array($sql_transacciones_secciones, MYSQLI_ASSOC)) {
                  $id_seccion = $rowSecciones['id_seccion'];
                  ?>
                  <section class="page-aside-section">
                    <h5 class="page-aside-title">
                      <?php echo $rowSecciones['seccion']?>
                      <br>
                      <?php
                      if($_SESSION['intranet_usuario'] == 'raul.enciso'|| $_SESSION['intranet_usuario'] == 'julio.fuentes') {
                        ?>
                        <a class="btn" style="background-color: transparent; border-color: #3e8ef7;" data-toggle="modal" data-target="#CrearPublicaciontransacciones" data-publicacion='<?php echo $id_seccion?>' data-usuario_intra='<?php echo $_SESSION['intranet_usuario']?>' data-id_seccion='<?php echo $row['id']; ?>' title="click para nueva publicación">
                          <span class="cambioColor">Nueva publicación</span>
                        </a>
                        <?php
                      }
                      ?>
                    </h5>
                    <?php
                    $sql_transacciones = mysqli_query($mysqli, "SELECT `id`, `titulo`, `tabla`, `name`, `type`, `estado_publicacion` FROM `transacciones` WHERE `id_seccion` = '$id_seccion' AND `estado_publicacion` = '0' ORDER BY `transacciones`.`id` DESC  ");
                    while($row = mysqli_fetch_array($sql_transacciones, MYSQLI_ASSOC)) { 
                      ?>
                      <div class="list-group">
                        <a class="list-group-item nav-link" onclick="$('.tab-pane').removeClass('active');$('.nav-link').removeClass('active');$(this).addClass('active'); $('#<?php echo $row['tabla'] ?>').addClass('active');">
                          <i class="icon wb-star-outline" aria-hidden="true"></i><?php echo $row['titulo']?>
                        </a>
                        <?php
                        if($_SESSION['intranet_usuario'] == 'raul.enciso'|| $_SESSION['intranet_usuario'] == 'julio.fuentes') {
                          ?>
                          <p class="page-header">
                            <a class="btn" style="background-color: transparent; color: #3e8ef7; border-color: #3e8ef7;" data-toggle="modal" data-target="#editarSecciontransacciones" data-id_seccion='<?php echo $row['id']; ?>' title="click para editar">
                              <span class="cambioColor">Editar</span>
                            </a>
                            <a class="btn" style="background-color: transparent; color: #3e8ef7; border-color: #3e8ef7;" data-toggle="modal" data-target="#eliminarSecciontransacciones" data-ideliminarseccion='<?php echo $row['id']; ?>' title="click para eliminar">
                              <span class="cambioColor">Eliminar</span>
                            </a>
                          </p>
                          <?php
                        }
                        ?>
                      </div>
                      <?php
                    }
                    ?>
                  </section>
                  <?php
                }
              ?>
            </div>
          </div>
        </div>
        <!-- page-aside-inner -->
      </div>
      <div class="page-main">
        <div class="tab-content">
          <div class="page-header" style="background-color: #0f6faa;">
                <h1 class="page-title text-white"> MIS TRANSACCIONES </h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="window.location.href='../transacciones/?<?php echo mt_rand(); ?>';">Inicio</a></li>
                  <li class="breadcrumb-item active text-white"> <?php echo "$welcomes"; ?> al panel de transacciones </li>
                </ol>
              </div>
          <?php
          $sql_transacciones = mysqli_query($mysqli, "SELECT * FROM `transacciones` WHERE `estado_publicacion` = '0' ORDER BY `id_seccion` DESC");
          while($row = mysqli_fetch_assoc($sql_transacciones)){
            $titulo_publicacion = $row['titulo'];
            $nombre_imagen = $row['name'];
            $nombre_poster = $row['name_poster'];
            $tipo_imagen = $row['type'];
            ?>
            <div class="tab-pane active animation-scale-up" id="<?php echo $row['tabla']?>" role="tabpanel">
              <div class="row">
                <div class="page-header">
                  <h1 class="page-title"><center><?php echo $titulo_publicacion?></center></h1>
                  <div class="page-content pr-0 pl-0">
                    <div class="panel panel-bordered">
                      <div class="panel-body">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                          <?php
                            if($tipo_imagen == 'video'){
                              ?>
                              <?php 
                              if($nombre_poster == ''){
                                ?>
                                <video src='./../videos_transacciones/<?php echo $nombre_imagen?>' style='width: 100%; height=100%;' controls ></video>
                                <?php
                              }else{
                                ?>
                                <video src='./../videos_transacciones/<?php echo $nombre_imagen?>' style='width: 100%; height=100%;' poster="./../imagenes_transacciones/<?php echo $nombre_poster?>" controls ></video>
                                <?php
                              }
                              ?>
                              <?php
                            }elseif($tipo_imagen == 'imagen'){
                              ?>
                                <img src='./../imagenes_transacciones/<?php echo $nombre_imagen?>' width="100%" height="100%" alt="">
                              <?php 
                            }elseif($tipo_imagen == 'pdf'){
                              ?>
                                <iframe src='./../pdf_transacciones/<?php echo $nombre_imagen?>' width=1000 height=500></iframe>
                              <?php
                            }else{
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    <!--CREAR PUBLICACIÓN FOR ALL-->
    <div class="modal fade" id="CrearPublicaciontransacciones" tabindex="-1" role="dialog" aria-labelledby="CrearPublicaciontransaccionesTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="CrearPublicaciontransaccionesTitle">CREAR PUBLICACIÓN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="crear_publicacion"></div>
          </div>
        </div>
      </div>
    </div>
    <!--ELIMINAR SECCION FOR ALL-->
    <div class="modal fade" id="eliminarSecciontransacciones" tabindex="-1" role="dialog" aria-labelledby="eliminarSecciontransaccionesTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="eliminarSecciontransaccionesTitle">ELIMINAR</h5>
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
    <!--EDITAR SECCION FOR ALL-->
    <div class="modal fade" id="editarSecciontransacciones" tabindex="-1" role="dialog" aria-labelledby="editarSecciontransaccionesTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editarSecciontransaccionesTitle">EDITAR</h5>
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
    <!--CREAR SECCION FOR ALL-->
    <div class="modal fade" id="crearSecciontransacciones" tabindex="-1" role="dialog" aria-labelledby="crearSecciontransaccionesTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="crearSecciontransaccionesTitle">CREAR SECCION</h5>
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
    <!-- ELIMINAR SECCION CREADA FOR ALL-->
    <div class="modal fade" id="EliminarSecciontransacciones" tabindex="-1" role="dialog" aria-labelledby="EliminarSecciontransaccionesTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EliminarSecciontransaccionesTitle">ELIMINAR SECCION CREADA</h5>
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
    <!--VER REGISTROS FOR ALL-->
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
        $.post("./../edicion_transacciones/Ver_registros.php", { verregis: verregis }, 
        function(data) {
          $(".ver_registros").html(data);
        })
      })
    </script>
    <script>
      $('#EliminarSecciontransacciones').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_Eliminar = button.data('eliminars')
        $(".id_Eliminar").val(id_Eliminar); +
        $.post("./../edicion_transacciones/Eliminar_seccion_creada.php", {
          id_Eliminar: id_Eliminar
        }, function(data) {
          $(".Eliminarseccion").html(data);
        })
      })
    </script>
    <script>
      $('#eliminarSecciontransacciones').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_seccionEliminar = button.data('ideliminarseccion')
        $(".id_seccion_eliminar").val(id_seccionEliminar); +
        $.post("./../edicion_transacciones/Eliminar_seccion.php", {
          id_seccionEliminar: id_seccionEliminar
        }, function(data) {
          $(".verEliminar").html(data);
        })
      })
    </script>
    <script>
      $('#editarSecciontransacciones').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_seccion = button.data('id_seccion')
        $(".id_seccion_campo").val(id_seccion); +
        $.post("./../edicion_transacciones/Editar_seccion.php", {
          id_seccion: id_seccion
        }, function(data) {
          $(".ver").html(data);
        })
      })
    </script>
    <script>
      $('#crearSecciontransacciones').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var seccion = button.data('crear_seccion')
        $(".seccion_campo").val(seccion); +
        $.post("./../edicion_transacciones/Crear_seccion.php", {seccion: seccion}, 
        function(data) {
          $(".crear").html(data);
        })
      })
    </script>
    <script>
      $('#CrearPublicaciontransacciones').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var usuario_crea = button.data('usuario_intra')
        var publicacion = button.data('publicacion')
        $(".publicacion_campo").val(publicacion); +
        $.post("./../edicion_transacciones/Crear_publicacion.php", {publicacion: publicacion, usuario_crea: usuario_crea}, 
        function(data) {
          $(".crear_publicacion").html(data);
        })
      })
    </script>
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
    <script src="../../global/vendor/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="../../global/vendor/icheck/icheck.min.js"></script>
    <script src="../../global/vendor/datatables/dataTable.min.js"></script>
    <script src="../../global/vendor/datatables/dataTableButtons.min.js"></script>
    <script src="../../global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.min.js"></script>
    <script src="../../global/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
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
    <script>
      function getLink(link,active){
        $(".list-group a").removeClass("active");
        $(active).addClass('active');
        if (link === ''){
        }else{
          $("#page_main").load(link+".php");
        }
      }
    </script>
    </script>
    <script src="../../global/js/Plugin/icheck.js"></script>
    <!-- InstanceEndEditable -->
	  
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