<?php
    require 'config.php'

    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE use_id=:use_id";
    $query = $pdo->prepare($sql);
    $query->execute([
        'use_id'=>$id
    ]);
    header("Location:list.php");
?>
