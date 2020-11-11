<?php
    require 'config.php';
    
    $result = false;
    if(!empty($_POST)){
        $id = $_POST['id'];
        $newName = $_POST['name'];
        $newEmail = $_POST['email'];
        $sql = "UPDATE users SET use_name=:use_name, use_email=:use_email WHERE use_id=:use_id";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'use_id'=> $id,
            'use_name' => $newName,
            'use_email' => $newEmail
        ]);
        $nameValue = $newName;
        $emailValue = $newEmail;
    }else{
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE use_id=:use_id";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'use_id'=>$id
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $nameValue = $row['use_name'];
        $emailValue = $row['use_email'];
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
            <h1>Actualizar Usuario</h1>
            <hr>
            <a href="list.php">Regresar</a>
            <form action="update.php" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                <label for="name">Nombre: </label>
                <input type="text" name="name" id="name" value="<?php echo $nameValue;?>">
                <br>
                <label for="email">Correo Electrónico: </label>
                <input type="text" name="email" id="email" value="<?php echo $emailValue;?>">
                <br>
                <input type="submit" value="Actualizar" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>