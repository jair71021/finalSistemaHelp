<form id="frmActualizarDatosPersonales" method="POST" onsubmit="return actualizarDatosPersonales()">
    
  <!-- Modal -->
  <div class="modal fade" id="modalActualizarDatosPersonales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos Personales</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="paternoInicio">Apellidos Paterno</label>
          <input type="text"  class="form-control" name="paternoInicio" id="paternoInicio">
          <label for="maternoInicio">Apellidos Materno</label>
          <input type="text"  class="form-control" name="maternoInicio" id="maternoInicio">
          <label for="nombreInicio">Nombre</label>
          <input type="text"  class="form-control" name="nombreInicio" id="nombreInicio">
          <label for="telefonoInicio">Telefono</label>
          <input type="text"  class="form-control" name="telefonoInicio" id="telefonoInicio">
          <label for="correoInicio">Correo</label>
          <input type="email"  class="form-control" name="correoInicio" id="correoInicio">
          <label for="fechaNacInicio">Fecha de  Nacimiento</label>
          <input type="date"  class="form-control" name="fechaNacInicio" id="fechaNacInicio">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button class="btn btn-warning">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>