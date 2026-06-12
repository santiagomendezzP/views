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
    <link rel="stylesheet" href="../../global/vendor/summernote/summernote.css">
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
    <div class="page">




  <?php 
    $id = $_SESSION['intranet_id'];
    include("./validaciones.php");
    date_default_timezone_set('America/Bogota');
    $dia = date('D');
     $pru = new validaciones();
    $num = $pru->valida_tabla2($dia,$id);
    echo $num;
    if($num >=1 &&  $_SESSION['intranet_id'] != 738){ ?>

    <?php } else {?> 
    
  
      <!DOCTYPE html>
      <html lang="es">
      <head>
        <meta charset="UTF-8">
        <title>Encuesta semana codid 19</title>
        <link rel="stylesheet" href="css/estilo.css">
      </head>
      <body>
        <div class="contenedor" style="background-color: white; padding: 50px;">
          <h2>Cuestionario informativo para seguimiento a la salud de los trabajadores en el marco de la contingencia por el Covid 19</h2>
          <h2>Interesados en su bienestar, hemos adoptado todas las medidas posibles para evitar la expansión de la epidemia.  Lo invitamos a que responda con toda veracidad y objetividad este breve cuestionario:</h2>
          <form action="inserta_test_semanal.php" method="post">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <div class="form-group">
    <p><font size ="3", color="black"><b>En las últimas 24 horas, ¿ha presentado síntomas asociados a la infección por Covid 19 tales como:</p></b></font>
  </div>
  <table class="24" >
    <tr>
      <td><p><font size ="3", color="black"><b> Tos seca y persistente? </p></b></font>
      </td>
      <td style="background-color:white">
        <div class="form-group">
         SI<input type="radio" name="tos" value="SI" required>
         NO<input type="radio" name="tos" value="NO" required> 
         <br> 
       </div>
     </td>
   </tr>
   <tr>
    <td><p><font size ="3", color="black"><b> Fiebre de más de 37.5°C ?</p></b></font></td>
    <td style="background-color:white">
      <div class="form-group">
       SI<input type="radio" name="fiebre" value="SI"required>
       NO<input type="radio" name="fiebre" value="NO" required> 
       <br> 
     </div>
   </td>
 </tr>
 <tr>
  <td> <p><font size ="3", color="black"><b>Dificultad para respirar de inicio reciente ? </b></font></td>
    <td style="background-color:white"><div class="form-group">
      SI<input type="radio" name="d_respirar" value="SI"required>
      NO<input type="radio" name="d_respirar" value="NO" required> 
      <br> 
    </div>
  </td>
</tr>
<tr>
  <td> <font size ="3", color="black"><b><p>Fatiga?</p></b></font></td>
  <td style="background-color:white">
    <div class="form-group">
      SI<input type="radio" name="fatiga" value="SI"required>
      NO<input type="radio" name="fatiga" value="NO" required> 
      <br> 
    </div>
  </td>
</tr>
<tr>
  <td ><font size ="3", color="black"><b> <p>Dolor de garganta?</p></b></font></td>
  <td style="background-color:white">           
   <div class="form-group">
    SI  <input type="radio" name="dolor_g" value="SI"required>
    NO <input type="radio" name="dolor_g" value="NO" required> 
    <br> 
  </div>
</td>
</tr>
<tr>
  <td> <p><font size ="3", color="black"><b>Malestar general que limite las actividades diarias?  </p></b></font></td>
  <td style="background-color:white">           
    <div class="form-group">
      SI<input type="radio" name="malestar" value="SI"required>
      NO<input type="radio" name="malestar" value="NO" required> 
      <br> 
    </div>
  </td>
</tr>
<tr>
  <td><p><font size ="3", color="black"><b>Secreción nasal o congestión, no relacionada con procesos alérgicos?  </p></b></font></td>
  <td style="background-color:white">           
   <div class="form-group">
    SI<input type="radio" name="secreciones" value="SI"required>
    NO<input type="radio" name="secreciones" value="NO" required> 
    <br> 
  </div>
</td>
</tr>
<tr>
  <td > <p><font size ="3", color="black"><b>Pérdida del olfato o del gusto?  </b></font></p></td>
  <td style="background-color:white">           
   <div class="form-group">
    SI  <input type="radio" name="olfato" value="SI"required>
    NO <input type="radio" name="olfato" value="NO" required> 
    <br> 
  </div>
</td>
</tr>
</table>

<table class="grupo" style="border: hidden">
  <tr>
    <td style="border: hidden">
      <font size ="3", color="black"><b>¿Se encuentra en las instalaciones de la empresa?</b></font>
    </td>
    <td>
     <div class="form-group">
       SI<input type="radio" name="instalaciones" value="Se encuentra en las instalaciones" id="mostrar2"  required>
       NO<input type="radio" name="instalaciones" value="No Se encuentra en las instalaciones" id="ocultar2"  required> 
     </div> 
   </td>
 </tr>
</table>
<table id="tabla2">
  <tr> 
    <td style="border: hidden">
      <h4 style="font-weight: bold; background-color: #c0c0c0;">   
       En su ingreso a las instalaciones de la empresa, usted recibió:
     </h4>
   </td>
 </tr>
 <tr>
  <td style="border: hidden">
    <font size ="3", color ="black"><p> ¿Tapabocas desechable?</p></font>
  </td>
  <td style="border: hidden">
   SI<input type="radio" name="tapa_b" id="tapa_b" value="Si">
   NO<input type="radio" name="tapa_b" id="tapa_b" value="No"> 
   <input type="radio" name="tapa_b" id="tapa_b" value="" style="display: none;" checked required> 
 </td>
</tr>

</table>
<table class="grupo" style="border: hidden">
  <tr>
    <td style="border: hidden">
      <font size ="3", color="black"><b>Frente a su último reporte ¿ha habido algún cambio en la información relativa a su vacunación contra el COVID 19?</b></font>
    </td>
    <td>
     <div class="form-group">
      SI<input type="radio" name="aplicaron_vacuna" id="aplicaron_vacuna" value="SI"  required>
      NO<input type="radio" name="aplicaron_vacuna" id="aplicaron_vacuna" value="NO"  required> 
    </div> 
  </td>  
</tr>
</table>
<div class="respuesta1" style="display: none;">
  <table class="grupo" style="border: hidden">
    <tr>
      <td style="border: hidden">
        <font size ="3", color="black"><strong>Por favor indique su esquema de vacunación según su ultima vacuna:</strong></font>
      </td>
      <td>
       <div class="form-group">
         <select id="dosis_resibidas" name="dosis_resibidas" class="form-control" >
           <option value="0">Seleccione una opción..</option>
           <option value="primera dosis">Primera dosis</option>
           <option value="segunda dosis">Segunda dosis</option>
           <option value="primer refuerzo">Primer refuerzo</option>
           <option value="segundo refuerzo">Segundo refuerzo</option>
         </select>
       </div> 
     </td>  
   </tr>
 </table>
  <div id="primera_dosis">
    <table style="width:100%; color: black;" >
      <thead style="width:100%; color: black;">
      <tr>
        <th><label>Dosis aplicada</label></th>
        <th><label>Nombre vacuna</label></th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width: 400px;">
            <label>Primera dosis</label>
          </td>
          <td style="width: 400px;">
            <select id="nombre_vacuna_1" name="nombre_vacuna_1" class="form-control" >
              <option value="">SELECCIONE</option>
              <option value="Pfizer">Pfizer</option>
              <option value="Sinovac">Sinovac</option>
              <option value="Janssen">Janssen</option>
              <option value="Moderna">Moderna</option>
              <option value="AstraZeneca">AstraZeneca</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div  id="segunda_dosis">
    <table style="width:100%; color: black;" >
      <tbody>
        <tr>
          <td style="width: 400px;">
            <label>Segunda dosis</label>
          </td>
          <td style="width: 400px;">
            <select id="nombre_vacuna_2" name="nombre_vacuna_2" class="form-control" >
              <option value="SELECCIONE">SELECCIONE</option>
              <option value="No aplica">No aplica</option>
              <option value="Pfizer">Pfizer</option>
              <option value="Sinovac">Sinovac</option>
              <option value="Janssen">Janssen</option>
              <option value="Moderna">Moderna</option>
              <option value="AstraZeneca">AstraZeneca</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div  id="primer_refuerzo">
    <table style="width:100%; color: black;" >
      <tbody>
        <tr>
          <td style="width: 400px;">
            <label>Primer refuerzo</label>
          </td>
          <td style="width: 400px;">
            <select id="nombre_vacuna_3" name="nombre_vacuna_3" class="form-control" >
              <option value="">SELECCIONE</option>
              <option value="Pfizer">Pfizer</option>
              <option value="Sinovac">Sinovac</option>
              <option value="Janssen">Janssen</option>
              <option value="Moderna">Moderna</option>
              <option value="AstraZeneca">AstraZeneca</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div  id="segundo_refuerzo">
    <table style="width:100%; color: black;" >
      <tbody>
        <tr>
          <td style="width: 400px;">
            <label>Segundo refuerzo</label>
          </td>
          <td style="width: 400px;">
            <select id="nombre_vacuna_4" name="nombre_vacuna_4" class="form-control" >
              <option value="">SELECCIONE</option>
              <option value="Pfizer">Pfizer</option>
              <option value="Sinovac">Sinovac</option>
              <option value="Janssen">Janssen</option>
              <option value="Moderna">Moderna</option>
              <option value="AstraZeneca">AstraZeneca</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<style>
  #tabla2{

   display:none

 }
 #tabla3{

   display:none

 }
</style>
<script>
$(document).ready(function()
{

  



$("#primera_dosis").css("display", "none");
$("#segunda_dosis").css("display", "none");
$("#primer_refuerzo").css("display", "none");
$("#segundo_refuerzo").css("display", "none");

$("#dosis_resibidas").change(function() {
  const dosis_recibida = $(this).val();
  
  if (dosis_recibida == 'primera dosis') {

    $("#primera_dosis").css("display", "block");
    $("#segunda_dosis").css("display", "none");
    
    $("#primer_refuerzo").css("display", "none");
    $("#segundo_refuerzo").css("display", "none");

  }else if(dosis_recibida == 'segunda dosis') {

    $("#primera_dosis").css("display", "block");
    $("#segunda_dosis").css("display", "block");
    $("#primer_refuerzo").css("display", "none");
    $("#segundo_refuerzo").css("display", "none");

  }else if(dosis_recibida == 'primer refuerzo') {

    $("#primera_dosis").css("display", "block");
    $("#segunda_dosis").css("display", "block");
    $("#primer_refuerzo").css("display", "block");
    $("#segundo_refuerzo").css("display", "none");

  }else if(dosis_recibida == 'segundo refuerzo') {

    $("#primera_dosis").css("display", "block");
    $("#segunda_dosis").css("display", "block");
    $("#primer_refuerzo").css("display", "block");
    $("#segundo_refuerzo").css("display", "block");
    
  }
  
})

$("#nombre_vacuna_1").change(function() {
  const nombre_dosis = $("#nombre_vacuna_1").val();
  if (nombre_dosis == "Janssen"){
    $("#nombre_vacuna_2").val("No aplica");
  }else{
    $("#nombre_vacuna_2").val("SELECCIONE");
  }
});

  $("#respuesta_riesgo").css("display","none")
  $("#repuesta_otro").css("display","none");


  $('[name="aplicaron_vacuna"]').click(function () {
    const aplicaron_vacuna = $(this).val()
    const dispuesto_aplicarse = $("#dispuesto_aplicarse").val();
    if (aplicaron_vacuna == 'SI') {
      $(".respuesta1").css("display","contents")
      $(".respuesta2").css("display","none")
      $("#dosis_resibidas").prop("required",true)
      $('[name="dispuesto_aplicarse"]').prop("required",false) 
      $('[name="dispuesto_aplicarse"]').val("No aplica") 
      $(".respuesta4").css("display","none")
      $("#explique_porque").prop("required",false)
    }
  })
  
  $('[name="dispuesto_aplicarse"]').click(function () {
    const dispuesto_aplicarse = $(this).val()

    if (dispuesto_aplicarse == 'NO') {
      $(".respuesta4").css("display","contents")
      $("#explique_porque").prop("required",true)
    }else if(dispuesto_aplicarse == 'SI'){
      $(".respuesta4").css("display","none")
        $("#explique_porque").prop("required",false)
    }
  })
    


  // $( '[name="aplicaron_vacuna"]' ).click(function() {
  //   if(  $('[name="aplicaron_vacuna"]:checked').val() == 'SI'){
  //     $(".respuesta1").css("display","contents")
  //     $(".respuesta2").css("display","none")
  //     $("#dosis_resibidas").prop("required",true)
  //     $('[name="dispuesto_aplicarse"]').prop("required",false) 
  //     $('[name="dispuesto_aplicarse"]').val("No aplica") 
  //   }else if ($('[name="aplicaron_vacuna"]:checked').val() == 'NO'){
  //     $(".respuesta1").css("display","none")
  //     $(".respuesta2").css("display","contents")
  //     $(".respuesta3").css("display","contents")
  //     $("#dosis_resibidas").prop("required",false)
  //     $('[name="dispuesto_aplicarse"]').prop("required",false)
  //     $('[name="dispuesto_aplicarse"]').val() 
      
  //   }
  // });

  $('input:radio[name=grupo_r]').change(function() {
    var valor = $(this).val();
    if (valor == 'SI') {
      $("#respuesta_riesgo").css("display","block")
    }else if(valor == 'NO'){
      $("#respuesta_riesgo").css("display","none")
    }
  });

  $('input:radio[name=otro]').change(function() {
      var valor = $(this).val();
      console.log(valor);
      if (valor == 'SI') {
        $("#repuesta_otro").css("display","block")
      }else if(valor == 'NO'){
        $("#repuesta_otro").css("display","none")
      }
    });

});
</script>

<script>
  $('#mostrar2').click(function(){
    $("#tabla2").show(1000);
  //document.$("#tabla2").innerHTML 

  
});
</script>

<script>
  $('#ocultar2').click(function(){
    $("#tabla2").fadeOut("1000")
    $("#tabla3").fadeOut("200")
  });
</script>

<table id="tabla3">

  <tr>
    <td> 

      SI <input type="radio" name="tapa_b2" value="Si"  >

      NO  <input type="radio" name="tapa_b2" value=""  checked required> 

    </td>
  </tr>

  <tr>

    <td>      
      SI <input type="radio" name="guantes2" value="SI" id="mostrar"  >

      NO  <input type="radio" name="guantes2" value="" id="ocultar" checked  required> 
    </td>          
  </tr>

</table>
<br>

<div class="btn__group">
  <input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
  <a href="test_covid.php" class="btn btn__danger">Cancelar</a>

</div>

<html>
<head>

</head>
<body>

</body>
</html> 
</form>
</div>
</body>
</html>

        <div class="page-aside-switch">




        </div>

      <!-- page-aside-inner -->
   
     
        
          </div>
        </div>
    

<?php }?>
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
    <script>Config.set('assets', '../assets');</script>
    
    <!-- Page -->
    <script src="../../assets/js/Site.js"></script>
    <script src="../../global/js/Plugin/asscrollable.js"></script>
    <script src="../../global/js/Plugin/slidepanel.js"></script>
    <script src="../../global/js/Plugin/switchery.js"></script> 
    <!-- InstanceBeginEditable name="JS" -->
    <!-- Filter Gallery  -->
    <script src="../../global/js/Plugin/filterable.js"></script>
    <script>
      // Start Gallery function script
      (function (global, factory) {
        if (typeof define === "function" && define.amd) {
          define('/pages/gallery', ['jquery', 'Site'], factory);
        } else if (typeof exports !== "undefined") {
          factory(require('jquery'), require('Site'));
        } else {
          var mod = {
            exports: {}
          };
          factory(global.jQuery, global.Site);
          global.pagesGallery = mod.exports;
        }
      })(this, function (_jquery, _Site) {
        'use strict';

        var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

        (0, _jquery2.default)(document).ready(function ($$$1) {
          (0, _Site.run)();

          $$$1('.wb-search').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-fade',
            gallery: {
              enabled: true,
              navigateByImgClick: true,
              preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            }
          });
        });
      });
 