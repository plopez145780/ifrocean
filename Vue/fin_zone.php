<?php
$zone = $_GET['zone'];

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// On ajoute une entrée dans la table espece_zone
$bdd->exec("UPDATE zones SET validZone = '1' WHERE idZone = '$zone'");

// Redirection du visiteur vers la page précédente
header("Location: index.php?action=list_etude");
