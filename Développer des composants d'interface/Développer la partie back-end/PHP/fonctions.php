<?php
// 1. Liens
  function lien($str, $txt) { ?>
    <a href=<?= '"'.$str.'">'.$txt ?></a> 
<?php } ?>

<?php lien("https://www.google.fr", "Google"); 

// 2. Valeur
function sum($array)
        {
            $result = array_sum($array);
            return $result; 
        }

        $tab = array(4, 3, 8, 2);
        $somme = sum($tab);
        echo $somme;

// 3. Mot de passe
function testpassword($mdp)
{
    $longueur = strlen($mdp);
    $chiffre = '/[0-9]/';
    $minuscule = '/[a-z]/';
    $majuscule = '/[A-Z]/';

        if ($longueur >= 8 AND preg_match($chiffre, $mdp) AND preg_match($minuscule, $mdp) AND preg_match($majuscule, $mdp))  {
            echo "Félicitation votre mot de passe remplis les critères !";
        }
        else {
            echo "Malheureusement votre mot de passe ne correspond pas avec les critères";
        }
}

testpassword("Test1234");