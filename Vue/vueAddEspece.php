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
<?php
//$recup = $_GET['zone'];
$recup = $idZone;
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// On récupère
$req = $bdd->query('SELECT * FROM especes ORDER BY idEspece DESC');
?>
<form method= "post" action="index.php?action=fin_zone&zone=<?php echo $recup; ?>">
    <p>
        Noublier pas de cliquer sur fin de zone à la fin, 
        mais attention une fois cliquer vous ne pouvez plus revenir sur votre zone !!! 
        <input type="submit" value="Fin de zone"/>
    </p>   
</form></br>

<form method= "post" action="index.php?action=ajout_espece_zone">
    <p> 
        <label for="nomEspece">Choix du nom de l'èspèce</label> : 

        <select name='nomEspece'>
<?php
while ($donnees = $req->fetch()) {
    ?> <option name="nomEspece" id="nomEspece"> <?php echo $donnees['nomEspece']; ?> </option> <?php
}
?> </select>
        <input type="hidden" name="idEtude" id="idEtude" value="<?= $idEtude; ?> "/></br>
        <input type="hidden" name="idZone" id="idZone" value="<?php echo $recup; ?> "/></br>
        <label for="quantite">Quantité</label> : <input type="text" name="quantite" id="quantite"/></br>

            <?php $req->closeCursor(); ?>
        <input type="submit" value="Enregistrer"/>

    </p>
</form>
<form method= "post" action="index.php?action=ajout_nom_espece">
    <label for="quantite">Si le nom de l'espèce n'existe pas ajoutez en un ici</label> : 
    <input type="text" name="nomEspece" id="nomEspece"/>
    
    <input type="hidden" name="etude" id="etude" value="<?= $idEtude; ?> "/></br>
    <input type="hidden" name="zone" id="zone" value = "<?php echo $recup ?>"/><input type="submit" value="Ajouter"/>
</form>
</br>
<table class="table">
    <tr>
        <th>Nom de l'espèce</th>
        <th>Quantité</th>
        <th>Augmenter ou diminuer la quantité</th>
    </tr>
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
$req->execute(array($recup));

// Affichage de chaque message
while ($donnees = $req->fetch()) {
    ?> <tr>
            <td><?php echo $donnees['nomEspece']; ?></td>
            <td><?php echo $donnees['quantite']; ?></td>
            <td><form method= "post" action="index.php?action=ajout_quantite&espece=<?php echo $donnees['idEspece']; ?>&id_etude=<?= $idEtude ?>&zone=<?php echo $donnees['idZone']; ?>">
                    <input type="number" name="quantite" id="quantite"/><input type="submit" value="valider"/></form></td>
            <td><form method= "post" action="index.php?action=sup_espece_zone&espece=<?php echo $donnees['idEspece']; ?>&zone=<?php echo $donnees['idZone']; ?>">
                    <input type="submit" value="supprimer"/></form></td>        

        </tr>
        <?php
    }
    $req->closeCursor();
    ?>
</table>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>