<?php
    require_once 'Modele/Etude.php';

    function accueil() {
        require_once 'Vue/vueAccueil.php';
    }
    
    function bioListEtude() {
        require_once 'Vue/vueBioListEtude.php';
    }

    function listEtude() {
        require_once 'Vue/vueListEtude.php';
    }
    function addEtude() {
        require_once 'Vue/vueAddEtude.php';
    }
    function traitementAddEtude() {
        require_once 'Vue/traitementAddEtude.php';
    }
    
    function deleteEtude() {
        require_once 'Vue/vueDeleteEtude.php';
    }
    
    function listZone() {
        require_once 'Vue/vueListZone.php';
    }
    
    function addZone() {
        require_once 'Vue/vueAddZone.php';
    }
    function traitementAddZone() {
        require_once 'Vue/traitementAddZone.php';
    }
    function addEspece() {
        require_once 'Vue/vueAddEspece.php';
    }
    
    function ajoutEspeceZone() {
        require_once 'Vue/ajout_espece_zone.php';
    }
    function ajoutNomEspece() {
        require_once 'Vue/ajout_nom_espece.php';
    }
    function ajoutQuantite() {
        require_once 'Vue/ajout_quantite.php';
    }
    function supEspeceZone() {
        require_once 'Vue/sup_espece_zone.php';
    }
    function finZone() {
        require_once 'Vue/fin_zone.php';
    }
    
    function page404() {
        require_once 'Vue/vuePage404.php';
    }
    
    function erreur(){
        require_once 'Vue/vueErreur.php';
    }
    