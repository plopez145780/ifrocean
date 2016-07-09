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
    
    //CONSTRUCTEUR
    public function __construct($nom, $quantite, $idZone, $idEtude, $id = NULL) {
        $this->id = $id;
        $this->nom = $nom;
        $this->quantite = $quantite;
        $this->idZone = $idZone;
        $this->idEtude = $idEtude;
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
    function setId($id) {
        $this->id = $id;
    }
    function setNom($nom) {
        $this->nom = $nom;
    }
    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }
    function setIdZone($idZone) {
        $this->idZone = $idZone;
    }
    function setIdEtude($idEtude) {
        $this->idEtude = $idEtude;
    }

        //METHODES
    
    
}
