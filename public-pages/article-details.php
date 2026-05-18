<?php

require_once "../config/Database.php";
require_once "../models/Article.php";

$database = new Database();
$pdo = $database->connect();

$articleModel = new Article($pdo);

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: /SAVEURS_ET_DELICES/public-pages/index.php");
    exit;
}

$articleModel->incrementViews($id);
$article = $articleModel->getById($id);

if (!$article) {
    header("Location: /SAVEURS_ET_DELICES/public-pages/index.php");
    exit;
}

$tags = !empty($article["tags"]) ? explode(",", $article["tags"]) : [];
$ingredients = !empty($article["ingredients"]) ? explode("\n", $article["ingredients"]) : [];
$preparations = !empty($article["preparation"]) ? explode("\n", $article["preparation"]) : [];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($article["titre"]); ?> | Saveurs & Délices</title>

  <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/article-details.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <script src="/SAVEURS_ET_DELICES/assets/js/main.js" defer></script>
</head>

<body>

<header class="header">
  <a href="/SAVEURS_ET_DELICES/public-pages/index.php" class="logo">
    <img src="/SAVEURS_ET_DELICES/assets/images/logos/logo.webp"
      class="logo-img"
      alt="Logo Saveurs & Délices"
      width="81"
      height="66">

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
      <i class="fa-solid fa-house"></i> Accueil
    </a>

    <a href="#">
      <i class="fa-solid fa-circle-info"></i> À propos
    </a>

    <a href="#">
      <i class="fa-solid fa-envelope"></i> Contacts
    </a>
  </nav>

  <a href="#" class="login">
    <i class="fa-solid fa-arrow-right-to-bracket"></i>
    Connexion
  </a>
</header>

<div class="menu-overlay"></div>

<main class="details-page">

  <a href="/SAVEURS_ET_DELICES/public-pages/index.php" class="back-link">
    <i class="fa-solid fa-arrow-left"></i>
    Retour aux recettes
  </a>

  <article class="details-card">

    <div class="details-image">
      <img
        src="/SAVEURS_ET_DELICES/uploads/articles/<?= htmlspecialchars($article["image_url"]); ?>"
        alt="<?= htmlspecialchars($article["titre"]); ?>">

      <span class="category-badge">
        <?= htmlspecialchars($article["categorie"]); ?>
      </span>
    </div>

    <div class="details-content">

      <h1><?= htmlspecialchars($article["titre"]); ?></h1>

      <div class="article-meta">
        <span>
          <i class="fa-regular fa-calendar"></i>
          <?= date("d/m/Y", strtotime($article["created_at"])); ?>
        </span>

        <span>
          <i class="fa-regular fa-eye"></i>
          <?= htmlspecialchars($article["vues"]); ?> vues
        </span>

        <span>
          Par <?= htmlspecialchars($article["auteur"]); ?>
        </span>
      </div>

      <?php if (!empty($tags)): ?>
        <div class="tags">
          <?php foreach ($tags as $tag): ?>
            <?php if (trim($tag) !== ""): ?>
              <span>
                <i class="fa-solid fa-tag"></i>
                <?= htmlspecialchars(trim($tag)); ?>
              </span>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <p class="intro">
        <?= htmlspecialchars($article["resume"]); ?>
      </p>

      <hr>

      <?php if (!empty($ingredients)): ?>
        <h2>Ingrédients</h2>

        <ul>
          <?php foreach ($ingredients as $ingredient): ?>
            <?php if (trim($ingredient) !== ""): ?>
              <li><?= htmlspecialchars(trim($ingredient)); ?></li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php if (!empty($preparations)): ?>
        <h2>Préparation</h2>

        <?php foreach ($preparations as $step): ?>
          <?php if (trim($step) !== ""): ?>
            <p><?= htmlspecialchars(trim($step)); ?></p>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($article["cuisson"])): ?>
        <h2>Cuisson</h2>

        <p>
          <?= nl2br(htmlspecialchars($article["cuisson"])); ?>
        </p>
      <?php endif; ?>

      <?php if (!empty($article["contenu"])): ?>
        <h2>Informations complémentaires</h2>

        <p>
          <?= nl2br(htmlspecialchars($article["contenu"])); ?>
        </p>
      <?php endif; ?>

      <hr>

      <div class="share-box">
        <p>Partager cette recette</p>

        <div class="share-buttons">
          <a href="#" class="facebook">
            <i class="fa-brands fa-facebook-f"></i>
            Facebook
          </a>

          <a href="#" class="twitter">
            <i class="fa-brands fa-twitter"></i>
            Twitter
          </a>

          <a href="#" class="copy">
            <i class="fa-solid fa-link"></i>
            Copier le lien
          </a>
        </div>
      </div>

    </div>

  </article>

  <section class="comments-section">

    <h2>
      <i class="fa-regular fa-comment"></i>
      Commentaires
    </h2>

    <form class="comment-form">

      <h3>Laisser un commentaire</h3>

      <label for="name">Votre nom</label>
      <input type="text" id="name" name="name">

      <label for="comment">Votre commentaire</label>
      <textarea id="comment" name="comment"></textarea>

      <button type="submit">
        Publier le commentaire
      </button>

      <p class="moderation">
        <i class="fa-regular fa-clock"></i>
        Votre commentaire sera visible après modération.
      </p>

    </form>

  </section>

</main>

<footer>
  <h3>© 2025 Saveurs & Délices. Tous droits réservés.</h3>

  <p>
    Un blog culinaire pour partager la passion de la cuisine
  </p>

  <div class="socials">
    <a href="#"><i class="fa-brands fa-instagram"></i> SAVEURSDELICES</a>
    <a href="#"><i class="fa-brands fa-twitter"></i> @saveursdelices</a>
    <a href="#"><i class="fa-brands fa-youtube"></i> SAVEURSDELICES</a>
  </div>
</footer>

</body>
</html>