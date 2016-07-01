<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Interface biologiste</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
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
</body>
</html>