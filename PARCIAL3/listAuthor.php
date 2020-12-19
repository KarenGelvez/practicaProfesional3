<?php
    require 'db/config.php';
    require 'default/header.php';
    
    $queryResult = $pdo->query("SELECT * FROM Autor");
?>
<html>
    <head>
        <title>Listar Autores</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="container">
            <h2 class="text-center">Listar Autores</h2>
            <hr>
            
            <table class="table">
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Nacionalidad</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                    while($row = $queryResult->fetch(PDO::FETCH_ASSOC)){
                        echo '<tr>';
                        echo '<td>'.$row['Nombre'].'</td>';
                        echo '<td>'.$row['Apellido'].'</td>';
                        echo '<td>'.$row['Nacionalidad'].'</td>';
                        echo '<td><a href="updateAuthor.php?id='.$row['IdAutor'].'">Actualizar</a></td>';
                        echo '<td><a href="deleteAuthor.php?id='.$row['IdAutor'].'">Eliminar</a></td>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>