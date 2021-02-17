<?php 
include("../views/header.php"); // Appel de l'en-tête
include("../controllers/db.php"); // Appel de la base de donnée

$requete = $db->query("SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id" );
$tRequete = $requete->fetch(PDO::FETCH_OBJ);

// ------------- Récupération des info du formulaire ----------------- //
    $titre = $_POST["title"];
    $artiste = $_POST["artist"];
    $annee = $_POST["year"];
    $genre = $_POST["genre"];
    $label = $_POST["label"];
    $prix = $_POST["price"];
    $media = $_FILES["photo"]["name"];
    $id = $_POST["id"];
// ------------- Fin Récupération des info du formulaire ----------------- //


// ------------- Mise en place des restrictions -------------------------- //
$rAlphabet = "/[A-Za-z]/";
$rPrix = "/(?=\S*[\d])/";
$rPhoto = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['photo']['name'], '.');
$date = date("Y");

// ------------- Mise en place des restrictions -------------------------- //



// ------------- Traitement du formulaire ----------------- //

if ($titre != "" && $artiste != "" && $annee != "" && $genre != "" && $label != "" && $prix != "" && $media != "") {
    if (preg_match($rAlphabet, $titre)){ // Controle à l'aide du regex d'alphabet
        if ($date) { // Je controle si le format de la date est bien la bonne et si la date n'est pas supérieur à la date d'aujourd'hui.
            if(preg_match($rAlphabet, $genre)){ // Je controle si le format du genre est bien respecté
                if(preg_match($rAlphabet, $label)){ // Je controle si le format du label est bien respecté
                    if(preg_match($rPrix, $prix)){ // Je controle si le format du prix est bien respecté
                        if(!in_array($extension, $rPhoto)) {
                            echo "Vous devez uploader un fichier de type png, gif, jpg, jpeg";
                            
                        }else { //Tout est réussi
                            // Téléchargement de la photo et enregistrement dans notre dossier img
                            move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/img/".$media);

                            // Mise à jour du vinyle
                            $req = $db->prepare("UPDATE disc SET disc_title = :nv_titre, disc_year = :nv_annee, disc_picture = :nv_photo, disc_label = :nv_label, disc_genre = :nv_genre, disc_price = :nv_prix, artist_id = :nv_artiste WHERE disc_id = :id");

                            $req->execute(array(
                                'nv_titre' => $titre,
                                'nv_annee' => $annee,
                                'nv_photo' => $media,
                                'nv_label' => $label,
                                'nv_genre' => $genre,
                                'nv_prix' => $prix,
                                'nv_artiste' => $artiste,
                                'id' => $id
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

// ------------- Fin traitement formulaire ----------------- //




 include("../views/footer.php"); // Appel du pied de page ?>