<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','final project');

try{
    $pdo= new PDO("mysql:dbname=".DB_NAME.";host=".DB_SERVER, DB_USERNAME,DB_PASSWORD);
}
catch(PDOException $e){
    die("Error in connection. ". $e->getMessage());
}
?>