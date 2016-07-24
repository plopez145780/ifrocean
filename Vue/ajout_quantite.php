<?php
include_once 'Config/ConfigBDD.php';
$espece = $_GET['espece'];
$idEtude = filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_NUMBER_INT);
$zone = $_GET['zone'];
$quantite = $_POST['quantite'];

try {
    $bdd = new PDO("mysql:host=" . ConfigBDD::SERVERNAME . ";dbname=" . ConfigBDD::DBNAME . ";charset=" . ConfigBDD::CHARSET, ConfigBDD::USERNAME, ConfigBDD::PASSWORD);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (filter_input(INPUT_POST, "add_button", FILTER_SANITIZE_STRING)) {
    $newQuantite = $quantite;
} else if (filter_input(INPUT_POST, "subtract_button", FILTER_SANITIZE_STRING)) {
   $newQuantite = -$quantite;
} else {
    $newQuantite = 0;
}

// On ajoute une entrée dans la table espece_zone
$bdd->exec("UPDATE espece_zone SET quantite = quantite + '$newQuantite' WHERE idZone = '$zone' AND idEspece = '$espece'");

// Redirection du visiteur vers la page précédente
header("Location: index.php?action=add_espece&id_etude=$idEtude&id_zone=$zone");
