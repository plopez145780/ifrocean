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
    public function __construct($directionNS, $degresLat, $minutesLat, $secondesLat, $centiemesLat, $directionEO, $degresLong, $minutesLong, $secondeSLong, $centiemesLong) {
        $this->latitude = $this->sexagesimalToDecimal($directionNS, $degresLat, $minutesLat, $secondesLat, $centiemesLat);
        $this->longitude = $this->sexagesimalToDecimal($directionEO, $degresLong, $minutesLong, $secondeSLong, $centiemesLong);
    }

    //GETTER et SETTER
    public function getLongitude() {return $this->longitude;}
    public function getLatitude() {return $this->latitude;}
    
    //METHODES
    private function sexagesimalToDecimal($direction,$degres,$minutes,$secondes,$centiemes){
        $coordDeci = $degres + ($minutes/60) + (($secondes+($centiemes/100))/3600);
        if($direction == "sud" || $direction == "ouest"){
            $coordDeci *= -1;
        }
        return $coordDeci;
    }

    /**
     * Renvoi la distance en mètres
     */
    public function calculerDistance(GPS $pointGPS) {
        //6372.795477598
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

