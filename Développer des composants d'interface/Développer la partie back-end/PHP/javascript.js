document.getElementById("contact").addEventListener("submit", function(e) {
    /* e.preventDefault(); */

    var erreur;
    var societe = document.getElementById("societe");
    var personne_a_contacter = document.getElementById("personne_a_contacter");
    var cp = document.getElementById("cp");
    var ville = document.getElementById("ville");
    var mail = document.getElementById("mail");

    // Dans le cas ou le champs société est vide
    if (!societe.value) { 
        erreur = "Veuillez renseigner le nom de la société";
    }

    // Dans le cas ou le champs personne_a_contacter est vide
    if (!personne_a_contacter.value) {
        erreur = "Veuillez renseigner le nom d'une personne à contacter";
    }

    // Dans le cas d'un code postal ne respectant pas le critère
    if (cp.value.length !== 5) {
        erreur = "Le code postal doit être constitué de cinq chiffres"
    }

    // Dans le cas ou le champs ville est vide
    if (!ville.value) {
        erreur = "Veuillez renseigner le nom de votre ville";
    }

    // Dans le cas ou le champ mail ne correspond pas au critère
/*     if (mail.value.search("@") != 0) {
        erreur = "Votre adresse mail n'est pas conforme à la réglementation";
    }  */

    // Validation du formulaire
    if (erreur) {
        e.preventDefault();
        document.getElementById("erreur").innerHTML = erreur;
        return false;
    } else {
        alert('Formulaire envoyé !');
    }
})