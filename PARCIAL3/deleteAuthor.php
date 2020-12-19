<?php
    require 'db/config.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM Autor WHERE IdAutor=:id";
    $query = $pdo->prepare($sql);
    $query->execute([
        'id'=>$id
    ]);
    header("Location:listAuthor.php");
?>