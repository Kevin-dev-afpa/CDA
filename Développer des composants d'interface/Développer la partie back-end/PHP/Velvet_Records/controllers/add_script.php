<?php 
include("../views/header.php"); // Appel de l'en-tête
include("../controllers/db.php"); // Appel de la base de donnée


// ------------- Récupération des info du formulaire ----------------- //
    $titre = $_POST["title"];
    $artiste = $_POST["artist"];
    $annee = $_POST["year"];
    $genre = $_POST["genre"];
    $label = $_POST["label"];
    $prix = $_POST["price"];
    $media = $_FILES["photo"]["name"];
// ------------- Fin Récupération des info du formulaire ----------------- //


// ------------- Mise en place des restrictions -------------------------- //
$rAlphabet = "/[A-Za-z]/";
$date = new DateTime();
$format = date_format($date, "Y");
$rPrix = "/(?=\S*[\d])/";
$rPhoto = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['photo']['name'], '.');



// ------------- Mise en place des restrictions -------------------------- //



// ------------- Traitement du formulaire ----------------- //

if ($titre != "" && $artiste != "" && $annee != "" && $genre != "" && $label != "" && $prix != "" && $media != "") {
    if (preg_match($rAlphabet, $titre)){ // Controle à l'aide du regex d'alphabet
        if ($annee === $format AND $annee <= $date) { // Je controle si le format de la date est bien la bonne et si la date n'est pas supérieur à la date d'aujourd'hui.
            if(preg_match($rAlphabet, $genre)){ // Je controle si le format du genre est bien respecté
                if(preg_match($rAlphabet, $label)){ // Je controle si le format du label est bien respecté
                    if(preg_match($rPrix, $prix)){ // Je controle si le format du prix est bien respecté
                        if(!in_array($extension, $rPhoto)) {
                            echo "Vous devez uploader un fichier de type png, gif, jpg, jpeg";
                            
                        }else { //Tout est réussi
                            // Téléchargement de la photo et enregistrement dans notre dossier img
                            move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/img/".$media);
                            
                            // Je commence par l'insertion du disque
                            $insertion = $db -> prepare ("INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES (:titre, :annee, :photo, :label, :genre, :prix, :artiste)");
                            $insertion -> execute(array(
                                'titre' => $titre,
                                'annee' => $annee,
                                'photo' => $media,
                                'label' => $label,
                                'genre' => $genre,
                                'prix' => $prix,
                                'artiste' => $artiste
                            ));

                            // Une fois l'insertion faite je redirige vers l'index
                            header("Location: http://127.0.0.1:8000/index.php");
                            exit;
                        }                        
                    } else {
                        echo "Problème au niveau du prix";
                    }
                } else {
                    echo "Le format du label ne correspond pas";
                }                
            } else {
                echo "le format du genre ne correspond pas";
            }
        } else {
            echo "Le format de la date ne convient pas";
        }}
    else {
        echo "Le format du titre ne correspond pas";
    }
} else {
    echo "Malheureusement il manque quelque chose";
}

// -------------Fin traitement formulaire ----------------- //

 include("../views/footer.php"); // Appel du pied de page ?>