<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros Registrados</title>
    <link href="style3.css" rel="stylesheet">    
</head>
<body>
<style> 
 body {
    font-family: Arial, sans-serif;
    background: linear-gradient( rgba(36, 36, 36, 0.425), rgba(36, 36, 36, 0.47)), url("ttt.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;}

</style>
    <h1 style='color: white;'>Libros Registrados</h1>
    <header>
        <a href="index.html" class="buttom">Volver a Inicio</a>
</header
     
    <?php
      $conn = new mysqli("localhost", "root", "", "biblioteca");

        $titulo = $_POST['title'];
        $autor = $_POST['author'];
        $genero = $_POST['genre'];
        $anio = $_POST['year'];
        $editorial= $_POST['editorial'];
        $disponibilidad= $_POST['disponibilidad'];
        if($disponibilidad=="si"){
            $sql = "INSERT INTO libro (titulo, autor, genero, anio, editorial, disponibilidad) VALUES ('$titulo', '$autor', '$genero', '$anio', '$editorial', 'si')";
        }
        else{
            $sql = "INSERT INTO libro (titulo, autor, genero, anio, editorial, disponibilidad) VALUES ('$titulo', '$autor', '$genero', '$anio', '$editorial', 'no')";
        }

        echo "<h2 style='color: white; font-size: 30px ;'> Libros </h2>";
         
        

        $sql = "INSERT INTO libro (titulo, autor, genero, anio, editorial, disponibilidad) VALUES ('$titulo', '$autor', '$genero', '$anio', '$editorial', '$disponibilidad')";

        $conn->query($sql);

        $sql = "SELECT * FROM libro";

        $resultado = $conn -> query($sql);
        while($fila = $resultado -> fetch_assoc()) {
            $titulo = $fila['titulo'];
            $autor = $fila['autor'];
            $genero = $fila['genero'];
            $anio = $fila['anio'];
            $editorial = $fila['editorial'];
            $disponibilidad = $fila['disponibilidad'];
        
            echo "<div style=' background-color: rgba(123, 118, 118, 0.5);
            padding: 60px;
            color: #fff;
            margin: 90px auto;
            width: 500px;;
            border-radius: 10px;
            font-size: 26px; '>";
            echo "<p style='color: white; font-size: 20px; letter-spacing: -1px;'> TITULO: $titulo</p>";
            echo "<p style='color: white; font-size: 20px; letter-spacing: -1px;'> AUTOR: $autor</p>";
            echo "<p style='color: white; font-size: 20px; letter-spacing: -1px;'> GENERO: $genero</p>";
            echo "<p style='color: white; font-size: 20px; letter-spacing: -1px;'> AÑO: $anio</p>";
            echo "<p style='color: white; font-size: 20px; letter-spacing: -1px;'> EDITORIAL: $editorial</p>";
            echo "<p style='color: white; font-size: 20px; letter-spacing: -1px;'> DISPONIBILIDAD: $disponibilidad</p>";
            echo "</div>";
        }        

    ?>

</body>
</html>
