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

$resultados=obtener_datos_usuario($correo);
$datos=$resultados->fetch_assoc();

$resultados2=obtener_datos_cliente($correo);


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
            <h4 class="card-title">Nuevo Caso</h4>
              <form class="form-sample" method="post">
                <p class="card-description">
                  Datos de Contacto
                </p>
                  <div class="row"><!-- Inicio primera fila-->
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value=<?php echo $datos['nombre']; ?> disabled id=nombre name=nombre/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Apellidos</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php echo $datos['apellidos']; ?>" disabled id=apellidos name=apellidos/>
                        </div>
                      </div>
                    </div>
                  </div> <!-- Fin primera fila-->

                  <div class="row"><!-- Inicio segunda fila-->
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Movil</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php echo $datos['movil']; ?>" disabled id=movil name=movil/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Correo</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value=<?php echo $datos['correo']; ?> disabled id=correo name=correo/>
                        </div>
                      </div>
                    </div>
                  </div>  <!-- Fin segunda Fila-->
                     
                  <p class="card-description"> <!-- Inicio tercera Fila -->
                    Datos de Empresa
                  </p>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Empresa</label>
                          <div class="col-sm-9">
                          <select class="form-control" id=cif name=cif>
                            <?php
                                    while ($datos_emp=$resultados2->fetch_assoc()) {
                                    echo '<option value='.$datos_emp['cif'].'>'.$datos_emp['denominacion'].'</option>';
                                  }
                              
                                ?>
                            </select>
                                  
                          </div>
                        </div>
                    </div>
                  </div><!-- Fin tercera Fila -->
                  <div class="row"> <!-- Inicio cuarta Fila -->
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Teléfono</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php echo $datos_emp['telefono']?>" disabled id=telefono name=telefono/>
                        </div>
                      </div>
                    </div>
                  </div> <!-- Fin cuarta Fila -->
          </div><!-- Fin Card Body 1-->
        </div> <!-- Fin Card-->  
        <div class="card">
          <div class="card-body">
          <p class="card-description">
            Datos del caso
          </p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fecha Apertura</label>
                  <div class="col-sm-9">
                  <?php $fecha=getdate(); 
                  $fecha=$fecha['mday'].'/'.$fecha['mon'].'/'.$fecha['year'];?>
                    <input type="text" class="form-control" id=fecha_apertura name=fecha_apertura  value="<?php echo $fecha; ?>"disabled>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fecha Cierre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id=fecha_cierre name=fecha_cierre placeholder="dd/mm/yyyy" disabled/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tipo Asistencia</label>
                  <div class="col-sm-9">
                    <select class="form-control" id=tipo_asistencia name=tipo_asistencia>
                      <?php
                        $resultados=obtener_tipo_asistencia();
                        while ($datos=$resultados->fetch_assoc()) {
                           echo '<option value='.$datos['codigo'].'>'.$datos['nombre'].'</option>';

                        }
                              
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">   
                <label class="col-sm-3 col-form-label">Adjuntar</label>
                  <input type="file" name="fichero" id=fichero class="file-upload-default">
                  <div class="col-sm-9">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="añadir fichero">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-info" type="button">Adjuntar</button>
                      </span>
                    </div>
                  </div>
                </div>            
            </div>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
              <textarea class="form-control" id=descripcion name=descripcion rows="5" placeholder="Describe brevemente su incidencia o consulta"></textarea>
          </div>
          
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-light">Limpiar</button>
                <a href="./casos.php" class="btn btn-light">Cancelar</a>
              </form>
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