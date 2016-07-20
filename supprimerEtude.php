<?php

$recup = $_GET['etude'];

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// On ajoute une entrée dans la table etudes
$req = $bdd->prepare('DELETE FROM etudes WHERE idEtude= ?');
$req->execute(array($_GET['etude']));

// Redirection du visiteur vers la page précédente
header('Location: accueil_biologiste.php');

$req->closeCursor();
