<?php
include_once 'Config/ConfigBDD.php';
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
    $bdd = new PDO("mysql:host=" . ConfigBDD::SERVERNAME . ";dbname=" . ConfigBDD::DBNAME . ";charset=" . ConfigBDD::CHARSET, ConfigBDD::USERNAME, ConfigBDD::PASSWORD);
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
<form method= "post" action="/index.php?action=ajout_espece_zone">
    <div class="form-group">
        <label for="nomEspece">Choix du nom de l'espèce</label>
        <input type="text" list="list_espece" name="nomEspece" id="nomEspece"/>
        <datalist id="list_espece">
            <?php while ($donnees = $req->fetch()) : ?>
                <option value="<?= $donnees['nomEspece'] ?>"/> 
            <?php endwhile; ?> 
        </datalist>
        <?php $req->closeCursor(); ?>
        <br/>
        <label for="quantite">Quantité</label>
        <input type="text" class="form-control" name="quantite" id="quantite"/>
        <input type="hidden" name="idEtude" id="idEtude" value="<?= $idEtude; ?>"/>
        <input type="hidden" name="idZone" id="idZone" value="<?= $idZone; ?>"/>
        <br/>
        <input type="submit" class="btn btn-default" value="Enregistrer"/>
    </div>
</form>
<hr/>
<form method= "post" action="index.php?action=ajout_nom_espece">
    <label for="quantite">Nouveau nom d'espèce</label> 
    <input type="text" class="form-control" name="nomEspece" id="nomEspece" placeholder="Si le nom de l'espèce n'existe pas ajoutez en une ici"/>
    <input type="hidden" name="etude" id="etude" value="<?= $idEtude ?> "/>
    <input type="hidden" name="zone" id="zone" value = "<?= $idZone ?>"/>
    <br/>
    <input type="submit" class="btn btn-default" value="Ajouter"/>
</form>
<br/>
<?php
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
                <th>Espèce</th>
                <th>Quantité</th>
                <th>Supprimer</th>
            </tr>
            <?php
            $valeurAbsente = false;
        }
        ?> <tr>
            <td><?= $donnees['nomEspece'] ?></td>
            <td><form class="form-inline" method= "post" action="index.php?action=ajout_quantite&espece=<?php echo $donnees['idEspece']; ?>&id_etude=<?= $idEtude ?>&zone=<?php echo $donnees['idZone']; ?>">
                    <input class="form-control" type="number" name="quantite" id="quantite" value="<?= $donnees['quantite'] ?>"/><input class="btn btn-info" type="submit" value="Modifier"/></form></td>
            <td><a class="btn btn-info" href="index.php?action=sup_espece_zone&espece=<?php echo $donnees['idEspece']; ?>&zone=<?php echo $donnees['idZone']; ?>">X</a></td>

        </tr>
        <?php
    }
    $req->closeCursor();
    ?>
</table>
<?php if ($valeurAbsente) : ?>
    <p class='alert alert-info'>Aucune espèce n'a été trouvé</p>
<?php endif; ?>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>