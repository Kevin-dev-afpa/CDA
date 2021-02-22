<?php 
include("header.php");
include("../controllers/db.php")
?>
<div class="container">
<form class="form-signin" action="../controllers/inscription_script.php" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

    <!-- Nom -->
    <label for="nom" class="sr-only">Nom</label>
    <input type="text" id="inputNom" name="inputNom" class="form-control" placeholder="Nom" required="" autofocus="" minlength="2" maxlength="30">

    <!-- Prenom -->
    <label for="prenom" class="sr-only">Prenom</label>
    <input type="text" id="inputPrenom" name="inputPrenom" class="form-control" placeholder="Prenom" required="" autofocus="" minlength="2" maxlength="30">

    <!-- Mail -->
    <label for="email" class="sr-only">Mail</label>
    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Mail" required="" autofocus="">

    <!-- Confirmation de mail -->
    <label for="email2" class="sr-only">Confirmation de l'email</label>
    <input type="email2" id="inputEmail2" name="inputEmail2" class="form-control" placeholder="Confirmation de l'email" required="" autofocus="">

    <!-- Mot de passe -->
    <label for="mdp" class="sr-only">Mot de passe</label>
    <input type="password" id="mdp" name="inputMdp" class="form-control" placeholder="Mot de passe" required="" minlength="6" maxlength="30">

    <!-- Confirmation du mot de passe -->
    <label for="mdp2" class="sr-only">Confirmation du mot de passe</label>
    <input type="password" id="mdp2" name="inputMdp2" class="form-control" placeholder="Confirmation du mot de passe" required="" minlength="6" maxlength="30">

    <!-- Boutton -->
    <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
    <button class="btn btn-lg btn btn-secondary" type="reset">Effacer</button>
    <a href="../index.php" class="btn btn-lg btn btn-secondary" type="reset">Retour</a>
</form>
</div>
<?php
include("./footer.php");
?>