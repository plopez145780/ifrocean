<?php
require_once 'GPS.php';
require_once 'Triangle.php';
/**
 * Description of Zone
 *
 * @author Pierre Lopez
 */
class Zone {
    private $coordonneesGPS;
    private $nom;
    private $id;
    private $surface;
    private $validZone;
    private $idEtude;
    
    //CONSTRUCTEUR
    public function __construct($nom, $idEtude, $p1, $p2, $p3, $p4,$surface = null,$validZone = 0, $id = null) {
        $this->coordonneesGPS = array($p1, $p2, $p3, $p4);
        $this->nom = $nom;
        $this->id = $id;
        if($surface == null){
            $this->surface = $this->calculerSurface();
        }
        else {
            $this->surface = $surface;
        }
        $this->validZone = $validZone;
        $this->idEtude = $idEtude;
    }
    
    //GETTER and SETTER
    function getCoordonneesGPS() {
        return $this->coordonneesGPS;
    }
    function getCoordonneesGPSbyCase($i) {
        return $this->coordonneesGPS[$i];
    }
    function getNom() {
        return $this->nom;
    }
    function getId() {
        return $this->id;
    }
    function getSurface() {
        return $this->surface;
    }
    function getIdEtude() {
        return $this->idEtude;
    }

    
    //METHODE
    public function calculerSurface(){
        $t1 = new Triangle($this->coordonneesGPS[0], $this->coordonneesGPS[1], $this->coordonneesGPS[2]);
        $t2 = new Triangle($this->coordonneesGPS[2], $this->coordonneesGPS[3], $this->coordonneesGPS[0]);
        $s1 = $t1->calculerSurface();
        $s2 = $t2->calculerSurface();
        return $s1 + $s2;
    }
    
    public function delZone() {
        $bdd = new Modele();
        $pdo = $bdd->getConnection();
        $req = $pdo->prepare("DELETE FROM zones WHERE idZone = :id");
        $req->bindParam(":id", $this->id);
        $req->execute();
    }
    public function addZone() {
        $bdd = new Modele();
        $pdo = $bdd->getConnection();
        $req = $pdo->prepare(
                "INSERT INTO zones(idZone, nomZone, latA, longA, latB, longB, latC, longC, latD, longD, "
                . "surface, validZone, idEtude) "
                . "VALUES(NULL, :nomZone, :latA, :longA, :latB, :longB, :latC, :longC, :latD, :longD, "
                . ":surface, :validZone, :idEtude)");
        
        $latA = $this->getCoordonneesGPSbyCase(0)->getLatitude();
        $longA = $this->getCoordonneesGPSbyCase(0)->getLongitude();
        $latB = $this->getCoordonneesGPSbyCase(1)->getLatitude();
        $longB = $this->getCoordonneesGPSbyCase(1)->getLongitude();
        $latC = $this->getCoordonneesGPSbyCase(2)->getLatitude();
        $longC = $this->getCoordonneesGPSbyCase(2)->getLongitude();
        $latD = $this->getCoordonneesGPSbyCase(3)->getLatitude();
        $longD = $this->getCoordonneesGPSbyCase(3)->getLongitude();
        
        $req->bindParam(":nomZone", $this->nom);
        $req->bindParam(":latA", $latA);
        $req->bindParam(":longA", $longA);
        $req->bindParam(":latB", $latB);
        $req->bindParam(":longB", $longB);
        $req->bindParam(":latC", $latC);
        $req->bindParam(":longC", $longC);
        $req->bindParam(":latD", $latD);
        $req->bindParam(":longD", $longD);
        $req->bindParam(":surface", $this->surface);
        $req->bindParam(":validZone", $this->validZone);
        $req->bindParam(":idEtude", $this->idEtude);
        $req->execute();
        
        return $pdo->lastInsertId();
    }
    
    public function updateEtude() {
        
    }
    
    
    
}
