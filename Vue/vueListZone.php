<?php 
    $idEtude = filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_NUMBER_INT);
    
    $bdd = new Modele();
    $zones = $bdd->getListeZone($idEtude);

    $nomEtude = "canard";
    $title = $nomEtude . " :: Liste des zones";


?>


<!-- Le corps -->
<?php ob_start(); ?>
<section>
    <h1>Liste des zones - <?php echo $title ?></h1>
    <table class="table table-striped">
        <tr>
            <th>Nom des études</th>
        </tr>
        <?php foreach($zones as $zone) : ?>
            <tr>
                <td>
                    <a href='index.php?action=view_zone&id_etude=<?= $idEtude; ?>&id_zone=<?= $zone->getId(); ?>'><?= $zone->getNom(); ?></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table> 
    
    <a href="index.php?action=add_zone&id_etude=<?= $idEtude; ?>" class="btn btn-lg btn-default">Nouvelle zone</a>
</section>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>