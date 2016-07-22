<?php
include_once 'Config/ConfigBDD.php';
$espece = $_GET['espece'];
$zone = $_GET['zone'];

try {
    $bdd = new PDO("mysql:host=" . ConfigBDD::SERVERNAME . ";dbname=" . ConfigBDD::DBNAME . ";charset=" . ConfigBDD::CHARSET, ConfigBDD::USERNAME, ConfigBDD::PASSWORD);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// On ajoute une entrée dans la table espece_zone
$bdd->exec("DELETE FROM `espece_zone` WHERE idZone = '$zone' AND idEspece = '$espece'");

// Redirection du visiteur vers la page précédente
header("Location: index.php?action=add_espece&id_etude=$etude&id_zone=$zone");
