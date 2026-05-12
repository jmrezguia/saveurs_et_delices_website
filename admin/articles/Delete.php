<?php

require_once "../../config/Database.php";
require_once "../../models/Article.php";

if (!isset($_GET["id"])) {
    header("Location: /SAVEURS_ET_DELICES/admin/Dashboard.php");
    exit;
}

$id = $_GET["id"];

$database = new Database();
$pdo = $database->connect();

$articleModel = new Article($pdo);
$articleModel->delete($id);

header("Location: /SAVEURS_ET_DELICES/admin/Dashboard.php");
exit;