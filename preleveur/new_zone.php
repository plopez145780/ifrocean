<?php 
    $idEtude = filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_NUMBER_INT);
    if ($idEtude == FALSE OR $idEtude == NULL) {
        $idEtude = 1;
        echo "ERREUR";
    }
    
    //$requete = "SELECT `idZone` AS id, `nomZone` AS nom FROM `zones` WHERE `idEtude`= $idEtude";
    //include_once '../bdd.php';
    $title = "Nouvelle zone";
    include("../header.inc.php"); 
    $nomEtude = "...nom de l'etude...";

?>

<section>
    <h1>Création d'une nouvelle zone - <?php echo $nomEtude ?></h1>
<!-- Formulaire POST-->
<form method="POST" action="post_new_zone.php?id_etude=<?php echo $idEtude ?>" class="form-horizontal">
    <div class="form-group">
        <label for="inputNomZone" class="col-sm-2 control-label">Nom de la zone</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputNomZone" name="inputNomZone" placeholder="Zone">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLatA" class="col-sm-2 control-label">Latitude A</label>
        <div class="col-sm-2">
            <input type="number" step="1" required min="0" max="90" class="form-control" id="latdegresA" name="latdegresA" placeholder="Degrès°">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="latminutesA" name="latminutesA" placeholder="'Minutes'">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="latsecondesA" name="latsecondesA" placeholder="Secondes">
            <input type="number" step="1" required min="0" max="99" class="form-control" id="latcentiemesA" name="latcentiemesA" placeholder="Centiemes">
            <input type="radio" name="dirLat A"
                 <?php   if (isset($gender) && $gender=="nord") echo "checked";?>
                      value ='nord'>  Nord
                    <input type="radio" name="dirLat A"
                   <?php if (isset($gender) && $gender=="sud") echo "checked";?>
                       Value ='sud'> Sud
        </div>
    </div>
   <div class="form-group">
        <label for="inputLongA" class="col-sm-2 control-label">Longitude A</label>
        <div class="col-sm-2">
            <input type="number" step="1" required min="0" max="180" class="form-control" id="longdegresA" name="longdegresA" placeholder="Degrès°">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="longminutesA" name="longminutesA" placeholder='Minutes"'>
            <input type="number" step="1" required min="0" max="60" class="form-control" id="longsecondesA" name="longsecondesA" placeholder="Secondes'">
            <input type="number" step="1" required min="0" max="99" class="form-control" id="longsecondesA" name="longcentiemesA" placeholder="Centiemes">
            <input type="radio" name="dirLong A"
                 <?php   if (isset($gender) && $gender=="est") echo "checked";?>
                      value ='est'>  Est
                    <input type="radio" name="dirLong A"
                   <?php if (isset($gender) && $gender=="ouest") echo "checked";?>
                       Value ='ouest'> Ouest
        </div>
    </div>
     <div class="form-group">
        <label for="inputLatB" class="col-sm-2 control-label">Latitude B</label>
        <div class="col-sm-2">
             <input type="number" step="1" required min="0" max="90" class="form-control" id="latdegresB" name="latdegresB" placeholder="Degrès°">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="latminutesB" name="latminutesB" placeholder="'Minutes'">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="latsecondesB" name="latsecondesB" placeholder="Secondes">
            <input type="number" step="1" required min="0" max="99" class="form-control" id="latcentiemesB" name="latcentiemesB" placeholder="Centiemes">
            <input type="radio" name="dirLat B"
                 <?php   if (isset($gender) && $gender=="nord") echo "checked";?>
                      value ='nord'>  Nord
                    <input type="radio" name="dirLat B"
                   <?php if (isset($gender) && $gender=="sud") echo "checked";?>
                       Value ='sud'> Sud
        </div>
    </div>
    <div class="form-group">
        <label for="inputLongB" class="col-sm-2 control-label">Longitude B</label>
        <div class="col-sm-2">
            <input type="number" step="1" required min="0" max="180" class="form-control" id="longdegresB" name="longdegresB" placeholder="Degrès°">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="longminutesB" name="longminutesB" placeholder='Minutes"'>
            <input type="number" step="1" required min="0" max="60" class="form-control" id="longsecondesB" name="longsecondesB" placeholder="Secondes'">
            <input type="number" step="1" required min="0" max="99" class="form-control" id="longsecondesB" name="longcentiemesB" placeholder="Centiemes">
            <input type="radio" name="dirLong B"
                 <?php   if (isset($gender) && $gender=="est") echo "checked";?>
                      value ='est'>  Est
                    <input type="radio" name="dirLong B"
                   <?php if (isset($gender) && $gender=="ouest") echo "checked";?>
                       Value ='ouest'> Ouest
        </div>
    </div>
    
     <div class="form-group">
        <label for="inputLatC" class="col-sm-2 control-label">Latitude C</label>
        <div class="col-sm-2">
            <input type="number" step="1" required min="0" max="90" class="form-control" id="latdegresC" name="latdegresC" placeholder="Degrès°">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="latminutesC" name="latminutesC" placeholder="'Minutes'">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="latsecondesC" name="latsecondesC" placeholder="Secondes">
            <input type="number" step="1" required min="0" max="99" class="form-control" id="latcentiemesC" name="latcentiemesC" placeholder="Centiemes">
            <input type="radio" name="dirLat C"
                 <?php   if (isset($gender) && $gender=="nord") echo "checked";?>
                      value ='nord'>  Nord
                    <input type="radio" name="dirLat C"
                   <?php if (isset($gender) && $gender=="sud") echo "checked";?>
                       Value ='sud'> Sud
        </div>
    </div>
    <div class="form-group">
        <label for="inputLongC" class="col-sm-2 control-label">Longitude C</label>
        <div class="col-sm-2">
            <input type="number" step="1" required min="0" max="180" class="form-control" id="longdegresC" name="longdegresC" placeholder="Degrès°">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="longminutesC" name="longminutesC" placeholder='Minutes"'>
            <input type="number" step="1" required min="0" max="60" class="form-control" id="longsecondesC" name="longsecondesC" placeholder="Secondes'">
            <input type="number" step="1" required min="0" max="99" class="form-control" id="longsecondesC" name="longcentiemesC" placeholder="Centiemes">
            <input type="radio" name="dirLong C"
                 <?php   if (isset($gender) && $gender=="est") echo "checked";?>
                      value ='est'>  Est
                    <input type="radio" name="dirLong C"
                   <?php if (isset($gender) && $gender=="ouest") echo "checked";?>
                       Value ='ouest'> Ouest
        </div>
    </div>
     <div class="form-group">
        <label for="inputLatD" class="col-sm-2 control-label">Latitude D</label>
        <div class="col-sm-2">
            <input type="number" step="1" required min="0" max="90" class="form-control" id="latdegresD" name="latdegresD" placeholder="Degrès°">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="latminutesD" name="latminutesD" placeholder="'Minutes'">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="latsecondesD" name="latsecondesD" placeholder="Secondes">
            <input type="number" step="1" required min="0" max="99" class="form-control" id="latcentiemesD" name="latcentiemesD" placeholder="Centiemes">
            <input type="radio" name="dirLat D"
                 <?php   if (isset($gender) && $gender=="nord") echo "checked";?>
                      value ='nord'>  Nord
                    <input type="radio" name="dirLat D"
                   <?php if (isset($gender) && $gender=="sud") echo "checked";?>
                       Value ='sud'> Sud
        </div>
    </div>
    <div class="form-group">
        <label for="inputLongD" class="col-sm-2 control-label">Longitude D</label>
        <div class="col-sm-2">
            <input type="number" step="1" required min="0" max="180" class="form-control" id="longdegresD" name="longdegresD" placeholder="Degrès°">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="longminutesD" name="longminutesD" placeholder='Minutes"'>
            <input type="number" step="1" required min="0" max="60" class="form-control" id="longsecondesD" name="longsecondesD" placeholder="Secondes'">
            <input type="number" step="1" required min="0" max="99" class="form-control" id="longsecondesD" name="longcentiemesD" placeholder="Centiemes">
            <input type="radio" name="dirlong D"
                 <?php   if (isset($gender) && $gender=="est") echo "checked";?>
                      value ='est'>  Est
                    <input type="radio" name="dirlong D"
                   <?php if (isset($gender) && $gender=="ouest") echo "checked";?>
                       Value ='ouest'> Ouest
        </div>
    </div>
    <button type="submit" class="btn btn-lg btn-default">Valider</button>    
</form>
</section>

<!-- Le pied de page -->
<?php include("../footer.inc.php"); ?>