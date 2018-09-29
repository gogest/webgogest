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
			<title> Restablecer contraseña </title>
		</head>
		<body>

			<form action="cambiar_pass.php" method="post">
				<div class="panel panel-default">
					<div class="panel-heading"> Restaurar contraseña </div>
					<div class="panel-body">
						<p></p>
						<div class="form-group">
							<label for="password"> Nueva contraseña </label>
							<input type="password" class="form-control" name="password1" required>
						</div>
						<div class="form-group">
							<label for="password2"> Confirmar contraseña </label>
							<input type="password" class="form-control" name="password2" required>
						</div>
						<input type="hidden" name="token" value="<?php echo $token ?>">
						<input type="hidden" name="correo" value="<?php echo $correo ?>">
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Recuperar contraseña" >
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div> <!-- /container -->
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