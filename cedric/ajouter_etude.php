<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Interface biologiste</title>
	</head>
	<body>
		<?php
		$nom=htmlspecialchars($_POST['nom']);
		$ville=htmlspecialchars($_POST['ville']);
                $superficie=htmlspecialchars($_POST['superficie']);
		$date=htmlspecialchars($_POST['date']);

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet_ifrocean;charset=utf8', 'projet_ifrocean', 'poec');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
				// On ajoute une entrée dans la table etudes
			$bdd->exec("INSERT INTO etudes(idEtude, nomEtude, ville, superficie, date, validation) VALUES(NULL, '$nom', '$ville', '$superficie', '$date', '')");


		// Redirection du visiteur vers la page précédente
		header('Location: index.php');
		
		$req->closeCursor(); ?>
	</body>
</html>