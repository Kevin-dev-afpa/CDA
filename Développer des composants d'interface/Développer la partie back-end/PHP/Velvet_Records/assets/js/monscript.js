// --------------------- Récupération des différentes valeurs rentrées dans les champs --------------------------- //

var titre = document.getElementById("titre");
var artiste = document.getElementById("artiste");
var annee = document.getElementById("annee");
var label = document.getElementById("label");
var genre = document.getElementById("genre");
var prix = document.getElementById("prix");
var photo = document.getElementById("photo");

// --------------------- Fin récupération des différentes valeurs rentrées dans les champs --------------------------- //


// --------------------- Début du traitement du formulaire --------------------------- //

document.getElementById("ajout").addEventListener("submit", function(e) {
 
	var erreur;
 
	var inputs = this.getElementsByTagName("input");
 
	for (var i = 0; i < inputs.length; i++) {
		console.log(inputs[i]);
		if (!inputs[i].value) {
			erreur = "Veuillez renseigner tous les champs";
		}
	}
 
	if (erreur) {
		e.preventDefault();
		document.getElementById("erreur").innerHTML = erreur;
		return false;
	} else {
		alert('Formulaire envoyé !');
	}
 
/*     var titre = document.getElementById("titre");
    var artiste = document.getElementById("artiste");
    var annee = document.getElementById("annee");
    var label = document.getElementById("label");
    var genre = document.getElementById("genre");
    var prix = document.getElementById("prix");
    var photo = document.getElementById("photo");
 
	if (!mdp.value) {
		erreur = "Veuillez renseigner un mot de passe";
	}
	if (!email.value) {
		erreur = "Veuillez renseigner un email";
	}
	if (!pseudo.value) {
		erreur = "Veuillez renseigner un pseudo";
	} */

	
});

// --------------------- Fin du traitement du formulaire --------------------------- //