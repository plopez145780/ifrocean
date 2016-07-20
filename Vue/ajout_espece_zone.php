<?php

$nomEspece = htmlspecialchars($_POST['nomEspece']);
$idEtude = filter_input(INPUT_POST, "idEtude", FILTER_SANITIZE_NUMBER_INT);
$idZone = htmlspecialchars($_POST['idZone']);
$quantite = htmlspecialchars($_POST['quantite']);

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT idEspece FROM especes WHERE nomEspece = ?');
$req->execute(array($nomEspece));

while ($donnees = $req->fetch()) {
    $idEspece = $donnees['idEspece'];
}
$req->closeCursor();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// On ajoute une entrée dans la table espece_zone
$bdd->exec("INSERT INTO espece_zone(idZone, idEspece, quantite) VALUES('$idZone', '$idEspece', '$quantite')");


// Redirection du visiteur vers la page précédente
header("Location: index.php?action=add_espece&id_etude=$idEtude&id_zone=$idZone");

$req->closeCursor();
