<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title> INTRANET </title>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <!-- Custom Css -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="./login_style.css">

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
    <body>
        <?php
        session_start();
        if (isset($_SESSION['loggedin_intranet'])) {
            if ($_SESSION['loggedin_intranet'] === true){
                header("location:../views/home/captura.php?".password_hash('hash(0,0)',PASSWORD_DEFAULT)."=".mt_rand());
            }else if ($_SESSION['loggedin_intranet'] === false){
                header('location:change_pswd.php');
            }else{ 
                session_unset(); session_destroy();}
        }else{

        }
        ?>
        <!---- Z11 RPT ------------------->
        <div class="body">
            <div class="wrapper fadeInDown" >
                <div id="formContent" >
                    <!-- Tabs Titles -->
                    <!-- Image -->
                    <div class="fadeIn first">
                        <img src="../assets/images/logo.png" alt="logo" id="icon" alt="User Icon" />
                    </div>
                    <!-- Login Form -->
                    <form id="a" method="POST">
                        <h5 style="color: black;">INICIAR SESIÓN</h5>
                        <input type="hidden" id="btn_change" disabled>
                        <input type="text" class="fadeIn second" name="u" placeholder="Usuario">
                        <input type="password" class="fadeIn third" name="p" placeholder="Contraseña">
                        <input type="submit" class="fadeIn fourth" value="INGRESAR">
                    </form>
                    <!-- Remind Passowrd -->
                    <div id="formFooter">
                        <a class="underlineHover" href="forgot_pswd.php"><h5>¿Olvido su contraseña?</h5></a><br>
                        <a href="#myModal" class="trigger-btn" data-toggle="modal">Descubre por qué #SomosDiferentes</a>
                    </div>
                </div>
                <br>
               <!--  <center class="font-size-12"><img src="../assets/images/login.gif" width="250" height="160" alt="Cargando...">
                   <input type="button" class="conoce" value="Conoce más" data-toggle="modal" data-target="#crearmodal" style="margin-right: 102px;">-->  
                </center>
                <br>
                <footer class="page-copyright">
                    <blockquote>
                        <a style="color: white;" class="annio">&copy; 2022</a> <a class="delt" href="https://deltaasalud.com.co/" target="_blank" style="color: white;" >Delta A Salud SAS</a>
                        <br>
                        <a style="color: black;">Todos los derechos reservados.</a>
                    </blockquote>
                </footer>
            </div>
        </div>
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#myModal').modal('toggle')
            });
        </script>
        <div class="text-center"></div>
        <!-- Modal HTML -->
        <!-- <div id="myModal" class="modal fade">
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
                    <a href="" class="btn btn-info fas fa-sign-out-alt" style="background-color: #dcdcdc; border-color: white; color:black;"> DESARROLLO Y TECNOLOGÍA </a>
                </div>
            </div>
        </div> -->
        <!--  ============= MODAL ----------->
        <div class="modal fade bd-example-modal-lg" id="crearmodal" tabindex="-1" role="dialog" aria-labelledby="crearmodalTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <CENTER><h3 class="modal-title">TUTORIALES</h3></CENTER>
                        <button type="button"  class="btn btn-danger fas fa-sign-out-alt"class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div style="width:100%; padding:3px;">
                            <h5> ¿Cómo navegar en Intranet?</h5>
                            <div class="col-xs-12 col-md-12 col-lg-12" >
                                <video id="player" class="w-full" poster="../imagenes_videos/imagenes/LOGIN/tutorial.png" playsinline controls crossorigin>
                                    <source type="video/mp4" src="../imagenes_videos/videos/LOGIN/como_navegar.mp4">
                                </video>
                            </div>
                            <h5>¿Cómo ingreso a Intranet desde la casa?</h5>
                            <div class="col-xs-12 col-md-12 col-lg-12" >
                                <video id="player" class="w-full" poster="../imagenes_videos/imagenes/LOGIN/trabajo_casa.png" playsinline controls crossorigin>
                                    <source type="video/mp4" src="../imagenes_videos/videos/LOGIN/ingreso_intranet.mp4">
                                </video>
                            </div>
                            <h5>¿Cómo cambiar la clave para ingresar a Intranet?</h5>
                            <div class="col-xs-12 col-md-12 col-lg-12" >
                                <video id="player" class="w-full" poster="../imagenes_videos/imagenes/LOGIN/cambio_contraseña.png" playsinline controls crossorigin>
                                    <source type="video/mp4" src="../imagenes_videos/videos/LOGIN/contraseña _intranet.mp4">
                                </video>
                            </div>     
                        </div> 
                    </div>
                    <a class="btn btn-info fas fa-sign-out-alt" style="background-color: #dcdcdc; border-color: white; color:black;">DESARROLLO Y TECNOLOGÍA</a>
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
        })
        (document, window, jQuery);
        </script>
    </body>
</html>
