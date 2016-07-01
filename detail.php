<!DOCTYPE html>

	<head>
        <meta charset="utf-8" />
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
                $recup=$_GET['etude'];
		// Connexion à la base de données
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
		
		// Récupération
		$req = $bdd->prepare('SELECT idZone, nomZone, surface, nomEtude, ville, superficie, '
                        . 'DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr'
                        . ' FROM zones INNER JOIN etudes ON zones.idEtude=etudes.idEtude WHERE etudes.idEtude = ?');
		$req->execute(array($_GET['etude']));
		$donnees = $req->fetch();
		
                ?>
            <h2>Détail de l'étude : <?php echo $donnees['nomEtude'];?></h2>
            <b>Ville : </b><?php echo $donnees['ville'];?>
            <b>Superficie : </b><?php echo $donnees['superficie'];?> m2 
            <b>Date des prélevements : </b><?php echo $donnees['date_fr'];?></p>
            <table class="table">
                <tr>
                    <th>Nom de la zone</th>
                    <th>Superficie en m2</th>
                    <th>Espèces prelever</th>
                </tr>
                <tr>
                    <td><?php echo $donnees['nomZone'];?></td>
                    <td><?php echo $donnees['surface']; ?></td>
                    <td><form method= "post" action="detailEspece.php?zone=<?php echo $donnees['idZone']; ?> ">
                        <input type="submit" value="Détail des espèces"/></form></td>
                </tr> <?php
                // Affichage de chaque message
		while ($donnees = $req->fetch())
		{
                 ?> <tr>
                        <td><?php echo $donnees['nomZone'];?></td>
                        <td><?php echo $donnees['surface']; ?></td>
                        <td><form method= "post" action="detailEspece.php?zone=<?php echo $donnees['idZone']; ?> ">
                            <input type="submit" value="Détail des espèces"/></form></td>
                    </tr>
                <?php
                }
                    $req->closeCursor();
                ?>
                </table>
                <table class="table">
                        <tr>
                            <th>Nom de l'éspece</th>
                            <th>Quantité</th>
                            <th>Surface de prélevement</th>
                            <th>Densité</th>
                            <th>Nombre d'individu estimé</th>
                        </tr>
		<?php
		// Connexion à la base de données
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
		
		// Récupération
		$req = $bdd->prepare('SELECT nomEspece, sum(quantite) AS quantiteT, sum(surface) AS surfaceT, (sum(quantite)/sum(surface)) '
                        . 'AS densite, ROUND(sum(quantite)/sum(surface)*superficie) AS nbIndividu FROM espece_zone '
                        . 'INNER JOIN especes ON especes.idEspece=espece_zone.idEspece INNER JOIN zones '
                        . 'ON espece_zone.idZone=zones.idZone INNER JOIN etudes '
                        . 'ON etudes.idEtude=zones.idEtude WHERE etudes.idEtude=? GROUP BY especes.idEspece');
		$req->execute(array($_GET['etude']));
		
                // Affichage de chaque message
		while ($donnees = $req->fetch())
		{
                       ?> <tr>
                            <td><?php echo $donnees['nomEspece'];?></td>
                            <td><?php echo $donnees['quantiteT']; ?></td>
                            <td><?php echo $donnees['surfaceT']; ?></td>
                            <td><?php echo $donnees['densite']; ?></td>
                            <td><?php echo $donnees['nbIndividu']; ?></td>
                       </tr>
                       <?php
                    }
                    $req->closeCursor();
                ?>
                </table>
        </body>
</html>