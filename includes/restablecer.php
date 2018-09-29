<?php
include_once "./constantes.php";

$token = $_GET['token'];
$correo = $_GET['correo'];

$sql = "SELECT * FROM tblresetpass WHERE token = '$token'";
$resultado = $db->query($sql);

if ($resultado->num_rows > 0) {
  $usuario = $resultado->fetch_assoc();
  if (hash('sha256', $usuario['username']) == $correo) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <!-- Etiquetas META requeridas -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Grupo Open - Plataforma de Gesti&oacute;n</title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="../css/materialdesignicons.min.css">
      <link rel="stylesheet" href="../css/vendor.bundle.base.css">
      <link rel="stylesheet" href="../css/vendor.bundle.addons.css">
      <!-- endinject -->
      <!-- plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="../css/style.css">
      <!-- endinject -->
      <link rel="shortcut icon" href="../images/favicon.png" />
      
      <!-- AQUI COMIENZA EL CODIGO JAVASCRIPT -->
      <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="../js/verificar_claves.js"></script>
      <script type="text/javascript" src="../js/comprobar_coincidencia_claves.js"></script>
    </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <!-- INICIO DEL FORMULARIO -->
                <form id="formCambiarClaves" method="post">
                  <div class="panel panel-default">
                    <div class="panel-heading"> Recupere su clave de acceso </div>
                    <br> <!-- <== Eso es un espacio en blanco para dejar un poco de margen -->
                    <div class="panel-body">
                      <p></p> <!-- En esta línea se puede poner otra descipción -->
                      <div class="form-group">
                        <label for="password"> Nueva clave </label>
                        <input id="pass1" type="password" class="form-control" name="password1" required>
                      </div>
                      <div class="form-group ">
                        <label for="password2"> Confirmar clave </label>
                        <input id="pass2" type="password" class="form-control" name="password2" required>
                        <div id="error" class=""></div>
                        <div id="msg"></div>
                      </div>
                      <input type="hidden" id="token" name="token" value="<?php echo $token ?>">
                      <input type="hidden" id="name" name="correo" value="<?php echo $correo ?>">
                      <div class="form-group">
                        <input id="cambiar" type="submit" class="btn btn-primary" value="Cambiar clave" >
                        <button type="button" class="btn btn-outline-primary" onclick="location.href = '../index.php'">Volver</button>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- FIN DEL FORMULARIO -->
                <div id="resultado" class="text-center"></div>
                </div>
              
              <p class="footer-text text-center">Copyright © 2018 Grupo Open Consultoria y Desarrollo S.L. All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../js/vendor.bundle.base.js"></script>
    <script src="../js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/misc.js"></script>
    <!-- endinject -->
  </body>
  </html>
  <?php

} else {
  header('Location:../index.php');
}
} else {
  header('Location:../index.php');
}
?>