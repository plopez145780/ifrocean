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
    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1>Accueil biologiste</h1>
        <h2>Liste des etudes</h2>
        
        <table class="table">
                        <tr>
                            <th>Nom étude</th>
                            <th>Nom ville</th>
                            <th>Superficie</th>
                            <th>Date du prélevement</th>
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
		// On récupère
		$req = $bdd->query('SELECT idEtude, nomEtude, ville, superficie, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr FROM etudes');

		// Affichage de chaque message
		while ($donnees = $req->fetch())
		{
		?>
                        <tr>
                            <td><?php echo htmlspecialchars($donnees['nomEtude']);?></td>
                            <td><?php echo $donnees['ville']; ?></td>
                            <td><?php echo $donnees['superficie']; ?></td>
                            <td><?php echo $donnees['date_fr']; ?></td>
                            <td><a href="detail.php?etude=<?php echo $donnees['idEtude']; ?> ">Voir</a></td>
                            <td><a href="supprimerEtude.php?etude=<?php echo $donnees['idEtude']; ?>">Supprimer</a></td>
                        </tr>
                    
		
                <?php
                    }
                    $req->closeCursor();
                ?></table>
		<form method= "post" action="nouvelle_etude.php">
                    </br><input type="submit" value="Crée une nouvelle étude"/>
                </form>
    </body>
</html>
