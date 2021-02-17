
<?php
include("../controllers/db.php");
include("./header.php");
$requete2 = $db->prepare("SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id WHERE disc_id=?" );
$requete2 -> execute(array($_GET["disc_id"]));
$tRequete2 = $requete2->fetch(PDO::FETCH_OBJ);

?>

<header><h1>Details</h1></header>

<!-- Présentation du vinyle -->
<div class="container">
    <div class="row">
        <div class="col">
            <div>Title</div>
                <div class="alert alert-dark" role="alert">
                    <?= $tRequete2 -> disc_title ?>
                </div>
            <div>Year</div>
                <div class="alert alert-dark" role="alert">
                    <?= $tRequete2 -> disc_year ?>
                </div>
            <div>Label</div>
                <div class="alert alert-dark" role="alert">
                    <?= $tRequete2 -> disc_label ?>
                </div>
            <div>Picture</div>
                <div><img src="../assets/img/<?= $tRequete2->disc_picture ?>"  alt="<?= $tRequete2->disc_picture ?>"></div>
        </div>
        <div class="col">
            <div>Artist</div>
                <div class="alert alert-dark" role="alert">
                    <?= $tRequete2 -> artist_name ?>
                </div>
            <div>Genre</div>
                <div class="alert alert-dark" role="alert">
                    <?= $tRequete2 -> disc_genre ?>
                </div>
            <div>Price</div>
                <div class="alert alert-dark" role="alert">
                    <?= $tRequete2 -> disc_price ?>
                </div>
        </div>
    </div>

    <!-- Boutton de navigation -->
    <div class="btn-group" role="group" aria-label="Basic example">
    <a href="./update_form.php?disc_id=<?=$tRequete2->disc_id ?>" class="btn btn-primary">Modifier</a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Supprimer
</button>    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Etes-vous sûr?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Ce choix est irreversible !
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
        <a href="../controllers/delete_script.php?disc_id=<?=$tRequete2->disc_id ?>" id="delete" data-target="#exampleModal" class="btn btn-danger">Oui</a>
      </div>
    </div>
  </div>
</div>
    <a href="../" class="btn btn-primary">Retour</a>
</div>

<?php include("footer.php"); ?>