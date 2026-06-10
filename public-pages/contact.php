<?php
ini_set('display_errors',true);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SAVEURS_ET_DELICES/assets/css/pages/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Contact - Saveurs & Délices</title>
</head>

<body>

    <!-- ============================
         BARRE DE NAVIGATION
    ============================= -->
   <!-- ======================= HEADER ======================= -->
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
    <a href="index.php"><i class="fa-solid fa-house"></i> Accueil</a>
    <a href="apropos.php"><i class="fa-solid fa-circle-info"></i> À propos</a>
    <a href="contact.php"><i class="fa-solid fa-envelope"></i> Contacts</a>
    <a href="/SAVEURS_ET_DELICES/Login.php" class="login">
    <i class="fa-solid fa-arrow-right-to-bracket"></i>
    Connexion
  </a>
  </nav>
</header>
    <!-------
         CONTENU PRINCIPAL
    ------>
    <main>

        <!-- Titre de la page -->
        <section aria-label="Titre de la page">
            <h2 class="titre-page">contactez-nous</h2>
            <p class="sous-titre">Une question, une suggestion ? N'hésitez pas à nous écrire !</p>
        </section>

        <!-- Grille : colonne gauche + colonne droite -->
        <div class="grille-contenu">

            <!-- ======= COLONNE GAUCHE ======= -->
            <div class="colonne-gauche">

                <!-- Carte : Nos coordonnées -->
                <section class="carte carte-coordonnees" aria-label="Nos coordonnées">
                    <h3>Nos coordonnées</h3>
                    <address>
                        <p>&#9993; <strong>email</strong><br>
                            <a href="mailto:contact@delices-recettes.fr">contact@delices-recettes.fr</a>
                        </p>
                        <p><i class="fa-solid fa-phone"></i> <strong>Téléphone</strong><br>
                            <a href="tel:+330000000000">+00 000 000</a>
                        </p>
                        <p><i class="fa-solid fa-location-dot"></i><strong>Adresse</strong><br>
                            123 Rue de la Cuisine<br>
                            75001 Paris, France
                        </p>
                    </address>
                </section>

                <!-- Carte : Horaires -->
                <section class="carte carte-horaires" aria-label="Horaires de réponse">
                    <h3>Horaires de réponse</h3>
                    <p><strong>Lundi &ndash; Vendredi :</strong> 9h &ndash; 18h</p>
                    <p><strong>Weekend :</strong> Fermé</p>
                    <p>Nous répondons généralement sous 24 &ndash; 48h</p>
                </section>

            </div><!-- fin colonne-gauche -->

            <!-- ======= COLONNE DROITE ======= -->
            <div class="colonne-droite">

                <!-- Formulaire de contact -->
                <section class="carte-formulaire" aria-label="Formulaire de contact">
                    <h3>Envoyez-nous un message</h3>
                    <form action="/SAVEURS_ET_DELICES/admin/traitement.php" method="POST" id="myform">

                        <!-- Nom + Email sur la même ligne -->
                        <div class="ligne-formulaire">
                            <div class="groupe-champ">
                                <label for="nom">Nom complet <span class="obligatoire" aria-label="champ obligatoire">*</span></label>
                                <input type="text" id="nom" name="nom" required>
                            </div>
                            <div class="groupe-champ">
                                <label for="email">Email <span class="obligatoire" aria-label="champ obligatoire">*</span></label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="groupe-champ">
                            <label for="sujet">Sujet <span class="obligatoire" aria-label="champ obligatoire">*</span></label>
                            <input type="text" id="sujet" name="sujet" required>
                        </div>

                        <div class="groupe-champ">
                            <label for="message">Message <span class="obligatoire" aria-label="champ obligatoire">*</span></label>
                            <textarea id="message" name="message" required></textarea>
                        </div>

                        <div class="groupe-champ">
                            <p class="titre-rgpd">RGPD </p>

                           <div class="groupe-checkbox">
                            <input type="checkbox" id="accept" name="RGPD" required>
                            <label for="accept"> J’accepte que les données renseignées dans ce formulaire soient utilisées uniquement pour répondre à ma demande.<span class="obligatoire" aria-label="champ obligatoire">*</span></label>
                           </div> 
                             
                        <button type="submit" class="bouton-envoyer" name="Envoyer"> <i class="fa-regular fa-paper-plane"></i> Envoyer</button>

                    </form>
                </section>

                <!-- Questions fréquentes -->
                <section class="carte-faq" aria-label="Questions fréquentes">
                    <h3>Questions fréquentes</h3>

                    <p><strong>Comment proposer une recette ?</strong></p>
                    <p>Utilisez le formulaire ci-dessus en sélectionnant "Proposition de recette" et décrivez votre recette dans le message.</p>

                    <p><strong>Puis-je partager vos recettes ?</strong></p>
                    <p>Oui, vous pouvez partager nos recettes en citant la source et en incluant un lien vers notre site.</p>

                    <p><strong>Proposez-vous des cours de cuisine ?</strong></p>
                    <p>Contactez-nous pour connaître nos ateliers et cours de cuisine disponibles.</p>
                </section>

            </div><!-- fin colonne-droite -->

        </div><!-- fin grille-contenu -->

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
    <script src="formulaire.js"></script>
</body>
</html>