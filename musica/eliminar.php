<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if (isset($_GET['id_cancion'])) {
    $id = $_GET['id_cancion'];


   
    $conn = new mysqli("localhost", "root", "", "tp_final");



    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    $sql = "DELETE FROM cancion WHERE id_cancion = $id";


    if ($conn->query($sql) === TRUE) {
       
        header("Location: index3.php");
        exit;
    } else {
        echo "Error al eliminar la canción: " . $conn->error;
    }


   
    $conn->close();
}

?>

</body>
</html>