<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Interface biologiste</title>
        <link href="css.css" rel="stylesheet" /> 
    </head>
    <body>
        <h1>Accueil</h1>
        <h2>Liste des etudes</h2>
        
        <?php
		// Connexion à la base de données
		try
		{
			$bdd = new PDO('mysql:host=localhost:3306;dbname=ifrocean;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
		// On récupère les 5 derniers billets
		$req = $bdd->query('SELECT idEtude, nomEtude, nomVille, superficie, DATE_FORMAT(datePrelevement, \'%d/%m/%Y\') AS datePrelevement_fr, finEtude FROM etudes');

		// Affichage de chaque message
		while ($donnees = $req->fetch())
		{
		?>
		<div class="news">

                    <table>
                        <tr>
                            <th>Nom étude</th>
                            <th>Nom ville</th>
                            <th>Superficie</th>
                            <th>Date du prélevement</th>
                            <th>Projet valider</th>
                        </tr>
                        <tr>
                            <td><?php echo htmlspecialchars($donnees['nomEtude']);?></td>
                            <td><?php echo $donnees['nomVille']; ?></td>
                            <td><?php echo $donnees['superficie']; ?></td>
                            <td><?php echo $donnees['datePrelevement_fr']; ?></td>
                            <td><?php echo $donnees['finEtude']; ?></td>
                            <td><a href="detail.php?etudes=<?php echo $donnees['idEtude']; ?> ">voir plus</a></td>
                        </tr>
                    </table>
		</div>
                <?php
                    } // Fin de la boucle des billets
                    $req->closeCursor();
                ?>
		
    </body>
</html>
