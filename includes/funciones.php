<?php

function obtener_tipo_asistencia (){
  include "constantes.php";
  $sql = "select codigo, nombre from tipo_asistencia;";
  $resultado= $db->query($sql);
  return ($resultado);

}

function obtener_datos_usuario ($correo){
  include "constantes.php";
  $sql = "select nombre, apellidos, movil, correo from usuarios where correo = '$correo';";
  $resultado= $db->query($sql);
  return ($resultado);
}

function obtener_datos_cliente ($correo){
  include "constantes.php";
  $sql = "select admin, admin_empresa, tecnico, cod_cliente from usuarios where correo = '$correo';";
  $resultado= $db->query($sql);
  $datos_usuario=$resultado->fetch_assoc();
  if ($datos_usuario['admin'] == 1 OR $datos_usuario['tecnico'] == 1){
    $sql =" Select cif, denominacion, nombre_comercial from clientes;";
    $resultado= $db->query($sql);
    return ($resultado);
  }
  else {
    $cliente = $datos_usuario['cod_cliente'];
    $sql =" Select cif, denominacion, nombre_comercial, telefono, direccion from clientes where cif= '$cliente';";
    $resultado= $db->query($sql);
    return ($resultado);
  }

}
function obtener_datos_compl_cliente ($codigo){
    $sql =" Select cif, denominacion, nombre_comercial, telefono, direccion from clientes where cif= '$codigo'";
    $resultado= $db->query($db);
    return ($resultado);
}

function obtener_casos_abiertos ($admin, $admin_emp, $cod_cliente, $correo){
  include "constantes.php";
  if ($admin == 1){
  $sql = "SELECT cod_caso, clientes.nombre_comercial, fecha_inicio, descripcion, tipo_asistencia.nombre from casos  INNER JOIN clientes on clientes.cif = cod_cliente INNER JOIN tipo_asistencia on casos.cod_tip_asistencia = tipo_asistencia.codigo where fecha_fin IS NULL order by fecha_inicio DESC";
  $resultado = $db->query($sql);
  return ($resultado);
  }
  else{
    if ($admin == 0 AND $admin_emp == 1){
    $sql = "SELECT cod_caso, clientes.nombre_comercial, fecha_inicio, descripcion, tipo_asistencia.nombre from casos  INNER JOIN clientes on clientes.cif = cod_cliente INNER JOIN tipo_asistencia on casos.cod_tip_asistencia = tipo_asistencia.codigo where fecha_fin IS NULL AND cod_cliente like '$cod_cliente' order by fecha_inicio DESC";
    $resultado = $db->query($sql);
    return ($resultado);  
    }else{
      $sql = "SELECT cod_caso, clientes.nombre_comercial, fecha_inicio, descripcion, tipo_asistencia.nombre from casos  INNER JOIN clientes on clientes.cif = cod_cliente INNER JOIN tipo_asistencia on casos.cod_tip_asistencia = tipo_asistencia.codigo where fecha_fin IS NULL AND cod_cliente like '$cod_cliente' AND cod_usuario like '$correo' order by fecha_inicio DESC";
      $resultado = $db->query($sql);
      return ($resultado);  
    }
  }
}

function obtener_casos ($admin, $tecnico, $admin_emp, $cod_cliente, $correo){
  include "constantes.php";
  if ($admin == 1 OR $tecnico==1){
  $sql = "SELECT cod_caso, clientes.nombre_comercial, fecha_inicio, fecha_fin, descripcion, tipo_asistencia.nombre from casos  INNER JOIN clientes on clientes.cif = cod_cliente INNER JOIN tipo_asistencia on casos.cod_tip_asistencia = tipo_asistencia.codigo order by fecha_inicio DESC";
  $resultado = $db->query($sql);
  return ($resultado);
  }
  else{
    if ($admin_emp == 1 ){
    $sql = "SELECT cod_caso, clientes.nombre_comercial, fecha_inicio, fecha_fin, descripcion, tipo_asistencia.nombre from casos  INNER JOIN clientes on clientes.cif = cod_cliente INNER JOIN tipo_asistencia on casos.cod_tip_asistencia = tipo_asistencia.codigo where cod_cliente like '$cod_cliente' order by fecha_inicio DESC";
    $resultado = $db->query($sql);
    return ($resultado);  
    }else{
      $sql = "SELECT cod_caso, clientes.nombre_comercial, fecha_inicio, fecha_fin, descripcion, tipo_asistencia.nombre from casos  INNER JOIN clientes on clientes.cif = cod_cliente INNER JOIN tipo_asistencia on casos.cod_tip_asistencia = tipo_asistencia.codigo where cod_cliente like '$cod_cliente' AND cod_usuario like '$correo' order by fecha_inicio DESC";
      $resultado = $db->query($sql);
      return ($resultado);  
    }
  }
}
function generarLinkTemporal( $correo){
   // Se genera una cadena para validar el cambio de contraseña
   
   include "constantes.php";
   $cadena = $correo.rand(1,9999999).date('Y-m-d');
   $token = hash('sha256',$cadena);
   // Se inserta el registro en la tabla tblreseteopass
   $sql = "INSERT INTO tblresetpass (username, token, creado) VALUES('$correo','$token',NOW());";
   $resultado = $db->query($sql);
   if($resultado){
      // Se devuelve el link que se enviara al usuario
      $enlace = $_SERVER["SERVER_NAME"].'/includes/restablecer.php?correo='.hash('sha256',$correo).'&token='.$token;
      return $enlace;
   }
   else
      return FALSE;
}
 
function enviarEmail_recupera( $email, $link ){
   $mensaje = '<html>
     <head>
        <title>Restablece tu contraseña</title>
     </head>
     <body>
       <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu contraseña</strong><br>
         <a href="'.$link.'"> Restablecer contraseña </a>
       </p>
     </body>
    </html>';
 
   $cabeceras = 'MIME-Version: 1.0' . "\r\n";
   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $cabeceras .= 'From: Codedrinks <mimail@codedrinks.com>' . "\r\n";
   // Se envia el correo al usuario
   mailx($email, "Recuperar contraseña", $mensaje, $cabeceras);
}
?>