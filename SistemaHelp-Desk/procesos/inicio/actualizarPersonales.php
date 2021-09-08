<?php
  session_start();
    
  $idUsuario = $_SESSION['usuario']['id'];
  
    $datos = array(
      'paterno'=>$_POST['paternoInicio'],
      'materno'=>$_POST['maternoInicio'],
      'nombre'=>$_POST['nombreInicio'],
      'telefono'=>$_POST['telefonoInicio'],
      'correo'=>$_POST['correoInicio'],
      'fechaNac'=>$_POST['fechaNacInicio'],
      'idUsuario' => $idUsuario
    );
    include "../../clases/Inicio.php";
    $Inicio = new Inicio();
    echo $Inicio ->actualizarPersonales($datos);
    
    
    
    
    
    
    
    

?>
