<?php
// Connexion à ma base //
include("../controllers/db.php");

// Récupération de toute mes valeurs //
$nom = valid_donnees($_POST["inputNom"]);
$prenom = valid_donnees($_POST["inputPrenom"]);
$email = valid_donnees($_POST["inputEmail"]);
$confirEmail = valid_donnees($_POST["inputEmail2"]);
$mdp = valid_donnees($_POST["inputMdp"]);
$confirMdp = valid_donnees($_POST["inputMdp2"]);

// Premier traitement des valeurs //
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

if (!empty($nom)
&& !empty($prenom)
&& !empty($email)
&& !empty($confirEmail)
&& !empty($mdp)
&& !empty($confirMdp)
&& $email === $confirEmail
&& $mdp === $confirMdp
&& filter_var($email, FILTER_VALIDATE_EMAIL)
)   {
// On crypte le mot de passe
$mdp = password_hash($mdp, PASSWORD_DEFAULT);

// Insertion dans ma base de donnée
$requete = $db -> prepare("INSERT INTO utilisateur (util_nom, util_prenom, util_mail, util_mdp) VALUES (:nom, :prenom, :email, :mdp)");
        $requete -> execute(array(
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "mdp" => $mdp
        ));
        echo "Inscription finalisé";
        header("Location:../index.php");
    }
    else {
        echo "Inscription non finalisé";
    }

?>