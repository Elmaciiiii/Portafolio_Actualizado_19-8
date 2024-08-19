<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros Registrados</title>
    <link href="style4.css" rel="stylesheet">    
</head>
<body>
 
<header>
        <a href="index.html" class="buttom">Volver a Inicio</a>
</header>


<style>
        body {
            background-color: #7d520e;
        }

        .buttom {
    background-color: #382b03;
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

</style>
<?php

$conexion = mysqli_connect("localhost", "root", "", "biblioteca");


if (mysqli_connect_errno()) {
    echo "Error al conectar con la base de datos: " . mysqli_connect_error();
}


$termino_busqueda = $_POST['termino_busqueda'];

$consulta = "SELECT * FROM libro WHERE titulo LIKE '$termino_busqueda%' OR autor LIKE '$termino_busqueda%'";

$resultado = mysqli_query($conexion, $consulta);

echo "<h2 style='color: white;  text-align: center; font-size: 30px ;'> Buscador de Libros </h2>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<div style=' 
    text-align: center;
    color: #fff;
    background-color: rgba(123, 118, 118, 0.5);
    padding: 30px;
    margin: 30px auto;
    width: 500px;;
    border-radius: 10px;
    letter-spacing: 2px;
    font-size: 20px; '>";
    echo "<span style='font-weight: bold; color: white;'>Título:</span> " . $fila['titulo'] . ", <span style='font-style: bold; color: white;'>Autor:</span> " . $fila['autor'] . "<br>";
    echo "</div>";
}
    
?>
</body>
</html>