<?php
    try 
    {        
        $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'dev', 'azertY23456');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
    }

    // Je récupère l'ensemble des informations
    $requete = $db->query("SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id" );
    $tRequete = $requete->fetchAll(PDO::FETCH_OBJ);

    // Je souhaite juste avoir les infos sur les artistes
    $artiste = $db->query("SELECT * FROM artist");
    $tArtiste = $artiste->fetchAll(PDO::FETCH_OBJ);



    
?>