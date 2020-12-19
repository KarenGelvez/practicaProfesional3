<?php
    require 'db/config.php';
    require 'default/header.php';
    
    $result = false;
    if(!empty($_POST)){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $nationality = $_POST['nationality'];
        $sql = "INSERT INTO Autor(Nombre, Apellido, Nacionalidad)  VALUES (:nombre, :apellido, :nacionalidad)";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'nombre' => $name,
            'apellido' => $lastname,
            'nacionalidad' => $nationality,
        ]);
    }
?>
<html>
    <head>
        <title>Registrar Autor</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="container">
            <?php
                if($result) {
                    echo '<div class="alert alert-success">¡Registro Exitoso!</div>';
                }
            ?>
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2 class=' text-center'>Agregar Autor</h2>
                <hr>
                <form  action="addAuthor.php" method="post">
                    <label for="name">Nombre </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
                    <br>
                    <label for="lastname">Apellido </label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellido">
                    <br>
                    <label for="nationality">Nacionalidad </label>
                    <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nacionalidad">
                    <br>
                    <input type="submit" value="Guardar" class="btn btn-primary form-control">
                </form>
            </div>
            <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>