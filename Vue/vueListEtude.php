<?php 
include_once '/Modele/Modele.php';
$title = "ListePlageEtude"; 
$bdd = new Modele();
$etudes = $bdd->getListeEtude();
?>
<!-- Le corps -->
<?php ob_start(); ?>
<h1>Liste des Etudes</h1>
<table class="table table-striped">
    <tr>
        <th>Nom des études</th>
    </tr>
    <?php foreach($etudes as $etude) : ?>
        <tr>
            <td>
                <a href='index.php?action=list_zone&id_etude=<?= $etude->getId(); ?>'><?= $etude->getNom(); ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table> 
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>