<?php
include_once './Modele/Etude.php';

$nomEtude = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING);
$villeEtude = filter_input(INPUT_POST, "ville", FILTER_SANITIZE_STRING);
$superficieEtude = filter_input(INPUT_POST, "superficie", FILTER_SANITIZE_NUMBER_INT);
$dateEtude = filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);
$validationEtude = filter_input(INPUT_POST, "validation", FILTER_SANITIZE_STRING);
$idEtude = filter_input(INPUT_POST, "id_etude", FILTER_SANITIZE_NUMBER_INT);

$bdd = new Modele();
$etude = new Etude($nomEtude, $villeEtude, $superficieEtude, $dateEtude, $validationEtude, $idEtude);
$etude->updateEtude();

// Redirection du visiteur vers la page précédente
header('Location: accueil_biologiste.php');