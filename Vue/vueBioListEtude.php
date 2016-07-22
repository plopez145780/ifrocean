<?php 
include_once '/Modele/Modele.php';
$title = "ListePlageEtude"; 
$bdd = new Modele();
$etudes = $bdd->getListeEtudeOpen();
?>
<!-- Le corps -->
<?php ob_start(); ?>
<h1>Liste des Etudes</h1>
<a href="/ifrocean/index.php?action=add_etude" class="btn btn-default">Ajouter</a>
<table class="table table-striped">
    <tr>
        <th>Nom des études</th>
        <th>Supprimer</th>
        <th>Modifier</th>
    </tr>
    <?php foreach($etudes as $etude) : 
        ?>
        <tr>
            <td>
                <a href='index.php?action=list_zone&id_etude=<?= $etude->getId(); ?>'><?= $etude->getNom(); ?></a>
            </td>
            <td>
                <a href="index.php?action=del_etude&id_etude=<?= $etude->getId(); ?>">supp</a>
            </td>
            <td>
                <a href="index.php?action=update_etude&id_etude=<?= $etude->getId(); ?>">modif</a>
            </td>
        </tr>
    <?php endforeach; ?>  
</table> 
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>