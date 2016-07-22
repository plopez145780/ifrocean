<?php
include_once 'Config/ConfigBDD.php';
$zone = $_GET['zone'];

try {
    $bdd = new PDO("mysql:host=" . ConfigBDD::SERVERNAME . ";dbname=" . ConfigBDD::DBNAME . ";charset=" . ConfigBDD::CHARSET, ConfigBDD::USERNAME, ConfigBDD::PASSWORD);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// On ajoute une entrée dans la table espece_zone
$bdd->exec("UPDATE zones SET validZone = '1' WHERE idZone = '$zone'");

// Redirection du visiteur vers la page précédente
header("Location: index.php?action=list_etude");
