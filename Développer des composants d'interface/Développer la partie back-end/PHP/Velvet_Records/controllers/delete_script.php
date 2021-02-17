<?php 
include("../views/header.php"); // Appel de l'en-tête
include("../controllers/db.php"); // Appel de la base de donnée

$requete = $db->query("SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id" );
$tRequete = $requete->fetch(PDO::FETCH_OBJ);

$requete2 = $db->prepare("SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id WHERE disc_id=?" );
$requete2 -> execute(array($_GET["disc_id"]));
$tRequete2 = $requete2->fetch(PDO::FETCH_OBJ);


    // ------------- Suppression des données ------------------ //

    $id = $tRequete2 -> disc_id;
        $sup = $db -> prepare("DELETE FROM disc WHERE disc_id = :id");
        $sup -> execute(array(
            'id' => $id
        ));
    
    
    // ------------- Fin suppression des données ------------------ //

    // Une fois la modification faite je redirige vers l'index
    header("Location: http://127.0.0.1:8000/index.php");


?>