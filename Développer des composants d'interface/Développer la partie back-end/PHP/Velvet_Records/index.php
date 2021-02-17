<?php 
include("./views/header.php"); // Appel de l'en-tête
include("./controllers/db.php"); // Appel de la base de donnée
?>

<!-- Liste des disques avec compteur -->
<div class="container">
  <div class="row">
    <div class="col">
    <div class="float-left font-weight-bold"><h1><u>Liste des disques (<?= count($tRequete) ?>)</u></h1></div>
    </div>
    <div class="col">
    <div class="float-right"><a href="./views/add_form.php" class="btn btn-primary">Ajouter</a></div><br>
    </div>
  </div>
</div>


<!-- Miniature et description -->
<div class="container">
<?php foreach ($tRequete as $artist): ?>
    <div class="d-inline-flex p-2 bd-highlight">        
    <div>
        <div class="card" style="width: 18rem;">
            <img src="./assets/img/<?= $artist->disc_picture ?>" class="card-img-top" alt="<?= $artist->disc_picture ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $artist->disc_title ?></h5>
                <p class="card-text"><?= $artist->artist_name ?></p>
                <p class="card-text">Label: <?= $artist->disc_label ?></p>
                <p class="card-text">Year: <?= $artist->disc_year ?></p>
                <p class="card-text">Genre: <?= $artist->disc_genre ?></p>
                <a href="./views/details.php?disc_id=<?=$artist->disc_id ?>" class="btn btn-primary">Détails</a>
            </div>
        </div>
    </div>
    </div>
    <?php endforeach; ?>
</div>






<?php include("./views/footer.php"); // Appel du pied de page ?>