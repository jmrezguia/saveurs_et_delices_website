<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();


require '../vendor/autoload.php';
$mail = new PHPMailer(true); //instanciation de l'objet phphmailer

require_once dirname(__DIR__) . '/models/class.formulaire.php';

// On vérifie si la méthode d'appel de la page est en POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // On vérifie si le formulaire à bien été soumis 
        if(isset($_POST['Envoyer']))
        {   
            // On vérifie si le champ mail est bien renseigné
            if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['sujet']) && !empty($_POST['message']) && ($_POST['RGPD'])) {
     
            $formulaire = new Formulaire($_POST['nom'], $_POST['email'], $_POST['sujet'], $_POST['message']);  //instanciation de l'objet formulaire
     
            $formulaire->envoyerEmailReceptionFormulaire(); //instaciation de la methode envoyermail

                // On génère un nom de fichier aléatoire
                $nom = 'Envoyer' .uniqid(). 'formulaire.text';
                // On créer le fichier
                $fp = fopen($nom, 'w');
                // On vérifie si le fichier est bien créé
                if($fp){

                    // Je prépare mon contenu à insérer dans mon fichier
                    $content = "Nom complet:".$_POST['nom']."\n";
                    $content.= "Sujet :".$_POST['sujet']."\n";
                    $content.= "Email :".$_POST['email']."\n";
                    $content.= "Message :".$_POST['message']."\n";
                    $content.= "RGPD:".$_POST['RGPD']."\n";
                    // J'écris dans le fichier
                    fwrite($fp,$content);
                }
                // Je ferme mon fichier
                fclose($fp);
                $message = 'Vous serez recontactez trés prochainement';

                }
               
        } else{
                $message = "Remplir tous les champs obligatoires";
                
            }
    
         // Je redirige l'utilisateur vers la page index en faisant passer la variable message
    //header('location:../public-pages/index.php?msg='.$message);
    exit;
  }
//en cas d'erreur on restera sur traitement.php et ça affichera une page blanche avec le message ci-dessous
 else {
    echo 'une erreur est survenue, ressayez';
 }


?>