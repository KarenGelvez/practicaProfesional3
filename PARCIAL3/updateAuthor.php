<?php
    require 'db/config.php';
    require 'default/header.php';
    
    $result = false;
    if(!empty($_POST)){
        $id = $_POST['id'];
        $newNombre = $_POST['name'];
        $newApellido = $_POST['lastname'];
        $newNacionalidad = $_POST['nationality'];

        $sql = "UPDATE Autor 
                SET   Nombre=:nombre, Apellido=:apellido, NAcionalidad=:nacionalidad
                WHERE IdAutor=:id";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id' => $id,
            'nombre' => $newNombre,
            'apellido' => $newApellido,
            'nacionalidad' => $newNacionalidad,
        ]);
        $nombreValue = $newNombre;
        $apellidoValue = $newApellido;
        $nacionalidadValue = $newNacionalidad;

    }else{
        $id = $_GET['id'];
        $sql = "SELECT * FROM Autor WHERE IdAutor=:id";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id'=>$id
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $nombreValue = $row['Nombre'];
        $apellidoValue = $row['Apellido'];
        $nacionalidadValue = $row['Nacionalidad'];
    }
?>
<html>
    <head>
        <title>Actualizar Autor</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h2 class=' text-center'>Actualizar Autor</h2>
                    <hr>
                    <form action="updateAuthor.php" method="post">
                        <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                        <label for="name">Nombre </label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $nombreValue;?>">
                        <br>
                        <label for="lastname">Apellido </label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $apellidoValue;?>">
                        <br>
                        <label for="nationality">Nacionalidad </label>
                        <input type="text" class="form-control" name="nationality" id="nationality" value="<?php echo $nacionalidadValue;?>">
                        <br>
                        <input type="submit" value="Actualizar" class="btn btn-primary form-control">
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>