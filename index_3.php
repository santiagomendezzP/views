<!DOCTYPE html>
<html class="no-js css-menubar" lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> INTRANET </title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../global/css/bootstrap.min.css">
    <link rel="stylesheet" href="../global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="../assets/css/site.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="../global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../assets/css/login.min.css">
    <link rel="stylesheet" href="../global/vendor/toastr/toastr.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="../global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="../assets/css/sweetalert.map.css">
    <!-- Scripts -->
    <script src="../global/vendor/jquery/jquery.js"></script>
    <script src="../global/vendor/breakpoints/breakpoints.js"></script>
    <script src="../assets/js/sweetalert.map.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
<?php
  session_start();
  if (isset($_SESSION['loggedin_intranet'])) {
    if ($_SESSION['loggedin_intranet'] === true){
      header("location:../views/home/captura.php?".password_hash('hash(0,0)',PASSWORD_DEFAULT)."=".mt_rand());
    }else if ($_SESSION['loggedin_intranet'] === false){
      header('location:change_pswd.php');
    }else { session_unset(); session_destroy();}
  }else{}
?>
  <body class="animsition page-login-v2 layout-full page-dark">
    <input type="hidden" id="btn_change" disabled>
    <style>
      body {
        background: transparent;
      }
    </style>
    <!-- Page -->
    <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <div class="page-content">
        <div class="page-brand-info">
          <div class="brand">
            <!-- <img class="brand-img" src="" alt="..."> -->
     <!--        <h2 class="brand-text font-size-40"> delta a salud s.a.s </h2> -->
          </div>
        <!--   <p class="font-size-20">"ÉTICA, CALIDAD Y SERVICIO"</p> -->
        </div>
        <div class="page-login-main animation-slide-right animation-duration-1">
          <div class="brand hidden-md-up">
            <img class="brand-img" src="" alt="...">
            <h3 class="brand-text font-size-40">Delta A Salud</h3>
          </div>
          <center class="font-size-24"><img src="../assets/images/logo.png" srcset="../assets/images/logo.png" width="250" height="150" alt="Cargando..."></center>
          <form method="post" id="a">
            <div class="form-group">
              <label class="sr-only"> Usuario </label>
              <input type="text" class="form-control" name="u" placeholder=" Usuario " autocomplete="username" required>
            </div>
            <div class="form-group">
              <label class="sr-only"> Contraseña </label>
              <input type="password" class="form-control" name="p" placeholder=" Contraseña " autocomplete="current-password" required>
            </div>
            <div class="form-group clearfix">
              <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
                <input type="checkbox" id="rememberMe" name="rememberMe">
                <label for="rememberMe">Recordar contraseña</label>
              </div>
              <a class="float-right" href="forgot_pswd.php">¿Olvido su contraseña?</a>
            </div>
            <button type="submit" class="btn btn-primary btn-block"> Ingresar </button>
          </form>
          <p>No se ha registrado? <a href="javascript:void(0);"> Registrese aquí </a></p>

          <br>

          <center class="font-size-12"><img src="../assets/images/login.gif" srcset="../assets/images/login.gif" width="250" height="160" alt="Cargando...">
       
              <button type="button" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#crearmodal"><i class="fas fa-plus-square"></i>Conoce más ></button></center>

  

          <br>
          <footer class="page-copyright">
            <p> Sitio web <a href="https://deltaasalud.com.co/" target="_blank"> Delta A Salud S.A.S </a> </p>
            <p>© 2020.Todos los derechos reservados.</p>
          </footer>
        </div>


      </div>
    </div>


<script type="text/javascript">
  
  $( document ).ready(function() {
    $('#myModal').modal('toggle')
});
</script>


        <div class="text-center">
            <a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Login Modal</a>
        </div>   

        <!-- Modal HTML -->
        <div id="myModal" class="modal fade">
          <div class="modal-dialog modal-login">
            <div class="modal-content">
              <div class="modal-header">
                  <CENTER><h3 class="modal-title">Descubre por qué #SomosDiferentes</h3></CENTER>
                  <button type="button"  class="btn btn-danger fas fa-sign-out-alt"class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <video id="player" class="w-full" poster="por_qué_somos.png" playsinline controls crossorigin>
                  <source type="video/mp4" src="DAS_comp.mp4">
                </video>
              </div>
              <a href="" class="btn btn-info fas fa-sign-out-alt"> DESARROLLO Y TECNOLOGÍA </a>
            </div>
          </div>
        </div>

<!--  ============= MODAL PARA CREAR UN NUEVO ----------->

<div class="modal fade bd-example-modal-lg" id="crearmodal" tabindex="-1" role="dialog" aria-labelledby="crearmodalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearmodalTitle">Tutoriales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <h1> ¿Cómo navegar en Intranet?</h1>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-plugin="plyr">
  <video id="player" class="w-full" poster="../imagenes_videos/imagenes/LOGIN/tutorial.png" playsinline controls crossorigin>
    <!-- Video Files -->
    <source type="video/mp4" src="../imagenes_videos/videos/LOGIN/como_navegar.mp4">
    <!-- <source type="video/webm" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.webm"> -->
    <!-- Text Track File -->
  <!--   <track kind="captions" label="English" srclang="en" src="//cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default> -->
    <!-- Fallback For Browsers That Don'T Support The <Video> Element -->
    <a href="https://www.youtube.com/watch?v=yArjtdk_QuA">Download</a>
  </video>
</div>

      <h1> 
    ¿Cómo ingreso a Intranet desde la casa?
</h1>

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-plugin="plyr">
  <video id="player" class="w-full" poster="../imagenes_videos/imagenes/LOGIN/trabajo_casa.png" playsinline controls crossorigin>
    <!-- Video Files -->
     <source type="video/mp4" src="../imagenes_videos/videos/LOGIN/ingreso_intranet.mp4">
    <!-- <source type="video/webm" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.webm"> -->
    <!-- Text Track File -->
  <!--   <track kind="captions" label="English" srclang="en" src="//cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default> -->
    <!-- Fallback For Browsers That Don'T Support The <Video> Element -->
    <a href="https://www.youtube.com/watch?v=yArjtdk_QuA">Download</a>
  </video>
</div>
  <h1> 
    ¿Cómo cambiar la clave para ingresar a Intranet?
</h1>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-plugin="plyr">
  <video id="player" class="w-full" poster="../imagenes_videos/imagenes/LOGIN/cambio_contraseña.png" playsinline controls crossorigin>
    <!-- Video Files -->
    <source type="video/mp4" src="../imagenes_videos/videos/LOGIN/contraseña _intranet.mp4">
    <!-- <source type="video/webm" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.webm"> -->
    <!-- Text Track File -->
  <!--   <track kind="captions" label="English" srclang="en" src="//cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default> -->
    <!-- Fallback For Browsers That Don'T Support The <Video> Element -->
    <a href="https://www.youtube.com/watch?v=yArjtdk_QuA">Download</a>
  </video>

</div>

  </div>
    </div>
  </div>
</div>

    <!-- End Page -->
    <!-- Core  -->
    <script src="../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="../global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="../global/vendor/bootstrap/bootstrap.js"></script>
    <script src="../global/vendor/animsition/animsition.js"></script>
    <script src="../global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <!-- Plugins -->
    <script src="../global/vendor/switchery/switchery.js"></script>
    <script src="../global/vendor/slidepanel/jquery-slidePanel.js"></script>
    <script src="../global/vendor/toastr/toastr.js"></script>
    <!-- Scripts -->
    <script src="../controller/loader.js"></script>
    <script src="../global/js/Component.js"></script>
    <script src="../global/js/Plugin.js"></script>
    <script src="../global/js/Base.js"></script>
    <script src="../global/js/Config.js"></script>
    
    <script src="../assets/js/Section/Menubar.js"></script>
    <script src="../assets/js/Section/GridMenu.js"></script>
    <script src="../assets/js/Section/Sidebar.js"></script>
    <!-- Page -->
    <script src="../assets/js/Site.js"></script>
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
</html>
