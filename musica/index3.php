<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style2.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(rgba(36, 36, 36, 0.425), rgba(36, 36, 36, 0.47)), url("fondo cancion.webp");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }


        .button {
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


        .button:hover {
            background-color: #5800aa;
        }


        .song-container {
            background-color: #5C3458;
            padding: 20px;
            color: #fff;
            margin: 20px auto;
            width: 40%;
            border-radius: 10px;
            font-size: 18px;
        }


        .song-container p {
            color: white;
            font-size: 20px;
        }


        .song-container a {
            display: block;
            margin-top: 10px;
            color: #fff;
            text-decoration: none;
            background-color: #5F0356;
            padding: 8px 10px;
            border-radius: 5px;
        }


        .song-container a:hover {
            background-color: #C40000;
        }
    </style>
</head>
<body>
    <header>
        <a href="index.html" class="button">Volver a Inicio</a>
    </header>


    <?php
    $conn = new mysqli("localhost", "root", "", "tp_final");


    $duracion = $_POST['duracion'] ?? '';
    $año_composicion = $_POST['ano_composicion'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $url_cancion = $_POST['url_cancion'] ?? '';
    $compositor = $_POST['compositor'] ?? '';


    if (!empty($duracion) && !empty($año_composicion) && !empty($genero) && !empty($titulo) && !empty($url_cancion) && !empty($compositor)) {
        $sql = "INSERT INTO cancion (duracion, año_composicion, genero, titulo, url_cancion, compositor) VALUES ('$duracion', '$año_composicion', '$genero', '$titulo', '$url_cancion', '$compositor')";
        $conn->query($sql);
    }


    echo "<h2 style='color: white; font-size: 30px;'>Canciones</h2>";


    $sql = "SELECT id_cancion, duracion, año_composicion, genero, titulo, url_cancion, compositor FROM cancion";
    $resultado = $conn->query($sql);


    while ($fila = $resultado->fetch_assoc()) {
        $duracion = $fila['duracion'];
        $año_composicion = $fila['año_composicion'];
        $genero = $fila['genero'];
        $titulo = $fila['titulo'];
        $url_cancion = $fila['url_cancion'];
        $compositor = $fila['compositor'];
        $id = $fila['id_cancion'];


        echo "<div class='song-container'>";
        echo "<p><strong>TÍTULO:</strong> $titulo</p>";
        echo "<p><strong>GÉNERO:</strong> $genero</p>";
        echo "<p><strong>DURACIÓN:</strong> $duracion</p>";
        echo "<p><strong>COMPOSITOR:</strong> $compositor</p>";
        echo "<a href='$url_cancion'>Escuchar canción</a>";
        echo "<a href='eliminar.php?id_cancion=$id'>Eliminar canción</a>";
        echo "</div>";
    }


    $conn->close();
    ?>


</body>
</html>
