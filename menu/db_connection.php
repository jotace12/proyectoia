
<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "registroacademico";

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

return $conexion;
?>