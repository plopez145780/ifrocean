<?php
    $espece = $_GET['espece'];
    $idEtude = filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_NUMBER_INT);
    $zone = $_GET['zone'];
    $quantite = $_POST['quantite'];
               
    try
    {
	$bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
    }

    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    // On ajoute une entrée dans la table espece_zone
    $bdd->exec("UPDATE espece_zone SET quantite = quantite + '$quantite' WHERE idZone = '$zone' AND idEspece = '$espece'");
                

    // Redirection du visiteur vers la page précédente
    header("Location: index.php?action=add_espece&id_etude=$idEtude&id_zone=$zone");