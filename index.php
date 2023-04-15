<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Sistema de préstamo de libros</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="container">
    <h1>Sistema de Entrada y Salida de Libros</h1>

    <h2>Agregar libro</h2>
    <form action="agregar.php" method="POST">
      <div class="mb-3">
        <label for="titulo" class="form-label">Título:</label>
        <input type="text" name="titulo" id="titulo" class="form-control" required><br><br>
      </div>
      <div class="mb-3">
        <label for="autor" class="form-label">Autor:</label>
        <input type="text" name="autor" id="autor" class="form-control" required><br><br>
      </div>
      <div class="mb-3">
        <label for="fecha" class="form-label">Fecha:</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required><br><br>
        </div>
      <button type="submit" class="btn btn-primary">Agregar libro</button>
    </form>

    <h2>Libros</h2>
    <?php
    // incluir archivo de conexión a la base de datos
    include("conexion.php");

    // consulta para obtener todos los libros
    $sql = "SELECT * FROM libros";

    // ejecutar consulta
    $resultado = mysqli_query($conexion, $sql);

    // verificar si hay resultados
    if (mysqli_num_rows($resultado) > 0) {
      echo "<table class='table'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Título</th>";
      echo "<th>Autor</th>";
      echo "<th>Acciones</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      // mostrar resultados
      while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>".$fila['titulo']."</td>";
        echo "<td>".$fila['autor']."</td>";
        echo "<td>".$fila['fecha']."</td>";
        echo "<td>";
        echo "<a href='editar.php?id=".$fila['id_libro']."' class='btn1 btn-primary me-3'>Editar </a>";
        echo "<a href='eliminar.php?id=".$fila['id_libro']."' class='btn btn-danger'>Eliminar </a>";
        echo "</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
    } else {
      echo "No hay libros registrados";
    }

    // cerrar conexión a la base de datos
    mysqli_close($conexion);
    ?>
  </div>

</body>
</html>