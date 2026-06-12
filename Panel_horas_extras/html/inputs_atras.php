<div class="form-group">
<label for="recipient-name" class="col-form-label">FECHA:</label>
<input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d')?>" requided readonly>
</div>

<div class="form-group">
<label for="message-text" class="col-form-label">NOMBRE DEL DÍA:</label>
<input type="text" class="form-control" id="dia" name="dia" value=<?php echo $dias[date('w')];?> readonly>
</div>

<!-- MDAL ENVIAR -->
<div class="form-group">
<label for="recipient-name" class="col-form-label">Fecha de registro:</label>
<input type="datetume" class="form-control" id="fechaR" name="fechaR" value="<?php echo date("Y-m-d G:i:s")?>" readonly>
</div>

<div class="form-group">
<label for="text" class="col-form-label">Mes:</label>
<input type="text" id="mes" name="mes" class="form-control" value="<?php echo $meses[date('n')];?>" readonly>
</div>