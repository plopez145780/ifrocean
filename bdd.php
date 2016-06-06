<?php

// Connexion à la base de données
try{
    $bdd = new PDO('mysql:host=localhost:3306;dbname=ifrocean;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
// On récupère les 5 derniers billets
$req = $bdd->query($requete);

?>