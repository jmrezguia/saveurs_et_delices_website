<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Créer un article</title>

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/create-article.css">
</head>

<body>

<header class="header">
  <a href="/SAVEURS_ET_DELICES/public-pages/index.php" class="logo">
    <img src="/SAVEURS_ET_DELICES/assets/images/logos/logo.webp"
      class="logo-img" alt="Logo" width="81" height="66">

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

  <a href="#" class="logout">
    <i class="fa-solid fa-right-from-bracket"></i>
    Déconnexion
  </a>
</header>

<div class="menu-overlay"></div>

<main class="container">

  <a href="/SAVEURS_ET_DELICES/admin/Dashboard.php" class="back-link">
    <i class="fa-solid fa-arrow-left"></i>
    Retour à l'administration
  </a>

  <h1 class="page-title">Créer un nouvel article</h1>

  <form
    id="createArticleForm"
    class="article-form"
    enctype="multipart/form-data">

    <!-- TITRE -->

    <div class="form-group">
      <label>Titre de l'article *</label>

      <input
        type="text"
        name="titre"
        placeholder="Ex: Tarte aux pommes maison"
        required>
    </div>

    <!-- AUTEUR -->

    <div class="form-group">
      <label>Auteur *</label>

      <input
        type="text"
        name="auteur"
        placeholder="Ex: Sophie Dubois"
        required>
    </div>

    <!-- RESUME -->

    <div class="form-group">
      <label>Résumé *</label>

      <textarea
        name="resume"
        rows="4"
        placeholder="Une description courte et engageante de votre recette..."
        required></textarea>
    </div>

    <!-- GRID -->

    <div class="form-grid">

      <div class="form-group">
        <label>Catégorie *</label>

        <select name="categorie" required>
          <option value="">Choisir une catégorie</option>
          <option>Entrée</option>
          <option>Dessert</option>
          <option>Plat principal</option>
          <option>Soupe</option>
        </select>
      </div>

      <div class="form-group">
        <label>Image de l'article *</label>

        <input
          type="file"
          name="image"
          accept="image/*"
          required>
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
          id="tagsHidden">

        <button type="button" class="btn-tag">
          <i class="fa-solid fa-plus"></i>
          Ajouter
        </button>

      </div>

      <div class="tags-list"></div>

    </div>

    <!-- CONTENU -->

    <div class="form-group">
      <label>Contenu de l'article *</label>

      <textarea
        name="contenu"
        class="content-textarea"
        placeholder="Écrivez le contenu complet de votre article ici..."
        required></textarea>
    </div>

    <!-- ACTIONS -->

    <div class="form-actions">

      <button type="button" class="btn-cancel">
        Annuler
      </button>

      <button type="submit" class="btn-submit">
        <i class="fa-solid fa-floppy-disk"></i>
        Publier l'article
      </button>

    </div>

  </form>

</main>

<script src="/SAVEURS_ET_DELICES/assets/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="/SAVEURS_ET_DELICES/assets/js/articles.js"></script>

</body>
</html>