<?php
session_start();
include("db.php");


// Premier traitement des valeurs //
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
// Récupération de toute mes valeurs //
$email = valid_donnees($_POST["inputEmail"]);
$mdp = valid_donnees($_POST["inputPassword"]);

$req_cherche_util = $db -> query("SELECT * FROM utilisateur WHERE util_mail = '$email'");
$tab = $req_cherche_util->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();


if (isset($tab)) {
    echo "Malheureusement vous ne faite pas encore partie de nos clients... Je vous invite à vous incrire via notre formulaire "."<a href='../views/inscription_form.php'>S'inscrire</a>";
}  else {
    if ($tab > 0) {    
        if (password_verify($mdp, $tab[0]->util_mdp)) {
            echo "houra c'est le bon mot de passe";
        } else {
            echo "Il y a une erreur de mot de passe";
        }
}
}


?>


