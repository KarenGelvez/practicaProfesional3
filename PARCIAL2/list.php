<?php
    require 'config.php';
    
    $queryResult = $pdo->query("SELECT * FROM Estudiante");
?>
<html>
    <head>
        <title>Listar</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Listar Estudiantes</h1>
            <hr>
            <a href="index.php">Principal</a>
            
            <table class="table">
                <tr>
                    <th>Codigo de Identificación</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Carrera</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                    while($row = $queryResult->fetch(PDO::FETCH_ASSOC)){
                        echo '<tr>';
                        echo '<td>'.$row['CI'].'</td>';
                        echo '<td>'.$row['Nombre'].'</td>';
                        echo '<td>'.$row['Apellido'].'</td>';
                        echo '<td>'.$row['Direccion'].'</td>';
                        echo '<td>'.$row['Carrera'].'</td>';
                        echo '<td>'.$row['Fecha_nac'].'</td>';
                        echo '<td><a href="update.php?id='.$row['IdLector'].'">Actualizar</a></td>';
                        echo '<td><a href="delete.php?id='.$row['IdLector'].'">Eliminar</a></td>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>