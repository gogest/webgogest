<?php
include_once "./constantes.php";

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$correo = $_POST['correo'];
$token = $_POST['token'];
$pass1 = iconv_strlen($password1);
$pass2 = iconv_strlen($password2);

if ($password1 != "" && $password2 != "" && $correo != "" && $token != "") {
  ?>
  <?php
  $sql = " SELECT * FROM tblresetpass WHERE token = '$token' ";
  $resultado = $db->query($sql);
  if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    if (hash('sha256', $usuario['username']) === $correo) {
      if ($pass1 < 8 && $pass2 < 8) {
        echo "No se ha enviado su solicitud porque las claves no tienen 8 o más caracteres.";
        exit;
      } else if ($password1 === $password2) {
        $sql = "UPDATE usuarios SET password = '" . hash('sha256', $password1) . "' WHERE correo like '" . $usuario['username'] . "'";
          //echo "$sql";
        $resultado = $db->query($sql);
        if ($resultado) {
          $sql = "DELETE FROM tblresetpass WHERE token = '$token';";
          $resultado = $db->query($sql);
          echo "<script>alert('¡Su nueva clave se actualizó con exito!');</script>";
          echo "Ya puede volver al inicio. ";
          exit;
        } else {
          echo "<script>alert('Ocurrió un error al actualizar la contraseña, inténtelo más tarde o contacte con Grupo Open. ');</script>";
          exit;
        }
      } else {
        echo "No se ha enviado su solicitud porque las claves no coinciden. Revíselo e inténtelo de nuevo. ";
        exit;
      }
    } else {
      echo "El token no es válido o su enlace ya ha caducado. Solicite de nuevo el cambio de claves. ";
      exit;
    }
  } else {
    echo "El token no es válido o su enlace ya ha caducado. Solicite de nuevo el cambio de claves. ";
    exit;
  }

  ?>
  <?php

} else {
  header('Location:../index.html');
}
?>