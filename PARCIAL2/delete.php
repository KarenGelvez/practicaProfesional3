<?php
    require 'config.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM Estudiante WHERE IdLector=:id";
    $query = $pdo->prepare($sql);
    $query->execute([
        'id'=>$id
    ]);
    header("Location:list.php");
?>
