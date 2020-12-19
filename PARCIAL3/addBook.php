<?php
    require 'db/config.php';
    require 'default/header.php';

    $Authors = $pdo->query("SELECT IdAutor, CONCAT(Nombre,' ',Apellido) as Autor FROM Autor");

    $result = false;
    if(!empty($_POST)){
        $idAuthor = $_POST['idAuthor'];
        $title = $_POST['title'];
        $editorial = $_POST['editorial'];
        $area = $_POST['area'];
        $sql = "INSERT INTO Libro(Titulo, Editorial, Area)  VALUES (:titulo, :editorial, :area)";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'titulo' => $title,
            'editorial' => $editorial,
            'area' => $area,
        ]);
        if($result){
            $book = $pdo->query("SELECT * FROM Libro ORDER BY IdLibro DESC LIMIT 1;");
            $row = $book->fetch(PDO::FETCH_ASSOC);
            $sql2 = "INSERT INTO LibAut VALUES (:idAutor, :idLibro)";
            $query2 = $pdo->prepare($sql2);
            $result2 = $query2->execute([
                'idAutor' => $idAuthor,
                'idLibro' => $row['IdLibro']
            ]);
        }
    }
?>
<html>
    <head>
        <title>Lector</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
                <h2 class='text-center'>Registrar Libro</h2>
                <hr>
                <form  action="addBook.php" method="post">
                                   
                    <label for="title">Título </label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Título">
                    <br>
                    <label for="editorial">Editorial </label>
                    <input type="text" class="form-control" name="editorial" id="editorial" placeholder="Editorial">
                    <br>
                    <label for="area">Area </label>
                    <input type="text" class="form-control" name="area" id="area" placeholder="Area">
                    <br>
                    <select class="form-select" aria-label="Default select example" name="idAuthor" id="idAuthor">
                        <?php
                            while($row = $Authors->fetch(PDO::FETCH_ASSOC)){
                                echo '<option value="'.$row['IdAutor'].'">'.$row['Autor'].'</option>';
                            }
                        ?>
                    </select>
                    <br>
                    <input type="submit" value="Guardar" class="btn btn-primary form-control">
                </form>
            </div>
            <div class="col-md-4"></div>
            </div>

            
        </div>
    </body>
</html>
