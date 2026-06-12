<!DOCTYPE html>
<html class="no-js css-menubar" lang="es">
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
          </ul>
        </div>
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
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Un paso adelante </span>
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
        </a>
        <a href="../profile/?<?php echo mt_rand(); ?>" class="fold-show" data-placement="top" data-toggle="tooltip" data-original-title=" Perfil ">
          <span class="icon wb-user-circle" aria-hidden="true"></span>
        </a>
        <?php
        /*Crear la conexión*/
        $mysqli = new mysqli('localhost', 'desarrollo_delta', '*Delta2021*', 'intranet');
        /*Usar la conexión para una consulta*/
        $sql = "SELECT * FROM usuario ";
        $resultado = $mysqli->query($sql);
        $sql = "SELECT usuario FROM usuario LIMIT 1";
        if ($resultado = $mysqli->query($sql)) {
          $fila = $resultado->fetch_assoc();
          $c = $_SESSION['intranet_name'];
        ?>
          <a href="../../controller/salida.php?c=$c class=" fold-show" data-placement="top" data-toggle="tooltip" data-original-title="Cerrar sesión">
          <?php
        }
          ?>
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
    <style>
      #content {
        width: 890px;
        height: 890%;
      }

      #left,
      #right {
        width: 50%;
        height: 50%;
      }

      #left {
        float: left;
      }

      #right {
        float: right;
      }

    </style>

    <script>
      $(document).ready(function() {
        $("#mostrarmodal").modal("show");
      });
    </script>
    <?php
    /*Crear la conexión*/
    $mysqli = new mysqli('localhost', 'desarrollo_delta', '*Delta2021*', 'intranet');
    /*Usar la conexión para una consulta*/
    $sql = "SELECT * FROM usuario ";
    $resultado = $mysqli->query($sql);
    $sql = "SELECT usuario FROM usuario LIMIT 1";
    if ($resultado = $mysqli->query($sql)) {
      $fila = $resultado->fetch_assoc();
      $c = $_SESSION['intranet_name'];
    ?>
      <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" style="width: 100%;">
            <a href="modelo/insert.php?c=$c" class="btn btn-primary fas fa-sign-out-alt" style="background: #1779BA; border-color: #1779BA; margin-left: 860px; ">X</a>
            <h1 style="font-family: fantasy;">
              <center>Bienvenidos
            </h1>
            </center>
            <div class="modal-header">
            </div>
            <div class="modal-body">
              <?php
              // Archivo de conexion con la base de datos
              require_once 'edicion_captura/Conexionb.php';
              // Condicional para validar el borrado de la imagen
              if (isset($_GET['delete_id'])) {
                // Selecciona imagen a borrar
                $stmt_select = $DB_con->prepare('SELECT Imagen_Img FROM captura WHERE Imagen_ID =:uid');
                $stmt_select->execute(array(':uid' => $_GET['delete_id']));
                $imgRow = $stmt_select->fetch(PDO::FETCH_ASSOC);
                // Ruta de la imagen

                // Consulta para eliminar el registro de la base de datos
                $stmt_delete = $DB_con->prepare('DELETE FROM captura WHERE Imagen_ID =:uid');
                $stmt_delete->bindParam(':uid', $_GET['delete_id']);
                $stmt_delete->execute();
                // Redireccioa al inicio
              }
              ?>
              <div class="row" align='center'>
                <?php
                $stmt = $DB_con->prepare('SELECT Imagen_ID, Imagen_Marca, Imagen_Tipo, Imagen_Img,link FROM captura ORDER BY Imagen_ID DESC');
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <div class="col-md-6">
                      
                          
                        
                      <a href="<?php echo $row['link']; ?>">
                        <div class="scroll_class" style="overflow-y: scroll;" width="380" height="265">
                          <div>
                            <?php
                            if ( $row['Imagen_Img'] == '4962978.jpg') {
                               ?>
                               <img src="edicion_captura/imagenes/<?php echo $row['Imagen_Img']; ?>" class="img-rounded"  style="width: 70%;"/>
                               <?php
                             } else{
                              ?>
                              <img src="edicion_captura/imagenes/<?php echo $row['Imagen_Img']; ?>" class="img-rounded" style="width: 100%; height: 100%;"/>
                              <?php
                             }
                            ?>
                          </div>
                        </div>
                      </a>
                      <p class="page-header">
                        <?php
                          if ($_SESSION['intranet_usuario'] == 'raul.enciso' || $_SESSION['intranet_usuario'] == 'gabriela.cardozo' || $_SESSION['intranet_usuario'] == 'julio.fuentes' || $_SESSION['intranet_usuario'] == 'maria.alfonso' || $_SESSION['intranet_usuario'] == 'maria.camargo'|| $_SESSION['intranet_usuario'] == 'luisa.rodriguez' || $_SESSION['intranet_usuario'] == 'julian.avila'  || $_SESSION['intranet_usuario'] == 'CLAUDIA.BONILLA') {
                            ?>
                              <a class="btn" style="background-color: #1779BA; color:white;" data-toggle="modal" data-target="#editarCaptura" data-id_imagen='<?php echo $row['Imagen_ID']; ?>' title="click for edit">
                                <span class="glyphicon glyphicon-edit">EDITAR</span>
                              </a>
                            <?php
                          }
                        ?>
                      </p>
                    </div>
                    <?php
                  }
                }else{
                  ?>
                  <div class="col-xs-12">
                    <div class="alert alert-warning"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Datos no encontrados ... </div>
                  </div>
                  <?php
                }
                ?>
              </div>
            
                <a href="modelo/insert_encuesta_diaria.php?c=$c" class="btn btn-primary fas fa-sign-out-alt" style="margin: auto;display: table; background: #1779BA; border-radius: 9px 9px 9px 9px;">Encuesta de Reporte de Condiciones de Salud-Covid 19</a> 
               
              <BR>
              <BR>
            </div>
            <a href="" class="btn btn-primary fas fa-sign-out-alt" style="background:#3498DB;"> TECNOLOGÍA Y DESARROLLO </a>
          </div>
        </div>
      </div>
      </div>
    </div>
    <?php
      /*Usar la propiedad num_rows*/
    }
    /*Cerrar la conexión*/
    $mysqli->close();
    ?>
    <!-- Page Content -->
    <div class="page">
      <div class="page-content p-0">
        <ul class="blocks no-space blocks-100 blocks-xlg-3 blocks-md-2">
          <style>
            .card img {
              min-height: 320px !important;
              max-width: 100% !important;
              max-height: 320px !important
            }

            .ppn-1 {
              color: white;
              text-align: center;
              font-family: Georgia, serif;
              font-weight: bold;
              overflow: hidden;
              transition: all .4s;
              cursor: pointer;
            }

            .ppn-1:hover {
              transform: scale(1.3);
              border: 5px solid rgba(10, 81, 151, .0);
            }
          </style>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/q_somos.jpg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../qsomos/?<?php echo mt_rand(); ?>';">Quiénes Somos</h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/c_vamos.jpg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../gintegral/?<?php echo mt_rand(); ?>';">Cómo vamos</h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/c_planeta.jpg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../ambiental/?<?php echo mt_rand(); ?>';">Cuidamos el planeta</h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/p_sst.jpg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../sst/?<?php echo mt_rand(); ?>';"> Pautas de SST </h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/best_team.jpg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../bteam/?<?php echo mt_rand(); ?>';"> El mejor equipo </h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/t_ti.jpeg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../ti/?<?php echo mt_rand(); ?>';"> Soporte TI </h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/b_carta.jpg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../bfolder/?<?php echo mt_rand(); ?>';"> Bienestar a la carta </h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/our_sede.jpg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../s_admin/?<?php echo mt_rand(); ?>';"> Nuestra sede </h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/paso.jpg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../innovacion/?<?php echo mt_rand(); ?>';"> Un paso adelante </h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/transacciones.jpg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../transacciones/?<?php echo mt_rand(); ?>';"> Mis transacciones </h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
          <li class="card card-inverse overlay overlay-hover">
            <img class="card-img overlay-scale overlay-figure" src="../../assets/images/home/modulointeres.jpg" alt="...">
            <div class="card-img-overlay overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <h3 class="card-title mb-20 ppn-1" onclick="window.location.href='../for_all/?<?php echo mt_rand(); ?>';"> De interés para todos </h3>
                <div class="card-text card-divider">
                  <span></span>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!--EDITAR CAPTURA-->
    <div class="modal fade" id="editarCaptura" tabindex="-1" role="dialog" aria-labelledby="editarCapturaTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editarCapturaTitle">EDITAR CAPTURA</h5>
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
      $(document).ready(function() {
        $("body").addClass("page-gallery-grid");
      });
    </script>
    <script>
      $('#editarCaptura').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_imagen = button.data('id_imagen')
        $(".id_imagen_campo").val(id_imagen); +
        $.post("./edicion_captura/EditarImagen.php", {
          id_imagen: id_imagen
        }, function(data) {
          $(".ver").html(data);
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
    <script src="../../global/js/Plugin/matchheight.js"></script>
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
</html>