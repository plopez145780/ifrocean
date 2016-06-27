<?php
include_once '/Modele/GPS.php';
include_once '/Modele/Zone.php';

$pointA = new GPS(
        $param_post["dirLatA"], $param_post["latdegresA"],$param_post["latminutesA"],
        $param_post["latsecondesA"],$param_post["latcentiemesA"],
        $param_post["dirLongA"], $param_post["longdegresA"],$param_post["longminutesA"],
        $param_post["longsecondesA"],$param_post["longcentiemesA"]
);
$pointB = new GPS(
        $param_post["dirLatB"], $param_post["latdegresB"],$param_post["latminutesB"],
        $param_post["latsecondesB"],$param_post["latcentiemesB"],
        $param_post["dirLongB"], $param_post["longdegresB"],$param_post["longminutesB"],
        $param_post["longsecondesB"],$param_post["longcentiemesB"]
);
$pointC = new GPS(
        $param_post["dirLatC"], $param_post["latdegresC"],$param_post["latminutesC"],
        $param_post["latsecondesC"],$param_post["latcentiemesC"],
        $param_post["dirLongC"], $param_post["longdegresC"],$param_post["longminutesC"],
        $param_post["longsecondesC"],$param_post["longcentiemesC"]
);
$pointD = new GPS(
        $param_post["dirLatD"], $param_post["latdegresD"],$param_post["latminutesD"],
        $param_post["latsecondesD"],$param_post["latcentiemesD"],
        $param_post["dirLongD"], $param_post["longdegresD"],$param_post["longminutesD"],
        $param_post["longsecondesD"],$param_post["longcentiemesD"]
);

$zone = new Zone($param_post["inputNomZone"],$param_post["idEtude"], $pointA, $pointB, $pointC, $pointD);
$zone->addZone();
header('Location: /ifrocean/index.php?action=list_zone&id_etude='.$param_post["idEtude"]);

?>