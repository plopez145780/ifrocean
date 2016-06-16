<?php

/**
 * Description of Etude
 *
 * @author Pierre Lopez
 */
class Etude {
    //ATTRIBUTS
    private $nom;
    private $ville;
    private $superficie;
    private $datePrelev;
    private $finEtude;
    
    
    //CONSTRUCTEUR
    public function __construct() {
        $this->nom = "etude";
        $this->ville = "ville";
        $this->superficie = 123456;
        $this->datePrelev = 0;//timestamp ???
        $this->finEtude = FALSE;
    }
    
    
    //METHODES
    public function Inserer() {
        try {
            //ouverture de la connection
            $pdo = new PDO("mysql:host=" . ConfigBDD::SERVERNAME . ";dbname=" . ConfigBDD::DBNAME,
                           ConfigBDD::USERNAME,
                           ConfigBDD::PASSWORD);

            $req = $pdo->prepare("INSERT INTO triangles (xa,ya,xb,yb,xc,yc,couleur) VALUES (:xa,:ya,:xb,:yb,:xc,:yc,:couleur)");
            $req->bindParam(":xa", $this->lesPoints[0]->x);
            $req->bindParam(":ya", $this->lesPoints[0]->y);
            $req->bindParam(":xb", $this->lesPoints[1]->x);
            $req->bindParam(":yb", $this->lesPoints[1]->y);
            $req->bindParam(":xc", $this->lesPoints[2]->x);
            $req->bindParam(":yc", $this->lesPoints[2]->y);
            $req->bindParam(":couleur", $this->couleur);

            $req->execute();
        }
            catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";//afficher l'erreur mieux
            die();
        }
       //fermeture PDO
       $pdo = null;
    }
    
    
    
}
