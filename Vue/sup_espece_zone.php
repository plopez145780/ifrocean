<?php
$espece = $_GET['espece'];
$zone = $_GET['zone'];

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// On ajoute une entrée dans la table espece_zone
$bdd->exec("DELETE FROM `espece_zone` WHERE idZone = '$zone' AND idEspece = '$espece'");


// Redirection du visiteur vers la page précédente
header("Location: index.php?action=add_espece&id_etude=$etude&id_zone=$zone");
