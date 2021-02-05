<?php
// 1. Lecture d'un fichier
$fichier = file("liens.txt");
$total = count($fichier);
  for($i = 0; $i < $total; $i++) {
    echo nl2br($fichier[$i]);
}
// 2. Récupération d'un fichier distant
?>
<table class="striped responsive-table">
<thead class="black white-text">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Surname</th>
        <th scope="col">Firstname</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
    </tr>
</thead>
<tbody>

    <?php
    $i = 0;
    $file = file('http://bienvu.net/misc/customers.csv');
    foreach ($file as $key => $line ) 
    { 
        $tab[$i] = explode(",", $line);
    ?>

    <tr>
        <th scope="row"><?php echo ($key + 1) ?></th>
        <td><?php echo $tab[$i][0]; ?></td>
        <td><?php echo $tab[$i][1]; ?></td>
        <td><?php echo $tab[$i][2]; ?></td>
        <td><?php echo $tab[$i][3]; ?></td>
        <td><?php echo $tab[$i][4]; ?></td>
        <td><?php echo $tab[$i][5]; ?></td>
    </tr>

    <?php
        $i++;
    }
    ?>

</tbody>
</table>