<?php
    require 'config.php';
    
    $result = false;
    if(!empty($_POST)){
        $id = $_POST['id'];
        $newci = $_POST['ci'];
        $newNombre = $_POST['nombre'];
        $newApellido = $_POST['apellido'];
        $newDireccion = $_POST['direccion'];
        $newCarrera = $_POST['carrera'];
        $newFecha = parse_str($_POST['fecha']);

        $sql = "UPDATE Estudiante 
                SET   CI=:ci, Nombre=:nombre, Apellido=:apellido, Direccion=:direccion, Carrera=:carrera, Fecha_nac=:fecha
                WHERE IdLector=:id";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id' => $id,
            'ci' => $newci,
            'nombre' => $newNombre,
            'apellido' => $newApellido,
            'direccion' => $newDireccion,
            'carrera' => $newCarrera,
            'fecha' => $newFecha,
        ]);
        $ciValue = $newci;
        $nombreValue = $newNombre;
        $apellidoValue = $newApellido;
        $direccionValue = $newDireccion;
        $carreraValue = $newCarrera;
        $fechaValue = $newFecha;

    }else{
        $id = $_GET['id'];
        $sql = "SELECT * FROM Estudiante WHERE IdLector=:id";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id'=>$id
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $ciValue = $row['CI'];
        $nombreValue = $row['Nombre'];
        $apellidoValue = $row['Apellido'];
        $direccionValue = $row['Direccion'];
        $carreraValue = $row['Carrera'];
        $fechaValue = $row['Fecha_nac'];
    }
?>
<html>
    <head>
        <title>Actualizar</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Actualizar Estudiante</h1>
            <hr>
            <a href="list.php">Regresar</a>
            <form action="update.php" method="post">
            
                <input type="hidden" name="id" id="id" value="<?php echo $id;?>">

                <label for="ci">CI: </label>
                <input type="text" name="ci" id="ci" value="<?php echo $ciValue;?>">
                <br>

                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $nombreValue;?>">
                <br>

                <label for="apellido">Apellido: </label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $apellidoValue;?>">
                <br>

                <label for="direccion">Direccion: </label>
                <input type="text" name="direccion" id="direccion" value="<?php echo $direccionValue;?>">
                <br>

                <label for="carrera">Carrea: </label>
                <input type="text" name="carrera" id="carrera" value="<?php echo $carreraValue;?>">
                <br>

                <label for="fecha">Fecha de Nacimiento: </label>
                <input type="text" name="fecha" id="fecha" value="<?php echo $fechaValue;?>">
                <br>

                <input type="submit" value="Actualizar" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>