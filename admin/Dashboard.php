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
  <title>Administration</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/dashboard.css">
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
    <a href="/SAVEURS_ET_DELICES/public-pages/index.php"><i class="fa-solid fa-house"></i> Accueil</a>
    <a href="#"><i class="fa-solid fa-circle-info"></i> À propos</a>
    <a href="#"><i class="fa-solid fa-envelope"></i> Contacts</a>
  </nav>

  <a href="#" class="logout">
    <i class="fa-solid fa-right-from-bracket"></i>
    Déconnexion
  </a>

</header>

<div class="menu-overlay"></div>

<main class="container">

  <section class="admin-title">
    <h2>Administration</h2>

    <div class="tabs">
      <div class="tab-box">
        <i class="fa-regular fa-file-lines"></i>
        <button>Articles</button>
      </div>

      <div class="tab-box">
        <i class="fa-regular fa-comments"></i>
        <button>Commentaires</button>
      </div>

      <div class="tab-box">
        <i class="fa-solid fa-chart-column"></i>
        <button>Statistiques</button>
      </div>
    </div>
  </section>

  <section class="section-header">
    <h2>Gestion des articles</h2>

    <a href="/SAVEURS_ET_DELICES/admin/articles/create.php" class="btn-add">
      <i class="fa-solid fa-plus"></i>
      Nouvel Article
    </a>
  </section>

  <section class="filters">
    <div class="filter-group">
      <label><i class="fa-solid fa-magnifying-glass"></i> Rechercher</label>
      <input type="text" placeholder="Rechercher par titre, catégorie ou auteur...">
    </div>

    <div class="filter-group">
      <label><i class="fa-regular fa-calendar"></i> Filtrer par date</label>
      <select>
        <option>Toutes les dates</option>
        <option>Janvier 2025</option>
        <option>Février 2025</option>
      </select>
    </div>

    <p class="results"><?= count($articles); ?> article(s) trouvé(s)</p>
  </section>

  <section class="table-container">
    <table>
      <thead>
        <tr>
          <th>Titre</th>
          <th>Catégorie</th>
          <th>Auteur</th>
          <th>Date</th>
          <th>Vues</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>

        <?php foreach($articles as $article): ?>

          <tr>
            <td data-label="Titre">
              <?= htmlspecialchars($article["titre"]); ?>
            </td>

            <td data-label="Catégorie">
              <span class="badge">
                <?= htmlspecialchars($article["categorie"]); ?>
              </span>
            </td>

            <td data-label="Auteur">
              Admin
            </td>

            <td data-label="Date">
              <?= date("d/m/Y", strtotime($article["created_at"])); ?>
            </td>

            <td data-label="Vues">
              <i class="fa-regular fa-eye"></i>
              <?= htmlspecialchars($article["vues"]); ?>
            </td>

            <td data-label="Actions">
              <div class="actions">

                <a href="/SAVEURS_ET_DELICES/admin/articles/edit.php?id=<?= $article["id"]; ?>">
                  <i class="fa-solid fa-pen-to-square edit"></i>
                </a>

                <button class="deleteArticleBtn" data-id="<?= $article["id"]; ?>">
                  <i class="fa-solid fa-trash delete"></i>
                </button>

              </div>
            </td>
          </tr>

        <?php endforeach; ?>

      </tbody>
    </table>
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

<script src="/SAVEURS_ET_DELICES/assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="/SAVEURS_ET_DELICES/assets/js/articles.js"></script>

</body>
</html>