<?php
    require 'config.php';
    
    $result = false;
    if(!empty($_POST)){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = base64_encode($_POST['password']);
        $sql = "INSERT INTO users(use_name, use_email, use_password) VALUES (:use_name, :use_email, :use_password)";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'use_name' => $name,
            'use_email' => $email,
            'use_password' => $password
        ]);
    }
?>
<html>
    <head>
        <title>Añadir</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Agregar Usuario</h1>
            <hr>
            <a href="index.php">Principal</a>
            <?php
                if($result) {
                    echo '<div class="alert alert-success">¡Registro Exitoso!</div>';
                }
            ?>
            <form action="add.php" method="post">
            
                <label for="name">Nombre: </label>
                <input type="text" name="name" id="name">
                <br>
                <label for="email">Correo Electrónico: </label>
                <input type="text" name="email" id="email">
                <br>
                <label for="password">Contraseña: </label>
                <input type="password" name="password" id="password">
                <br>
                <input type="submit" value="Guardar" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>