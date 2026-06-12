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
  }else{}
?>
  <body class="animsition page-forgot-password layout-full">
    <input type="hidden" id="btn_change" disabled>
    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <h2> ¿Olvido su contraseña? </h2>
        <p> Registre sus datos para gestionar el cambio de contraseña </p>
        <form method="post" id="a">
            <div class="form-group">
                <label for="us"> Usuario </label>
                <input type="text" name="us" id="us" class="form-control" placeholder=" Usuario " required>
            </div>
            <div class="form-group">
                <label for="td"> Tipo de documento </label>
                <select name="td" id="td" class="form-control" required>
                    <option value=""> -- Seleccione... </option>
                    <option value="1"> Cédula de ciudadanía </option>
                    <option value="2"> Documento de identidad </option>
                    <option value="3"> Cédula de extranjería </option>
                </select>
            </div>
            <div class="form-group">
                <label for="nd"> Número de documento</label>
                <input type="text" maxlength="15" class="form-control" id="nd" name="nd" placeholder=" Su documento ">
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary btn-block" id="btn_forgot_pswd"> Cambiar contraseña </button>
            </div>
            <div class="form-group text-right">
                <a href="../" class=""> Iniciar sesión </a>
            </div>
        </form>
        <footer class="page-copyright">
          <p>WEBSITE BY <a href="https://bit.ly/33oXNTG"> Delta A Salud S.A.S </a> </p>
          <p>© 2019. All RIGHT RESERVED.</p>
        </footer>
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
