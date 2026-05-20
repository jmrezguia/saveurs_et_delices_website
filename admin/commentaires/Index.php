<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/commentaire.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Commentaires — Administration - Saveurs & Délices</title>
</head>

<body>

    <!-- ============================
         BARRE DE NAVIGATION
    ============================= -->
    <!-- ======================= HEADER ======================= -->
 <header class="header">

   <a href="/SAVEURS_ET_DELICES/public-pages/index.php" class="logo" aria-label="Aller à l'accueil">
        <img src="/SAVEURS_ET_DELICES/assets/images/logos/logo.webp"
         class="logo-img"
          alt="Logo Saveurs & Délices"
          width="81"
          height="66"
          loading="eager"
           />
           <div class="logo-texts">
            <span class="logo-text">SAVEURS & DÉLICES</span>
            <span class="logo-sub">Blog culinaire gourmand</span>
           </div>
    </a>

    <nav class="nav">

      <a href="#">
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

    <a href="#" class="login">
      <i class="fa-solid fa-arrow-right-to-bracket"></i>
      Connexion
    </a>

  </header>
    <!-------
         CONTENU PRINCIPAL
    ------->
    <main>

        <!-- ======= PANNEAU ADMINISTRATION ======= -->
        <section class="panneau-admin" aria-label="Panneau d'administration">

            <!-- Titre de la section -->
            <h2 class="titre-admin">
                 Administration
            </h2>

            <!-- Navigation : Articles / Commentaires / Statistiques -->
            <div class="nav-admin">

                <div class="item-admin">
                    <i class="fa-regular fa-file-lines icone-admin"></i>
                    <a href="#" class="bouton-admin">Articles</a>
                </div>

                <div class="item-admin">
                    <i class="fa-regular fa-comment icone-admin"></i>
                    <a href="#" class="bouton-admin bouton-admin--actif">Commentaires</a>
                </div>

                <div class="item-admin">
                    <i class="fa-solid fa-chart-bar icone-admin"></i>
                    <a href="#" class="bouton-admin">Statistiques</a>
                </div>

            </div>
        </section>
        <!-- fin panneau-admin -->


        <!-- ======= MODÉRATION DES COMMENTAIRES ======= -->
        <section class="section-moderation" aria-label="Modération des commentaires">

            <h3 class="titre-moderation">Modération des commentaires</h3>

            <!-- Commentaire 1 : Julie Lambert -->
            <article class="carte-commentaire" aria-label="Commentaire de Julie Lambert">

                <div class="entete-commentaire">

                    <!-- Auteur + date + article commenté -->
                    <div class="infos-auteur">
                        <div class="ligne-auteur">
                            <span class="nom-auteur">Julie Lambert</span>
                            <span class="date-commentaire">29/01/2025</span>
                        </div>
                        <p class="article-ref">Article: Pâtes Carbonara Authentiques</p>
                    </div>

                    <!-- Statut du commentaire (affiché à droite) -->
                    <span class="statut statut--approuve">
                        <i class="fa-solid fa-circle-check"></i> Approuvé
                    </span>

                </div>

                <!-- Corps du commentaire -->
                <p class="texte-commentaire">Excellente recette ! Les pâtes étaient parfaites et crémeuses. Merci pour les astuces !</p>

                <!-- Boutons de modération -->
                <div class="actions-commentaire">
                    <button class="bouton-rejeter">
                        <i class="fa-solid fa-circle-xmark"></i> Rejeter
                    </button>
                    <button class="bouton-supprimer">
                        <i class="fa-solid fa-trash"></i> Supprimer
                    </button>
                </div>

            </article>
            <!-- fin commentaire 1 -->


            <!-- Commentaire 2 : Marc Durand -->
            <article class="carte-commentaire" aria-label="Commentaire de Marc Durand">

                <div class="entete-commentaire">

                    <!-- Auteur + date + article commenté -->
                    <div class="infos-auteur">
                        <div class="ligne-auteur">
                            <span class="nom-auteur">Marc Durand</span>
                            <span class="date-commentaire">28/01/2025</span>
                        </div>
                        <p class="article-ref">Article: Pâtes Carbonara Authentiques</p>
                    </div>

                    <!-- Statut du commentaire (affiché à droite) -->
                    <span class="statut statut--approuve">
                        <i class="fa-solid fa-circle-check"></i> Approuvé
                    </span>

                </div>

                <!-- Corps du commentaire -->
                <p class="texte-commentaire">J'ai essayé hier soir, un vrai délice. Toute la famille a adoré.</p>

                <!-- Boutons de modération -->
                <div class="actions-commentaire">
                    <button class="bouton-rejeter">
                        <i class="fa-solid fa-circle-xmark"></i> Rejeter
                    </button>
                    <button class="bouton-supprimer">
                        <i class="fa-solid fa-trash"></i> Supprimer
                    </button>
                </div>

            </article>
            <!-- fin commentaire 2 -->

        </section>
        <!-- fin section-moderation -->

    </main>


    <!-- ============================
         PIED DE PAGE
    ============================= -->
    <!-- ======================= FOOTER ======================= -->
    <footer>

    <h3>© 2025 Saveurs & Délices. Tous droits réservés.</h3>

    <p>
      Un blog culinaire pour partager la passion de la cuisine
    </p>

    <div class="socials">

      <a href="#">
        <i class="fa-brands fa-instagram"></i>
        SAVEURSDELICES
      </a>

      <a href="#">
        <i class="fa-brands fa-twitter"></i>
        @saveursdelices
      </a>

      <a href="#">
        <i class="fa-brands fa-youtube"></i>
        SAVEURSDELICES
      </a>

    </div>

  </footer>

</body>
</html>