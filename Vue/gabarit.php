<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="favicon.ico" >
        <title><?= $title ?></title>

        <link href="/vendor/ifrocean/css/style.css" rel="stylesheet" type="text/css">
        <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img class="logo" src="/media/Ifrocean.png" alt="logo_ifrocean"/></a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li <?php if (filter_input(INPUT_SERVER, 'REQUEST_URI') === '/accueil_biologiste.php') {echo 'class="active"';} ?> ><a href="/accueil_biologiste.php">Biologiste</a></li>
                            <li <?php if (filter_input(INPUT_SERVER, 'REQUEST_URI') === '/index.php?action=list_etude') {echo 'class="active"';} ?> ><a href="/index.php?action=list_etude">Préleveur</a></li>
                            <li <?php if (filter_input(INPUT_SERVER, 'REQUEST_URI') === '/apropos.php') {echo 'class="active"';} ?> ><a href="/apropos.php">A Propos</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
            <div id="ariane">
                <?php $arianeAccueil = '<a href="/">Accueil</a>'; ?>
                <?php if (isset($nomEtude)) : ?>
                    <?php if (isset($nomZone)) : ?>
                        <?= $arianeAccueil . ' > <a href="/index.php?action=list_etude">Préleveur</a> > <a href="/index.php?action=list_zone&id_etude=' . $idEtude . '">' . $nomEtude . ': Liste des zones</a> > ' . $title ?>
                    <?php else: ?>
                        <?= $arianeAccueil . ' > <a href="/index.php?action=list_etude">Préleveur</a> > ' . $title ?>
                    <?php endif ?>
                <?php else: ?>
                    <?php if (isset($nomEtudeBio)) : ?>
                        <?php if (isset($nomZoneBio)) : ?>
                            <?= $arianeAccueil . ' > <a href="/accueil_biologiste.php">Biologiste</a> > ' . '<a href="/detail.php?etude=' . $idEtude . '">Détail de l\'étude : ' . $nomEtudeBio . '</a> > Détail de la zone : ' . $nomZoneBio ?>
                        <?php else: ?>
                            <?= $arianeAccueil . ' > <a href="/accueil_biologiste.php">Biologiste</a> > ' . $title ?>
                        <?php endif ?>
                    <?php else: ?>
                        <?php if ($_SERVER['REQUEST_URI'] != '/' && $_SERVER['REQUEST_URI'] != '/index.php') : ?>
                            <?= $arianeAccueil . ' > ' . $title ?>
                        <?php endif ?>
                    <?php endif ?>
                <?php endif ?>   
            </div>

            <?= $contenu ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        </div>
    </body>
</html>