<?php 
include_once '/Modele/Modele.php';
$title = "Liste des Etudes"; 
$bdd = new Modele();
$etudes = $bdd->getListeEtudeOpen();
?>
<!-- Le corps -->
<?php ob_start(); ?>
<h1><?= $title ?></h1>
<?php if($etudes != NULL) : ?>
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
<?php else : ?>
<p class='alert alert-info'>Aucune étude ouverte n'a été trouvé</p>
<?php endif; ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>