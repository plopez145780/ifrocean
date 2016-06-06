<?php include("//header.php"); ?>

<?php include("//menus.php"); ?>

<!-- Le corps -->
<section>
    <h1>Liste des zones - <?php $nomEtude ?></h1>
    
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
</section>

<!-- Le pied de page -->
<?php include("//footer.php"); ?>
    