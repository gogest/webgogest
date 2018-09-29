<!DOCTYPE html>
<html lang="es">

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

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

</head>

<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
			<div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
				<div class="row w-100">
					<div class="col-lg-4 mx-auto">
						<div class="auto-form-wrapper">
						<!-- INICIO DEL FORMULARIO -->
							<form action="includes/verificar.php" method="post">
								<div class="form-group">
									<label class="label">Usuario</label>
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Usuario" name="usuario">
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="mdi mdi-check-circle-outline"></i>
											</span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="label">Clave</label>
									<div class="input-group">
										<input type="password" class="form-control" placeholder="*********" name="password">
										<div class="input-group-append" >
											<span class="input-group-text">
												<i class="mdi mdi-check-circle-outline"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-primary submit-btn btn-block" name="submit">Entrar</button>
								</div>
								<div class="form-group d-flex justify-content-between">
										<!-- Botón redirige a la página para recuperar las claves. -->
									<a href="recupera.php" class="btn btn-link btn-block">He olvidado mi clave</a>
								</div>
							</form>
							<!-- FIN DEL FORMULARIO -->
						</div>

						<!-- PIE DEL FORMULARIO -->
						<ul class="auth-footer">
							<li>
								<a href="#">Ayuda</a>
							</li>
							<li>
								<a href="#">Términos</a>
							</li>
							<li>
								<a href="#">Condiciones</a>
							</li>
						</ul>
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