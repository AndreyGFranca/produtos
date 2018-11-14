<?php
$host = "localhost";
$db_name = "Produtos_DB";
$username = "root";
$password = "dedey123";
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
} catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
