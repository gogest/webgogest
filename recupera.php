<html>
  <head>
    <!-- Etiquetas META requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Grupo Open - Plataforma de Gesti&oacute;n</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="./images/favicon.png" />
    
    <!-- AQUI COMIENZA EL CODIGO JAVASCRIPT -->
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/verificar_correo.js"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
            <!-- INICIO DEL FORMULARIO -->
              <form id="formRestablecerClaves" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"> Escriba su correo para recuperar su clave de acceso. </div>
                  <div class="panel-body">
                  <p></p>
                    <div class="form-group">
                      <!--<label for="email"> Escriba su correo para recuperar su clave de acceso. </label>-->
                      <input type="email" id="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                      <input id="enviar" type="submit" class="btn btn-primary" value="Recuperar clave">
                    </div>
                  </div>
                </div>
              </form>
            <!-- FIN DEL FORMULARIO -->
              <div class="form-group">
              <button type="button" class="btn btn-outline-primary" onclick="location.href = './index.php'">Volver</button>
              </div>
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
  <script src="js/vendor.bundle.base.js"></script>
  <script src="js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
</body>
</html>