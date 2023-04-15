<?php
// incluir archivo de conexión a la base de datos
include("conexion.php");

// obtener ID del libro a editar
$id = $_GET['id'];

// consulta para obtener los datos del libro
$sql = "SELECT * FROM libros WHERE id_libro='$id'";

// ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
  $fila = mysqli_fetch_assoc($resultado);
} else {
  // si no hay resultados, redirigir al inicio
  header("Location: index.php");
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

    <h2>Editar libro</h2>
    <form action="actualizar.php" method="POST">
      <input type="hidden" name="id_libro" value="<?php echo $fila['id_libro']; ?>">
      <div class="mb-3">
        <label for="titulo" class="form-label">Título:</label>
        <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $fila['titulo']; ?>" required>
      <br><br>
      </div>
      <div class="mb-3">
        <label for="autor" class="form-label">Autor:</label>
        <input type="text" name="autor" id="autor" class="form-control" value="<?php echo $fila['autor']; ?>" required>
        <br><br>
      </div>
      <div class="mb-3">
        <label for="fecha" class="form-label">Fecha:</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $fila['fecha']; ?>" required>
        <br><br>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar libro</button>
    </form>
  </div>

</body>
</html>