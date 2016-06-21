<?php

require('Controleur/Controleur.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'list_etude') {
            listEtude();
        }
        if ($_GET['action'] == 'del_etude') {
            if (isset($_GET['id_etude'])) {
                deleteEtude();
            }
        }
        if ($_GET['action'] == 'add_etude') {
            addEtude();
        }
    }
    else {
        accueil();
    }
} catch (Exception $e) {
    erreur($e->getMessage());  
}