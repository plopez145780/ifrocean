<!-- Le corps -->
<?php ob_start(); ?>

<section>
    <h1>Erreur 404</h1>
    <p>Perdu ? <a href="/index.php">L'accueil c'est par là -></a></p>
    
</section>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>