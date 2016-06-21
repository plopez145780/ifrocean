<?php
require('Controleur/Controleur.php');

try {
    if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) != FALSE) {
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'list_etude') {
            listEtude();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'del_etude') {
            if (filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_STRING) != FALSE) {
                deleteEtude();
            }
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'add_etude') {
            addEtude();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'traitement_add_etude') {
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING);
            $ville = filter_input(INPUT_POST, "ville", FILTER_SANITIZE_STRING);
            $superficie = filter_input(INPUT_POST, "superficie", FILTER_SANITIZE_NUMBER_INT);
            $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_NUMBER_INT);
            
            $param_post =array( "nom" => $nom,
                                "ville" => $ville,
                                "superficie" => $superficie,
                                "date" => $date);
            traitementAddEtude($param_post);
        }
    }
    else {
        accueil();
    }
} catch (Exception $e) {
    erreur($e->getMessage());  
}