<?php 

    include "header.php";

        if (isset ($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
          include "../clases/Conexion.php";
          $con =new Conexion();
          $conexion = $con -> conectar();
    
?>

<!-- Page Content -->

  <div class="container">
    <div class="card border-0 shadow my-5">
      <div class="card-body p-5">
        <h1 class="fw-light">Reportes  de  Cliente</h1>
        <p class="lead">
          <button  class="btn btn-primary" data-toggle="modal" data-target="#modalCrearReporte">
            Crear reportes
          </button>
            <hr>
            <div id="tablaReporteClienteLoad"></div>
        </p>
      </div>
    </div>
  </div>


<?php 
      include "reporteCliente/modalCrearReporte.php";
      include "footer.php";
?>
      <script src="../public/js/reporteCliente/reporteCliente.js"></script>
<?php
    } else {
      header("location:../index.html");
    }
    
?>