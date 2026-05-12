<?php
require_once "config/Database.php";

$database = new Database();

$pdo = $database->connect();

if($pdo){
    echo "Connexion réussi";
}
?>