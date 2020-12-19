<?php
    $dbHost = 'database-parcial.cmbrl2byxwwt.us-east-1.rds.amazonaws.com';
    $dbPort = '3306';
    $dbName = 'db_parcial';
    $dbUser = 'admin';
    $dbPass = '01000110';
    try {
        $pdo = new PDO("mysql:host={$dbHost};port={$dbPort};dbname={$dbName}", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>