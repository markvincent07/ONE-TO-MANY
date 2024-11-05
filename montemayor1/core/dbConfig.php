<?php  

$host = "localhost";
$user = "root";
$password = "";
$dbname = "montemayor2";
$dsn = "mysql:host={$host};dbname={$dbname}";
$pdo = new PDO($dsn, $user, $password);

?>