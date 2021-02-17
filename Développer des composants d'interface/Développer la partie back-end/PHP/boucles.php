<?php
// 1. Ecrire un script PHP qui affiche tous les nombres impairs entre 0 et 150, par ordre croissant : 1 3 5 7...
$nbImpair = 1;
while($nbImpair < 150){
    echo $nbImpair;
    $nbImpair += 2;
}


// 2. Écrire un programme qui écrit 500 fois la phrase Je dois faire des sauvegardes régulières de mes fichiers
$phrase = "Je dois faire des sauvegardes régulières de mes fichiers";
for ($nbPhrase = 0; $nbPhrase < 500; $nbPhrase++) {
    echo $phrase;
}

    // 3. Ecrire un script qui affiche la table de multiplication totale de {1,...,12} par {1,...,12} dans un tableau HTML
    ?>
    <table>
    <caption><strong>Table de multiplication</strong></caption>
    <!-- je determine les deux variables nombre qui font office de struture pour le tableau et à chaque champ le résultat des deux nombres -->
    <thead>
        <tr>
        <th></th>
            <?php
            for($nombre1 = 0; $nombre1 <= 12; $nombre1++){
                ?>
            <th>
                <?= $nombre1 ?>
            </th>
            <?php
            }
            ?>
        </tr>
    </thead>
    
    <tbody>
        <?php
            for($nombre2 =0; $nombre2 <=12; $nombre2++){
            ?>
        <tr>
            <th>
            <?= $nombre2 ?>
            </th>
            <?php
            for($nombre1 = 0; $nombre1 <=12; $nombre1++){
                ?>
            <td>
            <?= $nombre2 * $nombre1 ?>
            </td>
            <?php
            }
            ?>
        </tr>
        <?php
            }
            ?>
    </tbody>
</table>