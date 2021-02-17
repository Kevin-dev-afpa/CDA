<?php 
include("header.php"); // Appel de l'en-tête
include("../controllers/db.php"); // Appel de la base de donnée

$requete2 = $db->prepare("SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id WHERE disc_id=?" );
$requete2 -> execute(array($_GET["disc_id"]));
$tRequete2 = $requete2->fetch(PDO::FETCH_OBJ);
?>

<header><h1>Modifier un vinyle</h1></header>

<!-- Début du formulaire de modification -->
<form action="../controllers/update_script.php" method="POST" enctype="multipart/form-data">
<div class="container">

<!-- ID -->
<label for="basic-url">ID</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
    <input class="form-control" type="text" value="<?= $tRequete2->disc_id ?>" name="id" readonly>
    </div>
</div>


<!-- Titre -->
<label for="basic-url">Title</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Enter title</span>
    </div>
    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="title" value="<?= $tRequete2->disc_title?>">
</div>

<!-- Artist -->
<label for="basic-url">Artist</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Choose</label>
    </div>
        <select class="custom-select" id="inputGroupSelect01" name="artist">
        <option selected="selected"><?= $tRequete2->artist_id ?></option>
        <?php foreach ($tArtiste as $artist): ?>
            
            <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
            
        <?php endforeach; ?>
        </select>
</div>

<!-- Year -->
<label for="basic-url">Year</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Enter year</span>
    </div>
    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="year" value="<?= $tRequete2->disc_year?>">
</div>

<!-- Genre -->
<label for="basic-url">Genre</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Enter genre(Rock, Pop, Prog...)</span>
    </div>
    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="genre" value="<?= $tRequete2->disc_genre?>">
</div>

<!-- Label -->
<label for="basic-url">Label</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Enter label(EMI, Warner, PolyGram, Univers sale...)</span>
    </div>
    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="label" value="<?= $tRequete2->disc_label?>">
</div>

<!-- Price -->
<label for="basic-url">Price</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">$</span>
    </div>
    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="price" value="<?= $tRequete2->disc_price?>">
</div>

<!-- Picture -->
<label for="basic-url">Picture</label>
<div class="input-group mb-3">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile01" name="photo" aria-describedby="inputGroupFileAddon01">
        <label class="custom-file-label" for="inputGroupFile01">Choisir un fichier</label>
    </div>
    <img src="../assets/img/<?= $tRequete2->disc_picture ?>" alt="<?= $tRequete2->disc_picture ?>">
</div>


<!-- Boutton de navigation -->
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="submit" class="btn btn-success">Valider la modification</button>
    <a href="../" class="btn btn-primary">Retour</a>
</div>
</form>

<?php include("footer.php"); ?>
