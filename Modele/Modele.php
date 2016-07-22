<?php

include_once 'Config/ConfigBDD.php';
include_once 'Modele/GPS.php';
include_once 'Modele/Zone.php';
include_once 'Modele/Espece.php';

/**
 * Description of Modele
 *
 * @author Pierre Lopez
 */
class Modele {

    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=" . ConfigBDD::SERVERNAME . ";dbname=" . ConfigBDD::DBNAME, ConfigBDD::USERNAME, ConfigBDD::PASSWORD);
    }

    // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getConnection()->query($sql);    // exécution directe
        } else {
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
                "SELECT idEtude, nomEtude, ville, superficie, DATE_FORMAT(date, '%d/%m/%Y') AS date, validation FROM etudes "
                . "WHERE (etudes.idEtude = :id)");
        $req->bindParam(":id", $id);
        $req->execute();
        $paramEtude = $req->fetch();
        $etude = new Etude($paramEtude["nomEtude"], $paramEtude["ville"], $paramEtude["superficie"], $paramEtude["date"], $paramEtude["validation"], $paramEtude["idEtude"]);

        return $etude;
    }

    public function getListeEtudeOpen() {
        $pdo = $this->getConnection();
        $req = $pdo->prepare("SELECT idEtude, nomEtude, ville, superficie, DATE_FORMAT(date, '%d/%m/%Y') AS date, validation FROM etudes "
                . "WHERE (etudes.validation = 0)");
        $req->execute();
        $etudes = array();
        while ($etude = $req->fetch()) {
            $etudes[] = new Etude($etude["nomEtude"], $etude["ville"], $etude["superficie"], $etude["date"], $etude["validation"], $etude["idEtude"]);
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
        $zone = new Zone(
                $paramZone['nomZone'], new GPS($paramZone['latA'], $paramZone['longA']), new GPS($paramZone['latB'], $paramZone['longB']), new GPS($paramZone['latC'], $paramZone['longC']), new GPS($paramZone['latD'], $paramZone['longD']), $paramZone['surface'], $paramZone['validZone'], $paramZone['idZone'], $paramZone['idEtude']
        );
        return $zone;
    }
    
    public function getListeZone($idEtude) {
        $pdo = $this->getConnection();
        $req = $pdo->prepare("SELECT idZone, nomZone, latA, longA, latB, longB, latC, longC, latD, longD,"
                . "surface, validZone, idEtude FROM zones WHERE idEtude = :id");
        $req->bindParam(":id", $idEtude);
        $req->execute();
        $zones = array();
        while ($zone = $req->fetch()) {
            $zones[] = new Zone(
                    $zone['nomZone'], $zone['idEtude'], new GPS($zone['latA'], $zone['longA']), new GPS($zone['latB'], $zone['longB']), new GPS($zone['latC'], $zone['longC']), new GPS($zone['latD'], $zone['longD']), $zone['surface'], $zone['validZone'], $zone['idZone']
            );
        }
        return $zones;
    }
    
    public function getListeZoneOpen($idEtude) {
        $pdo = $this->getConnection();
        $req = $pdo->prepare("SELECT idZone, nomZone, latA, longA, latB, longB, latC, longC, latD, longD,"
                . "surface, validZone, idEtude FROM zones WHERE idEtude = :id AND validZone = 0");
        $req->bindParam(":id", $idEtude);
        $req->execute();
        $zones = array();
        while ($zone = $req->fetch()) {
            $zones[] = new Zone(
                    $zone['nomZone'], $zone['idEtude'], new GPS($zone['latA'], $zone['longA']), new GPS($zone['latB'], $zone['longB']), new GPS($zone['latC'], $zone['longC']), new GPS($zone['latD'], $zone['longD']), $zone['surface'], $zone['validZone'], $zone['idZone']
            );
        }
        return $zones;
    }

    public function getListeEspeceByZone($idZone) {
        $pdo = $this->getConnection();
        $req = $pdo->prepare("SELECT nomEspece, espece_zone.quantite, nomZone, surface, etudes.idEtude, "
                . "(quantite/surface) AS densite "
                . "FROM espece_zone "
                . "INNER JOIN especes ON especes.idEspece=espece_zone.idEspece "
                . "INNER JOIN zones ON espece_zone.idZone=zones.idZone "
                . "INNER JOIN etudes ON zones.idEtude=etudes.idEtude "
                . "WHERE zones.idZone=:id");
        $req->bindParam(":id", $idZone);
        $req->execute();
        $especes = array();
        while ($espece = $req->fetch()) {
            $especes[] = new Espece(
                    $espece['nomEspece'], $espece['quantite'], $idZone, $espece['idEtude']
            );
        }
        return $especes;
    }
    
    public function getListeEspeceByEtude($idEtude) {
        $pdo = $this->getConnection();
        $req = $pdo->prepare("SELECT nomEspece, sum(quantite) AS quantiteT, sum(surface) AS surfaceT, "
                . "(sum(quantite)/sum(surface)) AS densite, "
                . "ROUND(sum(quantite)/sum(surface)*superficie) AS nbIndividu, "
                . "zones.idZone, quantite FROM espece_zone "
                . "INNER JOIN especes ON especes.idEspece=espece_zone.idEspece "
                . "INNER JOIN zones ON espece_zone.idZone=zones.idZone "
                . "INNER JOIN etudes ON etudes.idEtude=zones.idEtude "
                . "WHERE etudes.idEtude=:id GROUP BY especes.idEspece"
        );
        $req->bindParam(":id", $idEtude);
        $req->execute();
        $especes = array();
        while ($espece = $req->fetch()) {
            $especes[] = new Espece(
                    $espece['nomEspece'], $espece['quantite'], $espece['idZone'], $idEtude
            );
        }
        return $especes;
    }

}
