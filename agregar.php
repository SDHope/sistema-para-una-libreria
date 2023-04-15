<?php
// incluir archivo de conexión a la base de datos
include("conexion.php");

// inicializar variables de error y éxito
$mensaje_error = "";
$mensaje_exito = "";

// verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // obtener datos del formulario
  $titulo = trim($_POST['titulo']);
  $autor = trim($_POST['autor']);
  $fecha = trim($_POST['fecha']);

  // validar que los campos no estén vacíos
  if (empty($titulo) || empty($autor) || empty($fecha)) {
    $mensaje_error = "Por favor, ingrese un título y un autor.";
  } else {
    // escapar caracteres especiales
    $titulo = mysqli_real_escape_string($conexion, $titulo);
    $autor = mysqli_real_escape_string($conexion, $autor);
    $fecha = mysqli_real_escape_string($conexion, $fecha);

    // consulta para agregar un libro
    $sql = "INSERT INTO libros (titulo, autor, fecha, disponibilidad) VALUES ('$titulo', '$autor', '$fecha', 1)";

    // ejecutar consulta
    if (mysqli_query($conexion, $sql)) {
      // establecer mensaje de éxito
      $mensaje_exito = "Libro agregado exitosamente.";

      // limpiar campos del formulario
      $titulo = "";
      $autor = "";
      $fecha = "";
    } else {
      // si hay un error, establecer mensaje de error
      $mensaje_error = "Error al agregar libro: " . mysqli_error($conexion);
    }
  }
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

    <h2>Agregar libro</h2>
    <?php if (!empty($mensaje_error)) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $mensaje_error; ?>
      </div>
    <?php } ?>
    <?php if (!empty($mensaje_exito)) { ?>
      <div class="alert alert-success" role="alert">
        <?php echo $mensaje_exito; ?>
      </div>
    <?php } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="mb-3">
        <label for="titulo" class="form-label">Título:</label>
        <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $titulo; ?>" required>
      </div>
      <div class="mb-3">
        <label for="autor" class="form-label">Autor:</label>
        <input type="text" name="autor" id="autor" class="form-control" value="<?php echo $autor; ?>" required>
      </div>
      <div class="mb-3">
        <label for="fecha" class="form-label">Título:</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $fecha; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Agregar libro</button> 
      <a href="index.php"><button class="btn btn-primary">Volver al inicio</a></button>
    </form>
  </div>

</body>
</html>