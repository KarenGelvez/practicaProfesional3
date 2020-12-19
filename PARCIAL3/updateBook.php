<?php
    require 'db/config.php';
    require 'default/header.php';
    
    $result = false;
    $Authors = $pdo->query("SELECT IdAutor, CONCAT(Nombre,' ',Apellido) as Autor FROM Autor");
    if(!empty($_POST)){
        $id = $_POST['id'];
        $idAutor = $_POST['idAuthor'];
        $newTitulo = $_POST['title'];
        $newEditorial = $_POST['editorial'];
        $newArea = $_POST['area'];

        $sql = "UPDATE Libro 
                SET Titulo=:titulo, Editorial=:editorial, Area=:area
                WHERE IdLibro=:id";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id' => $id,
            'titulo' => $newTitulo,
            'editorial' => $newEditorial,
            'area' => $newArea,
        ]);
        $sql2 = "UPDATE LibAut 
                SET IdAutor=:idAutor
                WHERE IdLibro=:id";
        $query2 = $pdo->prepare($sql2);
        $result2 = $query2->execute([
            'id' => $id,
            'idAutor' => $idAutor,
        ]);
        $titleValue = $newTitulo;
        $editorialValue = $newEditorial;
        $areaValue = $newArea;
        $autorValue = $idAutor;

    }else{
        $id = $_GET['id'];
        $sql = "SELECT l.Titulo, l.Editorial, l.Area, l.IdLibro, la.IdAutor FROM Libro l, LibAut la WHERE la.IdLibro = l.IdLibro and l.IdLibro=:id;";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id'=>$id
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $idValue = $row['IdLibro'];
        $titleValue = $row['Titulo'];
        $editorialValue = $row['Editorial'];
        $areaValue = $row['Area'];
        $autorValue = $row['IdAutor'];
    }
?>
<html>
    <head>
        <title>Actualizar Libro</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h2 class='text-center'>Actualizar Libro</h2>
                    <hr>
                    <form action="updateBook.php" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $idValue;?>">
                        <label for="title">Título </label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $titleValue;?>">
                        <br>
                        <label for="editorial">Editorial </label>
                        <input type="text" class="form-control" name="editorial" id="editorial" value="<?php echo $editorialValue;?>">
                        <br>
                        <label for="area">Área </label>
                        <input type="text" class="form-control" name="area" id="area" value="<?php echo $areaValue;?>">
                        <br>
                        <select class="form-select" aria-label="Default select example" name="idAuthor" id="idAuthor">
                            <?php
                                while($row = $Authors->fetch(PDO::FETCH_ASSOC)){
                                    if($row['IdAutor'] ==  $autorValue){
                                        echo '<option value="'.$row['IdAutor'].'" selected>'.$row['Autor'].'</option>';
                                    }else{
                                        echo '<option value="'.$row['IdAutor'].'">'.$row['Autor'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <br>
                        <input type="submit" value="Actualizar" class="btn btn-primary form-control">
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>