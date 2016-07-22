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
<h1><?= $title ?></h1>
<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// On récupère
$req = $bdd->query('SELECT * FROM especes ORDER BY idEspece DESC');
?>
<form method= "post" action="index.php?action=fin_zone&zone=<?= $idZone; ?>">
    <p class="alert alert-info">
        Noublier pas de cliquer sur fin de zone à la fin, 
        mais attention une fois cliquer vous ne pouvez plus revenir sur votre zone !!! 
        <input class="btn btn-default" type="submit" value="Fin de zone"/>
    </p>   
</form>
<br/>
<form method= "post" action="index.php?action=ajout_espece_zone">
    <div class="form-group">
        <label for="nomEspece">Choix du nom de l'espèce</label>
        <input type="text" list="list_espece" name="nomEspece" id="nomEspece"/>
        <datalist id="list_espece">
            <?php while ($donnees = $req->fetch()) : ?>
                <option value="<?= $donnees['nomEspece'] ?>"/> 
            <?php endwhile; ?> 
        </datalist>
        <hr/>
        <input type="hidden" name="idEtude" id="idEtude" value="<?= $idEtude; ?> "/>
        <input type="hidden" name="idZone" id="idZone" value="<?= $idZone; ?> "/>
        <label for="quantite">Quantité</label>
        <input type="text" class="form-control" name="quantite" id="quantite"/></br>

        <?php $req->closeCursor(); ?>
        <input type="submit" class="btn btn-default" value="Enregistrer"/>

    </div>
</form>
<hr/>
<form method= "post" action="index.php?action=ajout_nom_espece">
    <label for="quantite">Si le nom de l'espèce n'existe pas ajoutez en un ici</label> 
    <input type="text" class="form-control" name="nomEspece" id="nomEspece"/>
    <input type="hidden" name="etude" id="etude" value="<?= $idEtude ?> "/>
    <input type="hidden" name="zone" id="zone" value = "<?= $idZone ?>"/>
    <br/>
    <input type="submit" class="btn btn-default" value="Ajouter"/>
</form>
<br/>
<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Récupération
$req = $bdd->prepare('SELECT especes.idEspece, nomEspece, quantite, espece_zone.idZone FROM especes '
        . 'INNER JOIN espece_zone ON especes.idEspece=espece_zone.idEspece WHERE espece_zone.idZone=?');
$req->execute(array($idZone));

$valeurAbsente = true;
// Affichage de chaque message
while ($donnees = $req->fetch()) {
    if ($valeurAbsente) {
        ?>
        <table class="table table-striped">
            <tr>
                <th>Nom de l'espèce</th>
                <th>Quantité</th>
                <th>Augmenter ou diminuer la quantité</th>
            </tr>
            <?php
            $valeurAbsente = false;
        }
        ?> <tr>
            <td><?php echo $donnees['nomEspece']; ?></td>
            <td><?php echo $donnees['quantite']; ?></td>
            <td><form class="form-inline" method= "post" action="index.php?action=ajout_quantite&espece=<?php echo $donnees['idEspece']; ?>&id_etude=<?= $idEtude ?>&zone=<?php echo $donnees['idZone']; ?>">
                    <input class="form-control" type="number" name="quantite" id="quantite"/><input class="btn btn-info" type="submit" value="valider"/></form></td>
            <td><form class="form-inline" method= "post" action="index.php?action=sup_espece_zone&espece=<?php echo $donnees['idEspece']; ?>&zone=<?php echo $donnees['idZone']; ?>">
                    <input class="btn btn-info" type="submit" value="supprimer"/></form></td>        

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
<?php require 'gabarit.php'; ?>