<?php 
include_once 'Modele/Modele.php';
include_once 'Modele/Etude.php';
$id = filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_NUMBER_INT);
$bdd = new Modele();
$etude = $bdd->getEtude($id);
$etude->delEtude();
header('Location: /index.php?action=list_etude');


