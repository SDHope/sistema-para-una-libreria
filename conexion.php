<?php
// datos de conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "prestamos";

// conexión a la base de datos
$conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

// verificar si hay algún error en la conexión
if (!$conexion) {
  die("Error de conexión: " . mysqli_connect_error());
}
?>