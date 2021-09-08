<?php
  include "../../clases/Conexion.php";
  $con= new Conexion();
  $conexion= $con -> conectar();
  $sql="SELECT 
              usuarios.id_usuario AS idUsuario,
              usuarios.usuario AS nombreUsuario,
              roles.nombre AS rol,
              usuarios.id_rol AS idRol,
              usuarios.ubicacion AS ubicacion,
              usuarios.activo AS estatus,
              usuarios.id_persona AS idPersona,
              persona.nombre AS nombrePersona,
              persona.paterno AS paterno,
              persona.materno AS materno,
              persona.fecha_nacimiento AS fechaNacimiento,
              persona.sexo AS sexo,
              persona.correo AS correo,
              persona.telefono AS telefono
        FROM
              t_usuarios AS usuarios
                  INNER JOIN
              t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                  INNER JOIN
              t_persona AS persona ON usuarios.id_persona = persona.id_persona";
        $respuesta=mysqli_query($conexion,$sql);
?>
<table class="table table-sm dt-responsive nowrap" 
      id="tablaUsuariosDataTable" style="width:100%">
    <thead>
        <th>Apellidos Paterno</th>
        <th>Apellidos Materno</th>
        <th>Nombre</th>
        <th>Edad</th>        
        <th>Telefono</th>
        <th>Correo</th>
        <th>Usuario</th>
        <th>Ubicacion</th>
        <th>Sexo</th>
        <th>Rest Password</th>
        <th>Activar</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
      <?php
          while($ver = mysqli_fetch_array($respuesta)){
      ?>
        <tr>
          <td><?php echo $ver['paterno']; ?></td>
          <td><?php echo $ver['materno']; ?></td>
          <td><?php echo $ver['nombrePersona']; ?></td>
          <td><?php echo $ver['fechaNacimiento']; ?></td>
          <td><?php echo $ver['telefono']; ?></td>
          <td><?php echo $ver['correo']; ?></td>
          <td><?php echo $ver['nombreUsuario']; ?></td>
          <td><?php echo $ver['ubicacion'] ?></td>
          <td><?php echo $ver['sexo']; ?></td>
          <td>
            <button class="btn btn-secondary btn-sm">
              Cambiar password
            </button>
          </td>
          <td>
            <?php 
                  if ($ver['estatus']== 1) {
            ?>
                  <button class="btn btn-info btn-sm">
                      Activo
                  </button>
            <?php
                  }else{
            ?>
                  <button class="btn btn-info btn-sm">
                      Inactivo
                  </button>
            <?php
                  }
            ?>
          </td>
          <td>
              <button class="btn btn-warning btn-sm"  data-toggle="modal"
                data-target="#modalActualizarUsuarios" onclick="obtenerDatosUsuario(<?php echo $ver['idUsuario']; ?>);">
                Editar
              </button>
          </td>
          <td>
              <button class="btn btn-danger btn-sm" 
              onclick="eliminarUsuario(<?php echo $ver['idUsuario']?>)">
                Eliminar
              </button>
          </td>
        </tr>
        <?php }?>
    </tbody> 
</table>



<script>
  $(document).ready(function(){
    
      $('#tablaUsuariosDataTable').DataTable(); 
  });
</script>