<?php
  session_start();
  include "../../clases/Conexion.php";
  $con= new Conexion();
  $conexion= $con -> conectar();
  $idUsuario = $_SESSION['usuario']['id'];
  $contador =1;
  $sql="SELECT 
            reporte.id_reporte AS idReporte,
            reporte.id_usuario AS idUsuario,
            CONCAT(persona.paterno,
                    ' ',
                    persona.materno,
                    ' ',
                    persona.nombre) AS nombrePersona,
            equipo.id_equipo AS idEquipo,
            equipo.nombre AS nombreEquipo,
            reporte.descripcion_problema AS Problema,
            reporte.estatus AS Estatus,
            reporte.solucion_problema AS Solucion,
            reporte.fecha AS Fecha
          FROM
            t_reportes AS reporte
                INNER JOIN
            t_usuarios AS usuario ON reporte.id_usuario = usuario.id_usuario
                INNER JOIN
            t_persona AS persona ON usuario.id_persona = persona.id_persona
                INNER JOIN
            t_cat_equipo AS equipo ON reporte.id_equipo = equipo.id_equipo
                AND reporte.id_usuario = '$idUsuario'";
        $respuesta=mysqli_query($conexion,$sql);
?>
<table class="table table-sm table-bordered dt-responsive nowrap" 
      id="tablaReporteClienteDataTable" style="width:100%">
    <thead>
      <th>#</th>
      <th>Personas</th>
      <th>Dispositivo</th>
      <th>Descripcion</th>
      <th>Fecha</th>
      <th>Estatus</th>
      <th>Solucion</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      <?php
              while($ver = mysqli_fetch_array($respuesta)){
      ?>
        <tr>
          <td><?php echo $contador++; ?></td>
          <td><?php echo $ver['nombrePersona']; ?></td>
          <td><?php echo $ver['nombreEquipo']; ?></td>
          <td><?php echo $ver['Problema']; ?></td>
          <td><?php echo $ver['Fecha']; ?></td>
          
          <td>
              <?php 
                $estatus = $ver['Estatus'];
                  $cadenaEstatus='<span class="badge badge-success">
                                    Abierto
                                  </span>';
                if ($estatus == 0) {
                  $cadenaEstatus='<span class="badge badge-danger">
                                    Cerrado
                                  </span>';
                }
                echo $cadenaEstatus;
              ?>
          </td>
          <td><?php echo $ver['Solucion']; ?></td>
          <td>
              <?php
                if ($ver['Solucion'] == "") {
              ?>
                      <button class="btn btn-danger btn-sm" 
                  onclick="eliminarReporteCliente(<?php echo $ver['idReporte']?>)">
                    Eliminar
              </button>
                <?php }
                ?>
          </td>
        </tr>
      <?php }?>
    </tbody>

</table>


<script>
  $(document).ready(function(){
    
      $('#tablaReporteClienteDataTable').DataTable(); 
  });
</script>