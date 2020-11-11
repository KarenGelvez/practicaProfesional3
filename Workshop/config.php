<?php
$dbHost = 'db-example-mysql.c2hdfs5ym0ko.us-east-1.rds.amazonaws.com';
$dbName = 'db_course';
$dbUser = 'dba';
$dbPass = '01000110';
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
}

?>