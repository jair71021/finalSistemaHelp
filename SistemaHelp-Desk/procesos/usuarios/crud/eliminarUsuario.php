<?php
      $idUsuario = $_POST['idUsuario'];
        include "../../../clases/Usuarios.php";
        $Usuarios = new Usuarios();
        echo  $Usuarios ->eliminarUsuario($idUsuario);
?>