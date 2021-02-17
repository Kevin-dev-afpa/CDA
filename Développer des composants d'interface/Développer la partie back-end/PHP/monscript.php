<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire PHP</title>
</head>
<body>

<?php
$saut = "<br>";
echo $_REQUEST["societe"].$saut;
echo $_REQUEST["personne_a_contacter"].$saut;
echo $_REQUEST["adresse"].$saut;
echo $_REQUEST["cp"].$saut;
echo $_REQUEST["ville"].$saut;
echo $_REQUEST["mail"].$saut;
echo $_REQUEST["telephone"].$saut;
echo $_REQUEST["environnement"].$saut;

?>

<script src="javascript.js"></script>
</body>
</html>