<!DOCTYPE html>

	<head>
        <meta charset="utf-8" />
        <title>Interface biologiste</title>
    </head>
	<body>
		<h1>Détail de l'étude</h1>
                <table>
                        <tr>
                            <th>Nom de la zone</th>
                            <th>Superficie en m2</th>
                            <th>Espèces prelever</th>
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
		$req = $bdd->prepare('SELECT idZone, nomZone, surface FROM zones INNER JOIN etudes ON zones.idEtude=etudes.idEtude WHERE etudes.idEtude = ?');
		$req->execute(array($_GET['etude']));
		$donnees = $req->fetch();
		
                ?><tr>
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
                <table>
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
                        . 'AS densite, (sum(quantite)/sum(surface)*superficie) AS nbIndividu FROM espece_zone '
                        . 'INNER JOIN especes ON especes.idEspece=espece_zone.idEspece INNER JOIN zones '
                        . 'ON espece_zone.idZone=zones.idZone INNER JOIN etudes '
                        . 'ON etudes.idEtude=zones.idEtude WHERE etudes.idEtude=? GROUP BY especes.idEspece');
		$req->execute(array($_GET['etude']));
		$donnees = $req->fetch();
		?> <tr>
                            <td><?php echo $donnees['nomEspece'];?></td>
                            <td><?php echo $donnees['quantiteT']; ?></td>
                            <td><?php echo $donnees['surfaceT']; ?></td>
                            <td><?php echo $donnees['densite']; ?></td>
                            <td><?php echo $donnees['nbIndividu']; ?></td>
                       </tr>
                       <?php
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