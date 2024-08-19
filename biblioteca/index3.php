<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros Registros</title>
    <link href="style2.css" rel="stylesheet">
</head>
<body>
    <h1>Registro</h1>

    <?php
      $conn = new mysqli("localhost", "root", "", "biblioteca");

        $nombre = $_POST['nombres'];
        $apellido = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $contraseña= $_POST['contrasenia'];
        
         
        $sql = "INSERT INTO usuario (nombre, apellido, correo, telefono, contraseña ) VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$contraseña')";

        header("Location: index.html");    
        
    ?>

</body>
</html>