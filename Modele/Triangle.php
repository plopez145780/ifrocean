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
    
    public function calculerSurface() {
        $cote1 = $this->lesPoints[0]->calculerDistance($this->lesPoints[1]);
        $cote2 = $this->lesPoints[1]->calculerDistance($this->lesPoints[2]);
        $cote3 = $this->lesPoints[2]->calculerDistance($this->lesPoints[0]);
        
        $p=($cote1+$cote2+$cote3)/2;
        $surface = sqrt($p*($p-$cote1)*($p-$cote2)*($p-$cote3));
        
        return $surface;
    }
}
