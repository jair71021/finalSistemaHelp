$(document).ready(function(){
  $('#tablaReporteAdminLoad').load("reporteAdmin/tablaReporteAdmin.php");

});

function eliminarReporteAdmin(idReporte){
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
            $('#tablaReporteAdminLoad').load("reporteAdmin/tablaReporteAdmin.php"); 
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

function obtenerDatosSolucion(idReporte){

    $.ajax({
      type:"POST",
      data:"idReporte=" +idReporte,
      url:"../procesos/reporteAdmin/obtenerSolucion.php",
      success:function(respuesta){
        respuesta = jQuery.parseJSON(respuesta);
        $('#idReporte').val(respuesta['idReporte']);
        $('#solucion').val(respuesta['solucion']);
        $('#estatus').val(respuesta['estatus']);
      }

    });
    
}

function agregarSolucionReporte(){
  $.ajax({
    type:"POST",
    data:$('#frmAgregarSolucionReporte').serialize(),
    url:"../procesos/reporteAdmin/actualizarSolucion.php",
    success:function(respuesta){
      respuesta = respuesta.trim();
      if (respuesta == 1) {
        $('#tablaReporteAdminLoad').load("reporteAdmin/tablaReporteAdmin.php"); 
          Swal.fire(":D","Agregado con exito!","success"); 
      } else {
          Swal.fire(":(","Fallo" + respuesta,"error");
      }
    }

  });
  return false;
}