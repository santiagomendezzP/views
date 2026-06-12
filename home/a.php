<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
$( document ).ready(function() {
  $('#myModal').modal('toggle')
});
</script>
<!-- Modal HTML -->
<div id="myModal" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form action="/examples/actions/confirmation.php" method="post">
          <p>Cuestionario informativo para seguimiento a la salud de los trabajadores en el marco de la contingencia por el Covid 19</p>
          <p>Interesados en su bienestar, hemos adoptado todas las medidas posibles para evitar la expansión de la epidemia.  Lo invitamos a que responda con toda veracidad y objetividad este breve cuestionario:</p>
          <table  style="border: hidden"  class="conoce">
            <tr>
              <p><font size ="3", color="black"><b>¿Conoce usted las medidas dispuestas por la Empresa para atender la emergencia del Covid 19? </p></b></font>  
              <input type="radio" name="conoce" id="conoce" value="SI"required>SI
              <input type="radio" name="conoce" id="conoce" value="NO" required>NO
            </tr>
          </table>
          <div class="form-group" id="respuesta_medidas">
            <p><font size ="3", color="black"><b> En caso de que su respuesta sea negativa explique porqué</p></b></font>
            <br>
            <input type="text" name="conoce_no" class="form-control">
            <br>
          </div>
          <table class="alguien" style="border: hidden">
            <tr>
              <p><font size ="3", color="black"><b>En el transcurso de la semana pasada, ¿a alguna persona con la que usted conviveo con quien haya  tenido contacto se le ordenó cuarentena preventiva o se le diagnosticó infección por Covid 19?</p></b></font>  
              <div class="form-group">
                <input type="radio" name="alguien" value="SI"required>SI
                <input type="radio" name="alguien" value="NO" required>NO
              </div> 
            </tr>
          </table>
          <div class="form-group" id="respuesta_contacto">
            <p><font size ="3", color="black"><b>En caso de que su respuesta sea afirmativa, amplíe la información: parentesco, motivo de la cuarentena, etc. </p></b></font>
            <input type="text" name="alguien_no" id="alguien_no"  value=""  class="form-control">
          </div>
          <div class="form-group">
            <p><font size ="3", color="black"><b>En las últimas 24 horas, ¿ha presentado síntomas asociados a la infección por Covid 19 tales como:</p></b></font>
          </div>
          <table class="24" >
            <tr>
              <p><font size ="3", color="black"><b> Tos seca y persistente? </p></b></font>
              <div class="form-group">
                <input type="radio" name="tos" value="SI" required>SI
                <input type="radio" name="tos" value="NO" required> NO
                <br> 
              </div>
            </tr>
            <tr>
              <p><font size ="3", color="black"><b> Fiebre de más de 37.5°C ?</p></b></font>
              <div class="form-group">
                <input type="radio" name="fiebre" value="SI"required>SI
                <input type="radio" name="fiebre" value="NO" required>NO 
                <br> 
              </div>
            </tr>
            <tr>
              <p><font size ="3", color="black"><b>Dificultad para respirar de inicio reciente ? </b></font>
              <div class="form-group">
                <input type="radio" name="d_respirar" value="SI"required>SI
                <input type="radio" name="d_respirar" value="NO" required> NO
                <br> 
              </div>
            </tr>
            <tr>
              <font size ="3", color="black"><b><p>Fatiga?</p></b></font>
              <div class="form-group">
                <input type="radio" name="fatiga" value="SI"required>SI
                <input type="radio" name="fatiga" value="NO" required>NO
                <br> 
              </div>
            </tr>
            <tr>
              <font size ="3", color="black"><b> <p>Dolor de garganta?</p></b></font>          
              <div class="form-group">
                  <input type="radio" name="dolor_g" value="SI"required>SI
                 <input type="radio" name="dolor_g" value="NO" required>NO
                <br> 
              </div>
            </tr>
            <tr>
              <p><font size ="3", color="black"><b>Malestar general que limite las actividades diarias?  </p></b></font>          
              <div class="form-group">
                <input type="radio" name="malestar" value="SI"required>SI
                <input type="radio" name="malestar" value="NO" required>NO
                <br> 
              </div>
            </tr>
            <tr>
              <p><font size ="3", color="black"><b>Secreción nasal o congestión, no relacionada con procesos alérgicos?  </p></b></font>           
              <div class="form-group">
                <input type="radio" name="secreciones" value="SI"required>SI
                <input type="radio" name="secreciones" value="NO" required>NO
                <br> 
              </div>
            </tr>
            <tr>
              <p><font size ="3", color="black"><b>Pérdida del olfato o del gusto?  </b></font></p>         
              <div class="form-group">
                  <input type="radio" name="olfato" value="SI"required>SI
                 <input type="radio" name="olfato" value="NO" required> NO
                <br> 
              </div>
            </tr>
          </table>
          <table class="grupo" style="border: hidden">
            <tr>
              <p><font size ="3", color="black"><b>¿Pertenece usted a algún grupo de riesgo? </p></b></font>
              <div class="form-group">
                <input type="radio" name="grupo_r" id="grupo_r" value="SI"required>SI
                <input type="radio" name="grupo_r" id="grupo_r" value="NO" required> NO
              </div> 
            </tr>
          </table>
          <div id="respuesta_riesgo">
            <table class="24">
              <tr>
                <p><font size ="3", color="black"><b> Mayor de 60 años? </p></b></font>
                  <div class="form-group">
                    <input type="radio" name="mayor_60" value="SI" required>SI
                    <input type="radio" name="mayor_60" value="NO" required> NO
                    <br> 
                  </div>
              </tr>
              <tr>
                <p><font size ="3", color="black"><b>Tensión alta ?</p></b></font>
                  <div class="form-group">
                   <input type="radio" name="tension_alta" value="SI"required>SI
                    <input type="radio" name="tension_alta" value="NO" required> NO
                    <br> 
                  </div>
              </tr>
              <tr>
                <p><font size ="3", color="black"><b>Embarazo? </b></font>
                <div class="form-group">
                  <input type="radio" name="embarazo" value="SI"required>SI
                  <input type="radio" name="embarazo" value="NO" required> NO
                  <br> 
                </div>
              </tr>
              <tr>
                <font size ="3", color="black"><b><p>Enfermedad pulmonar (EPOC, Cáncer de pulmón, fibrosis quística, fibrosis pulmonar, asma moderada a grave)?</p></b></font>
                <div class="form-group">
                  <input type="radio" name="enfermedad_pulmonar" value="SI"required>SI
                  <input type="radio" name="enfermedad_pulmonar" value="NO" required> NO
                  <br> 
                </div>
              </tr>
              <tr>
                <font size ="3", color="black"><b> <p>Afecciones cardíacas graves (Miocardiopatía, hipertensión pulmonar, enfermedad cardíaca congénita, insuficiencia cardíaca, enfermedad de las arterias coronarias)?</p></b></font>          
                <div class="form-group">
                    <input type="radio" name="afecciones_cardiacas" value="SI"required>SI
                   <input type="radio" name="afecciones_cardiacas" value="NO" required> NO
                  <br> 
                </div>
              </tr>
              <tr>
                <p><font size ="3", color="black"><b>Sistema inmunitario deprimido ( Trasplante de órgano o de médula, tratamiento oncológico , VIH o sida)?</p></b></font>          
                <div class="form-group">
                  <input type="radio" name="sistema_inmunitario" value="SI"required>SI
                  <input type="radio" name="sistema_inmunitario" value="NO" required> NO
                  <br> 
                </div>
              </tr>
              <tr>
                <p><font size ="3", color="black"><b>Cancer?  </b></font></p>          
                <div class="form-group">
                    <input type="radio" name="cancer" value="SI"required>SI
                   <input type="radio" name="cancer" value="NO" required> NO
                  <br> 
                </div>
              </tr>
              <tr>
                <p><font size ="3", color="black"><b>Tabaquismo?  </b></font></p>          
                <div class="form-group">
                    <input type="radio" name="tabaquismo" value="SI"required>SI
                   <input type="radio" name="tabaquismo" value="NO" required> NO
                  <br> 
                </div>
              </tr>
              <tr>
                <p><font size ="3", color="black"><b>Deficiencias inmunitarias?  </b></font></p>           
                <div class="form-group">
                    <input type="radio" name="deficiencias_inmunitarias" value="SI"required>SI
                   <input type="radio" name="deficiencias_inmunitarias" value="NO" required> NO
                  <br> 
                </div>
              </tr>
              <tr>
                <p><font size ="3", color="black"><b>Obesidad?  </b></font></p>           
                <div class="form-group">
                    <input type="radio" name="obesidad" value="SI"required>SI
                   <input type="radio" name="obesidad" value="NO" required> NO
                  <br> 
                </div>
              </tr>
              <tr>
                <p><font size ="3", color="black"><b>Diabetis?  </b></font></p>         
                <div class="form-group">
                    <input type="radio" name="diabetis" value="SI"required>SI
                   <input type="radio" name="diabetis" value="NO" required> NO
                  <br> 
                </div>
              </tr>
              <tr>
                <p><font size ="3", color="black"><b>Enfermedad renal y hepática crónica o en tratamiento de diálisis ?  </b></font></p>           
                <div class="form-group">
                    <input type="radio" name="enfermedad_renal" value="SI"required>SI
                   <input type="radio" name="enfermedad_renal" value="NO" required> NO
                  <br> 
                </div>
              </tr>
              <tr>
                <p><font size ="3", color="black"><b>Otro?</b></font></p>           
                <div class="form-group">
                  <input type="radio" name="otro" value="SI"required>SI
                  <input type="radio" name="otro" value="NO" required> NO
                  <br> 
                </div>
              </tr>
            </table>
            <div id="repuesta_otro">
              <tr>
                <p><font size ="3", color="black"><b>Cual?  </b></font></p>          
                <div class="form-group">
                  <input type="text" name="cual" id="cual" value=""  class="form-control">
                </div>
              </tr>
            </div>
          </div>
          <table style="border: hidden">
            <tr>
              <p><font size ="3", color="black"><b>¿Se encuentra en las instalaciones de la empresa?</b></font></p>
              <div class="form-group">
                <input type="radio" name="instalaciones" value="Se encuentra en las instalaciones" id="mostrar2"  required>SI
                <input type="radio" name="instalaciones" value="No Se encuentra en las instalaciones" id="ocultar2"  required> NO
              </div> 
            </tr>
          </table>
          <table id="tabla2">
            <tr>  
              <p><font size ="3", color="black"><b>En su ingreso a las instalaciones de la empresa, usted recibió:</b></font></p>
            </tr>
            <tr>
              <p><font size ="3", color="black"><b>¿Tapabocas desechable?</b></font></p>
              <input type="radio" name="tapa_b" id="tapa_b" value="Si">
              <input type="radio" name="tapa_b" id="tapa_b" value="No"> 
              <input type="radio" name="tapa_b" id="tapa_b" value="" style="display: none;" checked required> 
            </tr>
            <tr>
              <p><font size ="3", color="black"><b>¿Guantes de nitrilo?</b></font></p>
              <input type="radio" name="guantes" value="SI"required>
              <input type="radio" name="guantes" value="No"required> 
              <input type="radio" name="guantes"  value="" style="display: none;" checked required> 
            </tr>
          </table>
          <table class="grupo" style="border: hidden">
            <tr>
              <p><font size ="3", color="black"><b>¿Le aplicaron a usted la vacuna contra el Covid 19?</b></font></p>
              <div class="form-group">
                <input type="radio" name="aplicaron_vacuna" id="aplicaron_vacuna" value="SI"required>SI
                <input type="radio" name="aplicaron_vacuna" id="aplicaron_vacuna" value="NO" required> NO
              </div>   
            </tr>
          </table>
          <div class="respuesta1" style="display: none;">
            <table class="grupo" style="border: hidden">
              <tr>
                <p><font size ="3", color="black"><b>¿Cuántas dosis ha recibido?</b></font></p>
                <div class="form-group">
                  <select id="dosis_resibidas" name="dosis_resibidas" class="form-control" >
                    <option value="0">SELECCIONE</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div> 
              </tr>
            </table>
            <table class="grupo" style="border: hidden">
              <tr>
                <p><font size ="3", color="black"><b>Indique el nombre de la vacuna que le fue aplicada:</b></font></p>
                <div class="form-group">
                  <select id="nombre_vacuna" name="nombre_vacuna" class="form-control" >
                    <option value="">SELECCIONE</option>
                    <option value="Pfizer">Pfizer</option>
                    <option value="Sinovac">Sinovac</option>
                    <option value="Janssen">Janssen</option>
                    <option value="Moderna">Moderna</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                  </select>
                </div> 
              </tr>
            </table>
          </div>
          <div class="respuesta2" style="display: none">
            <table class="grupo" style="border: hidden">
              <tr>
                <p><font size ="3", color="black"><b>¿está dispuesto(a) a aplicarse la mencionada vacuna?</b></font></p>
                <div class="form-group">
                  <input type="radio" name="dispuesto_aplicarse" value="SI">
                  <input type="radio" name="dispuesto_aplicarse" value="NO"> 
                </div> 
              </tr>
            </table>
          </div>
          <div class="respuesta3" style="display: none">
            <div class="form-group"></div>
          </div>
          <div class="respuesta4" style="display: none">
            <p><font size ="3", color="black"><b>En caso de que su respuesta sea negativa, ¿explique por qué?</b></font></p>
            <textarea class="form-control" rows="2" cols="100" name="explique_porque" id="explique_porque"></textarea>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function()
  {
    $("#respuesta_riesgo").css("display","none");
    $("#respuesta_medidas").css("display","none");
    $("#respuesta_contacto").css("display","none");
    $("#repuesta_otro").css("display","none");

    $( '[name="aplicaron_vacuna"]' ).click(function() {
      if(  $('[name="aplicaron_vacuna"]:checked').val() == 'SI'){
        $(".respuesta1").css("display","contents")
        $(".respuesta2").css("display","none")
        $("#dosis_resibidas").prop("required",true)
        $('[name="dispuesto_aplicarse"]').prop("required",false) 
      }else{
        $(".respuesta1").css("display","none")
        $(".respuesta2").css("display","contents")
        $(".respuesta3").css("display","contents")
        $("#dosis_resibidas").prop("required",false)
        $('[name="dispuesto_aplicarse"]').prop("required",false)
        
      }
    });

    $( '[name="dispuesto_aplicarse"]' ).click(function() {
      if(  $('[name="dispuesto_aplicarse"]:checked').val() == 'NO'){
        $(".respuesta4").css("display","contents")
        $("#explique_porque").prop("required",true)
      }else{
        $(".respuesta4").css("display","none")
        $("#explique_porque").prop("required",false)
      }
    });

    $('input:radio[name=grupo_r]').change(function() {
      var valor = $(this).val();
      if (valor == 'SI') {
        $("#respuesta_riesgo").css("display","block")
      }else if(valor == 'NO'){
        $("#respuesta_riesgo").css("display","none")
      }
    });

    $('input:radio[name=conoce]').change(function() {
      var valor = $(this).val();
      if (valor == 'SI') {
        $("#respuesta_medidas").css("display","none")
      }else if(valor == 'NO'){
        $("#respuesta_medidas").css("display","block")
      }
    });

    $('input:radio[name=alguien]').change(function() {
      var valor = $(this).val();
      if (valor == 'SI') {
        $("#respuesta_contacto").css("display","block")
      }else if(valor == 'NO'){
        $("#respuesta_contacto").css("display","none")
      }
    });

    $('input:radio[name=otro]').change(function() {
      var valor = $(this).val();
      if (valor == 'SI') {
        $("#repuesta_otro").css("display","block")
      }else if(valor == 'NO'){
        $("#repuesta_otro").css("display","none")
      }
    });
  });

  $('#mostrar2').click(function(){
    $("#tabla2").show(1000);
  });

  $('#ocultar2').click(function(){
    $("#tabla2").fadeOut("1000")
    $("#tabla3").fadeOut("200")
  });
</script>
<style>
  #tabla2{
    display:none;
  }
  #tabla3{
    display:none;
  }
</style>
