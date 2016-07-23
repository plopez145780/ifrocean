<!-- Le corps -->
<?php ob_start(); ?>
<h1>Ajouter Etude</h1>

<form method="POST" action="/index.php?action=traitement_add_etude">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom étude - plage">
    </div>
    <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville">
    </div>
    <div class="form-group">
        <label for="superficie">Superficie</label>
        <input type="text" class="form-control" id="superficie" name="superficie" placeholder="m²">
    </div>
    <div class="form-group">
        <label for="date">Date de prélèvement</label>
        <input type="date" class="form-control" id="date" name="date" >
    </div>
    <input class="btn btn-default" type="submit" value="Créer une nouvelle étude"/>
</form>
    

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>

