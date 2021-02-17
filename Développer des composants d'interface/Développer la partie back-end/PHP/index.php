<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//3. Départements   

$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
  );
  // Tri par ordre Alphabétique
  //ksort($departements);
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
</body>
</html>