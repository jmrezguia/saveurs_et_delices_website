<?php

require_once "../config/Database.php";
require_once "../models/Article.php";

$database = new Database();
$pdo = $database->connect();

$articleModel = new Article($pdo);
$articles = $articleModel->getAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Saveurs & Délices - Page d'accueil">
  <title>Saveurs & Délices | Page d'accueil</title>

  <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <script src="/SAVEURS_ET_DELICES/assets/js/main.js" defer></script>
</head>

<body>

<header class="header">
  <a href="/SAVEURS_ET_DELICES/public-pages/index.php" class="logo">
    <img src="/SAVEURS_ET_DELICES/assets/images/logos/logo.webp" class="logo-img" alt="Logo Saveurs & Délices" width="81" height="66">

    <div class="logo-texts">
      <span class="logo-text">SAVEURS & DÉLICES</span>
      <span class="logo-sub">Blog culinaire gourmand</span>
    </div>
  </a>

  <button class="nav-toggle" aria-label="Ouvrir le menu">
    <i class="fa-solid fa-bars"></i>
  </button>

  <nav class="nav">
    <a href="#"><i class="fa-solid fa-house"></i> Accueil</a>
    <a href="#"><i class="fa-solid fa-circle-info"></i> À propos</a>
    <a href="#"><i class="fa-solid fa-envelope"></i> Contacts</a>
  </nav>

  <a href="#" class="login">
    <i class="fa-solid fa-arrow-right-to-bracket"></i>
    Connexion
  </a>
</header>

<div class="menu-overlay"></div>

<main>

  <section id="hero" class="hero">
    <div class="container hero-inner">
      <h1 class="hero-title">Savourez chaque instant</h1>

      <p class="hero-subtitle">
        Découvrez des recettes authentiques et des conseils culinaires pour sublimer votre cuisine
      </p>

      <div class="hero-search">
        <input type="search" placeholder="Chercher une recette..." class="search-input">

        <span class="search-badge">
          <i class="fa-solid fa-magnifying-glass"></i>
        </span>
      </div>
    </div>
  </section>

  <section id="nav-go" class="section nav-go">
    <div class="container">
      <div class="nav-center">
        <h2>Catégories:</h2>

        <nav class="main-nav second-list">
          <ul class="nav-list">
            <li><a href="#" class="nav-style">Toutes</a></li>
            <li><a href="#" class="nav-style">Plats principaux</a></li>
            <li><a href="#" class="nav-style">Desserts</a></li>
            <li><a href="#" class="nav-style">Entrées</a></li>
            <li><a href="#" class="nav-style">Soupes</a></li>
            <li><a href="#" class="nav-style">Pâtisserie</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </section>

  <section id="article" class="section article">
    <div class="container">
      <div class="cards-grid">

        <?php foreach ($articles as $article): ?>

          <article class="card-article">

            <div class="article-media">
              <img
                src="/SAVEURS_ET_DELICES/uploads/articles/<?= htmlspecialchars($article["image_url"]); ?>"
                alt="<?= htmlspecialchars($article["titre"]); ?>"
                loading="lazy">

              <span class="article-badge">
                <?= htmlspecialchars($article["categorie"]); ?>
              </span>
            </div>

            <h3><?= htmlspecialchars($article["titre"]); ?></h3>

            <p><?= htmlspecialchars($article["resume"]); ?></p>

            <?php if (!empty($article["tags"])): ?>
              <div class="tag-badge">
                <?php
                  $tags = explode(",", $article["tags"]);
                  foreach ($tags as $tag):
                ?>
                  <span class="tag">
                    <i class="fa-solid fa-tag"></i>
                    <?= htmlspecialchars(trim($tag)); ?>
                  </span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div class="day">
              <span class="date">
                <i class="fa-regular fa-calendar"></i>
                <?= date("d/m/Y", strtotime($article["created_at"])); ?>
              </span>

              <span class="show">
                <i class="fa-regular fa-eye"></i>
                <?= htmlspecialchars($article["vues"]); ?>
              </span>
            </div>

            <div class="line"></div>

            <span class="user">
              Par <?= htmlspecialchars($article["auteur"]); ?>
            </span>

          </article>

        <?php endforeach; ?>

      </div>
    </div>
  </section>

</main>

<footer>
  <h3>© 2025 Saveurs & Délices. Tous droits réservés.</h3>
  <p>Un blog culinaire pour partager la passion de la cuisine</p>

  <div class="socials">
    <a href="#"><i class="fa-brands fa-instagram"></i> SAVEURSDELICES</a>
    <a href="#"><i class="fa-brands fa-twitter"></i> @saveursdelices</a>
    <a href="#"><i class="fa-brands fa-youtube"></i> SAVEURSDELICES</a>
  </div>
</footer>

</body>
</html>