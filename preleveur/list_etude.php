<?php 
    $title = "ListePlageEtude";
    include("../header.inc.php"); 
    $requete = 'SELECT idEtude, nomEtude, nomVille, superficie, DATE_FORMAT(datePrelevement, \'%d/%m/%Y\') AS datePrelevement_fr, finEtude FROM etudes';
    include_once '../bdd.php';
?>

<!-- Le corps -->
<h1>Liste des Etudes</h1>
<table>
    <tr><th>Nom des études</th></tr>
    <?php while ($donnees = $req->fetch()){
        echo "<tr><td>".$donnees['nomEtude']."</td></tr>";
    }
    ?>
            
</table> 

<!-- Le pied de page -->
<?php include("../footer.inc.php"); ?>