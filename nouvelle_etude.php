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
    </head>
    <body>
        <p> Complètez le formulaire!</p> 
		<form method= "post" action="ajouter_etude.php">
			<p> 
				<label for="nom">Nom de l'étude</label> : <input type="text" name="nom" id="nom"/></br>
				<label for="ville">Nom de la ville</label> : <input type="text" name="ville" id="ville"/></br>
                                <label for="superficie">Superficie</label> : <input type="text" name="superficie" id="superficie"/> m2 </br>
                                <label for="date">Date du prélevement</label> : <input type="date" name="date" id="date"/></br>
				<input type="submit" value="Enregistrer"/>
			</p>
		</form>
    </body>
</html>

