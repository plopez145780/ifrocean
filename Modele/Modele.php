<?php
include_once 'Config/ConfigBDD.php';
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
                    "SELECT idEtude, nomEtude, nomVille, superficie, datePrelevement, finEtude FROM etudes WHERE (etudes.idEtude = :id)");
            $req->bindParam(":id", $id);

            $req->execute();
            
            $paramEtude = $req->fetch();
            $etude = new Etude($paramEtude["nomEtude"],$paramEtude["nomVille"],$paramEtude["superficie"],$paramEtude["datePrelevement"],$paramEtude["finEtude"],$paramEtude["idEtude"]);
            
            return $etude;
    }
    
    public function getListeEtude(){
            $pdo = $this->getConnection();
            
            $req = $pdo->prepare("SELECT idEtude, nomEtude, nomVille, superficie, datePrelevement, finEtude FROM etudes "
                    . "WHERE (etudes.finEtude = 0)");
            $req->execute();
            
            $etudes=array();
            while ($etude = $req->fetch()){
                $etudes[] = new Etude($etude["nomEtude"],$etude["nomVille"],$etude["superficie"],$etude["datePrelevement"],$etude["finEtude"],$etude["idEtude"]);
            }
            
            
            return $etudes;
            
    }
    public function getListeZone(){
            
    }
    
    
    
    
}
