<!DOCTYPE html>
<html lang="fr">
<<<<<<< HEAD

=======
>>>>>>> 2a5e71f (add all files from walid)
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion administrateur | Saveurs & Délices</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/login.css">

    <script src="/SAVEURS_ET_DELICES/assets/js/main.js" defer></script>
</head>

=======
    <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/admin.css">
</head>
>>>>>>> 2a5e71f (add all files from walid)
<body>

    <!-- header -->
    <header class="en-tete">
        <a href="/SAVEURS_ET_DELICES/public-pages/index.php" class="logo">
            <img src="/SAVEURS_ET_DELICES/assets/images/logos/logo.webp" class="logo-img" alt="Logo Saveurs & Délices" width="81" height="66">
            <div class="logo-textes">
                <span class="logo-titre">SAVEURS & DÉLICES</span>
                <span class="logo-sous-titre">Blog culinaire gourmand</span>
            </div>
        </a>
<<<<<<< HEAD

=======
        
>>>>>>> 2a5e71f (add all files from walid)
        <nav class="navigation" id="navigationPrincipale" aria-label="Menu principal">
            <a href="/SAVEURS_ET_DELICES/public-pages/index.php"><i class="fa-solid fa-house" aria-hidden="true"></i> Accueil</a>
            <a href="/SAVEURS_ET_DELICES/public-pages/apropos.php"><i class="fa-solid fa-circle-info" aria-hidden="true"></i> À propos</a>
            <a href="/SAVEURS_ET_DELICES/public-pages/contact.php"><i class="fa-solid fa-envelope" aria-hidden="true"></i> Contact</a>
<<<<<<< HEAD
        </nav>
<<<<<<< Updated upstream

        <a href="admin.php" class="connexion">
=======
        
        <a href="/SAVEURS_ET_DELICES/Login.php" class="connexion">
>>>>>>> Stashed changes
            <i class="fa-solid fa-arrow-right-to-bracket" aria-hidden="true"></i> Connexion
        </a>
=======
            <a href="/SAVEURS_ET_DELICES/Login.php" class="connexion">
            <i class="fa-solid fa-arrow-right-to-bracket"></i> Connexion</a>
        </nav>
>>>>>>> 2a5e71f (add all files from walid)

        <button class="declencheur-menu" id="declencheurMenu" aria-label="Ouvrir le menu">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
    </header>

    <!-- Container -->

    <main class="conteneur-admin">
        <div class="introduction-admin">
            <h1>Espace Administration</h1>
            <p>Connectez-vous pour gérer votre blog</p>
        </div>

        <div class="carte-connexion">
            <form>
                <div class="groupe-champ">
                    <label for="champEmail">Adresse email</label>
                    <div class="enveloppe-champ">
                        <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                        <input type="email" id="champEmail" placeholder="email@exemple.com" required>
                    </div>
                </div>

                <div class="groupe-champ">
                    <label for="champMotDePasse">Mot de passe</label>
                    <div class="enveloppe-champ">
                        <i class="fa-solid fa-lock" aria-hidden="true"></i>
                        <input type="password" id="champMotDePasse" placeholder="******" required>
                        <button type="button" id="basculeMotDePasse" class="bouton-invisible" aria-label="Afficher le mot de passe">
                        </button>
                    </div>
                </div>
                <div class="mot-de-passe-oublie">
                    <a href="#">Mot de passe oublié ?</a>
                </div>

                <button type="submit" class="bouton-connexion">Se connecter</button>
            </form>

            <div class="retour-accueil">
                <a href="index.php">Retour à l'accueil</a>
            </div>
        </div>
    </main>

    <!-- footer -->

    <footer>
        <h3>© 2026 Saveurs & Délices. Tous droits réservés.</h3>
        <p>Un blog culinaire pour partager la passion de la cuisine</p>
<<<<<<< HEAD

=======
    
>>>>>>> 2a5e71f (add all files from walid)
        <div class="reseaux-sociaux">
            <a href="https://www.instagram.com/saveurs_et_delices_traiteur/" target="_blank" aria-label="Instagram">
                <i class="fa-brands fa-instagram" aria-hidden="true"></i> SAVEURSDELICES
            </a>
            <a href="https://www.facebook.com/saveursetdelices.net/" target="_blank" aria-label="Facebook">
                <i class="fa-brands fa-facebook" aria-hidden="true"></i> @saveursdelices
            </a>
            <a href="https://www.youtube.com/channel/UCkjZTxEpBRsdzaHDBz9t2GQ/videos" target="_blank" aria-label="Youtube">
                <i class="fa-brands fa-youtube" aria-hidden="true"></i> SAVEURSDELICES
            </a>
        </div>
    </footer>
<<<<<<< HEAD
</body>

=======

    <!-- Menu burger -->

    <script>
        const declencheurMenu = document.getElementById('declencheurMenu');
        const navigationPrincipale = document.getElementById('navigationPrincipale');
        const rideauMenu = document.getElementById('rideauMenu');

        function basculerMenu() {
            navigationPrincipale.classList.toggle('ouvert');
            rideauMenu.classList.toggle('actif');
            document.body.classList.toggle('sans-defilement');
            
            
        }

        declencheurMenu.addEventListener('click', basculerMenu);
        rideauMenu.addEventListener('click', basculerMenu);
    </script>

</body>
>>>>>>> 2a5e71f (add all files from walid)
</html>