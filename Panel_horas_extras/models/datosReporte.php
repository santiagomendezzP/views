<?php 

    class datosReporte
    {
        
        public function __construct($con)
        {
            $this->con = $con;
        }
        public function cantidad_horas_reportadas($documento_usuario)
        {
            // $documento_usuario = '52478499';
            $año = date('Y');
            $mes = date('m');
            $consulta_horas_extras = mysqli_query($this->con,"SELECT a.`documento`, sum(b.horas_extras) as 'horas_extras' FROM `reporte_horas`a, `detalle_reporte` b WHERE a.id_reporte = b.id_reporte AND a.`documento` = '$documento_usuario' AND a.`fecha_registro` BETWEEN '$año-$mes-01' AND '$año-$mes-31' AND a.`estado_jefe` in (0,3)");

            $array = mysqli_fetch_all($consulta_horas_extras,MYSQLI_ASSOC);
            return $array;

        }
    }
?>