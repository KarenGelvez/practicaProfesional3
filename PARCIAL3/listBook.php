<?php
    require 'db/config.php';
    require 'default/header.php';
    
    $queryResult = $pdo->query("SELECT * FROM Libro;");
?>
<html>
    <head>
        <title>Listar Libros</title>
        <meta charset="UTF-8"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h2 class='text-center'>Listar Libros</h2>
            <hr>            
            <table class="table">
                <tr>
                    <th>Titulo</th>
                    <th>Editorial</th>
                    <th>Área</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                    while($row = $queryResult->fetch(PDO::FETCH_ASSOC)){
                        echo '<tr>';
                        echo '<td>'.$row['Titulo'].'</td>';
                        echo '<td>'.$row['Editorial'].'</td>';
                        echo '<td>'.$row['Area'].'</td>';
                        echo '<td><a href="updateBook.php?id='.$row['IdLibro'].'">Actualizar</a></td>';
                        echo '<td><a href="deleteBook.php?id='.$row['IdLibro'].'">Eliminar</a></td>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>