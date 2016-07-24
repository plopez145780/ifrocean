<?php
/**
 * Description of Espece
 *
 * @author pierre lopez
 */
class Espece {
    //ATTRIBUTS
    private $id;
    private $nom;
    private $quantite;
    private $idZone;
    private $idEtude;
    private $densite;


    //CONSTRUCTEUR
    public function __construct($nom, $quantite, $idZone, $idEtude, $densite = NULL, $id = NULL) {
        $this->id = $id;
        $this->nom = $nom;
        $this->quantite = $quantite;
        $this->idZone = $idZone;
        $this->idEtude = $idEtude;
        $this->densite = $densite;
    }
    
    //GETTER and SETTER
    function getId() {
        return $this->id;
    }
    function getNom() {
        return $this->nom;
    }
    function getQuantite() {
        return $this->quantite;
    }
    function getIdZone() {
        return $this->idZone;
    }
    function getIdEtude() {
        return $this->idEtude;
    }
    function getDensite() {
        return $this->densite;
    }
    //METHODES
    
    
}
