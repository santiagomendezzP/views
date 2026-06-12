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
  <link rel="stylesheet" href="../../assets/css/qsomos_css.css">
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
  if ($_SESSION['loggedin_intranet'] === true) {
    include_once "../../models/menubar/menuModel.php";
  } else if ($_SESSION['loggedin_intranet'] === false) {
    header('location:../../change_pswd.php');
  } else {
    session_unset();
    session_destroy();
    header('location:../../');
  }
} else {
  session_destroy();
  header('location:../../');
}
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
                    <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true" role="tablist">
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
                <img src="<?php echo $imgg = (empty($_SESSION['intranet_photo']) || $_SESSION['intranet_photo'] != '' || $_SESSION['intranet_photo'] == null ? '../../global/portraits/users/' . mt_rand(1, 9) . '.jpg' : 'data:image/jpg;base64,' . $_SESSION['intranet_photo']); ?>" alt="Cargando..."><i></i>
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
              <strong> <?php echo $_SESSION['intranet_name']; ?> </strong>
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
            <a class="nav-link" data-toggle="tooltip" data-original-title=" Inicio " data-placement="bottom" href="../home/?<?php echo mt_rand(); ?>" title=" Inicio ">
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
                  <a class="animsition-link" href="../sst/?<?php echo mt_rand(); ?>">
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
            <?php echo $menulateral; ?>
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
  <!-- InstanceBeginEditable name="body" -->
  <!-- Page Content -->
  <script>
    $("#site_site_modulos").addClass("active open");
    $("#site_quienes_somos").addClass("active");
  </script>
  <div class="page">
    <div class="page-content p-0">
      <div class="panel">
        <div class="panel-body p-0">
          <ul class="blocks no-space blocks-100 blocks-xlg-3 blocks-md-2">
            <li class="card card-inverse overlay overlay-hover">
              <img class="card-img overlay-scale overlay-figure" src="../../assets/images/qsomos/mision.jpg" alt="...">
              <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
                <div class="vertical-align-middle ppn-1">
                  <h3 class="card-title mb-20"> Misión </h3>
                </div>
              </div>
              <figcaption class="overlay-panel overlay-background overlay-slide-bottom" style="background-color: rgba(0,80,151,0.8);">
                <h3> Misión </h3>
                <div class="h-300" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <p style="text-align: justify;" class="mt-35">Delta A Salud provee, con sustento en sólidos cánones éticos y técnicos, soluciones innovadoras ajustadas a las necesidades del sector salud, en materia de reingeniería y operación de procesos propios del aseguramiento y de la atención, gestión y auditoría de la calidad, gestión del riesgo, seguridad y salud en el trabajo, mejoramiento de procesos y gestión del conocimiento.
                      </p>
                      <br>
                      <p> Revisado ABM 07-02-24</p>

                    </div>
                  </div>
                </div>
              </figcaption>
            </li>
            <li class="card card-inverse overlay overlay-hover">
              <img class="card-img overlay-scale overlay-figure" src="../../assets/images/qsomos/vision.png" alt="...">
              <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
                <div class="vertical-align-middle ppn-1">
                  <h3 class="card-title mb-20"> Visión </h3>
                </div>
              </div>
              <figcaption class="overlay-panel overlay-background overlay-slide-left" style="background-color: rgba(0,80,151,0.8);">
                <h3> Visión </h3>
                <div class="h-300" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <p style="text-align: justify;" class="mt-35">Ser líderes, en Latinoamérica, en la provisión de servicios en el campo de nuestras competencias, disfrutando de prestigio por nuestra ética, por la eficacia de nuestra gestión, por nuestra capacidad de innovar, por nuestro respeto a la naturaleza y por nuestro compromiso con el crecimiento de quienes conformamos la Empresa.
                      </p>
                      <br>
                      <p> Revisado ABM 07-02-24</p>
                    </div>
                  </div>
                </div>
              </figcaption>
            </li>
            <li class="card card-inverse overlay overlay-hover">
              <img class="card-img overlay-scale overlay-figure" src="../../assets/images/qsomos/valores.jpg" alt="...">
              <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
                <div class="vertical-align-middle ppn-1">
                  <h3 class="card-title mb-20"> Valores. <br>
                    <p><small>(V5-07/02/2024) </small>
                  </h3>

                </div>
              </div>
              <figcaption class="overlay-panel overlay-background overlay-slide-bottom" style="background-color: rgba(0,80,151,0.8);">
                <div class="h-300" data-plugin="scrollable" data-direction="horizontal">
                  <div data-role="container">
                    <div data-role="content">
                      <div class="row">
                        <div class="col-md-1"></div>
                        <div class="btns-mines-ff scal col-md-1">
                          <p class="btns-title" style="transform: translate(10.5rem,0rem) rotate(270deg);">ÉTICA</p>
                          <p class="wind-body">Actuamos en forma recta, honrada y equitativa, buscando el bien común.</p>
                        </div>
                        <div class="btns-mines-ff scal col-md-1">
                          <p class="btns-title" style="transform: translate(9.5rem,0rem) rotate(270deg);">CALIDAD</p>
                          <p class="wind-body">Hacemos lo que debemos hacer y lo hacemos bien desde el principio. </p>
                        </div>
                        <div class="btns-mines-ff scal col-md-1">
                          <p class="btns-title" style="transform: translate(9.5rem,0rem) rotate(270deg);">SERVICIO</p>
                          <p class="wind-body">Procedemos con diligencia y con la mejor disposición en favor de quien nos necesite. </p>
                        </div>
                        <div class="btns-mines-ff scal col-md-1">
                          <p class="btns-title" style="transform: translate(9.5rem,0rem) rotate(270deg);">RESPETO</p>
                          <p class="wind-body">: Acatamos la ley y salvaguardamos la dignidad y los derechos de los demás.
                          </p>
                        </div>
                        <div class="btns-mines-ff scal col-md-1">
                          <p class="btns-title" style="transform: translate(6.5rem,0rem) rotate(270deg);">RESPONSABILIDAD</p>
                          <p class="wind-body">Cumplimos nuestros compromisos y asumimos las consecuencias de nuestras decisiones y ejecutorias.
                          </p>
                        </div>
                        <div class="btns-mines-ff scal col-md-1">
                          <p class="btns-title" style="transform: translate(7.5rem,0rem) rotate(270deg);">CONCIENCIA SOCIAL</p>
                          <p class="wind-body">Procedemos de forma tal que nuestra gestión proteja la naturaleza y aporte a la convivencia pacífica y al progreso de la comunidad.
                          </p>
                        </div>
                        <div class="btns-mines-ff scal col-md-1">
                          <p class="btns-title" style="transform: translate(7.5rem,0rem) rotate(270deg);">DISPOSICIÓN AL CAMBIO</p>
                          <p class="wind-body">Asumimos el reto de innovar constantemente para alcanzar la excelencia en nuestra gestión.</p>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </figcaption>
            </li>
            <li class="card card-inverse overlay overlay-hover">
              <img class="card-img overlay-scale overlay-figure" src="../../assets/images/qsomos/organigrama.jpg" alt="...">
              <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
                <div class="vertical-align-middle ppn-1">
                  <h3 class="card-title mb-20"> Objetivos corporativos</h3>
                </div>
              </div>
              <figcaption class="overlay-panel overlay-background overlay-slide-bottom" style="background-color: rgba(0,80,151,0.8);">
                <h3> Objetivos corporativos </h3>

                <p>(V3-07/02/2024) </p>

                <div class="h-200" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <ol>
                        <li>1. Proveer los servicios corporativos con alta calidad técnica y con total apego a las obligaciones que adquirimos con los clientes.
                        </li>
                        <li> 2. Alcanzar la total satisfacción de los clientes.
                        </li>
                        <li>3. Generar una cultura corporativa que exprese, en todos los aspectos, los valores y la identidad de la Empresa.
                        </li>
                        <li>4. Garantizar un ambiente laboral seguro, que respete la dignidad de los trabajadores, promueva el desarrollo de sus competencias y propicie su felicidad y su bienestar y el de sus familiares. 
                        </li>
                        <li>5. Minimizar o eliminar los riesgos que puedan afectar la sostenibilidad y la competitividad de la Empresa.
                        </li>
                        <li>6. Aportar para que, en el país y en el ámbito latinoamericano, mejore, constantemente, la calidad de la atención en salud. 
                        </li>
                        <li>7. Alcanzar altos niveles de seguridad en la administración de la información de nuestros grupos de interés.
                        </li>
                        <li>8. Minimizar el daño que, por causa de nuestra operación corporativa, se pueda generar en la naturaleza y en la comunidad.
                        </li>
                        <li>9. Obtener una rentabilidad razonable.
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
              </figcaption>
            </li>
            <li class="card card-inverse overlay overlay-hover">
              <img class="card-img overlay-scale overlay-figure" src="../../assets/images/qsomos/politica.jpg" alt="...">
              <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
                <div class="vertical-align-middle ppn-1">
                  <h3 class="card-title mb-20"> Política de gestión empresarial </h3>
                </div>
              </div>
              <figcaption class="overlay-panel overlay-background overlay-slide-bottom" style="background-color: rgba(0,80,151,0.8);">
                <h3> Política de gestión empresarial </h3>
                <div class="h-300" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <p style="text-align: justify;" class="mt-20">En Delta A Salud la ética, la calidad y el servicio son lo primero, es decir, hacemos lo que se debe hacer y lo hacemos bien desde el principio, por lo que somos garantía de excelencia para nuestros clientes y para la sociedad. Para ello, administramos cabalmente el riesgo en nuestra gestión; salvaguardamos la información y protegemos los activos de nuestros grupos de interés; trabajamos en armonía con la naturaleza y garantizamos un ambiente laboral sano y seguro que propicie el crecimiento de nuestros trabajadores, su felicidad, su bienestar y el de sus familias.
                      </p>
                      <p style="text-align: justify;" class="mt-20">Por lo tanto:
                        Cumplimos las leyes y actuamos éticamente, siempre.
                        Respetamos profundamente a todas las personas.
                        Diseñamos y ejecutamos políticas específicas para eliminar de raíz cualquier acto de corrupción.
                        Estamos comprometidos, con sentido de responsabilidad social, con políticas como la flexibilización laboral, el teletrabajo y la contratación de personas vulnerables o que estén en la fase final de su ciclo laboral.
                        Diseñamos y ejecutamos un Plan de Beneficios Especiales para el trabajador, que apunta al reconocimiento del logro y a armonizar su vida laboral con su vida personal y familiar.
                      </p>
                      <p style="text-align: justify;" class="mt-20">Promovemos la salud y el bienestar de los trabajadores y de sus familias, y la prevención de las enfermedades laborales, de los accidentes de trabajo y del daño a la propiedad.
                        Identificamos, prevenimos, minimizamos su impacto o eliminamos los riesgos en nuestra gestión.
                        Adoptamos medidas para, en una contingencia, priorizar la protección y la seguridad física de las personas, y para garantizar la continuidad de los procesos críticos y, en general, del negocio.
                        Manejamos en forma segura y mediante la gestión del riesgo específico, la información, en especial la de los clientes, para garantizar su confidencialidad, integridad y disponibilidad.
                      </p>
                      <p style="text-align: justify;" class="mt-20">Gestionamos y minimizamos el impacto socioambiental de nuestra operación corporativa, con el ánimo de alcanzar y mantener la meta de ser una empresa carbono neutral.
                        Mantenemos y mejoramos continuamente la calidad de nuestra gestión, así como nuestros logros en transparencia corporativa, calidad de vida y felicidad de nuestros trabajadores, seguridad y salud en el trabajo, cuidado del medio ambiente, seguridad y privacidad de la información y continuidad de negocio.
                      </p><br>
                      <p>(V5-07/02/2024) </p>
                    </div>
                  </div>
                </div>
              </figcaption>
            </li>
            <li class="card card-inverse overlay overlay-hover">
              <img class="card-img overlay-scale overlay-figure" src="../../assets/images/qsomos/oestrategicos.jpg" alt="...">
              <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
                <div class="vertical-align-middle ppn-1">
                  <h3 class="card-title mb-20"> Objetivos estratégicos <br> <small>(V5-07/02/2024) </small></h3>


                </div>
              </div>
              <figcaption class="overlay-panel overlay-background overlay-slide-top" style="background-color: rgba(0,80,151,0.8);">
                <div class="h-300" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <div class="row ml-0">
                        <div class="btns-mines-f">
                          <a class="btn-a objetivos-1 mines-black">
                            <p> </p>
                          </a>
                          <a class="btn-a mines-bg-3 mines-white" data-toggle="modal" data-target="#procesos_empre">
                            <p> Procesos empresariales </p>
                          </a>
                          <a class="btn-a mines-bg-3 mines-white" data-toggle="modal" data-target="#procesos">
                            <p> Sostenibilidad </p>
                          </a>
                          <a class="btn-a mines-bg-6 mines-white" data-toggle="modal" data-target="#clientes">
                            <p> Clientes y mercado</p>
                          </a>
                        </div>
                      </div>
                      <div class="row ml-50 mt--20">
                        <div class="btns-mines-f ml-10">
                          <a class="btn-a mines-bg-5 mines-white" data-toggle="modal" data-target="#infra">
                            <p> Tecnología</p>
                          </a>
                          <a class="btn-a mines-bg-4 mines-white" data-toggle="modal" data-target="#financiero">
                            <p>Financiera y administrativa</p>
                          </a>
                          <a class="btn-a objetivos-9 mines-white">
                            <p> </p>
                          </a>
                        </div>
                      </div>


                      <div class="row ml-0 mt--20">
                        <div class="btns-mines-f">
                          <a class="btn-a mines-bg-6 mines-white" data-toggle="modal" data-target="#gestion">
                            <p> Gestión integral </p>
                          </a>
                          <a class="btn-a objetivos-8 mines-white">
                            <p> </p>
                          </a>
                          <a class="btn-a mines-bg-2 mines-white" data-toggle="modal" data-target="#talento">
                            <p> Talento humano </p>
                          </a>
                          <a class="btn-a mines-bg-3 mines-white" style="font-size: 10px;" data-toggle="modal" data-target="#innova">
                            <p style="border-bottom: 0px;">Innovación y gestión del conocimiento</p>
                          </a>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </figcaption>
            </li>


            <li class="card card-inverse overlay overlay-hover">
              <img class="card-img overlay-scale overlay-figure" src="../../assets/images/qsomos/organigrama.jpg" alt="...">
              <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
                <div class="vertical-align-middle ppn-1">
                  <h3 class="card-title mb-20"> Organigrama </h3>
                </div>
              </div>
              <figcaption class="overlay-panel overlay-background overlay-fade" style="background-color: rgba(0,80,151,0.8);">
                <h3> Organigrama </h3>
                <div class="h-300" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <p style="text-align: justify; font-size: 30px" class="mt-35 pl-35 ml-35 pr--35 pt-35" data-toggle="modal" data-target="#organigrama"> ¡Échale un vistazo! <i class="icon wb-search" id="mines-button"></i> </p>
                    </div>
                  </div>
                </div>
              </figcaption>
            </li>


            <!-- <li class="card card-inverse overlay overlay-hover">
              <img class="card-img overlay-scale overlay-figure" src="../../assets/images/qsomos/politicas.jpg" alt="...">
              <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
                <div class="vertical-align-middle ppn-1">
                  <h3 class="card-title mb-20"> Despliegue de la política de la gestión </h3>
                </div>
              </div>
              <figcaption class="overlay-panel overlay-background overlay-slide-top" style="background-color: rgba(0,80,151,0.8);">
                <h3> Despliegue de la política de la gestión </h3>
                <div class="h-300" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <p style="text-align: justify;" class="mt-20">
                        - Cumplimos las leyes y actuamos éticamente, siempre.<br>
                        - Respetamos profundamente a todas las personas. <br>
                        - Estamos comprometidos, con sentido de responsabilidad social, con políticas como la flexibilización laboral, el teletrabajo y la contratación de personas vulnerables o que estén en la fase final de su ciclo laboral.<br>
                        - Diseñamos y ejecutamos un Plan de Beneficios Especiales para el trabajador, que apunta al reconocimiento del logro y a armonizar su vida laboral con su vida personal y familiar. <br>
                        - Promovemos la salud y el bienestar de los trabajadores y de sus familias, y la prevención de las enfermedades laborales, de los accidentes de trabajo y del daño a la propiedad.


                        <br>
                        - Identificamos, prevenimos, minimizamos su impacto o eliminamos los riesgos en nuestra gestión, y los transformamos en oportunidades que aseguren la continuidad del negocio.

                        <br>
                        - Diseñamos y ejecutamos políticas específicas para eliminar de raíz cualquier acto de corrupción.

                        <br>
                        - Manejamos en forma segura y mediante la gestión del riesgo específico, la información, en especial la de los clientes, para garantizar su confidencialidad, integridad y disponibilidad.
                        <br>
                        - Gestionamos y minimizamos el impacto socioambiental de nuestra operación corporativa, con el animo de alcanzar y mantener la meta de ser una empresa carbono neutral.
                        <br>
                        - Mantenemos y mejoramos continuamente la calidad de nuestra gestión, así como nuestros logros en transparencia corporativa, calidad de vida y felicidad de nuestros trabajadores, seguridad y salud en el trabajo, cuidado del medio ambiente y seguridad de la información. <br>


                        (V4-04/02/2022)

                      </p>
                      <p> <br><br><br> </p>
                    </div>
                  </div>
                </div>
              </figcaption>
            </li> -->
            <li class="card card-inverse overlay overlay-hover">
              <img class="card-img overlay-scale overlay-figure" src="../../assets/images/qsomos/procesos.jpg" alt="...">
              <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
                <div class="vertical-align-middle ppn-1">
                  <h3 class="card-title mb-20"> Mapa de procesos </h3>
                </div>
              </div>
              <figcaption class="overlay-panel overlay-background overlay-fade" style="background-color: rgba(0,80,151,0.8);">
                <h3> Mapa de procesos </h3>
                <div class="h-300" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <p style="text-align: justify; font-size: 30px" class="mt-35 pl-35 ml-35 pr--35 pt-35" data-toggle="modal" data-target="#Modalprocesos"> ¡Échale un vistazo! <i class="icon wb-search" id="mines-button"></i> </p>
                    </div>
                  </div>
                </div>
              </figcaption>
            </li>
            <li class="card card-inverse overlay overlay-hover">
              <img class="card-img overlay-scale overlay-figure" src="../../assets/images/qsomos/portafolio.jpg" alt="...">
              <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
                <div class="vertical-align-middle ppn-1">
                  <h3 class="card-title mb-20"> Portafolio de servicios </h3>
                </div>
              </div>
              <figcaption class="overlay-panel overlay-background overlay-fade" style="background-color: rgba(0,80,151,0.8);">
                <h3> Portafolio de servicios </h3>
                <div class="h-300" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <p style="text-align: justify; font-size: 30px" class="mt-35 pl-35 ml-35 pr--35 pt-35" data-toggle="modal" data-target="#Modalpor"> ¡Échale un vistazo! <i class="icon wb-search" id="mines-button"></i> </p>
                    </div>
                  </div>
                </div>
              </figcaption>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Modals // Ventanas Emergentes -->
  <!-- Modal Objetivos Corporativos -->
  <div class="modal fade modal-fade-in-scale-up" id="modalOC" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal"><i class="icon wb-close btn btn-outline btn-round btn-dark"></i></button>
        </div>
        <div class="modal-body">
          <img src="../../assets/images/qsomos/imgOC.png" style="max-width: 100%;" alt="Cargando..." id="orgDAS">
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>
  <!-- Modal Objetivos estrategicos -->
  <!-- Modal procesos -->

  <!--           <div class="modal fade modal-fade-in-scale-up" id="procesos" tabindex="-1" role="dialog" aria-labelledby="eticaTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
            <h3 class="modal-title" id="eticaTitle">PERSPECTIVA PROCESOS:</h3>
          </div>
          <div class="modal-body" style="padding-top: 0px;">
            <div class="row" align="center" style="padding-top: 0;">
              <img class="img-rounded" src="../../assets/images/qsomos/procesos_empresa.jpg" style="max-width: 100%"  id="mines-img-md">
            </div>
            <div class="row">
              <p align="center" style="color: black; padding-top: 20px;">
                <ol style="color: black; font-size: 16px;padding-right: 10px;">
                  <li>Incrementar la eficiencia de los procesos.</li>
                  <li>Fortalecer la interacción colaborativa en la Empresa.</li>
                </ol>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Modal procesos empre -->
    <div class="modal fade modal-fade-in-scale-up" id="procesos_empre" tabindex="-1" role="dialog" aria-labelledby="eticaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
          <h3 class="modal-title" id="eticaTitle">PROCESOS EMPRESARIALES
          </h3>
        </div>
        <div class="modal-body" style="padding-top: 0px;">
          <div class="row" align="center" style="padding-top: 0;">
            <img class="img-rounded" src="../../assets/images/qsomos/procesos_empresa.jpg" style="max-width: 100%" id="mines-img-md">
          </div>
          <div class="row">
            <p align="center" style="color: black; padding-top: 20px;">
            <ol style="color: black; font-size: 16px;padding-right: 10px;">
              <li>1. Implantar un sistema de monitoreo estructurado, automático y periódico, relativo a los compromisos contractuales: servicios incluidos y excluidos y acuerdos de nivel de servicio.</li>
              <li>2. Reducir el desperdicio en los procesos corporativos y, en general, aumentar la eficiencia en la gestión de la Empresa. </li>
              <li>3. Fortalecer las competencias técnicas y humanas de los trabajadores y apropiar el conocimiento que se deriva de nuevas experiencias.</li>
            </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal sostenibilidad -->
  <div class="modal fade modal-fade-in-scale-up" id="procesos" tabindex="-1" role="dialog" aria-labelledby="eticaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
          <h3 class="modal-title" id="eticaTitle">SOSTENIBILIDAD
          </h3>
        </div>
        <div class="modal-body" style="padding-top: 0px;">
          <div class="row" align="center" style="padding-top: 0;">
            <img class="img-rounded" src="../../assets/images/qsomos/procesos_empresa.jpg" style="max-width: 100%" id="mines-img-md">
          </div>
          <div class="row">
            <p align="center" style="color: black; padding-top: 20px;">
            <ol style="color: black; font-size: 16px;padding-right: 10px;">
              <li>1. Impulsar el bienestar y la felicidad de los trabajadores y aportar al progreso de grupos vulnerables. </li>
              <li>2. Avanzar en la meta de ser una empresa carbono-neutral y aportar para que los grupos de interés ejecuten acciones de conservación del medio ambiente</li>
            </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal clientes -->
  <div class="modal fade modal-fade-in-scale-up" id="clientes" tabindex="-1" role="dialog" aria-labelledby="eticaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
          <h3 class="modal-title" id="eticaTitle">CLIENTES Y MERCADO</h3>
        </div>
        <div class="modal-body">
          <div class="row col-md-12">
            <img class="col-md-12" src="../../assets/images/qsomos/mercadeo.jpg">
          </div>
          <div class="row">
            <p align="center" style="color: black; padding-top: 20px;">
            <ol style="color: black; font-size: 16px;padding-right: 10px;">
              <li>1. Abrir negocios en nuevos mercados e incrementar las ventas de la Empresa.</li>
              <li>2. Aumentar la fidelidad de nuestros clientes.</li>
            </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal infra estructura y tencológia-->
  <div class="modal fade modal-fade-in-scale-up" id="infra" tabindex="-1" role="dialog" aria-labelledby="eticaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
          <h3 class="modal-title" id="eticaTitle">TECNOLOGÍA</h3>
        </div>
        <div class="modal-body" style="padding-top: 0px;">
          <div class="row" align="center" style="padding-top: 0;">
            <img class="img-rounded" src="../../assets/images/qsomos/infraestructura.jpg" height="300" width="550" id="mines-img-md">
          </div>
          <div class="row">
            <p align="center" style="color: black; padding-top: 20px;">
            <ol style="color: black; font-size: 16px;padding-right: 10px;">
              <li>1. Implantar un sistema de gobernanza y gestión de la tecnología.</li>
              <li>2. Acelerar la transformación digital de la Empresa a tono con la mejor tecnología aplicable.</li>
            </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal financiero -->
  <div class="modal fade modal-fade-in-scale-up" id="financiero" tabindex="-1" role="dialog" aria-labelledby="eticaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
          <h3 class="modal-title" id="eticaTitle">FINANCIERA Y ADMINISTRATIVA</h3>
        </div>
        <div class="modal-body" style="padding-top: 0px;">
          <div class="row" align="center" style="padding-top: 0;">
            <img class="img-rounded col-md-12" src="../../assets/images/qsomos/financierop.jpg" id="mines-img-md">
          </div>
          <div class="row">
            <p align="center" style="color: black; padding-top: 20px;">
            <ol style="color: black; font-size: 16px;padding-right: 10px;">
              <li>1. Alcanzar los objetivos corporativos en el aspecto financiero con base, entre otras cosas, en la planificación financiera de corto y mediano plazo en los niveles operativo, táctico y estratégico</li>
            </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal gestion -->
  <div class="modal fade modal-fade-in-scale-up" id="gestion" tabindex="-1" role="dialog" aria-labelledby="eticaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
          <h3 class="modal-title" id="eticaTitle">GESTIÓN INTEGRAL</h3>
        </div>
        <div class="modal-body" style="padding-top: 0px;">
          <div class="row" align="center" style="padding-top: 0;">
            <img class="img-rounded col-md-12" src="../../assets/images/qsomos/gestion.jpg" id="mines-img-md">
          </div>
          <div class="row">
            <p style="color: black; padding-top: 20px;">
            <ol style="color: black; font-size: 16px; text-align: justify;padding-right: 10px;">
              <li>1. Fortalecer la gestión integral de los riesgos asociados a los procesos de la Empresa.</li>
              <li>2. Garantizar la confidencialidad, privacidad, integridad y disponibilidad de la información.</li>
            </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Talento -->
  <div class="modal fade modal-fade-in-scale-up" id="talento" tabindex="-1" role="dialog" aria-labelledby="eticaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
          <h3 class="modal-title" id="eticaTitle">TALENTO HUMANO</h3>
        </div>
        <div class="modal-body" style="padding-top: 0px;">
          <div class="row" align="center" style="padding-top: 0;">
            <img class="img-rounded col-md-12" src="../../assets/images/qsomos/talhum.jpg" id="mines-img-md">
          </div>
          <div class="row">
            <p style="color: black; padding-top: 20px;">
            <ol style="color: black; font-size: 16px; text-align: justify;padding-right: 10px;">
              <li>1. Avanzar en la transformación de la cultura organizacional en línea con los valores corporativos y con los retos de los cambios constantes en el entorno.</li>
              <li>2. Retener a los mejores empleados.</li>
            </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Innovacion y gestion del conocimiento -->
  <div class="modal fade modal-fade-in-scale-up" id="innova" tabindex="-1" role="dialog" aria-labelledby="eticaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
          <h4 class="modal-title" id="eticaTitle">INNOVACIÓN Y GESTIÓN DEL CONOCIMIENTO
          </h4>
        </div>
        <div class="modal-body" style="padding-top: 0px;">
          <div class="row" align="center" style="padding-top: 0;">
            <img src="../../assets/images/qsomos/innova.jpg" class="col-md-12">
          </div>
          <div class="row">
            <p style="color: black; padding-top: 20px;">
            <ol style="color: black; font-size: 16px; text-align: justify;padding-right: 10px;">
              <li>1. Nuevos productos y servicios.</li>
              <li>2. Fortalecer el aprendizaje corporativo a partir del saber acumulado de la Empresa y del de sus integrantes.</li>
              <li>3. Mejorar la producción, la productividad y la calidad de los servicios y de los procesos administrativos mediante la implantación de técnicas innovadoras.</li>
            </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Organigrama -->


  <div class="modal fade modal-fade-in-scale-up" id="organigrama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title col-sm-11 text-center" id="exampleModalLabel" style="font-family: georgia,serif;">Organigrama</h1>
          <button class="btn btn-outline btn-dark col-sm-1" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
          <iframe src="../../assets/images/qsomos/1.1.4 OrganigramaV17_Parte2.pdf" style="width:100%; height:60vh;" frameborder="0"></iframe>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Mapa de procesos  -->
  <div class="modal fade modal-fade-in-scale-up" id="Modalprocesos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title col-sm-11 text-center" id="exampleModalLabel" style="font-family: georgia,serif;">Mapa de procesos</h1>
          <button class="btn btn-outline btn-dark col-sm-1" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
          <img src="../../assets/images/qsomos/mapa_procesos_2024.png" class="col-md-12">
        </div>
      </div>
    </div>
  </div>
  <!-- Modal portafolio -->
  <div class="modal fade modal-fade-in-scale-up" id="Modalpor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="btn btn-outline btn-dark col-sm-1" data-dismiss="modal">X</button>
        </div>

        <body>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <center><iframe id="pdff" src="../../DOCUMENTOS/DELTAASALUD/GESTION DEL TALENTO HUMANO/Normas/PORTAFOLIO DE SERVICIOS 2024.pdf" style=" width:800px; height:500px" frameborder="0"></iframe></center>
          </div>
        </body>
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
  <script>
    Config.set('assets', '../../assets');
  </script>

  <!-- Page -->
  <script src="../../assets/js/Site.js"></script>
  <script src="../../global/js/Plugin/asscrollable.js"></script>
  <script src="../../global/js/Plugin/slidepanel.js"></script>
  <script src="../../global/js/Plugin/switchery.js"></script>
  <!-- InstanceBeginEditable name="JS" -->
  <!-- InstanceEndEditable -->
  <script src="../../controller/notifications/notify.js"></script>
  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>
</body>
<!-- InstanceEnd -->

</html>