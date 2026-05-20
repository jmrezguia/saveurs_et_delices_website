<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administration | Saveurs & Délices</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/commentaire.css">
</head>
    <body>

        <header class="en-tete">
        <a href="/SAVEURS_ET_DELICES/public-pages/index.php" class="logo">
      <img src="/SAVEURS_ET_DELICES/assets/images/logos/logo.webp" class="logo-img" alt="Logo Saveurs & Délices" width="81" height="66">
      <div class="logo-textes">
        <span class="logo-titre">SAVEURS & DÉLICES</span>
        <span class="logo-sous-titre">Blog culinaire gourmand</span>
      </div>
    </a>
    <button class="declencheur-menu" aria-label="Ouvrir le menu">
      <i class="fa-solid fa-bars"></i>
    </button>
    <nav class="navigation">
      <a href="index.php"><i class="fa-solid fa-house"></i> Accueil</a>
      <a href="apropos.php"><i class="fa-solid fa-circle-info"></i> À propos</a>
      <a href="contact.php"><i class="fa-solid fa-envelope"></i> Contacts</a>
    </nav>
    <a href="admin.php" class="connexion">
      <i class="fa-solid fa-arrow-right-to-bracket"></i> Connexion
    </a>
  </header>

  <div class="conteneur-admin">
    <section class="en-tete-admin">
        <div class="section-titre">
            <h1>Administration</h1>
            <p>Bienvenue, nomUser</p>
        </div>
        <a href="index.php" class="btn-deconnexion">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion
        </a>
    </section>

    <nav class="onglets">
        <a href="#" class="onglet"><i class="fa-regular fa-file-lines"></i> Articles</a>
        <a href="#" class="onglet"><i class="fa-regular fa-comment"></i> Commentaires</a>
        <a href="#" class="onglet actif"><i class="fa-solid fa-chart-line"></i> Statistiques</a>
    </nav>

    <main class="section-stats">
        <h2>Statistiques de consultation</h2>
        
        <div class="grille-stats">
        <div class="carte">
             <div class="carte-info">
                <p>Total Articles</p>
            </div>
        </div>
            
            <div class="carte">
                <div class="carte-info">
                    <p>Total Vues</p>
                </div>
            </div>
            
            <div class="carte">
                <div class="carte-info">
                    <p>Commentaires</p>
                </div>
            </div>
        </div>

        <div class="grille-stats">
            <div class="carte">
                <div class="carte-info">
                    <p>En attente</p>
                </div>
                <i class="fa-regular fa-clock carte-icone" aria-hidden="true"></i>
            </div>
            
            <div class="carte">
                <div class="carte-info">
                    <p>Approuvés</p>
                </div>
                <i class="fa-regular fa-circle-check carte-icone" aria-hidden="true"></i>
            </div>
            
            <div class="carte">
                <div class="carte-info">
                    <p>Vues / Article</p>
                </div>
            </div>
        </div>

        <section class="articles-consultes" aria-labelledby="titre-articles-populaires">
            <h3 id="titre-articles-populaires">Articles les plus consultés</h3>
            <ol class="liste-articles">
                <li class="ligne-article">
                    <div class="bloc-gauche">
                        <span class="rond-position" aria-hidden="true">1</span>
                        <span class="titre-article">Article 1</span>
                    </div>
                    <div class="bloc-vues" aria-label="2150 vues">
                        <i class="fa-regular fa-eye" aria-hidden="true"></i>
                    </div>
                </li>

                <li class="ligne-article">
                    <div class="bloc-gauche">
                        <span class="rond-position" aria-hidden="true">2</span>
                        <span class="titre-article">Article 2</span>
                    </div>
                    <div class="bloc-vues" aria-label="1420 vues">
                        <i class="fa-regular fa-eye" aria-hidden="true"></i>
                    </div>
                </li>

                <li class="ligne-article">
                    <div class="bloc-gauche">
                        <span class="rond-position" aria-hidden="true">3</span>
                        <span class="titre-article">Article 3</span>
                    </div>
                    <div class="bloc-vues" aria-label="1250 vues">
                        <i class="fa-regular fa-eye" aria-hidden="true"></i>
                    </div>
                </li>

                <li class="ligne-article">
                    <div class="bloc-gauche">
                        <span class="rond-position" aria-hidden="true">4</span>
                        <span class="titre-article">Article 4</span>
                    </div>
                    <div class="bloc-vues" aria-label="980 vues">
                        <i class="fa-regular fa-eye" aria-hidden="true"></i>
                    </div>
                </li>

                <li class="ligne-article">
                <div class="bloc-gauche">
                 <span class="rond-position" aria-hidden="true">5</span>
                <span class="titre-article">Article 5</span>
                        </div>
                        <div class="bloc-vues" aria-label="750 vues">
                        <i class="fa-regular fa-eye" aria-hidden="true"></i>
                    </div>
                </li>
            </ol>
        </section>
    </main>
  </div>

  <!-- footer -->

  <footer>
      <h3>© 2026 Saveurs & Délices. Tous droits réservés.</h3>
      <p>Un blog culinaire pour partager la passion de la cuisine</p>
      <div class="reseaux-sociaux">
          <a href="https://www.instagram.com/saveurs_et_delices_traiteur/" target="_blank"><i class="fa-brands fa-instagram"></i> SAVEURSDELICES</a>
          <a href="https://www.facebook.com/saveursetdelices.net/" target="_blank"><i class="fa-brands fa-facebook"></i> @saveursdelices</a>
          <a href="https://www.youtube.com/channel/UCkjZTxEpBRsdzaHDBz9t2GQ/videos" target="_blank"><i class="fa-brands fa-youtube"></i> SAVEURSDELICES</a>
      </div>
  </footer>

<!-- script menu burger -->

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const declencheur = document.querySelector('.declencheur-menu');
    const navigation = document.querySelector('.navigation');

    declencheur.addEventListener('click', () => {
      navigation.classList.toggle('ouvert');
    });
  });
</script>
</body>
</html>