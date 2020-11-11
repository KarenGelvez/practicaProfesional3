<?php
    require 'config.php'
    
    $queryResult = $pdo->query("SELECT * FROM users");
?>
<html>
    <head>
        <title>Listar</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Listar Usuarios</h1>
            <a href="index2.php">Principal</a>
            <table class="table">
                <tr>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                    while($row = $queryResult->fetch(PDO::FETCH_ASSOC)){
                        echo '<tr>';
                        echo '<td>'.$row['use_name'].'</td>';
                        echo '<td>'.$row['use_email'].'</td>';
                        echo '<td><a href="update.php?id='.$row['use_id'].'">Actualizar</a></td>';
                        echo '<td><a href="delete.php?id='.$row['use_id'].'">Eliminar</a></td>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>