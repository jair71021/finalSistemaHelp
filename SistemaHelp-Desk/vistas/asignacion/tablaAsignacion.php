<?php
    include "../../clases/Conexion.php";
    $con= new Conexion();
    $conexion= $con -> conectar();
    $sql = "SELECT 
                persona.id_persona AS idPersona,
                CONCAT(persona.paterno,
                        ' ',
                        persona.materno,
                        ' ',
                        persona.nombre) AS nombrePersona,
                    equipo.id_equipo AS idEquipo,
                    equipo.nombre AS nombreEquipo,
                    asignacion.id_asignacion AS idAsignacion,
                    asignacion.marca AS marca,
                    asignacion.modelo AS modelo,
                    asignacion.color AS color,
                    asignacion.descripcion AS descripcion,
                    asignacion.memoria AS memoria,
                    asignacion.disco_duro AS discoDuro,
                    asignacion.procesador AS procesador
            FROM
                t_asignacion AS asignacion
                    INNER JOIN
                t_persona AS persona ON asignacion.id_persona = persona.id_persona
                    INNER JOIN
                t_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo";
    $respuesta = mysqli_query($conexion, $sql);
?>

    <table class="table table-sm dt-responsive nowrap" 
      style="width:100%" id="tablaAsignacionDataTable">
        <thead>
          <th>Persona</th>
          <th>Equipo</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Color</th>
          <th>Descripcion</th>
          <th>Memoria</th>  
          <th>Disco duro</th>
          <th>Procesador</th>
          <th>Eliminar</th>
        </thead>
        <tbody>
        <?php
            while($ver = mysqli_fetch_array($respuesta)){
        ?>
          <tr>
              <td><?php echo $ver['nombrePersona']; ?></td>
              <td><?php echo $ver['nombreEquipo']; ?></td>
              <td><?php echo $ver['marca']; ?></td>
              <td><?php echo $ver['modelo']; ?></td>
              <td><?php echo $ver['color']; ?></td>
              <td><?php echo $ver['descripcion']; ?></td>
              <td><?php echo $ver['memoria']; ?></td>
              <td><?php echo $ver['discoDuro']; ?></td>
              <td><?php echo $ver['procesador']; ?></td>
              <td>
                  <button class="btn btn-danger btn-sm"
                  onclick="eliminarAsignacion(<?php echo $ver['idAsignacion']?>)">
                    Eliminar
                  </button>
              </td>
          </tr>
          <?php }?>
        </tbody>
    </table>

    <script>
  $(document).ready(function(){
    
      $('#tablaAsignacionDataTable').DataTable(); 
  });
</script>
