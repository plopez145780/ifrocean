<?php
$nomEspece = htmlspecialchars($_POST['nomEspece']);
$idEtude = filter_input(INPUT_POST, "etude", FILTER_SANITIZE_NUMBER_INT);
$zone = filter_input(INPUT_POST, "zone", FILTER_SANITIZE_NUMBER_INT);

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// On ajoute une entrée dans la table etudes
$bdd->exec("INSERT INTO especes(idEspece, nomEspece) VALUES(NULL, '$nomEspece')");


// Redirection du visiteur vers la page précédente
header("Location: index.php?action=add_espece&id_etude=$idEtude&id_zone=$zone");

$req->closeCursor();
