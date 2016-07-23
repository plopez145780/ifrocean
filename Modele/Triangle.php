<?php
/**
 * Description of Triangle
 *
 * @author Pierre Lopez
 */

class Triangle {
    
    private $lesPoints = [];
    
    public function __construct($p1, $p2, $p3) {
        $this->lesPoints = array($p1, $p2, $p3);
    }
    
    function getLesPoints($case) {
        return $this->lesPoints[$case];
    }
        
    public function calculerSurface() {
        $cote1 = $this->getLesPoints(0)->calculerDistance($this->getLesPoints(1));
        $cote2 = $this->getLesPoints(1)->calculerDistance($this->getLesPoints(2));
        $cote3 = $this->getLesPoints(2)->calculerDistance($this->getLesPoints(0));
        
        $p=($cote1+$cote2+$cote3)/2;
        return sqrt($p*($p-$cote1)*($p-$cote2)*($p-$cote3));
    }
}
