<?php 
    $idEtude = filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_NUMBER_INT);
    $idZone = filter_input(INPUT_GET, "id_zone", FILTER_SANITIZE_NUMBER_INT);
    
    $bdd = new Modele();
    $zones = $bdd->getListeZone($idEtude);
    
    $etude = $bdd->getEtude($idEtude);
    $nomEtude = $etude->getNom();

    $zone = $bdd->getZone($idZone);
    $nomZone = $zone->getNom();
    
    $title = $nomEtude . " : " . $nomZone;
    
?>
<!-- Le corps -->
<?php ob_start(); ?>

<h1><?php echo $title ?></h1>
<form method="post" action="08-POST.php">
    <label>Espèces:</label>
    <input type="text" name="espèces">
    <label>Nombres :</label>
    <input type="text" name="nbMax">
    <br>
    <br>
    <textarea name="nom" rows=4 cols=40>Commentaires</textarea>
    <input type="submit" value="Enregistrer">
    <input type="submit" value="Valider zones">
</form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>