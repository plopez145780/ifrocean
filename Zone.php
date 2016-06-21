<?php
require_once 'Triangle.php';
/**
 * Description of Zone
 *
 * @author Pierre Lopez
 */
class Zone {
    private $coordonneesGPS;
    
    //CONSTRUCTEUR
    public function __construct($p1, $p2, $p3, $p4) {
        $this->coordonneesGPS = array($p1, $p2, $p3, $p4);
    }
    
    //GETTER and SETTER
    function getCoordonneesGPS() {
        return $this->coordonneesGPS;
    }

    //METHODE
    public function calculerSurface(){
        $t1 = new Triangle($this->coordonneesGPS[0], $this->coordonneesGPS[1], $this->coordonneesGPS[2]);
        $t2 = new Triangle($this->coordonneesGPS[2], $this->coordonneesGPS[3], $this->coordonneesGPS[0]);
        
        $s1 = $t1->calculerSurface();
        $s2 = $t2->calculerSurface();
        
        $surface = $s1 + $s2;
        return $surface;
    }
    
    
    
}
