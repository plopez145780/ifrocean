<?php

include 'Modele/Modele.php';
/**
 * Description of Etude
 *
 * @author Pierre Lopez
 */
class Etude extends Modele {
    //ATTRIBUTS
    private $id;
    private $nom;
    private $ville;
    private $superficie;
    private $datePrelev;
    private $finEtude;
    
    //CONSTRUCTEUR

    public function __construct($nom, $ville, $supercifie, $datePrelev, $finEtude,$id = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->ville = $ville;
        $this->superficie = $supercifie;
        $this->datePrelev = $datePrelev; //timestamp ???
        $this->finEtude = $finEtude;
        $this->id = $id;
    }
    
    //GETTER and SETTER
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

        
    //METHODES
    public function delEtude() {
        $bdd = new Modele();
        $pdo = $bdd->getConnection();
        $req = $pdo->prepare("DELETE FROM etudes WHERE idEtude = :id");
        $req->bindParam(":id", $this->id);
        $req->execute();
    }
    public function addEtude() {
        
    }
    public function updateEtude() {
        
    }
}
