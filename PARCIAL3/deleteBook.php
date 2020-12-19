<?php
    require 'db/config.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM LibAut WHERE IdLibro=:id";
    $query = $pdo->prepare($sql);
    $query->execute([
        'id'=>$id
    ]);

    $sql2 = "DELETE FROM Libro WHERE IdLibro=:id";
    $query2 = $pdo->prepare($sql2);
    $query2->execute([
        'id'=>$id
    ]);
    header("Location:listBook.php");
?>