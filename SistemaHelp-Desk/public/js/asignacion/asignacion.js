$(document).ready(function(){
  $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");

});
function asignarEquipo(){
      $.ajax({
        type:"POST",
        data:$('#frmAsignarEquipo').serialize(),
        url:"../procesos/asignacion/asignar.php",
          success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#frmAsignarEquipo')[0].reset();
                $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");
                Swal.fire(":D","Asignado con exito!","success"); 
            } else {
                Swal.fire(":(","Error al asignar" + respuesta,"error");
            }

          }
      });
    return false;
}
function eliminarAsignacion(idAsignacion){
  Swal.fire({
    title:'Esta seguro de eliminar este registro?',
    text: "Una vez Eliminado no podra ser recuperado",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, bórralo!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type:"POST",
        data:"idAsignacion=" +idAsignacion,
        url:"../procesos/asignacion/eliminarAsignacion.php",
        success:function(respuesta){
          respuesta = respuesta.trim();
          if (respuesta == 1) {
              $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");
              Swal.fire(":D","Elimnado con exito!","success"); 
          } else {
              Swal.fire(":(","Error al eliminar" + respuesta,"error");
          }
        }
  
      });
    }
  })
      return false;
}
