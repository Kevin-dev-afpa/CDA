<?php 
include("header.php"); // Appel de l'en-tête
include("../controllers/db.php"); // Appel de la base de donnée
?>

<form action="../controllers/add_script.php" method="POST" id="ajout" enctype="multipart/form-data">
<div class="container">

<!-- Titre -->
<label for="basic-url">Title</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">Enter title</span>
  </div>
  <input type="text" class="form-control" id="titre" name="title">
</div>
  <p class="test" id="add_titre"></p>

<!-- Artist -->
<label for="basic-url">Artist</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Choose</label>
  </div>
  <select class="custom-select" id="artiste" name="artist" required>
    <option selected></option>
    <?php foreach ($tArtiste as $artist): ?>
        
        <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
        
    <?php endforeach; ?>
  </select>
  <p class="test" id="add_artiste"></p>
</div>

<!-- Year -->
<label for="basic-url">Year</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">Enter year</span>
  </div>
  <input type="text" class="form-control" id="annee" name="year" required>
  <p class="test" id="add_annee"></p>
</div>

<!-- Genre -->
<label for="basic-url">Genre</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">Enter genre(Rock, Pop, Prog...)</span>
  </div>
  <input type="text" class="form-control" id="genre" name="genre" required>
  <p class="test" id="add_genre"></p>
</div>

<!-- Label -->
<label for="basic-url">Label</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">Enter label(EMI, Warner, PolyGram, Univers sale...)</span>
  </div>
  <input type="text" class="form-control" id="label" name="label" required>
  <p class="test" id="add_label"></p>
</div>

<!-- Price -->
<label for="basic-url">Price</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">$</span>
  </div>
  <input type="text" class="form-control" id="prix" name="price" required>
  <p class="test" id="add_prix"></p>
</div>

<!-- Picture -->
<label for="basic-url">Picture</label>
<div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="inputGroupFileAddon01" required>
    <label class="custom-file-label" for="inputGroupFile01">Choisir un fichier</label>
    <p class="test" id="add_photo"></p>
  </div>
</div>


<!-- Bouttons -->
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="submit" class="btn btn-primary">Ajouter</button>
  <a href="../index.php" class="btn btn-primary">Retour</a>
</div>

<p style="color: red;" id="erreur"></p>

</div>
</form>

<?php include("footer.php"); // Appel du pied de page ?> 