<?php
// incluir archivo de conexión a la base de datos
include("conexion.php");

// verificar si se ha enviado el ID del libro a eliminar
if (isset($_GET["id"])) {
  $id = $_GET["id"];

  // consulta para eliminar el libro
  $sql = "DELETE FROM libros WHERE id_libro = $id";

  // ejecutar consulta
  if (mysqli_query($conexion, $sql)) {
    // redirigir de vuelta a la página principal con un mensaje de éxito
    header("Location: index.php?mensaje=Libro+eliminado+exitosamente");
    exit();
  } else {
    // si hay un error, mostrar mensaje de error
    $mensaje_error = "Error al eliminar libro: " . mysqli_error($conexion);
  }
} else {
  // si no se ha enviado el ID del libro a eliminar, mostrar mensaje de error
  $mensaje_error = "No se ha proporcionado el ID del libro a eliminar.";
}

// cerrar conexión a la base de datos
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Sistema de préstamo de libros</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="container">
    <h1>Sistema de préstamo de libros</h1>

    <h2>Eliminar libro</h2>
    <?php if (!empty($mensaje_error)) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $mensaje_error; ?>
      </div>
    <?php } ?>
  </div>

</body>
</html>