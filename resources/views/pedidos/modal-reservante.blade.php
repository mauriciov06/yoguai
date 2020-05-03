<div class="modal fade" id="modalReservante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-cust-wit" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Datos del Reservante</h4>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

      	<div class="form-group">
			    <label>Nombre del cliente:</label>
			    <div id="name"></div>
			  </div>
			  <div class="form-group">
			    <label>Correo Electronico:</label>
			    <div id="email"></div>
			  </div>
			  <div class="form-group">
			    <label>Telefono/Movil:</label>
      		<div id="tel_movil"></div>
			  </div>
			  <div class="form-group">
			    <label>Ciudad:</label>
			    <div id="ciudad"></div>
			  </div>
			  <div class="form-group">
			    <label>Dirección:</label>
			    <div id="direccion"></div>
			  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-modal-cerrar" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->