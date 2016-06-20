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
<form method="POST" action="list_zone.php?id_etude=<?php echo $idEtude ?>" class="form-horizontal">
    <div class="form-group">
        <label for="inputNomZone" class="col-sm-2 control-label">Nom de la zone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputNomZone" name="inputNomZone" placeholder="Zone">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLatA" class="col-sm-2 control-label">Latitude A</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLatA" name="inputLatA" placeholder="Latitude 1er point">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLongA" class="col-sm-2 control-label">Longitude A</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLongA" name="inputLongA" placeholder="Longitude 1er point">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLatB" class="col-sm-2 control-label">Latitude B</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLatB" name="inputLatB" placeholder="Latitude 2eme point">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLongB" class="col-sm-2 control-label">Longitude B</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLongB" name="inputLongB" placeholder="Longitude 2eme point">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputLatC" class="col-sm-2 control-label">Latitude C</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLatC" name="inputLatC" placeholder="Latitude 3eme point">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLongC" class="col-sm-2 control-label">Longitude C</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLongC" name="inputLongC" placeholder="Longitude 3eme point">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLatD" class="col-sm-2 control-label">Latitude D</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLatD" name="inputLatD" placeholder="Latitude 4eme point">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLongD" class="col-sm-2 control-label">Longitude D</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLongD" name="inputLongD" placeholder="Longitude 4eme point">
        </div>
    </div>
    <button type="submit" class="btn btn-lg btn-default">Valider</button>
    
    <?php 
    $inputNomZone = $_POST['inputNomZone'];
    $inputLatA = $_POST['inputLatA'];
    $inputLongA = $_POST['inputLongA'];
    $inputLatB = $_POST['inputLatB'];
    $inputLongB = $_POST['inputLongB'];
    $inputLatC = $_POST['inputLatC'];
    $inputLongC = $_POST['inputLongC'];
    $inputLatD = $_POST['inputLatD'];
    $inputLongD = $_POST['inputLongD'];
    
    
    $requete = "INSERT INTO `zones`(`idZone`, `nomZone`, `latPointA`, "
            . "`longPointA`, `latPointB`, `longPointB`, `latPointC`, `longPointC`, `latPointD`, "
            . "`longPointD`, `surface`, `finZone`, `idEtude`) "
            . "VALUES (........,$inputNomZone,$inputLatA,$inputLongA,$inputLatB,$inputLongB,"
            . "$inputLatC,$inputLongC,$inputLatD,$inputLongD,"
            . "[value-11],0,$idEtude)"
    ?>
    
    
    
</form>
</section>

<!-- Le pied de page -->
<?php include("../footer.inc.php"); ?>