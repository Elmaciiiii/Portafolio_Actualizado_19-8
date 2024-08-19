<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
         body {
    font-family: Arial, sans-serif;
    background: linear-gradient( rgba(36, 36, 36, 0.425), rgba(36, 36, 36, 0.47)), url("fondo cancion.webp");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;}

    .buttom {
      background-color: #9200d6;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 10px; 
      cursor: pointer;
      border-radius: 10px;
    }
    
    .buttom:hover {
      background-color: #3f2c05;
    }

    h2{
        color: white;
    }

    input, button {
      padding: 8px;
      margin: 5px; 
      display: inline-flex;
      background-color: black;
      color: #ffffff;
      border-radius: 5px;
  }

  .pepe {
      margin: 20px;
  }
    </style>

<section id="busqueda" class="pepe">
            <h2>Búsqueda de Cantante</h2>
            <form action="busqueda2.php" method="post">
                <input type="text" name="termino_busqueda" placeholder="Buscar por título, compositor o género">
                <input class="momo" type="submit" value="Buscar">
            </form>
        </section>

    <h1>cantantes</h1>
<?php

$conn = new mysqli("localhost", "root", "", "tp_final");

if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

$sql = "SELECT * FROM cantante";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $nombreCantante = $fila['nombre'];
        $apellido = $fila['apellido'];
        $fechaNacimiento = $fila['fecha_nacimiento'];
        $nacionalidad = $fila['nacionalidad'];

        echo "<div style='background-color: #5C3458; padding: 20px; color: #fff; margin: 20px auto; width: 40%; border-radius: 10px; font-size: 18px;'>";
        echo "<p style='color: white; font-size: 20px;'><strong>Nombre:</strong> $nombreCantante $apellido</p>";
        echo "<p style='color: white; font-size: 18px;'><strong>Fecha de Nacimiento:</strong> $fechaNacimiento</p>";
        echo "<p style='color: white; font-size: 18px;'><strong>Nacionalidad:</strong> $nacionalidad</p>";
        echo "</div>";
    }
} else {
    echo "No hay cantantes registrados en la base de datos.";
}


$conn->close();
?>
</body>
</html>
