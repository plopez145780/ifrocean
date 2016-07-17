<?php
include_once './Modele/Etude.php';
$nomEtudeBio;
$title; //Déclaration en bas de page

$recup = $_GET['etude'];

$bdd = new Modele();
$etude = $bdd->getEtude($recup);
    
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération
$req = $bdd->prepare('SELECT idZone, nomZone, surface, nomEtude, ville, superficie, '
        . 'DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr'
        . ' FROM zones INNER JOIN etudes ON zones.idEtude=etudes.idEtude WHERE etudes.idEtude = ?');
$req->execute(array($_GET['etude']));
$donnees = $req->fetch();
?>
<!-- Le corps -->
<?php
ob_start();
if ($etude->getFinEtude() == 0)
    echo "<br/><a class=\"btn btn-danger\" href=\"changer_etat_etude.php?etude=$recup\">Cloturer étude</a>";
else
    echo "<br/><a class=\"btn btn-success\" href=\"changer_etat_etude.php?etude=$recup\">Ouvrir étude</a>";
echo "<a class=\"btn btn-default\" href=\"export.php?etude=$recup\">Export KML</a><br/>";
// Affichage de chaque message
$premier = true;
while ($donnees = $req->fetch()) {
    if ($premier) {
        ?><h2>Détail de l'étude : <?php
            echo $donnees['nomEtude'];
            $nomEtudeBio = $donnees['nomEtude'];
            ?></h2>
        <b>Ville : </b><?php echo $donnees['ville']; ?>
        <b>Superficie : </b><?php echo $donnees['superficie']; ?> m2 
        <b>Date des prélevements : </b><?php echo $donnees['date_fr']; ?></p>
        
        <table class="table table-striped">
            <tr>
                <th>Nom de la zone</th>
                <th>Superficie en m2</th>
                <th>Espèces prelever</th>
            </tr>
            <?php
            $premier = false;
        }
        ?> <tr>
            <td><?php echo $donnees['nomZone']; ?></td>
            <td class="text-right"><?php echo $donnees['surface']; ?></td>
            <td><form method= "post" action="detailEspece.php?etude=<?= $recup ?>&zone=<?php echo $donnees['idZone']; ?> ">
                    <input type="submit" class="btn btn-info" value="Détail des espèces"/></form></td>
        </tr>
        <?php
    }
    $req->closeCursor();
    ?>
</table>
<table class="table table-striped">
    <tr>
        <th>Nom de l'espèce</th>
        <th class="text-right">Quantité</th>
        <th class="text-right">Surface de prélevement</th>
        <th class="text-right">Densité</th>
        <th class="text-right">Nombre d'individu estimé</th>
    </tr>
    <?php
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Récupération
    $req = $bdd->prepare('SELECT nomEspece, sum(quantite) AS quantiteT, sum(surface) AS surfaceT, (sum(quantite)/sum(surface)) '
            . 'AS densite, ROUND(sum(quantite)/sum(surface)*superficie) AS nbIndividu FROM espece_zone '
            . 'INNER JOIN especes ON especes.idEspece=espece_zone.idEspece INNER JOIN zones '
            . 'ON espece_zone.idZone=zones.idZone INNER JOIN etudes '
            . 'ON etudes.idEtude=zones.idEtude WHERE etudes.idEtude=? GROUP BY especes.idEspece');
    $req->execute(array($_GET['etude']));

    // Affichage de chaque message
    while ($donnees = $req->fetch()) {
        ?> <tr>
            <td><?php echo $donnees['nomEspece']; ?></td>
            <td class="text-right"><?php echo $donnees['quantiteT']; ?></td>
            <td class="text-right"><?php echo $donnees['surfaceT']; ?></td>
            <td class="text-right"><?php echo $donnees['densite']; ?></td>
            <td class="text-right"><?php echo $donnees['nbIndividu']; ?></td>
        </tr>
        <?php
    }
    $req->closeCursor();
    ?>
</table>
<?php
$title = "Détail de l'étude ";
if (isset($nomEtudeBio)) {
    $title .= ": " . $nomEtudeBio;
}
$nomEtudeBio = "";// pour le fil d'ariane formaté correctement pour cette page

$contenu = ob_get_clean();
require 'Vue/gabarit.php';
