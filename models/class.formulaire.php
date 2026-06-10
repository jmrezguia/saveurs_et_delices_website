<?php

// Importation des classes nécessaires de la bibliothèque PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once dirname(__DIR__) . '../vendor/autoload.php'; 
//require_once permet de charger le fichier une seule fois même si tu l'appelles plusieurs fois. 
// C'est pour éviter les erreurs


class Formulaire extends PHPMailer{

 private string $nom;
 private string $email;
 private string $sujet;
 private string $message;




public function __construct($nom,$email,$sujet,$message){
        
    $this->nom = $nom;
    $this->email = $email;
    $this->sujet = $sujet;
    $this->message = $message;
           
    }

    public function envoyerEmailReceptionFormulaire(): void {
        
    
        
        // --- Configuration Technique du Serveur SMTP (c'est le serveur qui permet d'envoyer des e-mails) --- 
        
        $this->isSMTP();                                      // Activation du protocole de transport SMTP
        $this->Host       = 'florianmancieri.fr';        // Hôte du serveur d'envoi de mail (ex: smtp.mailtrap.io ou votre hébergeur)
        $this->SMTPAuth   = true;                             // Activation de l'authentification obligatoire sur le serveur SMTP
        $this->Username   = 'greta@florianmancieri.fr';          // Nom d'utilisateur de la boîte d'envoi
        $this->Password = 'o)R_.CN6QT8q04F2';                 // mot de passe
        $this->Port       = 587;                              // Port TCP standardisé pour l'envoi TLS
        $this->CharSet    = 'UTF-8';                          // Forçage de l'encodage pour préserver les caractères accentués français

        // --- Définition des Acteurs de l'Échange ---
        $this->setFrom('greta@florianmancieri.fr', 'Mon Application'); // Identité de l'expéditeur
        $this->addAddress('waliddhrs@gmail.com');  // Adresse mail cible de l'utilisateur

        
        
        $this->isHTML(true); // Indique que le corps principal accepte des balises HTML
        $this->Subject = "Confirmation réception de formulaire"; // Objet du courriel
        
        // Corps enrichi (HTML) : Rendu graphique pour la majorité des messageries modernes
        $this->Body    = "
            <h2>Bienvenue sur notre plateforme !</h2>
            <p>Nous avons recu votre formulaire et on va le traiter dans les plus brefs delais :</p>
            <p style='margin: 20px 0;'>
            
            <p> info du visiteur </p>
            <p> Nom : {$this->nom} </p>
            <p> Email : {$this->email} </p>
            <p> Sujet : {$this->sujet} </p>
            <p> Message : {$this->message} </p>
               
                
            </p>
            <small> Par saveurs_et_delices </small>";
        
        // Corps alternatif (Texte brut) : Utilisé si le client mail du destinataire rejette l'affichage HTML (anti-spam, terminaux légers)
        $this->AltBody = "Bonjour, Formulaire bien recu, vous allez être recontacter dans les plus brefs delais";

        // Déclenchement de la séquence d'envoi réseau vers le serveur SMTP
        $this->send();
        
    }
}
?>