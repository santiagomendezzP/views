

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




<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Encuesta semana codid 19</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
  <div class="contenedor">
    <h2>REGISTRO DE TOMA DIARIA DE TEMPERATURA CORPORAL Y SEGUIMIENTO A SÍNTOMAS DE SALUD</h2>

    <h2>Estamos interesados en su bienestar, por ello, hemos adoptado todas las medidas posibles
para evitar la expansión del Covid-19. Lo invitamos a registrar diariamente su temperatura corporal al inicio y al final de su jornada laboral, también si presento cambios en su estado de salud.</h2>

    <form action="inserta_diario_f.php" method="post">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--       <script type="text/javascript">
        
$(function(){
$(".op").click(function(){
  if($(this).val()=='SI') {
  $("#conoce_no").removeAttr('readonly');
   $("#conoce_no").focus();
  } else{

   $("#conoce_no").attr('readonly','readonly');
   }
  })
})

      </script> -->




       <div class="form-group">
           <p> Registre su temperatura al finalizar su jornada de trabajo *</p>
 <input type="text"    name="jornada"  value="Finalizar jornada" hidden= "true" class="form-control">
   

         <br>
           <input type="number"   step="0.001" name="temperatura_fin"  value="SI CONOCE" class="form-control">
<!-- 
 <textarea  name="conoce_no"  placeholder="Escriba aqui.." class="form-control" ></textarea> -->
 <br>
     </div>





 <!--     <div class="form-group">
           <p>Registre su temperatura al finalizar su jornada de trabajo *</p>

                   <input type="text" name="alguien_no" id="alguien_no"    value="NO HE TENIDO CONTACTO CON NADIE QUE TENGOA COVID 19"  class="form-control">
 -->
<!-- 
           <textarea  name="alguien_no"   placeholder="Escriba aqui.."  class="form-control" ></textarea>
 -->

<!--      </div> -->

    
         <table class="grupo" style="border: hidden">
  <tr>
    <td style="border: hidden">
   <p>Estimado trabajador, por favor indique, si la información que suministro en el "Cuestionario informativo para seguimiento a la salud de los trabajadores en el marco de la contingencia por el Covid 19" diligenciado por usted el primer día hábil de la semana, ha cambiado o continúa siendo el misma.</p>
    </td>

  <td>
       <div class="form-group">
       
       
         HA CAMBIADO  <input type="radio" name="salud_cambio" value="La condicion de salud cambio" id="mostrar"  required>
            
          SIGUE SIENDO LA MISMA  <input type="radio" name="salud_cambio" value="sigue siendo la misma" id="ocultar"  required> 
          </div> 
    </td>

  </tr>
</table>
     


<style>
#tabla{

   display:none

}
</style>

<script>
$('#mostrar').click(function(){
    $('#tabla').show(1000);
});
</script>


<script>
$('#ocultar').click(function(){
     $('#tabla').hide(1000);
});
</script>

<div id="tabla">


         <div class="form-group">
             

      <p>Si su repuesta es, que la condición de salud cambio, Especifique los síntomas que presenta actualmente *</p>
</div>

<table class="24" >


  <tr>

    <td>         <p>Tos seca y persistente</p></td>

    <td style="background-color:white">
      <div class="form-group">
  

             SI <input type="radio" name="tos" value="SI"required>
            
             NO <input type="radio" name="tos" value="NO"  required  checked> 
              
        <br> 
     </div></td>

  </tr>

<!--   <tr>

    <td>         <p> Fiebre alta (38° o más – según Res. 0666 /24/04/2020)</p></td>

    <td style="background-color:white" >
      <div class="form-group">
  

             SI <input type="radio" name="fiebre" value="SI"required>
            
             NO <input type="radio" name="fiebre" value="NO" required> 
              
        <br> 
     </div></td>

  </tr> -->

   <tr>

    <td> <p>Dificultad para respirar de inicio reciente</p></td>

    <td style="background-color:white"><div class="form-group">
  

            SI  <input type="radio" name="d_respirar" value="SI"required>
            
             NO <input type="radio" name="d_respirar" value="NO" required checked> 
              
        <br> 
     </div></td>

  </tr>



<tr>

    <td> <p>Fatiga</p></td>

    <td style="background-color:white">     <div class="form-group">
   

            SI  <input type="radio" name="fatiga" value="SI"required>
            
             NO <input type="radio" name="fatiga" value="NO" required checked> 
              
        <br> 
     </div></td>

  </tr>


  <tr>

    <td > <p>Dolor de garganta</p></td>

    <td style="background-color:white">           
 <div class="form-group">


             SI  <input type="radio" name="dolor_g" value="SI"required>
            
             NO <input type="radio" name="dolor_g" value="NO" required checked> 
              
        <br> 
  

         </div>
   </td>

</tr>


  <tr>

    <td> <p>Malestar general o escalofríos que limiten las actividades de la vida diaria</p></td>

    <td style="background-color:white">           
    <div class="form-group">
         

            SI  <input type="radio" name="malestar" value="SI"required>
            
             NO <input type="radio" name="malestar" value="NO" required checked> 
              
        <br> 
     </div>
   </td>

</tr>


  <tr>

    <td > <p>Secreción nasal o congestión, no relacionada con procesos alérgico</p></td>

    <td style="background-color:white">           
 <div class="form-group">


            SI  <input type="radio" name="secreciones" value="SI"required>
            
             NO <input type="radio" name="secreciones" value="NO" required checked> 
              
        <br> 
  

         </div>
   </td>

</tr>


<tr>

    <td > <p>Pérdida del olfato y/o gusto  </p></td>

    <td style="background-color:white">           
 <div class="form-group">


            SI  <input type="radio" name="olfato" value="SI"required>
            
             NO <input type="radio" name="olfato" value="NO" required checked> 
              
        <br> 
  

         </div>
   </td>

</tr>

</table>
     <br>
<p>Si el resultado de la toma de su temperatura es mas de 37.5°C, presenta algún síntoma o tiene alguna condición que pueda afectar su salud por un posible contagio de COVID-19 , por favor comuníquese de manera inmediata con su EPS o en la línea 123, reporte en la aplicación CoronAPP y a su vez al jefe inmediato.</p>

<br>
           

<br>
</div>
      <div class="btn__group">
        <a href="test_covid_diario_f.php" class="btn btn__danger">Cancelar</a>
       <input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
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
 
    </div>



    <!-- End Page -->
    <!-- InstanceEndEditable -->
    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">© 2021 <a href="https://bit.ly/2OBdVf4"> Delta A Salud S.A.S </a></div>
      <div class="site-footer-right">
        Crafted with effort and dedication <i class="red-600 wb wb-wrench"></i> for <a href="https://bit.ly/2OBdVf4"> Delta A Salud </a> Collaborators.
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
      //End Gallery Script      
    </script>
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