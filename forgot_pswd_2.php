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
    <link rel="stylesheet" href="../assets/css/forgotpassword.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="../global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../global/vendor/toastr/toastr.css">   
    <!-- Fonts -->
    <link rel="stylesheet" href="../global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="../assets/css/sweetalert.map.css">   
    <!-- Scripts -->
    <script src="../global/vendor/jquery/jquery.js"></script>
    <script src="../global/vendor/breakpoints/breakpoints.js"></script>
    <script src="../assets/js/sweetalert.map.js"></script>
    <link rel="stylesheet" href="./login_style_forgot_pswd.css">
    <script>
      Breakpoints();
    </script>
  </head>
  <?php
    session_start();
    if (isset($_SESSION['loggedin_intranet'])) {
      if ($_SESSION['loggedin_intranet'] === true){
        header("location:../views/home/?".password_hash('hash(0,0)',PASSWORD_DEFAULT)."=".mt_rand());
      }else if ($_SESSION['loggedin_intranet'] === false){
        header('location:change_pswd.php');
      }else { session_unset(); session_destroy();}
    }else{
    }
  ?>
  <body class="animsition page-forgot-password layout-full">
    <div class="body">
      <div class="wrapper fadeInDown" >
        <div id="formContent" >
          <!-- Tabs Titles -->
          <div class="fadeIn first">
              <h3>¿Olvido su contraseña?</h3>
              <h4 style="color: #e86303;"><u>Si olvido su contraseña, puede generar otra aquí</u></h4>
          </div>
          <!-- Login Form -->
          <form id="a" method="POST"  novalidate="">
              <input type="hidden" id="btn_change" disabled>
              <div class="form-group">
                  <label for="us"> Usuario </label>
                  <input type="text" name="us" id="us" class="form-control" placeholder=" Usuario " required>
              </div>
              <br>
              <label for="td"> Tipo de documento </label>
              <select name="td" id="td" class="form-control" required >
                  <option value="" selected ><center>Seleccionar documento</center></option>
                  <option value="1"> Cédula de ciudadanía </option>
                  <option value="2"> Tarjeta de identidad </option>
                  <option value="3"> Cédula de extrangeria </option>
              </select>
              <br>
              <label for="nd"> Número de documento </label>
              <input type="number" class="form-control" name="nd" placeholder="Número de documento" id="nd" required autofocus>
          </form>
          <input type="submit" class="fadeIn fourth"  id="btn_forgot_pswd" value="CAMBIAR CONTRASEÑA">
          <br>
          <a class="underlineHover" href="../"><h5>Iniciar sesión</h5></a>
          <footer>
              <blockquote style="background-color: white;">
                  <a style="color: white;" class="annio">&copy; 2021</a> <a class="delt" href="https://deltaasalud.com.co/" target="_blank" style="color: white;" >Delta A Salud SAS</a>
                  <br>
                  <a style="color: black;">Todos los derechos reservados.</a>
              </blockquote>
          </footer>
        </div>
      </div>
    </div>
  </body>
  <!-- End Page -->
  <!-- Core  -->
  <script src="../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
  <script src="../global/vendor/popper-js/umd/popper.min.js"></script>
  <script src="../global/vendor/bootstrap/bootstrap.js"></script>
  <script src="../global/vendor/animsition/animsition.js"></script>
  <script src="../global/vendor/asscrollable/jquery-asScrollable.js"></script>
  
  <!-- Plugins -->
  <script src="../global/vendor/switchery/switchery.js"></script>
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
</html>
