<?php
include_once 'Config/ConfigBDD.php';
include_once 'Modele/GPS.php';
/**
 * Description of Modele
 *
 * @author Pierre Lopez
 */
class Modele {
    private $pdo;
    
    public function __construct() {
        $this->pdo = new PDO("mysql:host=" . ConfigBDD::SERVERNAME . ";dbname=" . ConfigBDD::DBNAME,
                       ConfigBDD::USERNAME,
                       ConfigBDD::PASSWORD);
    }

        // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getConnection()->query($sql);    // exécution directe
        }
        else {
            $resultat = $this->getConnection()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }
    
    public function getConnection() {
        return $this->pdo;
    }
    
    public function getEtude($id) {
            $pdo = $this->getConnection();
            $req = $pdo->prepare(
                    "SELECT idEtude, nomEtude, ville, superficie, date, validation FROM etudes "
                    . "WHERE (etudes.idEtude = :id)");
            $req->bindParam(":id", $id);
            $req->execute();
            $paramEtude = $req->fetch();
            $etude = new Etude($paramEtude["nomEtude"],$paramEtude["ville"],$paramEtude["superficie"],$paramEtude["date"],$paramEtude["validation"],$paramEtude["idEtude"]);
            
            return $etude;
    }
    
    public function getListeEtude(){
            $pdo = $this->getConnection();
            $req = $pdo->prepare("SELECT idEtude, nomEtude, ville, superficie, date, validation FROM etudes "
                    . "WHERE (etudes.validation = 0)");
            $req->execute();
            $etudes=array();
            while ($etude = $req->fetch()){
                $etudes[] = new Etude($etude["nomEtude"],$etude["ville"],$etude["superficie"],$etude["date"],$etude["validation"],$etude["idEtude"]);
            }
            return $etudes;
    }
    
    public function getZone($idZone) {
        $pdo = $this->getConnection();
            $req = $pdo->prepare(
                    "SELECT idZone, nomZone, latA, longA, latB, longB, latC, longC, latD, longD,"
                . "surface, validZone, idEtude FROM zones WHERE idZone = :idZone");
            $req->bindParam(":idZone", $idZone);
            $req->execute();
            $paramZone = $req->fetch();
            $zone = new Etude(
                    $paramZone['nomZone'],
                    new GPS($paramZone['latA'], $paramZone['longA']),
                    new GPS($paramZone['latB'], $paramZone['longB']),
                    new GPS($paramZone['latC'], $paramZone['longC']),
                    new GPS($paramZone['latD'], $paramZone['longD']),
                    $paramZone['surface'],
                    $paramZone['validZone'],
                    $paramZone['idZone'],
                    $paramZone['idEtude']
            );
            return $zone;
    }
    public function getListeZone($idEtude){
        $pdo = $this->getConnection();
        $req = $pdo->prepare("SELECT idZone, nomZone, latA, longA, latB, longB, latC, longC, latD, longD,"
                . "surface, validZone, idEtude FROM zones WHERE idEtude = :id");
        $req->bindParam(":id", $idEtude);
        $req->execute();
        $zones=array();
        while ($zone = $req->fetch()){
            $zones[] = new Etude(
                    $zone['nomZone'],
                    new GPS($zone['latA'], $zone['longA']),
                    new GPS($zone['latB'], $zone['longB']),
                    new GPS($zone['latC'], $zone['longC']),
                    new GPS($zone['latD'], $zone['longD']),
                    $zone['surface'],
                    $zone['validZone'],
                    $zone['idZone'],
                    $zone['idEtude']
            );
        }
        return $zones;
    }
}
