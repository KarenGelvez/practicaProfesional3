<?php
    require 'db/config.php';
    require 'default/header.php';
    
    $queryResult = $pdo->query("SELECT CONCAT(a.Nombre,' ',a.Apellido) as Autor, l.Titulo, l.Editorial, l.Area FROM Libro l, Autor a, LibAut la WHERE a.IdAutor = la.IdAutor and la.IdLibro = l.IdLibro");
?>
<html>
    <head>
        <title>Libros</title>
        <meta charset="UTF-8"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h2 class='text-center'>Libros</h2>
            <hr>            
            <table class="table">
                <tr>
                    <th>Autor</th>
                    <th>Titulo</th>
                    <th>Editorial</th>
                    <th>Área</th>
                </tr>
                <?php
                    while($row = $queryResult->fetch(PDO::FETCH_ASSOC)){
                        echo '<tr>';
                        echo '<td>'.$row['Autor'].'</td>';
                        echo '<td>'.$row['Titulo'].'</td>';
                        echo '<td>'.$row['Editorial'].'</td>';
                        echo '<td>'.$row['Area'].'</td>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>