<form id="frmAsignarEquipo" method="POST" onsubmit="return asignarEquipo();">
      
    <div class="modal fade" id="modalAsignarEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Asignar Equipos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                  <label>Nombre de Personas</label>
                  <?php
                        $sql = "SELECT 
                                    persona.id_persona,
                                    CONCAT(persona.paterno,
                                            ' ',
                                            persona.materno,
                                            ' ',
                                            persona.nombre) AS nombre
                                FROM
                                    t_persona AS persona
                                        INNER JOIN
                                    t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                                        AND usuario.id_rol = 1
                                ORDER BY persona.paterno;";
                        $repuesta = mysqli_query($conexion, $sql);
                  ?>

                  <select name="idPersona" id="idPersona" class="form-control" required>
                      <option value="">Selecciona una opcion</option>
                          <?php while($ver = mysqli_fetch_array($repuesta)){?>
                                <option value="<?php echo $ver['id_persona'];?>">  
                                <?php echo $ver['nombre'];?>
                                </option>
                          <?php }?>
                  </select>
              </div>
              <div class="col-sm-6">
                  <label>Tipo de Equipos </label>
                  <?php
                        $sql = "SELECT 
                                    id_equipo,nombre
                                FROM
                                    t_cat_equipo ORDER BY nombre ";
                        $repuesta = mysqli_query($conexion, $sql);
                  ?>
                  <select name="idEquipo" id="idEquipo" class="form-control" required>
                      <option value="">Selecciona una opcion</option>
                        <?php while($ver = mysqli_fetch_array($repuesta)){?>
                                <option value="<?php echo $ver['id_equipo'];?>">  
                                <?php echo $ver['nombre'];?>
                                </option>
                        <?php }?>
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control">
              </div>
              <div class="col-sm-4">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control">
              </div>        
              <div class="col-sm-4">
                <label for="color">Color</label>
                <input type="text" name="color" id="color" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <label for="descripcion">Descripcion</label>
                  <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label for="memoria">Memoria </label>
                  <input type="text" name="memoria" id="memoria" class="form-control">
              </div>
              <div class="col-sm-4">
                <label for="discoDuro">Disco duro</label>
                  <input type="text" name="discoDuro" id="discoDuro" class="form-control">
              </div>
              <div class="col-sm-4">
                <label for="procesdor">Procesador</label>
                  <input type="text" name="procesdor" id="procesdor" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-primary">Agregar</button>
          </div>
        </div>
      </div>
    </div>

</form>