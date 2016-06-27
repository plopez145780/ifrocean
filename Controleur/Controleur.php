<?php
    //require_once 'Modele/Modele.php';
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
    /*function viewEtude() {
        $bdd = new Modele();
        $etude = $bdd->getEtude();
        require_once 'Vue/vueViewEtude.php';
    }*/
    function addEtude() {
        require_once 'Vue/vueAddEtude.php';//afficher un encar qui dit ajouté, les chang d'ajout son en bas
    }
    function traitementAddEtude($param_post) {
        require_once 'Vue/traitementAddEtude.php';//afficher un encar qui dit ajouté, les chang d'ajout son en bas
    }
    
    function deleteEtude() {
        require_once 'Vue/vueDeleteEtude.php';//afficher un encar qui dit supp
    }
    
    /*function updateEtude() {
        $bdd = new Modele();
        //...
        $resultat = $bdd->updateEtude();
        require_once 'Vue/vueUpdateEtude.php';
    }*/
    
    function addZone() {
        require_once 'Vue/vueAddZone.php';//penser a afficher un encar qui dit ajouté, les chang d'ajout son en bas
    }
    function traitementAddZone($param_post) {
        require_once 'Vue/traitementAddZone.php';//penser a afficher un encar qui dit ajouté, les chang d'ajout son en bas
    }
    
    function erreur($messageErreur){
        require_once 'Vue/vueErreur.php';
    }
    