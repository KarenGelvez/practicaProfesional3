<?php
    require 'config.php';
    
    $result = false;
    if(!empty($_POST)){
        $ci = $_POST['ci'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $carrera = $_POST['carrera'];
        $fnacimiento = $_POST['fnacimiento'];
        $sql = "INSERT INTO Estudiante(CI, Nombre, Apellido, Direccion, Carrera, Fecha_nac)  VALUES (:ci, :nombre, :apellido, :direccion, :carrera, :fecha)";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'ci' => $ci,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'direccion' => $direccion,
            'carrera' => $carrera,
            'fecha' => $fnacimiento,
        ]);
    }
?>
<html>
    <head>
        <title>Lector</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Agregar Estudiante</h1>
            <hr>
            <a href="index.php">Principal</a>
            <?php
                if($result) {
                    echo '<div class="alert alert-success">¡Registro Exitoso!</div>';
                }
            ?>

            
            <form action="add.php" method="post">
                
                <label for="name">CI: </label>
                <input type="text" name="ci" id="ci" placeholder="Código de Identificación">
                <br>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                <br>
                <label for="apellido">Apellido: </label>
                <input type="text" name="apellido" id="apellido" placeholder="Apellido">
                <br>
                <label for="direccion">Dirección: </label>
                <input type="text" name="direccion" id="direccion" placeholder="Dirección">
                <br>
                <label for="carrera">Carrera: </label>
                <input type="text" name="carrera" id="carrera" placeholder="Carrera">
                <br>
                <label for="fnacimiento">Fecha de Nacimiento: </label>
                <input type="text" name="fnacimiento" id="fnacimiento" placeholder="AAAA/MM/DD">
                <br>
                <input type="submit" value="Guardar" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>