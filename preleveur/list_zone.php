<?php 
    $idEtude = filter_input(INPUT_GET, "id_etude", FILTER_SANITIZE_NUMBER_INT);
    
    $requete = "SELECT `idZone` AS id, `nomZone` AS nom FROM `zones` WHERE `idEtude`= $idEtude";
    include_once '../bdd.php';
    $title = "Liste des zones";
    include("../header.inc.php"); 
    
    $nomEtude = "...nom de l'etude...";
    if ($idEtude == FALSE OR $idEtude == NULL) {
        $idEtude = 1;
        echo "<div class='alert alert-danger' role='alert'>
        <strong>ERREUR</strong> pas de paramèter get
        </div>";
    }
    else {

    

?>


<!-- Le corps -->
<section>
    <h1>Liste des zones - <?php echo $nomEtude ?></h1>
    
    <table class="table table-striped">
        <tr>
            <th>Nom de zone</th>
        </tr>
        <?php while ($donnees = $req->fetch()){
            echo "<tr><td>".$donnees['nom']."</td></tr>";
        }
        ?>
    </table>
    
    <a href="new_zone.php?id_etude=<?php echo $idEtude ?>" class="btn btn-lg btn-default">Nouvelle zone</a>
</section>

<!-- Le pied de page -->
    <?php } include("../footer.inc.php"); ?>
    