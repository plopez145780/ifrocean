<?php include("../header.php"); ?>

<?php include("../menus.php"); ?>

<?php 
$nomEtude = "nom de l'etude";
$tabZone = array("zoneA","zoneB","zoneC"); ?>


<!-- Le corps -->
<section>
    <h1>Liste des zones - <?php echo $nomEtude ?></h1>
    
    <table>
        <tr>
            <th>Nom de zone</th>
        </tr>
        <?php 
        foreach ($tabZone as $keyZone => $valueZone) {
            echo "<tr><td>".$valueZone."</td></tr>";
        }
        ?>
    </table>
    
    <!-- link a faire -->
    <button type="button" class="btn btn-lg btn-default">Nouvelle zone</button>
</section>

<!-- Le pied de page -->
<?php include("../footer.php"); ?>
    