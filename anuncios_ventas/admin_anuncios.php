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
                      <h5> Anuncios y clasificados
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
                      <span class="site-menu-title" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Innovamos para crecer </span>
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
    <script>
      $(document).ready(function(){
        $("#site_anuncios_admin").addClass("active");
      });
    </script>
    <?php
      if (isset($_SESSION['intranet_permitions'])){
        if (!in_array("Noticias",$_SESSION['intranet_permitions'])){
          header('location:../home/?'.mt_rand());
        }else if (in_array("Noticias",$_SESSION['intranet_permitions'])){
          include_once '../../models/anuncios_clasificados/notice.Entity.php';
          include_once '../../models/anuncios_clasificados/notice.Model.php';
          $malo = array("░╠",'<','>','`',"'",'"',"\\");
          $bueno = array("","&lt;","&gt;","&#44;","&#39;","&#34;",'&#92;');
        }else{
          $conexion = false;
          header('location:../home/?'.mt_rand());
        }
      }else{
        $conexion = false;
        header('location:../home/?'.mt_rand());
      }
      $stm = new Notice($conexion);
      $alm = new Notice_;
      $notices_push = array();
    ?>
    <div class="page">
      <div class="page-main">
        <div class="page-header">
          <h1 class="page-title"> Todos los anuncios</h1>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../home/?<?php echo mt_rand(); ?>"> Inicio </a></li>
            <li class="breadcrumb-item active"> Panel de anuncios </li>
          </ol>
          <div class="page-header-actions" style="z-index: 999">
            <div class="btn-group btn-group-xs">
              <ul class="nav nav-tabs nav-tabs-line" role="tablist" id="tablist">
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="left" data-original-title="Todas los anuncios">
                  <a class="active nav-link" href="#a" aria-controls="exampleList" aria-expanded="true" role="tab" data-toggle="tab" id="Todas las noticias"> <i class="fas fa-globe"></i> </a>
                </li>
                <?php foreach ($stm->readCategorias() as $type){
                    echo  "<li class=\"nav-item\" role=\"presentation\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-original-title=\"".htmlentities($type->__GET('tooltip'))."\">
                            <a class=\"nav-link\" href=\"#tablist_in_".$type->__GET('idcategory')."\" aria-controls=\"exampleList\" aria-expanded=\"true\" role=\"tab\" data-toggle=\"tab\" id=\"".htmlentities($type->__GET('tooltip'))."\">
                              <i class=\"".$type->__GET('icon')."\" ></i>
                            </a>
                          </li>";
                    array_push($notices_push,$type->__GET('idcategory'));
                  } ?>
              </ul>
            </div>
            <button type="button" onclick="window.location.reload();" class="btn btn-icon btn-dark btn-outline btn-round btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title=" Actualizar página">
              <i class="icon wb-refresh"></i>
            </button>


            <div class="btn-group btn-group-sm" aria-label="Button group with nested dropdown" role="group">
              <div class="btn-group btn-group-sm" role="group" data-toggle="tooltip" data-placement="left" data-original-title=" Opciones ">
                <button type="button" class="btn btn-dark btn-outline dropdown-toggle" id="moreOptions" data-toggle="dropdown" aria-expanded="false">
                  <i class="icon wb-grid-9"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right animate" aria-labelledby="moreOptions" role="menu">
                  <?php if ($_SESSION['intranet_perfil'] == 9) { ?>
                  <a class="dropdown-item" role="menuitem" data-toggle="modal" data-target="#modalCreate_Categoria"> Nueva categoría </a>
                  <?php } ?>
                  <a class="dropdown-item" role="menuitem" data-toggle="modal" data-target="#modalCreate_Noticia"> Nuevo anuncio</a>
                  <div class="dropdown-divider" role="presentation"></div>
                  <a href="javascript:void(0);" class="dropdown-item" onclick="window.location.href='../anuncios_ventas/?<?php echo mt_rand(); ?>';"> Actualizar página </a>
                </div>
              </div>
            </div>


          </div>
        </div>
        <div class="page-content pt-0 pb-0">
          <div class="row" >
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="tab-content">
                <div class="tab-pane active animation-slide-top" id="a" role="tabpanel" >
                  <ul class="blocks blocks-100 blocks-xxl-3 blocks-lg-2 blocks-md-2">
                    <?php foreach ($stm->readNotices() as $all): ?>
                    <li class="masonry-item">
                      <div class="card card-shadow">
                        <div class="card-header cover overlay overlay-hover">
                          <img class="cover-image overlay-figure overlay-scale" src="../../assets/images/anuncios/<?php echo $all->__GET('image'); ?>" alt="...">
                        </div>
                        <div class="card-block">
                          <h3 class="card-title"><?php echo str_replace($malo,$bueno,$all->__GET('title')); ?></h3>
                          <p class="card-text type-link">
                            <small>
                             Publicado por:
                              <a href="javascript:void(0)"> <?php echo str_replace($malo,$bueno,$all->__GET('user')); ?> </a>
                              <a href="javascript:void(0)"> <?php echo str_replace($malo,$bueno,$all->__GET('date')); ?> </a>
                              <a href="javascript:void(0)">
                                <span></span> <!-- Comments --></a>
                            </small>
                          </p>
                          <figcaption class="card-text h-250" style="text-align: justify;" data-plugin="scrollable">
                            <div data-role="container">
                              <div data-role="content">
                                <?php echo $all->__GET('body'); ?>
                              </div>
                            </div>
                          </figcaption>
                        </div>
                        <div class="card-block">
                          <div class="card-actions float-right">
                            <a href="javascript:void(0)">
                              <i class="<?php echo $all->__GET('icon'); ?>" aria-hidden="true"></i>
                              <span><?php echo str_replace($malo,$bueno,$all->__GET('category')); ?></span>
                            </a>
                          </div>
                          <?php if ($_SESSION['intranet_usuario'] == $all->__GET('user')){ ?>
                          <i class="btn btn-outline btn-round btn-primary icon wb-edit" onclick="openEditNotice(`<?php echo $all->__GET('id'); ?>`);"></i>
                          <i class="btn btn-outline btn-round btn-danger icon wb-trash" onclick="deleteNotice(`<?php echo $all->__GET('id'); ?>`);"></i>
                          <?php } ?>
                        </div>
                      </div>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <?php
                if (!empty($notices_push)){
                  foreach ($notices_push as $push_id):
                ?>
                <div class="tab-pane animation-scale-up" id="tablist_in_<?php echo $push_id; ?>" role="tabpanel">
                  <?php if ($_SESSION['intranet_perfil'] == 1){ ?>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
                    <button type="button" class="btn-raised btn btn-success btn-floating btn-xs" onclick="openEditCategoria(`<?php echo $push_id; ?>`);" data-toggle="tooltip" data-placement="left" data-original-title="Editar esta categoría">
                      <i class="front-icon wb-edit animation-scale-up" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn-raised btn btn-danger btn-floating btn-xs" onclick="deleteCategory(`<?php echo $push_id; ?>`);" data-toggle="tooltip" data-placement="left" data-original-title="Eliminar esta categoría">
                      <i class="front-icon wb-trash animation-scale-up" aria-hidden="true"></i>
                    </button>
                  </div>
                  <?php } if (!empty($stm->readNotice($push_id))){ ?>
                  <ul class="blocks blocks-100 blocks-xxl-3 blocks-lg-2 blocks-md-2">
                  <?php foreach ($stm->readNotice($push_id) as $noticia){ ?>
                    <li class="masonry-item">
                      <div class="card card-shadow">
                        <div class="card-header cover cover overlay overlay-hover">
                          <img class="cover-image overlay-figure overlay-scale" src="../../assets/images/anuncios/<?php echo $noticia->__GET('image'); ?>" alt="...">
                        </div>
                        <div class="card-block">
                          <h3 class="card-title"><?php echo str_replace($malo,$bueno,$noticia->__GET('title')); ?></h3>
                          <p class="card-text type-link">
                            <small>
                             Publicado por:
                              <a href="javascript:void(0)"> <?php echo str_replace($malo,$bueno,$noticia->__GET('user')); ?> </a>
                              <a href="javascript:void(0)"> <?php echo str_replace($malo,$bueno,$noticia->__GET('date')); ?> </a>
                              <a href="javascript:void(0)">
                                <span></span> <!-- Comments --></a>
                            </small>
                          </p>
                          <figcaption class="card-text h-250" style="text-align: justify;" >
                            <div data-role="container">
                              <div data-role="content">

                                <?php echo $noticia->__GET('body'); ?>
                              </div>
                            </div>
                          </figcaption>
                        </div>
                        <div class="card-block">
                          <div class="card-actions float-right">
                            <a href="javascript:void(0)">
                              <i class="<?php echo $noticia->__GET('icon'); ?>" aria-hidden="true"></i>
                              <span><?php echo str_replace($malo,$bueno,$noticia->__GET('category')); ?></span>
                            </a>
                          </div>
                          <?php if ($_SESSION['intranet_usuario'] == $noticia->__GET('user')){ ?>
                          <i class="btn btn-outline btn-round btn-primary icon wb-edit" onclick="openEditNotice(`<?php echo $noticia->__GET('id'); ?>`);"></i>
                          <i class="btn btn-outline btn-round btn-danger icon wb-trash" onclick="deleteNotice(`<?php echo $noticia->__GET('id'); ?>`);"></i>
                          <?php } ?>
                        </div>
                      </div>
                    </li>
                  <?php   } ?>
                  </ul>
                  <?php } ?>
                </div>
                <?php endforeach; 
                } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Ventanas Emergentes -->
    <!-- Modals Create -->
    <div class="modal fade modal-super-scaled" id="modalCreate_Categoria">
      <div class="modal-dialog modal-lg modal-center">
        <form class="modal-content formCreate" autocomplete="off">
          <div class="modal-header">
            <button class="close" data-dismiss="modal" type="button"> <i class="btn btn-outline btn-dark btn-round icon wb-close"></i> </button>
            <h1 class="modal-title">Nueva Categoría</h1>
          </div>
          <div class="modal-body">
            <div class="form-row col-xs-6">
              <label> Nombre de la categoría </label>
              <input type="text" name="c" placeholder="Pon aquí el nombre de la categoría" maxlength="40" required class="form-control">
            </div>
            <div class="form-row col-xs-6">
              <label> HTML (Clase) del ícono </label>
              <input type="text" name="i" placeholder='por ejemplo: "icon wb-tag"' class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary btn-left" type="submit"> Agregar categoría </button>
          </div>
        </form>
      </div>
    </div>
    <div class="modal fade modal-super-scaled" id="modalCreate_Noticia">
      <div class="modal-dialog modal-lg modal-center">
        <form class="modal-content formCreate" autocomplete="off">
          <div class="modal-header">
            <button class="close" data-dismiss="modal" type="button"> <i class="btn btn-outline btn-dark btn-round icon wb-close"></i> </button>
            <h1 class="modal-title">Nuevo anuncio</h1>
          </div>
          <div class="modal-body">
            <div class="form-row col-sm-12">
              <div class="col-sm-6">
                <label for="t" class=""> Título </label>
                <input type="text" class="form-control" name="t" id="t" maxlength="40" required>
              </div>
              <div class="col-sm-6">
                <label for=""> Imagen </label>
                <input type="file" name="img" class="form-control">
              </div>
            </div>
            <div class="form-row col-sm-12">
              <div class="col-sm-12">
                <label for="b"> Contenido </label>
                <textarea name="b" id="b" class="form-control" rows="5" placeholder="Contenido de del anuncio"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="form-row col-sm-12">
              <div class="col-sm-6 text-left">
                <select name="idc" id="idc" class="form-control" required>
                  <option value=""> Categoría... </option>
                  <?php foreach ($stm->readCategorias() as $optC): ?>
                  <option value="<?php echo $optC->__GET('idcategory') ?>"> <?php echo $optC->__GET('tooltip') ?> </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-sm-6 text-right">
                <button class="btn btn-primary"> Publicar anuncio </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Modals Edit -->
    <div class="modal fade modal-super-scaled" id="modalEdit_Categoria">
      <div class="modal-dialog modal-lg modal-center">
        <form class="modal-content formEdit">
          <input type="hidden" name="do" value="update" readonly>
          <input type="hidden" name="id" value="0" readonly>
          <div class="modal-header">
            <button class="close" data-dismiss="modal" type="button"> <i class="btn btn-outline btn-dark btn-round icon wb-close"></i> </button>
            <h1 class="modal-title">Editar Categoría</h1>
          </div>
          <div class="modal-body">
            <div class="form-row col-xs-6">
              <label> Nombre de la categoría </label>
              <input type="text" name="c" placeholder="Pon aquí el nombre de la categoría" maxlength="40" required class="form-control">
            </div>
            <div class="form-row col-xs-6">
              <label> HTML (Clase) del ícono </label>
              <input type="text" name="i" placeholder='por ejemplo: "icon wb-tag\"' class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary"> Editar Categoría </button>
          </div>
        </form>
      </div>
    </div>
    <div class="modal fade modal-super-scaled" id="modalEdit_Noticia">
      <div class="modal-dialog modal-lg modal-center">
        <form class="modal-content formEdit" autocomplete="off">
          <input type="hidden" name="do" value="update" readonly>
          <input type="hidden" name="id" value="0" readonly>
          <div class="modal-header">
            <button class="close" data-dismiss="modal" type="button"> <i class="btn btn-outline btn-dark btn-round icon wb-close"></i> </button>
            <h1 class="modal-title">Edita anuncio</h1>
          </div>
          <div class="modal-body">
            <div class="form-row col-sm-12">
              <div class="col-sm-6">
                <label for="t" class=""> Título </label>
                <input type="text" class="form-control" name="t" id="t" maxlength="40" required>
              </div>
              <div class="col-sm-6">
                <label for=""> Imagen </label>
                <input type="file" name="img" class="form-control">
                <input type="hidden" name="befImg" readonly>
              </div>
            </div>
            <div class="form-row col-sm-12">
              <div class="col-sm-12">
                <label for="b"> Contenido </label>
                <textarea name="b" id="b" class="form-control" rows="5" placeholder="Contenido del anuncio"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="form-row col-sm-12">
              <div class="col-sm-6 text-left">
                <select name="idc" id="idc" class="form-control" required>
                  <option value=""> Categoría... </option>
                  <?php foreach ($stm->readCategorias() as $optC): ?>
                  <option value="<?php echo $optC->__GET('idcategory') ?>"> <?php echo $optC->__GET('tooltip') ?> </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-sm-6 text-right">
                <button class="btn btn-primary"> Editar anuncio</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- End Page -->
    <!-- InstanceEndEditable -->
    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">© 2019 <a href="https://bit.ly/2OBdVf4"> Delta A Salud S.A.S </a></div>
      <div class="site-footer-right">
        <!-- Crafted with effort and dedication --> Hecho con esfuerzo y dedicación <i class="red-600 wb wb-wrench"></i> para los Colaboradores de <a href="https://bit.ly/2OBdVf4"> Delta A Salud</a>.
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
    <!-- <script src="../../global/vendor/jquery-placeholder/jquery.placeholder.js"></script> -->
    <script src="../../global/vendor/matchheight/jquery.matchHeight-min.js"></script>
    <script src="../../global/vendor/masonry/masonry.pkgd.js"></script>
    <script src="../../global/vendor/summernote/summernote.min.js"></script>
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
    <script src="../../global/js/Plugin/masonry.js"></script>
    <script src="../../global/js/Plugin/responsive-tabs.js"></script>
    <script src="../../global/js/Plugin/closeable-tabs.js"></script>
    <script src="../../global/js/Plugin/tabs.js"></script>

    <script src="../../controller/anuncios_clasificados/notices.js"></script>

    <!-- <script src="../../global/js/Plugin/jquery-placeholder.js"></script>
    <script src="../../global/js/Plugin/material.js"></script> -->
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