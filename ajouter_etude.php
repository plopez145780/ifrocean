<?php

$nom = htmlspecialchars($_POST['nom']);
$ville = htmlspecialchars($_POST['ville']);
$superficie = htmlspecialchars($_POST['superficie']);
$date = htmlspecialchars($_POST['date']);

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// On ajoute une entrée dans la table etudes
$bdd->exec("INSERT INTO etudes(idEtude, nomEtude, ville, superficie, date, validation) VALUES(NULL, '$nom', '$ville', '$superficie', '$date', '0')");


// Redirection du visiteur vers la page précédente
header('Location: accueil_biologiste.php');

//$req->closeCursor();
?>
            