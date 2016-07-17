<?php
include_once './Modele/Etude.php';

$idEtude = filter_input(INPUT_GET, "etude", FILTER_SANITIZE_NUMBER_INT);

$bdd = new Modele();
$etude = $bdd->getEtude($idEtude);
$etude->changerEtatEtude();

// Redirection du visiteur vers la page précédente
header('Location: detail.php?etude=' . $idEtude);