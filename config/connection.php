<?php

$host = "mysql";
$user = "root";
$password = "root";
$dbname = "agenda";

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    
    $connection->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);

} catch (Exception $e) {
    $error = $e->getMessage();
    echo "Error: $error";
}