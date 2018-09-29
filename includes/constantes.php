<?php

//datos de conexion bbdd
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbDatabase = "bbdd_gogopen";

$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);

if (mysqli_connect_errno()) {
    printf("Falló la conexión failed: %s\n", $db->connect_error);
    exit();
}
?>