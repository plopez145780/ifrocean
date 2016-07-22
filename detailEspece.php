<?php
    require_once './Modele/Etude.php';
    require_once './Modele/Zone.php';
    
    $idEtude = filter_input(INPUT_GET, "etude", FILTER_SANITIZE_NUMBER_INT);
    $idZone = filter_input(INPUT_GET, "zone", FILTER_SANITIZE_NUMBER_INT);
    $bddAriane = new Modele();
    $etude = $bddAriane->getEtude($idEtude);
    $nomEtudeBio = $etude->getNom();
    
    $zone = $bddAriane->getZone($idZone);
    $nomZoneBio = $zone->getNom();
    $title = "Détail de la zone : " . $nomZoneBio;
?>
<!-- Le corps -->
<?php ob_start(); ?>
<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération
$req = $bdd->prepare('SELECT nomEspece, espece_zone.quantite, nomZone, surface, etudes.idEtude, '
        . '(quantite/surface) AS densite FROM espece_zone '
        . 'INNER JOIN especes ON especes.idEspece=espece_zone.idEspece '
        . 'INNER JOIN zones ON espece_zone.idZone=zones.idZone '
        . 'INNER JOIN etudes ON zones.idEtude=etudes.idEtude WHERE zones.idZone = ?');
$req->execute(array($idZone)); ?>

<h2><?= $title ?></h2>
<p><b>Espèces prélevées sur une superficie de : </b><?php echo $zone->getSurface(); ?> m2</p>

<?php
// Affichage de chaque message
$premier = true;
$valeurAbsente = true;
while ($donnees = $req->fetch()) {
$valeurAbsente = false;
    if ($premier) { ?>
        <table class="table table-striped">
            <tr>
                <th>Nom</th>
                <th>Quantité</th>
                <th>Densité</th>
            </tr>
            <?php
            $premier = false;
        }
        ?> <tr>
            <td><?php echo $donnees['nomEspece']; ?></td>
            <td class="text-right"><?php echo $donnees['quantite']; ?></td>
            <td class="text-right"><?php echo $donnees['densite']; ?></td>
        </tr>


        <?php
    }
    $req->closeCursor();
    ?>
</table>
<?php
if ($valeurAbsente) {
    echo "<p class='alert alert-info'>Aucune espèce n'a été trouvé</p>";
}
?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>