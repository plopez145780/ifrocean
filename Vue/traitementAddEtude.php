<?php
include_once '/Modele/Etude.php';

$etude = new Etude($param_post['nom'], $param_post['ville'], $param_post['superficie'], $param_post['date'], '0');
$etude->addEtude();

header('Location: /ifrocean/index.php?action=list_etude');

?>