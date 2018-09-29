<?php 
include_once "constantes.php";
include_once "funciones.php";


if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if ($email != "") {
        $sql = " SELECT * FROM usuarios WHERE correo = '$email' ";
        $resultado = $db->query($sql);
        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            $linkTemporal = generarLinkTemporal($usuario['correo']);
            if ($linkTemporal) {
                    //enviarEmail( $email, $linkTemporal );
                echo "EMAIL" . $email . "LINK" . $linkTemporal;
                echo "Se le ha enviado un correo con las instrucciones para restablecer su clave. ";
                exit;
            }
        } else {
            echo "No existe una cuenta asociada a ese correo.";
            exit;
        }
    } else {
        echo "Debes introducir el email de la cuenta";
        exit;
    }
}
if (isset($_POST['submit'])) {

    $usr = $_POST['usuario'];
    $pas = hash('sha256', $_POST['password']);
    $query = " SELECT * FROM usuarios WHERE correo='$usr' AND password='$pas' and activado='1' and bloqueado='0' LIMIT 1 ";
    $resultado = $db->query($query);
    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_array(MYSQLI_ASSOC);
        session_start();
        $_SESSION['usuario'] = $row['correo'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellidos'] = $row['apellidos'];
        $_SESSION['tecnico'] = $row['tecnico'];
        $_SESSION['admin'] = $row['admin'];
        $_SESSION['admin_emp'] = $row['admin_empresa'];
        $_SESSION['cod_cliente'] = $row['cod_cliente'];
        $_SESSION['logged'] = true;
        header("Location: ../index_login.php"); // Modificar para ir a la página que le gustaría
        exit;
    } else {
        header("Location: ../index.php");
        exit;
    }

} else {    //Si el botón de formulario no se envió, vaya a la página de índice o página de inicio de sesión 
    header("Location: ../index.php");
    exit;
}

?> 