<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <a href="index.html" class="buttom">Volver a Inicio</a>
</header>


<style>
        body {
            background: linear-gradient(to right, #814cb5, #055285);
        }

    .buttom {
    background-color: #9b69ff;
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
    background-color: #d28cf5;
  }

</style>
<?php

$conexion = mysqli_connect("localhost", "root", "", "tp_final");

if (mysqli_connect_errno()) {
    echo "Error al conectar con la base de datos: " . mysqli_connect_error();
}

$termino_busqueda = $_POST['termino_busqueda'];

$consulta = "SELECT * FROM cancion WHERE titulo LIKE '%$termino_busqueda%' OR compositor LIKE '%$termino_busqueda%' 
UNION 
SELECT * FROM cancion WHERE duracion LIKE '%$termino_busqueda%' OR TIME_TO_SEC(duracion) > TIME_TO_SEC('$termino_busqueda')
UNION 
SELECT * FROM cancion WHERE año_composicion LIKE '%$termino_busqueda%'";



$resultado = mysqli_query($conexion, $consulta);

echo "<h2 style='color: white; text-align: center; font-size: 30px;'> Buscador de Canciones </h2>";
if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<div style=' 
        text-align: center;
        color: #fff;
        background-color: rgba(63, 62, 64, 0.5);
        padding: 30px;
        margin: 30px auto;
        width: 500px;
        border-radius: 10px;
        letter-spacing: 2px;
        font-size: 20px;'>";
        echo "<span style='font-weight: bold; color: white;'>Título:</span> " . $fila['titulo'] . ", <span style='font-style: bold; color: white;'>Compositor:</span> " . $fila['compositor'] . "<br>";
        echo "</div>";
    }
} else {
    echo "<p style='color: white; text-align: center; font-size: 20px;'>No se encontraron resultados para la búsqueda: " . htmlspecialchars($termino_busqueda) . "</p>";
}

?>

</body>
</html>