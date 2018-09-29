<?php 
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: index.php"); 
    exit; 
} 
include_once "./includes/funciones.php";

$correo = $_SESSION['usuario']; 
$nombre= $_SESSION['nombre']; 
$apellidos = $_SESSION['apellidos'];
$tecnico = $_SESSION['tecnico'];
$admin = $_SESSION['admin'];
$admin_emp = $_SESSION['admin_emp'];
$cod_cliente = $_SESSION['cod_cliente'];

include_once "includes/cabecera.php";
?>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include_once "includes/arriba.php";?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include_once "includes/lateral.php";?>
      <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listado de Casos</h4>
                    <a href=nuevo_caso.php class="btn btn-inverse-success">Nuevo</a>
                    <div class="table-responsive">
                    <?php
                        // Coger de bbdd los casos abiertos
                        $resultados=obtener_casos ($admin, $tecnico, $admin_emp, $cod_cliente, $correo);
          
                    ?>
                        <table class="table">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Creado</th>
                                <th>Descripción</th>
                                <th>Tipo Asistencia</th>
                                <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while  ($casos = $resultados->fetch_assoc()){
                             $fecha = date("d-m-Y", strtotime($casos['fecha_inicio']));
                        
                             echo '<tr>
                               <td class="font-weight-medium">
                               ' .$casos['cod_caso'].
                               '</td>
                               <td class="font-weight-medium">'.
                               $casos['nombre_comercial'].
                               '</td>
                               <td class="font-weight-medium">'.
                               $fecha.
                               '</td>
                               <td class="font-weight-medium">'.
                               $casos['descripcion'].
                               '</td>
                               <td class="font-weight-medium">'.
                               $casos['nombre'].
                               '</td>
                               <td>';
                               if ($casos['fecha_fin'] == null) {
                                 echo '<label class="badge badge-danger">Pendiente</label>';
                                }else{
                                 echo '<label class="badge badge-success">Cerrado</label>';
                                }
                                
                                echo ' </td>
                               
                                </tr>'; 
                                } 
                                ?>
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="js/vendor.bundle.base.js"></script>
  <script src="js/vendor.bundle.addons.js"></script>
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>