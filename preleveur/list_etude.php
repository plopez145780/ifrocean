<?php 
    $title = "ListePlageEtude";
    include("../header.inc.php"); 
    //$requete = 'SELECT idEtude, nomEtude, nomVille, superficie, DATE_FORMAT(datePrelevement, \'%d/%m/%Y\') AS datePrelevement_fr, finEtude FROM etudes';
    $requete = "SELECT `etudes`.`idEtude` AS `id`, `etudes`.`nomEtude` AS `nom` FROM `etudes` WHERE (`etudes`.`finEtude` = 0)";
    include_once '../bdd.php';
?>

<!-- Le corps -->
<h1>Liste des Etudes</h1>
<table class="table table-striped">
    <tr><th>Nom des études</th></tr>
    <?php while ($donnees = $req->fetch()){
        echo "<tr><td><a href='list_zone.php?id_etude=".$donnees['id']."'>".$donnees['nom']."</a></td></tr>";
    }
    ?>
            
</table> 

<!-- Le pied de page -->
<?php include("../footer.inc.php"); ?>