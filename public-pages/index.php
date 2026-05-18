<?php

// Initialisation des dépendances de l’application
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

  <!-- Responsive / mobile first -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- SEO -->
  <meta name="description" content="Saveurs & Délices - Blog culinaire gourmand">

  <title>Saveurs & Délices | Accueil</title>

  <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <script src="/SAVEURS_ET_DELICES/assets/js/main.js" defer></script>
</head>

<body>

  <!-- Header principal -->
  <header class="header">

    <a
      href="/SAVEURS_ET_DELICES/public-pages/index.php"
      class="logo"
      aria-label="Retour à l'accueil">

      <img
        src="/SAVEURS_ET_DELICES/assets/images/logos/logo.webp"
        class="logo-img"
        alt="Logo Saveurs & Délices"
        width="81"
        height="66">

      <div class="logo-texts">
        <span class="logo-text">SAVEURS & DÉLICES</span>
        <span class="logo-sub">Blog culinaire gourmand</span>
      </div>

    </a>

    <!-- Navigation mobile -->
    <button
      class="nav-toggle"
      aria-label="Ouvrir le menu"
      aria-expanded="false">

      <i class="fa-solid fa-bars" aria-hidden="true"></i>

    </button>

    <nav class="nav" aria-label="Navigation principale">

      <a href="#">
        <i class="fa-solid fa-house" aria-hidden="true"></i>
        Accueil
      </a>

      <a href="#">
        <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
        À propos
      </a>

      <a href="#">
        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
        Contacts
      </a>

    </nav>

    <a href="#" class="login" aria-label="Connexion">
      <i class="fa-solid fa-arrow-right-to-bracket" aria-hidden="true"></i>
      Connexion
    </a>

  </header>

  <div class="menu-overlay"></div>

  <main>

    <!-- Hero section -->
    <section id="hero" class="hero">

      <div class="container hero-inner">

        <h1 class="hero-title">
          Savourez chaque instant
        </h1>

        <p class="hero-subtitle">
          Découvrez des recettes authentiques et des conseils culinaires pour sublimer votre cuisine
        </p>

        <!-- Zone de recherche -->
        <div class="hero-search">

          <input
            type="search"
            placeholder="Chercher une recette..."
            class="search-input"
            aria-label="Rechercher une recette">

          <span class="search-badge" aria-hidden="true">
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
          </span>

        </div>

      </div>

    </section>

    <!-- Navigation catégories -->
    <section id="nav-go" class="section nav-go">

      <div class="container">

        <div class="nav-center">

          <h2>Catégories:</h2>

          <nav
            class="main-nav second-list"
            aria-label="Catégories de recettes">

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

    <!-- Articles dynamiques -->
    <section
      id="article"
      class="section article"
      aria-label="Articles publiés">

      <div class="container">

        <div class="cards-grid">

          <?php foreach ($articles as $article): ?>

  <article
  class="card-article"
  data-url="/SAVEURS_ET_DELICES/public-pages/article-details.php?id=<?= $article['id']; ?>">

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

      <?php $tags = explode(",", $article["tags"]); ?>

      <div class="tag-badge">

        <?php foreach ($tags as $tag): ?>

          <span class="tag">
            <i class="fa-solid fa-tag" aria-hidden="true"></i>
            <?= htmlspecialchars(trim($tag)); ?>
          </span>

        <?php endforeach; ?>

      </div>

    <?php endif; ?>

    <div class="day">

      <span class="date">
        <i class="fa-regular fa-calendar" aria-hidden="true"></i>
        <?= date("d/m/Y", strtotime($article["created_at"])); ?>
      </span>

      <span class="show">
        <i class="fa-regular fa-eye" aria-hidden="true"></i>
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

  <!-- Footer -->
  <footer>
        <h3>
      © 2025 Saveurs & Délices. Tous droits réservés.
    </h3>

    <p>
      Un blog culinaire pour partager la passion de la cuisine
    </p>

    <div class="socials">

      <a href="#">
        <i class="fa-brands fa-instagram" aria-hidden="true"></i>
        SAVEURSDELICES
      </a>

      <a href="#">
        <i class="fa-brands fa-twitter" aria-hidden="true"></i>
        @saveursdelices
      </a>

      <a href="#">
        <i class="fa-brands fa-youtube" aria-hidden="true"></i>
        SAVEURSDELICES
      </a>

    </div>

  </footer>

</body>
</html>