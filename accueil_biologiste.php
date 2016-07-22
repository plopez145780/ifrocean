<?php
$title = "Accueil biologiste";
?>

<!-- Le corps -->
<?php ob_start(); ?>
<h1><?= $title ?></h1>
<form method= "post" action="nouvelle_etude.php">
    </br><input class="btn btn-default" type="submit" value="Crée une nouvelle étude"/>
</form>
<h2>Liste des etudes</h2>
<table class="table table-striped">
    <tr>
        <th>Nom étude</th>
        <th>Nom ville</th>
        <th class="text-right">Superficie</th>
        <th>Date du prélevement</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <?php
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // On récupère
    $req = $bdd->query('SELECT idEtude, nomEtude, ville, superficie, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr, validation FROM etudes');

    
    $valeurAbsente = true;
    // Affichage de chaque message
    while ($donnees = $req->fetch()) {
        $valeurAbsente = false;
        ?>
        <tr class="<?php if ($donnees['validation'] == 1) {
        echo 'vert';
    } ?>">

            <td><?php echo htmlspecialchars($donnees['nomEtude']); ?></td>
            <td><?php echo $donnees['ville']; ?></td>
            <td class="text-right"><?php echo $donnees['superficie']; ?></td>
            <td><?php echo $donnees['date_fr']; ?></td>
            <td><a class="btn bg-info" href="detail.php?etude=<?= $donnees['idEtude'] ?> ">Voir</a></td>
            <td><a class="btn bg-info" href="modifier_etude.php?etude=<?= $donnees['idEtude'] ?>">Modifier</a></td>
            <td><a class="btn bg-info" href="supprimerEtude.php?etude=<?= $donnees['idEtude'] ?>">Supprimer</a></td>
            
        </tr>


    <?php
}
$req->closeCursor();
?></table>

<?php
if ($valeurAbsente) {
    echo "<p class='alert alert-info'>Aucune étude n'a été trouvé</p>";
}
?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>