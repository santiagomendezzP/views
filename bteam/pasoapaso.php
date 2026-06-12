<script type="text/x-javascript"> 
  var isCtrl = false;
  document.onkeyup=function(e){
    if(e.which == 17) isCtrl=false;
  }
  document.onkeydown=function(e){
    if(e.which == 17) isCtrl=true;
    if(e.which == 80 && isCtrl == true) {
    //Combinancion de teclas CTRL+P y bloquear su ejecucion en el navegador
    return false;
    }
  }
</script>
<div class="page-header">
  <h1 class="page-title"> Como lavarse las manos </h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../bteam/?<?php echo mt_rand(); ?>"> Inicio </a></li>
    <li class="breadcrumb-item active"> Solicitudes </li>
  </ol>
  <div class="page-header-actions" style="z-index: 999">
  </div>
</div>
<div class="page-content pr-0 pl-0">
  <div class="panel panel-bordered">
    <div class="panel-heading">
      <h3 class="panel-title small"> Versión 03 </h3>
      <div class="panel-actions">
      </div>
    </div>
    <div class="panel-body">
      <div class="col-xs-12 col-md-12 col-lg-12">
        <body oncontextmenu="return false;" onselectstart="return false" onkeydown="return false;" ondragstart="return false;">
          <div style="position: relative;width: 101%; height: 90rem">
            <iframe id="pdff" src="lavarse_las_manos.pdf" style="width: 100%; height: 99%"></iframe>
          </div>
        </body>
      </div>
    </div>
    <div class="panel-footer">
    </div>
  </div>
</div>