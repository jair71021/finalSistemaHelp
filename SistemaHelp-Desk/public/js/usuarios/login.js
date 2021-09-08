function loginUsuario(){
  
  $.ajax({
          type:"POST",
          data:$('#frmLogin').serialize(),
          url:"procesos/usuarios/login/loginUsuario.php",
          success: function(respuesta){
            respuesta=respuesta.trim();
              if (respuesta == 1) {
                console.log(respuesta);
                window.location.href="vistas/inicio.php"
              } else {
                swal.fire(":(","Error al entrar! "+respuesta,"error");
              }
          }
  });
  return false;
}