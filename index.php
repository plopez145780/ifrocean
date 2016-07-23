<?php
require('./Controleur/Controleur.php');

try {
    if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING)) {
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'bio_list_etude') {
            bioListEtude();
        }
        
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'list_etude') {
            listEtude();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'del_etude' 
                && filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_STRING)) {
                deleteEtude();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'add_etude') {
            addEtude();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'traitement_add_etude') {
            $param_post = array( 
                "nom" => filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING),
                "ville" => filter_input(INPUT_POST, "ville", FILTER_SANITIZE_STRING),
                "superficie" => filter_input(INPUT_POST, "superficie", FILTER_SANITIZE_NUMBER_INT),
                "date" => filter_input(INPUT_POST, "date", FILTER_SANITIZE_NUMBER_INT)
            );
            traitementAddEtude($param_post);
        }
        
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'list_zone') {
            if (filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_STRING)) {
                listZone();
            }
            else {
                throw new InvalidArgumentException("Paramètre manquant dans l'URL");
            }
            
        }
        
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'add_zone') {
            addZone();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'traitement_add_zone') {
            $param_post =array( 
                "inputNomZone" => filter_input(INPUT_POST, "inputNomZone", FILTER_SANITIZE_STRING),
                "idEtude" => filter_input(INPUT_POST, "idEtude", FILTER_SANITIZE_NUMBER_INT),
                "latdegresA" => filter_input(INPUT_POST, "latdegresA", FILTER_SANITIZE_NUMBER_INT),
                "latminutesA" => filter_input(INPUT_POST, "latminutesA", FILTER_SANITIZE_NUMBER_INT),
                "latsecondesA" => filter_input(INPUT_POST, "latsecondesA", FILTER_SANITIZE_NUMBER_INT),
                "latcentiemesA" => filter_input(INPUT_POST, "latcentiemesA", FILTER_SANITIZE_NUMBER_INT),
                "dirLatA" => filter_input(INPUT_POST, "dirLatA", FILTER_SANITIZE_STRING),
                "longdegresA" => filter_input(INPUT_POST, "longdegresA", FILTER_SANITIZE_NUMBER_INT),
                "longminutesA" => filter_input(INPUT_POST, "longminutesA", FILTER_SANITIZE_NUMBER_INT),
                "longsecondesA" => filter_input(INPUT_POST, "longsecondesA", FILTER_SANITIZE_NUMBER_INT),
                "longcentiemesA" => filter_input(INPUT_POST, "longcentiemesA", FILTER_SANITIZE_NUMBER_INT),
                "dirLongA" => filter_input(INPUT_POST, "dirLongA", FILTER_SANITIZE_STRING),
                "latdegresB" => filter_input(INPUT_POST, "latdegresB", FILTER_SANITIZE_NUMBER_INT),
                "latminutesB" => filter_input(INPUT_POST, "latminutesB", FILTER_SANITIZE_NUMBER_INT),
                "latsecondesB" => filter_input(INPUT_POST, "latsecondesB", FILTER_SANITIZE_NUMBER_INT),
                "latcentiemesB" => filter_input(INPUT_POST, "latcentiemesB", FILTER_SANITIZE_NUMBER_INT),
                "dirLatB" => filter_input(INPUT_POST, "dirLatB", FILTER_SANITIZE_STRING),
                "longdegresB" => filter_input(INPUT_POST, "longdegresB", FILTER_SANITIZE_NUMBER_INT),
                "longminutesB" => filter_input(INPUT_POST, "longminutesB", FILTER_SANITIZE_NUMBER_INT),
                "longsecondesB" => filter_input(INPUT_POST, "longsecondesB", FILTER_SANITIZE_NUMBER_INT),
                "longcentiemesB" => filter_input(INPUT_POST, "longcentiemesB", FILTER_SANITIZE_NUMBER_INT),
                "dirLongB" => filter_input(INPUT_POST, "dirLongB", FILTER_SANITIZE_STRING),
                "latdegresC" => filter_input(INPUT_POST, "latdegresC", FILTER_SANITIZE_NUMBER_INT),
                "latminutesC" => filter_input(INPUT_POST, "latminutesC", FILTER_SANITIZE_NUMBER_INT),
                "latsecondesC" => filter_input(INPUT_POST, "latsecondesC", FILTER_SANITIZE_NUMBER_INT),
                "latcentiemesC" => filter_input(INPUT_POST, "latcentiemesC", FILTER_SANITIZE_NUMBER_INT),
                "dirLatC" => filter_input(INPUT_POST, "dirLatC", FILTER_SANITIZE_STRING),
                "longdegresC" => filter_input(INPUT_POST, "longdegresC", FILTER_SANITIZE_NUMBER_INT),
                "longminutesC" => filter_input(INPUT_POST, "longminutesC", FILTER_SANITIZE_NUMBER_INT),
                "longsecondesC" => filter_input(INPUT_POST, "longsecondesC", FILTER_SANITIZE_NUMBER_INT),
                "longcentiemesC" => filter_input(INPUT_POST, "longcentiemesC", FILTER_SANITIZE_NUMBER_INT),
                "dirLongC" => filter_input(INPUT_POST, "dirLongC", FILTER_SANITIZE_STRING),
                "latdegresD" => filter_input(INPUT_POST, "latdegresD", FILTER_SANITIZE_NUMBER_INT),
                "latminutesD" => filter_input(INPUT_POST, "latminutesD", FILTER_SANITIZE_NUMBER_INT),
                "latsecondesD" => filter_input(INPUT_POST, "latsecondesD", FILTER_SANITIZE_NUMBER_INT),
                "latcentiemesD" => filter_input(INPUT_POST, "latcentiemesD", FILTER_SANITIZE_NUMBER_INT),
                "dirLatD" => filter_input(INPUT_POST, "dirLatD", FILTER_SANITIZE_STRING),
                "longdegresD" => filter_input(INPUT_POST, "longdegresD", FILTER_SANITIZE_NUMBER_INT),
                "longminutesD" => filter_input(INPUT_POST, "longminutesD", FILTER_SANITIZE_NUMBER_INT),
                "longsecondesD" => filter_input(INPUT_POST, "longsecondesD", FILTER_SANITIZE_NUMBER_INT),
                "longcentiemesD" => filter_input(INPUT_POST, "longcentiemesD", FILTER_SANITIZE_NUMBER_INT),
                "dirLongD" => filter_input(INPUT_POST, "dirLongD", FILTER_SANITIZE_STRING),
            );
            traitementAddZone($param_post);
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'add_espece') {
            addEspece();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'ajout_espece_zone') {
            ajoutEspeceZone();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'ajout_nom_espece') {
            ajoutNomEspece();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'ajout_quantite') {
            ajoutQuantite();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'sup_espece_zone') {
            supEspeceZone();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == 'fin_zone') {
            finZone();
        }
        if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) == '404') {
            page404();
        }
    }
    else {
        accueil();
    }
} catch (Exception $e) {
    $erreur = new Exception("erreur");
    erreur($erreur);  
}