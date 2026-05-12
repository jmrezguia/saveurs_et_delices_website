<?php

require_once "../../config/Database.php";
require_once "../../models/Article.php";

$database = new Database();
$pdo = $database->connect();

$articleModel = new Article($pdo);

$id = $_GET["id"] ?? null;

if (!$id) {
    die("Article introuvable");
}

$article = $articleModel->getById($id);

if (!$article) {
    die("Article inexistant");
}

$articleTags = !empty($article["tags"]) ? explode(",", $article["tags"]) : [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier l'article</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/edit-article.css">
</head>

<body>

<header class="header">
  <a href="/SAVEURS_ET_DELICES/public-pages/index.php" class="logo">
    <img src="/SAVEURS_ET_DELICES/assets/images/logos/logo.webp" class="logo-img" alt="Logo" width="81" height="66">

    <div class="logo-texts">
      <span class="logo-text">SAVEURS & DÉLICES</span>
      <span class="logo-sub">Blog culinaire gourmand</span>
    </div>
  </a>

  <button class="nav-toggle" aria-label="Ouvrir le menu">
    <i class="fa-solid fa-bars"></i>
  </button>

  <nav class="nav">
    <a href="/SAVEURS_ET_DELICES/public-pages/index.php">
      <i class="fa-solid fa-house"></i>
      Accueil
    </a>

    <a href="#">
      <i class="fa-solid fa-circle-info"></i>
      À propos
    </a>

    <a href="#">
      <i class="fa-solid fa-envelope"></i>
      Contacts
    </a>
  </nav>

  <a href="#" class="logout">
    <i class="fa-solid fa-right-from-bracket"></i>
    Déconnexion
  </a>
</header>

<div class="menu-overlay"></div>

<main class="container">

  <div class="top-line">

    <div>

      <a href="/SAVEURS_ET_DELICES/admin/Dashboard.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i>
        Retour à l'administration
      </a>

      <h1 class="page-title">Modifier l'article</h1>

    </div>

    <button
      type="button"
      class="btn-delete deleteArticleBtn"
      data-id="<?= htmlspecialchars($article['id']); ?>">

      <i class="fa-solid fa-trash"></i>
      Supprimer
    </button>

  </div>

  <form
    id="editArticleForm"
    class="article-form"
    enctype="multipart/form-data">

    <input
      type="hidden"
      name="id"
      value="<?= htmlspecialchars($article['id']); ?>">

    <!-- TITRE -->

    <div class="form-group">

      <label>Titre de l'article *</label>

      <input
        type="text"
        name="titre"
        value="<?= htmlspecialchars($article['titre']); ?>"
        required>

    </div>

    <!-- AUTEUR -->

    <div class="form-group">

      <label>Auteur *</label>

      <input
        type="text"
        name="auteur"
        value="<?= htmlspecialchars($article['auteur']); ?>"
        required>

    </div>

    <!-- RESUME -->

    <div class="form-group">

      <label>Résumé *</label>

      <textarea
        name="resume"
        rows="4"
        required><?= htmlspecialchars($article['resume']); ?></textarea>

    </div>

    <!-- GRID -->

    <div class="form-grid">

      <div class="form-group">

        <label>Catégorie *</label>

        <select name="categorie" required>

          <option value="Entrée" <?= $article['categorie'] === 'Entrée' ? 'selected' : ''; ?>>
            Entrée
          </option>

          <option value="Plats principaux" <?= $article['categorie'] === 'Plats principaux' ? 'selected' : ''; ?>>
            Plats principaux
          </option>

          <option value="Dessert" <?= $article['categorie'] === 'Dessert' ? 'selected' : ''; ?>>
            Dessert
          </option>

          <option value="Soupe" <?= $article['categorie'] === 'Soupe' ? 'selected' : ''; ?>>
            Soupe
          </option>

          <option value="Pâtisserie" <?= $article['categorie'] === 'Pâtisserie' ? 'selected' : ''; ?>>
            Pâtisserie
          </option>

        </select>

      </div>

      <!-- IMAGE -->

      <div class="form-group">

        <label>Image de l'article</label>

        <input
          type="file"
          name="image"
          accept="image/*">

        <?php if (!empty($article["image_url"])): ?>

          <p class="current-image">
            Image actuelle :
            <?= htmlspecialchars($article["image_url"]); ?>
          </p>

        <?php endif; ?>

      </div>

    </div>

    <!-- TAGS -->

    <div class="form-group">

      <label>Tags</label>

      <div class="tags-box">

        <input
          type="text"
          id="tagInput"
          placeholder="Ajouter un tag...">

        <input
          type="hidden"
          name="tags"
          id="tagsHidden"
          value="<?= htmlspecialchars($article['tags'] ?? ''); ?>">

        <button type="button" class="btn-tag">
          <i class="fa-solid fa-plus"></i>
          Ajouter
        </button>

      </div>

      <div class="tags-list">

        <?php foreach ($articleTags as $tag): ?>

          <?php if (trim($tag) !== ""): ?>

            <span
              class="tag-item"
              data-tag="<?= htmlspecialchars(trim($tag)); ?>">

              <?= htmlspecialchars(trim($tag)); ?>

              <i class="fa-solid fa-xmark remove-tag"></i>

            </span>

          <?php endif; ?>

        <?php endforeach; ?>

      </div>

    </div>

    <!-- CONTENU -->

    <div class="form-group">

      <label>Contenu de l'article *</label>

      <textarea
        name="contenu"
        class="content-textarea"
        required><?= htmlspecialchars($article['contenu']); ?></textarea>

    </div>

    <!-- ACTIONS -->

    <div class="form-actions">

      <button type="button" class="btn-cancel">
        Annuler
      </button>

      <button type="submit" class="btn-submit">
        <i class="fa-solid fa-floppy-disk"></i>
        Enregistrer les modifications
      </button>

    </div>

  </form>

</main>

<script src="/SAVEURS_ET_DELICES/assets/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="/SAVEURS_ET_DELICES/assets/js/articles.js"></script>

</body>
</html>