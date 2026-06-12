<div class="modal fade" id="exportar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Exportar </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./tabla_c_c.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
              <input type="hidden" class="form-control" id="id" name="id">
          </div>
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">Mes:</label>
              <select class="form-control form-control-sm" name="mes" id="mes">
                  <option value="01">ENERO</option>
                  <option value="02">FEBRERO</option>
                  <option value="03">MARZO</option>
                  <option value="04">ABRIL</option>
                  <option value="05">MAYO</option>
                  <option value="06">JUNIO</option>
                  <option value="07">JULIO</option>
                  <option value="08">AGOSTO</option>
                  <option value="09">SEPTIEMBRE</option>
                  <option value="10">OCTUBRE</option>
                  <option value="11">NOVIEMBRE</option>
                  <option value="12">DICIEMBRE</option>
              </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Año:</label>
            <input type="text" class="form-control" id="año" name="año">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Consecutivo:</label>
            <input type="text" class="form-control" id="consecutivo" name="consecutivo">
          </div>
        </div>
        <div class="modal-footer">
          <button type="sumbit" class="btn btn-primary">Exportar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div>
</div>