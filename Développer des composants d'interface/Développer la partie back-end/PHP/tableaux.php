<?php
                        // Les tableaux

// 1. Mois de l'année non bissextile

$année = array(
    "Janvier"   => 31,
    "Février"   =>  28,
    "Mars"  =>  31,
    "Avril"   =>  30,
    "Mai"   => 31,
    "Juin"   =>  30,
    "Juillet"   =>  31,
    "Aout"   =>  31,
    "Septembre"   =>  30,
    "Octobre"   =>  31,
    "Novembre"   =>  30,
    "Décembre"   =>  31
);
?>
<table>
<caption><strong>Année 2021</strong></caption>
<tr>
<?php
asort($année);
foreach($année as $mois => $jours) 
{ 
    ?>
    <tr><th>
            <?= $mois ?>
        </th>
        <td>
            <?= $jours ?>
        </td>
    </tr>
<?php
}
?>
</table>

<?php
// 2. Capitales

$capitales = array(
    "Bucarest" => "Roumanie",
    "Bruxelles" => "Belgique",
    "Oslo" => "Norvège",
    "Ottawa" => "Canada",
    "Paris" => "France",
    "Port-au-Prince" => "Haïti",
    "Port-d'Espagne" => "Trinité-et-Tobago",
    "Prague" => "République tchèque",
    "Rabat" => "Maroc",
    "Riga" => "Lettonie",
    "Rome" => "Italie",
    "San José" => "Costa Rica",
    "Santiago" => "Chili",
    "Sofia" => "Bulgarie",
    "Alger" => "Algérie",
    "Amsterdam" => "Pays-Bas",
    "Andorre-la-Vieille" => "Andorre",
    "Asuncion" => "Paraguay",
    "Athènes" => "Grèce",
    "Bagdad" => "Irak",
    "Bamako" => "Mali",
    "Berlin" => "Allemagne",
    "Bogota" => "Colombie",
    "Brasilia" => "Brésil",
    "Bratislava" => "Slovaquie",
    "Varsovie" => "Pologne",
    "Budapest" => "Hongrie",
    "Le Caire" => "Egypte",
    "Canberra" => "Australie",
    "Caracas" => "Venezuela",
    "Jakarta" => "Indonésie",
    "Kiev" => "Ukraine",
    "Kigali" => "Rwanda",
    "Kingston" => "Jamaïque",
    "Lima" => "Pérou",
    "Londres" => "Royaume-Uni",
    "Madrid" => "Espagne",
    "Malé" => "Maldives",
    "Mexico" => "Mexique",
    "Minsk" => "Biélorussie",
    "Moscou" => "Russie",
    "Nairobi" => "Kenya",
    "New Delhi" => "Inde",
    "Stockholm" => "Suède",
    "Téhéran" => "Iran",
    "Tokyo" => "Japon",
    "Tunis" => "Tunisie",
    "Copenhague" => "Danemark",
    "Dakar" => "Sénégal",
    "Damas" => "Syrie",
    "Dublin" => "Irlande",
    "Erevan" => "Arménie",
    "La Havane" => "Cuba",
    "Helsinki" => "Finlande",
    "Islamabad" => "Pakistan",
    "Vienne" => "Autriche",
    "Vilnius" => "Lituanie",
    "Zagreb" => "Croatie"
);
?>

<?php
// 1. ksort($capitales); Trie croissant pour les Clefs (ici les capitales)
// 2. asort($capitales); Trie croissant pour les valeurs (ici les pays)
/* 3. $nbPays = count($capitales);
echo"Le tableau contient ".$nbPays." pays."; */
// 4. Supprimer du tableau toutes les capitales ne commençant par la lettre 'B', puis affichez le contenu du tableau.
$filtre = '/^(b){1}/i';
$i = 0;
foreach ($capitales as $cap => $pays) {
    if(!preg_match($filtre, $cap))
    unset ($capitales[$cap]);
}
?>

<table class="striped">
<thead class="grey">
    <td>Capitale</td>
    <td>Pays</td>
</thead>
<tbody> 
    <?php foreach ($capitales as $cap => $pays) { ?>
    <tr>
        <td><?= $cap ?></td>
        <td><?= $pays ?></td>
    </tr>
    <?php } ?>
</tbody>
</table>

<?php
//3. Départements   

$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
  );
  // Tri par ordre Alphabétique
  ksort($departements);
?>

<table>
  <thead>
      <td>Region</td>
      <td>Departement</td>
  </thead>
  <tbody>
      <?php 
      foreach ($departements as $key => $value) { 
      
          echo "<tr><td>$key</td><td>";
          foreach ($value as $keyVal => $valueVal) {
              echo " $valueVal, ";
          }
          echo "</td></tr>";

      } ?>
  </tbody>
</table>