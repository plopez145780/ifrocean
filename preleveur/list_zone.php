<?php 
    $title = "Liste des zones";
    include("../header.inc.php"); 
    $requete = 'SELECT idEtude, nomEtude, nomVille, superficie, DATE_FORMAT(datePrelevement, \'%d/%m/%Y\') AS datePrelevement_fr, finEtude FROM etudes';
    include_once '../bdd.php';

$nomEtude = "nom de l'etude";

?>


<!-- Le corps -->
<section>
    <h1>Liste des zones - <?php echo $nomEtude ?></h1>
    
    <table>
        <tr>
            <th>Nom de zone</th>
        </tr>
        <?php while ($donnees = $req->fetch()){
            echo "<tr><td>".$donnees['nomEtude']."</td></tr>";
        }
        ?>
    </table>
    
    <!-- link a faire -->
    <button type="button" class="btn btn-lg btn-default">Nouvelle zone</button>
</section>

<!-- Le pied de page -->
<?php include("../footer.inc.php"); ?>
    