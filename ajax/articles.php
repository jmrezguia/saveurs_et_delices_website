<?php

require_once "../config/Database.php";
require_once "../models/Article.php";

header("Content-Type: application/json");

$database = new Database();
$pdo = $database->connect();

$article = new Article($pdo);

$action = $_POST["action"] ?? $_GET["action"] ?? "";




function uploadImage($inputName = "image") {

    if (!isset($_FILES[$inputName])) {
        return [
            "status" => false,
            "message" => "Image non reçue par PHP"
        ];
    }

    if ($_FILES[$inputName]["error"] !== 0) {
        return [
            "status" => false,
            "message" => "Erreur upload image. Code erreur : " . $_FILES[$inputName]["error"]
        ];
    }

    $uploadDir = __DIR__ . "/../uploads/articles/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }


    $extension = strtolower(pathinfo($_FILES[$inputName]["name"], PATHINFO_EXTENSION));

    $allowedExtensions = ["jpg", "jpeg", "png", "webp", "gif"];

    if (!in_array($extension, $allowedExtensions)) {
        return [
            "status" => false,
            "message" => "Format image non autorisé"
        ];
    }

    $imageName = time() . "_" . uniqid() . "." . $extension;

    $uploadPath = $uploadDir . $imageName;

    if (!move_uploaded_file($_FILES[$inputName]["tmp_name"], $uploadPath)) {
        return [
            "status" => false,
            "message" => "Impossible de déplacer l'image vers uploads/articles"
        ];
    }

    return [
        "status" => true,
        "fileName" => $imageName
    ];
}

if ($action === "create") {

    $upload = uploadImage("image");

    if ($upload["status"] === false) {
        echo json_encode([
            "success" => false,
            "message" => $upload["message"]
        ]);
        exit;
    }

    $_POST["image_url"] = $upload["fileName"];

    $success = $article->create($_POST);

    echo json_encode([
        "success" => $success,
        "message" => $success
            ? "Article ajouté avec succès"
            : "Erreur lors de l'ajout"
    ]);

    exit;

    
}

if ($action === "update") {

    $id = $_POST["id"] ?? null;

    $oldArticle = $article->getById($id);

    if (!$oldArticle) {
        echo json_encode([
            "success" => false,
            "message" => "Article introuvable"
        ]);
        exit;
    }

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {

        $upload = uploadImage("image");

        if ($upload["status"] === false) {
            echo json_encode([
                "success" => false,
                "message" => $upload["message"]
            ]);
            exit;
        }

        $_POST["image_url"] = $upload["fileName"];

    } else {

        $_POST["image_url"] = $oldArticle["image_url"];
    }

    $success = $article->update($id, $_POST);

    echo json_encode([
        "success" => $success,
        "message" => $success
            ? "Article modifié avec succès"
            : "Erreur lors de la modification"
    ]);

    exit;
}

if ($action === "delete") {

    $id = $_POST["id"] ?? null;

    $success = $article->delete($id);

    echo json_encode([
        "success" => $success,
        "message" => $success
            ? "Article supprimé avec succès"
            : "Erreur lors de la suppression"
    ]);

    exit;
}

if ($action === "getAll") {

    $articles = $article->getAll();

    echo json_encode($articles);

    exit;
}

echo json_encode([
    "success" => false,
    "message" => "Action inconnue"
]);

