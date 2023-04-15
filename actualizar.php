<?php
// incluir archivo de conexión a la base de datos
include("conexion.php");

// obtener datos del formulario
$id = $_POST['id_libro'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$fecha = $_POST['fecha'];

// consulta para actualizar un libro
$sql = "UPDATE libros SET titulo='$titulo', autor='$autor', fecha='$fecha' WHERE id_libro='$id'";

// ejecutar consulta
if (mysqli_query($conexion, $sql)) {
  // redirigir al inicio con mensaje de éxito
  header("Location: index.php?mensaje=Libro+actualizado+exitosamente");
} else {
  // si hay un error, mostrar mensaje de error
  echo "Error: " . mysqli_error($conexion);
}

// cerrar conexión a la base de datos
mysqli_close($conexion);
?>