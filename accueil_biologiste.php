<?php
$title = "Accueil biologiste";
?>

<!-- Le corps -->
<?php ob_start(); ?>
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
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>