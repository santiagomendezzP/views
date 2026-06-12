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
    <link rel="stylesheet" href="../../assets/css/profile.css">
    <link rel="stylesheet" href="../../global/fonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../../global/vendor/icheck/icheck.css">
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
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <script>
      $("body").addClass("page-aside-fixed page-aside-left");
    </script>
    <div class="page">
      <div class="page-aside">
        <div class="page-aside-switch">
          <i class="icon wb-chevron-left" aria-hidden="true"></i>
          <i class="icon wb-chevron-right" aria-hidden="true"></i>
        </div>
        <div class="page-aside-inner page-aside-scroll">
          <div data-role="container">
            <div data-role="content">
              <section class="page-aside-section">
                <h5 class="page-aside-title"><?php echo $welcomes; ?></h5>
                <div class="list-group">
                  <a class="list-group-item nav-link active" href="#tablist_perfil" aria-expanded="true" role="tab" data-toggle="tab"><i class="icon wb-dashboard" aria-hidden="true"></i>Perfil</a>
                  <a class="list-group-item nav-link" href="#tablist_datos_personales" aria-expanded="true" role="tab" data-toggle="tab"><i class="icon wb-clipboard" aria-hidden="true"></i>Datos personales </a>
                  <a class="list-group-item nav-link" href="#tablist_change_pswd" aria-expanded="true" role="tab" data-toggle="tab"><i class="icon wb-unlock" aria-hidden="true"></i> Cambiar contraseña </a>
                </div>
              </section>
            </div>
          </div>
        </div>
      <!-- page-aside-inner -->
      </div>
      <div class="page-main">
        <div class="page-content container-fluid p-0">
          <div class="tab-content">
            <div class="tab-pane active animation-slide-top" id="tablist_perfil">
              <div class="card">
                <img class="card-img-top w-full" src="../../global/photos/city-7-960x480.jpg" style="max-height: 300px !important;">
                <div class="card-block wall-person-info">
                  <form class="avatar bg-white img-bordered person-avatar" id="image_" enctype="multipart/form-data">
                    <img src="<?php echo $imgg; ?>">
                    <label class="btn btn-primary btn-round icon wb-image btn-sm" for="img_profile" data-toggle='tooltip' data-placement="right" data-original-title=" Cambiar foto ">
                      <input type="file" id="img_profile" name="image" class="" style="display: none;" title="" accept="image/png, image/jpeg">
                      <input type="hidden" name="do">
                    </label>
                  </form>
                  <h2 class="person-name">
                    <a href="javascript:void(0);"><?php echo $_SESSION['intranet_usuario']; ?></a>
                  </h2>
                  <p class="card-text">
                    <a href="javascript:void(0);" class="blue-grey-400"><?php echo $_SESSION['intranet_name']; ?></a>
                  </p>
                  <p class="card-text">
                    <a href="javascript:void(0);" class="blue-grey-400"><?php echo $_SESSION['intranet_email']; ?></a>
                  </p>
                  <p class="card-text">
                    <a href="javascript:void(0);" class="blue-grey-400" id="view_cargo"></a>
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane animation-scale-up" id="tablist_datos_personales" role="tabpanel">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <!-- Panel Static Labels -->
                  <div class="panel mb-0">
                    <div class="panel-heading">
                      <h3 class="panel-title"> Datos personales </h3>
                    </div>
                    <div class="panel-body container-fluid">
                      <form autocomplete="off" id="profile">
                        <div class="form-group form-material">
                          <label class="form-control-label"> Nombres </label>
                          <input type="text" class="form-control" name="name" maxlength="50" placeholder="Digite su primer y segundo nombre"  required />
                        </div>
                        <div class="form-group form-material">
                          <label class="form-control-label"> Apellidos </label>
                          <input type="text" class="form-control" name="last_name" maxlength="50" placeholder="Digite su primer y segundo apellido"  required />
                        </div>
                        <div class="form-group form-material">
                          <label class="form-control-label"> Género </label>
                          <div class="input-group">
                            <input type="radio" class="icheckbox-primary" name="gender" value="1" id="male" data-plugin="iCheck" data-radio-class="iradio_flat-blue" <?php echo $gender = ($_SESSION['intranet_genero'] == 1 ? 'checked' : '');  ?> >
                            <span class="input-group-addon" data-toggle="tooltip" data-original-title=" Masculino " data-placement="left">
                              <label for="male"><span class="fas fa-male"></span></label>
                            </span>
                            <input type="radio" class="icheckbox-primary" name="gender" value="2" id="female" data-plugin="iCheck" data-radio-class="iradio_flat-blue" <?php echo $gender = ($_SESSION['intranet_genero'] == 2 ? 'checked' : '');  ?> >
                            <span class="input-group-addon" data-toggle="tooltip" data-original-title=" Femenino " data-placement="right">
                              <label for="female"><span class="fas fa-female"></span></label>
                            </span>
                          </div>
                        </div>               
                        <div class="form-group form-material">
                          <label class="form-control-label"> Tipo de documento </label>
                          <select name="td" id="td" class="form-control" required>
                            <option value=""> -Selecciona... </option>
                            <option value="1" selected> Cédula de ciudadanía </option>
                            <option value="2" > Tarjeta de identidad </option>
                            <option value="3" > Cédula de extranjería </option>
                          </select>
                        </div>
                        <div class="form-group form-material">
                          <label class="form-control-label"> Número de documento </label>
                          <input type="number" class="form-control" name="nd" value="<?php echo $_SESSION['intranet_documento'] ?>" maxlength="50" placeholder="Digite su número de documento"  required />
                        </div>
                        <!-- <div class="form-group form-material">
                          <label class="form-control-label"> Fecha de nacimiento </label>
                          <input type="date" class="form-control" name="birth" required>
                        </div> -->
                        <div class="form-group form-material">
                          <label class="form-control-label"> Correo </label>
                          <input type="email" class="form-control" name="mail" maxlength="50" value="<?php echo $_SESSION['intranet_email']; ?>" placeholder="Digite su número de documento"  required />
                        </div>
                        <div class="form-group">
                          <button class="btn btn-primary btn-outline w-full" > <strong>Guardar cambios</strong> </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- End Panel Static Labels -->
                </div>
              </div>
            </div>
            <div class="tab-pane animation-slide-right" id="tablist_change_pswd" role="tabpanel">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div class="panel mb-0">
                    <div class="panel-heading">
                      <h3 class="panel-title"> Cambio de contraseña </h3>
                    </div>
                    <div class="panel-body container-fluid">
                      <form id="formPswd">
                        <div class="form-group form-material">
                          <label class="form-control-label"> Contraseña anterior </label>
                          <input type="password" class="form-control" id="j" name="p" maxlength="50" placeholder=" Contraseña anterior "  required />
                          <i class="btn btn-round btn-outline btn-dark btn-xs icon wb-eye" onclick="verify_();"></i>
                        </div>
                        <div class="form-group form-material">
                          <label class="form-control-label"> Nueva contraseña </label>
                          <input type="password" class="form-control" id="f" name="a" maxlength="50" placeholder=" Nueva contraseña "  required />
                          <i class="btn btn-round btn-outline btn-dark btn-xs icon wb-eye" onclick="verify__();"></i>
                        </div>
                        <div class="form-group form-material">
                          <label class="form-control-label"> Confirmar contraseña </label>
                          <input type="password" class="form-control" name="b" maxlength="50" placeholder=" Confirme su contraseña "  required />
                        </div>
                        <div class="form-group">
                          <button class="btn btn-primary btn-outline w-full" > <strong> Cambiar contraseña </strong> </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
    <script src="../../global/vendor/icheck/icheck.min.js"></script>
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
    <script src="../../global/js/Plugin/icheck.js"></script>
    <script src="../../controller/profile.js"></script>
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