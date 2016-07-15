<?php
$title = "Ajout d'étude";
?>
<!-- Le corps -->
<?php ob_start(); ?>
<h1><?= $title ?></h1>
<form method= "POST" action="ajouter_etude.php">
    <div class="form-group">
        <label for="nom">Nom de l'étude</label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom"/>  
    </div>
    <div class="form-group">
        <label for="ville">Nom de la ville</label>
        <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville"/>
    </div>
    <div class="form-group">
        <label for="superficie">Superficie (en m²)</label>
        <input type="number" class="form-control" name="superficie" id="superficie" placeholder="m²"/>
    </div>
    <div class="form-group">
        <label for="date">Date du prélevement</label>
        <input type="date" class="form-control" name="date" id="date"/>
    </div>
    <button type="submit" class="btn btn-default">Enregistrer</button>
</form>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>

