<html>
<head>
<!-- Required meta tags -->
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
<script>
  $(document).ready(function(){
    $("#frmRestablecer").submit(function(event){
      event.preventDefault();
      $.ajax({
        url:'include/restablecer.php',
        type:'post',
        dataType:'json',
        data:$("#frmRestablecer").serializeArray()
      }).done(function(respuesta){
        $("#mensaje").html(respuesta.mensaje);
        $("#email").val('');
      });
    });
  });
</script>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form id="frmRestablecer" action="includes/verificar.php" method="post">
              <div class="panel panel-default">
                <div class="panel-heading"> Escriba su correo para recuperar su clave de acceso. </div>
                <div class="panel-body">
                  <div class="form-group">
                    <!-- <label for="email"> Escriba su correo para recuperar su clave de acceso. </label> -->
                    <input type="email" id="email" class="form-control" name="email" required>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Recuperar clave" >
                  </div>
                </div>
              </div>
              </form>
              </div>
            <!--<ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>-->
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

<div id="mensaje"></div>

</body>
</html>