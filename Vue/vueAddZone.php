<?php 
    $idEtude = filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_NUMBER_INT);
    $bdd = new Modele();
    $etude = $bdd->getEtude($idEtude);
    $nomEtude = $etude->getNom();
    $title = $nomEtude . " :: Ajouter une zone"; 
    
    $nomZone = "";
?>

<!-- Le corps -->
<?php ob_start(); ?>
<section>
    <h1><?= $title ?></h1>
<!-- Formulaire POST-->



<form method="POST" action="/ifrocean/index.php?action=traitement_add_zone" class="form-horizontal">
    <div class="form-group">
        <label for="inputNomZone" class="col-sm-2 control-label">Nom de la zone</label>
        <div class="col-sm-5">
            <input type="text" required class="form-control" id="inputNomZone" name="inputNomZone" placeholder="Zone">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLatA" class="col-sm-2 control-label">Latitude A</label>
        <div class="col-sm-2">
            <input type="number" step="1" required min="0" max="90" class="form-control" id="latdegresA" name="latdegresA" placeholder="Degrès°">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="latminutesA" name="latminutesA" placeholder="'Minutes'">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="latsecondesA" name="latsecondesA" placeholder="Secondes">
            <input type="number" step="1" required min="0" max="99" class="form-control" id="latcentiemesA" name="latcentiemesA" placeholder="Centièmes">
            <input type="radio" name="dirLatA" required
            <?php   if (isset($gender) && $gender=="nord") echo "checked";?>
            value ='nord'>  Nord
            <input type="radio" name="dirLatA" required
            <?php if (isset($gender) && $gender=="sud") echo "checked";?> value ='sud'> Sud
        </div>
    </div>
   <div class="form-group">
        <label for="inputLongA" class="col-sm-2 control-label">Longitude A</label>
        <div class="col-sm-2">
            <input type="number" step="1" required min="0" max="180" class="form-control" id="longdegresA" name="longdegresA" placeholder="Degrès°">
            <input type="number" step="1" required min="0" max="60" class="form-control" id="longminutesA" name="longminutesA" placeholder='Minutes"'>
            <input type="number" step="1" required min="0" max="60" class="form-control" id="longsecondesA" name="longsecondesA" placeholder="Secondes'">
            <input type="number" step="1" required min="0" max="99" class="form-control" id="longsecondesA" name="longcentiemesA" placeholder="Centièmes">
            <input type="radio" name="dirLongA" required
                 <?php   if (isset($gender) && $gender=="est") echo "checked";?>
                      value ='est'>  Est
                    <input type="radio" name="dirLongA" required
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
            <input type="number" step="1" required min="0" max="99" class="form-control" id="latcentiemesB" name="latcentiemesB" placeholder="Centièmes">
            <input type="radio" name="dirLatB" required
                 <?php   if (isset($gender) && $gender=="nord") echo "checked";?>
                      value ='nord'>  Nord
                    <input type="radio" name="dirLatB" required
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
            <input type="number" step="1" required min="0" max="99" class="form-control" id="longsecondesB" name="longcentiemesB" placeholder="Centièmes">
            <input type="radio" name="dirLongB" required
                 <?php   if (isset($gender) && $gender=="est") echo "checked";?>
                      value ='est'>  Est
                    <input type="radio" name="dirLongB" required
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
            <input type="number" step="1" required min="0" max="99" class="form-control" id="latcentiemesC" name="latcentiemesC" placeholder="Centièmes">
            <input type="radio" name="dirLatC" required
                 <?php   if (isset($gender) && $gender=="nord") echo "checked";?>
                      value ='nord'>  Nord
                    <input type="radio" name="dirLatC" required
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
            <input type="number" step="1" required min="0" max="99" class="form-control" id="longsecondesC" name="longcentiemesC" placeholder="Centièmes">
            <input type="radio" name="dirLongC" required
                 <?php   if (isset($gender) && $gender=="est") echo "checked";?>
                      value ='est'>  Est
                    <input type="radio" name="dirLongC" required
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
            <input type="number" step="1" required min="0" max="99" class="form-control" id="latcentiemesD" name="latcentiemesD" placeholder="Centièmes">
            <input type="radio" name="dirLatD" required
                 <?php   if (isset($gender) && $gender=="nord") echo "checked";?>
                      value ='nord'>  Nord
                    <input type="radio" name="dirLatD" required
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
            <input type="number" step="1" required min="0" max="99" class="form-control" id="longsecondesD" name="longcentiemesD" placeholder="Centièmes">
            <input type="radio" name="dirLongD" required
                 <?php   if (isset($gender) && $gender=="est") echo "checked";?>
                      value ='est'>  Est
                    <input type="radio" name="dirLongD" required
                   <?php if (isset($gender) && $gender=="ouest") echo "checked";?>
                       Value ='ouest'> Ouest
        </div>
    </div>
    <input type="hidden" name="idEtude" value="<?= $idEtude ?>">
    <button type="submit" class="btn btn-lg btn-default">Valider</button>    
</form>
</section>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>