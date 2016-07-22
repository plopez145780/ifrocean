<?php
include_once './Modele/Etude.php';
$idEtude = filter_input(INPUT_GET, "etude", FILTER_SANITIZE_NUMBER_INT);

$bdd = new Modele();
$etude = $bdd->getEtude($idEtude);

$title = "Modifier étude";
//pour le fils d'ariane bien formaté
$nomEtudeBio ="";
?>
<!-- Le corps -->
<?php ob_start(); ?>
<h1><?= $title ?></h1>
<form method= "POST" action="update_etude.php">
    <div class="form-group">
        <label for="nom">Nom de l'étude</label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?= $etude->getNom() ?>" placeholder="Nom" required/>  
    </div>
    <div class="form-group">
        <label for="ville">Nom de la ville</label>
        <input type="text" class="form-control" name="ville" id="ville" value="<?= $etude->getVille() ?>" placeholder="Ville" required/>
    </div>
    <div class="form-group">
        <label for="superficie">Superficie (en m²)</label>
        <input type="number" class="form-control" name="superficie" id="superficie" value="<?= $etude->getSuperficie() ?>" placeholder="m²" required/>
    </div>
    <div class="form-group">
        <label for="date">Date du prélevement</label>
        <input type="date" class="form-control" name="date" id="date" value="<?= $etude->getDatePrelev() ?>" required/>
    </div>
    <input type="hidden" class="form-control" name="validation" id="validation" value="<?= $etude->getFinEtude() ?>" required/>
    <input type="hidden" class="form-control" name="id_etude" id="id_etude" value="<?= $etude->getId() ?>" required/>
    <button type="submit" class="btn btn-default">Modifier</button>
</form>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>

