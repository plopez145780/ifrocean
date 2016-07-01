<?php 
$title = "A Propos";
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
    $req->execute(array($_GET['zone']));
    
// Affichage de chaque message
    $premier = true;
    while ($donnees = $req->fetch()) {
        if ($premier) {
            ?>
            <h2>Détail de la zone : <?php echo $donnees['nomZone']; ?></h2>
            <p><b>Espèces prélevées sur une superficie de : </b><?php echo $donnees['surface']; ?> m2</p> 
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Quantité</th>
                    <th>Densité</th>
                </tr>
        <?php
        $premier=false;
    }
    ?> <tr>
                <td><?php echo $donnees['nomEspece']; ?></td>
                <td><?php echo $donnees['quantite']; ?></td>
                <td><?php echo $donnees['densite']; ?></td>
            </tr>


    <?php
}
?><tr><td><a href="detail.php?etude=<?php echo $donnees['idEtude']; ?> ">Retour</a></td></tr>
<?php $req->closeCursor();
?>
    </table>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>