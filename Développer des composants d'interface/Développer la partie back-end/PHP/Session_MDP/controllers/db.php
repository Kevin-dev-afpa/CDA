<?php
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=user', 'dev', 'azertY23456');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $requete = $db->query("SELECT * FROM utilisateur");
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();