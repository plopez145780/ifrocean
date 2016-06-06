<?php

class gps {
	public $lat;
	public $long;

	public function __construct($latitude, $longitude) {
		$this->$lat = $latitude;
		$this->$long = $longitude;
	}




// renvoi la distance en mètres
publicfunction get_distance_m($lat1, $lng1, $lat2, $lng2) {
  $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
  $rlo1 = deg2rad($lng1);
  $rla1 = deg2rad($lat1);
  $rlo2 = deg2rad($lng2);
  $rla2 = deg2rad($lat2);
  $dlo = ($rlo2 - $rlo1) / 2;
  $dla = ($rla2 - $rla1) / 2;
  $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo
));
  $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
  return ($earth_radius * $d);
}

//-4.298260551299795,48.18643740852482,0 -4.300167618696066,48.18610768892475
echo (round(get_distance_m(48.856614, 2.3522219000000177, 48.85637345380177, 2.353462725877762) / 1000, 3)) . ' km';

//echo (round(get_distance_m(48.856667, 2.350987, 45.767299, 4.834329) / 1000, 3)) . ' km';

// affiche 391.613 km
}