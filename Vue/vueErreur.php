<!-- Le corps -->
<?php ob_start(); ?>
<div class="alert alert-danger" role="alert">
    <strong><?= $messageErreur ?></strong>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>