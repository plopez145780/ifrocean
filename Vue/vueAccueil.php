<?php $title = "Accueil"; ?>

<!-- Le corps -->
<?php ob_start(); ?>
<section class="page-header">
    <div class="starter-template">
        <h1>Ifrocean - Suivi des annélides des estrans sablonneux de L’Ouest Atlantique</h1>
        <p class="lead">Recensement des espèces de la zone intertidale du littoral Nord-Ouest de la France sur les plages de sables</p>
    </div>
    
    
    <a href="" class="btn btn-lg btn-default ">Biologiste</a>
    
    <a href="index.php?action=list_etude" class="btn btn-lg btn-default">Préleveur</a>
    
</section>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>