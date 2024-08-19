<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="animate-backgroud">

<header>
        <a href="index.html" class="buttom">Volver a Inicio</a>
</header>



<style>
    .animate-backgroud{
            background: linear-gradient(to right, #d28cf5, #8e59f7, #59f5f7);
            background-size: 400% 400%;
            animation: animate-backgroud 10s infinite ease-in-out;
        }

    @keyframes animate-backgroud {
        0%{
            background-position: 0 50%;
        }
        50%{
            background-position: 100% 50%;
        }
        100%{
            background-position: 0 50%;
        }
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

$conn = new mysqli("localhost", "root", "", "tp_final");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$cantanteABuscar = "selena"; 

$sql = "SELECT cantante.nombre, album.nombre_album, album.url_cancion
        FROM cantante
        INNER JOIN album ON cantante.id_cantante = album.id_cantante
        WHERE cantante.nombre = '$cantanteABuscar'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div style='background-color: rgba(63, 62, 64, 0.5); padding: 20px; color: #fff; margin: 20px auto; width: 40%; border-radius: 10px; font-size: 18px;'>";
    echo "Álbumes de $cantanteABuscar:<br>";
    while ($row = $result->fetch_assoc()) {
        echo "- " . $row["nombre_album"] . "<br><br>";
        echo "<a href='" . $row["url_cancion"] . "' target='_blank' style='background-color: #eb94d0; color: #fff; padding: 5px 20px; border-radius: 5px; text-decoration: none;  margin-top: 20%; '>Escuchar</a><br>";
    }
    echo "</div>";
} else {
    echo "No se encontraron álbumes para el cantante $cantanteABuscar";
}

$conn->close();

?>




</body>
</html>