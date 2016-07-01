<?php 
$title = "A Propos";
?>
<!-- Le corps -->
<?php ob_start(); ?>
<section>
    <article>
        <h1>Projet réalisé par :</h1>
        <p>
            BENETEAU Cédric<br>
            KHERCHAOUI Medhi<br>
            LOPEZ Pierre
            
        </p>
    </article>
</section>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>