$(document).ready(function(){
  $('#tablaReporteClienteLoad').load("reporteCliente/tablaReporteCliente.php");

});

function agregarNuevoReporte(){
  $.ajax({
      type:"POST",
      data:$('#frmNuevoReporte').serialize(),
      url:"../procesos/reporteCliente/agregarNuevoReporte.php",
      success:function(respuesta){
          respuesta = respuesta.trim();
          if(respuesta == 1){
            console.log(respuesta);
              $('#tablaReporteClienteLoad').load('reporteCliente/tablaReporteCliente.php');
              $('#frmNuevoReporte')[0].reset();
              Swal.fire(":D","Se agrego con exito ","success")
          }else{
              Swal.fire(":(","Error al agregar "+ respuesta,"error")
          }
      }
  });
  return false;
}
function eliminarReporteCliente(idReporte){
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
        data:"idReporte=" +idReporte,
        url:"../procesos/reporteCliente/eliminarReporteCliente.php",
        success:function(respuesta){
          respuesta = respuesta.trim();
          if (respuesta == 1) {
            $('#tablaReporteClienteLoad').load("reporteCliente/tablaReporteCliente.php");
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
