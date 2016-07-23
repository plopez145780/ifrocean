<?php

include 'Modele.php';
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
        $this->datePrelev = $datePrelev;
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
    function getVille() {
        return $this->ville;
    }
    function getSuperficie() {
        return $this->superficie;
    }
    function getDatePrelev() {
        return $this->datePrelev;
    }
    function getDatePrelevFormatFr() {
        return date_format(date_create($this->datePrelev),"d/m/Y");
    }
    function getFinEtude() {
        return $this->finEtude;
    }
    function setFinEtude($finEtude) {
        $this->finEtude = $finEtude;
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
        $bdd = new Modele();
        $pdo = $bdd->getConnection();
        $req = $pdo->prepare("INSERT INTO etudes(idEtude, nomEtude, ville, superficie, date, validation) "
                . "VALUES(NULL, :nom, :ville, :superficie, :date, :validation)");
        $req->bindParam(":nom", $this->nom);
        $req->bindParam(":ville", $this->ville);
        $req->bindParam(":superficie", $this->superficie);
        $req->bindParam(":date", $this->datePrelev);
        $req->bindParam(":validation", $this->finEtude);
        $req->execute();
        
    }
    public function updateEtude() {
        $bdd = new Modele();
        $pdo = $bdd->getConnection();
        $req = $pdo->prepare("UPDATE etudes SET nomEtude=:nom, ville=:ville, superficie=:superficie, date=:date, validation=:validation WHERE idEtude=:id");
        $req->bindParam(":nom", $this->nom);
        $req->bindParam(":ville", $this->ville);
        $req->bindParam(":superficie", $this->superficie);
        $req->bindParam(":date", $this->datePrelev);
        $req->bindParam(":validation", $this->finEtude);
        $req->bindParam(":id", $this->id);
        $req->execute();
    }
    
    public function changerEtatEtude() {
        $bdd = new Modele();
 
        $newEtat = ($this->getFinEtude() == 1) ? 0 : 1 ;
        
        $pdo = $bdd->getConnection();
        $req = $pdo->prepare("UPDATE etudes SET validation=:etat WHERE idEtude=:id");
        $req->bindParam(":etat", $newEtat);
        $req->bindParam(":id", $this->getId());
        $req->execute();
    }
}
