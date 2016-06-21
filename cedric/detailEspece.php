<!DOCTYPE html>

	<head>
        <meta charset="utf-8" />
        <title>Interface biologiste</title>
    </head>
	<body>
		<h1>Détail de l'étude</h1>
                <table>
                        <tr>
                            <th>Nom</th>
                            <th>Quantité</th>
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
		$req = $bdd->prepare('SELECT nomEspece, espece_zone.quantite FROM espece_zone INNER JOIN especes ON especes.idEspece=espece_zone.idEspece INNER JOIN zones ON espece_zone.idZone=zones.idZone WHERE zones.idZone = ?');
		$req->execute(array($_GET['zone']));
		$donnees = $req->fetch();
		
                // Affichage de chaque message
		?>
                    <tr>
                            <td><?php echo $donnees['nomEspece'];?></td>
                            <td><?php echo $donnees['quantite']; ?></td>
                    </tr>
                    
                <?php while ($donnees = $req->fetch())
		{
                       ?> <tr>
                            <td><?php echo $donnees['nomEspece'];?></td>
                            <td><?php echo $donnees['quantite']; ?></td>
                       </tr>
                <?php
                    }
                    $req->closeCursor();
                ?></table>
        </body>
</html>