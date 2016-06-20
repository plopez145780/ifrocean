<?php
/**
 * Description of GPS
 *
 * @author Pierre Lopez
 */
class GPS {
    //ATTRIBUTS
    private $latitude;
    private $longitude;
    
    //CONSTRUCTEURS
    /*public function __construct($latitude, $longitude) {
            $this->latitude = $latitude;
            $this->longitude = $longitude;
    }*/
    public function __construct($direction,$degre,$minute,$seconde, 
                                $direction2,$degre2,$minute2,$seconde2) {
        $this->latitude = $this->sexagesimalToDecimal($direction, $degre, $minute, $seconde);
        $this->longitude = $this->sexagesimalToDecimal($direction2, $degre2, $minute2, $seconde2);
    }
    
    
    //GETTER et SETTER
    public function getLongitude() {return $this->longitude;}
    public function getLatitude() {return $this->latitude;}

    
    //METHODES
    private function sexagesimalToDecimal($direction,$degre,$minute,$seconde){
        $coordDeci = $degre + ($minute/60) + ($seconde/3600);
        if($direction == "S" || $direction == "O"){
            $coordDeci *= -1;
        }
        return $coordDeci;
    }


    /**
     * Renvoi la distance en mètres
     */
    public function calculerDistance(GPS $pointGPS) {
        $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
        $rlo1 = deg2rad($this->longitude);
        $rla1 = deg2rad($this->latitude);
        $rlo2 = deg2rad($pointGPS->longitude);
        $rla2 = deg2rad($pointGPS->latitude);
        $dlo = ($rlo2 - $rlo1) / 2;
        $dla = ($rla2 - $rla1) / 2;
        $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo
        ));
        $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return ($earth_radius * $d);
    }
}

