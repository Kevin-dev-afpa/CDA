<?php
// 1. Trouvez le numéro de semaine de la date suivante : 14/07/2019.
$date_test = "2019-07-14";
$good_format=strtotime ($date_test);
echo date('W',$good_format);

// 2 - Combien reste-t-il de jours avant la fin de votre formation.

$finForm = new DateTime('2021-08-27');
      $today = new DateTime();
      $temps = $finForm->diff($today);
      echo "Il reste ".$temps->days." jours.";

// 3 - Comment déterminer si une année est bissextile?
$date = new DateTime();
    for ($i = 0; $i < 4; $i++)
    {
        $date->modify('+1 years');
        if ($date->format('L') == 1)
        {
            ?>
               L'année <?= $date->format('Y') ?> sera la prochaine année bissextile.
               <?php
        }
    };

// 4 - Montrez que la date du 32/17/2019 est erronée.



// 5 - Affichez l'heure courante sous cette forme : 11h25.
date_default_timezone_set('Europe/Paris'); // => défini la localisation du fuseau utilisé
?>
<?= date('H\hi e');

// 6 - Ajoutez 1 mois à la date courante.
$date = date("d-m-Y");
Print("Nous sommes le $date");
$date2 = date('d-m-Y', strtotime(' + 1 month'));
Print("Dans un mois nous serons le $date2");