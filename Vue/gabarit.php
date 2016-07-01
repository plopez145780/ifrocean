<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title><?= $title ?></title>
    
    <link href="/ifrocean/vendor/ifrocean/css/style.css" rel="stylesheet" type="text/css">
    <script src="/ifrocean/vendor/ifrocean/js/javascript.js"></script>
    
    <!-- Bootstrap core CSS -->
    <link href="/ifrocean/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/ifrocean/vendor/bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/ifrocean/vendor/ifrocean/css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/ifrocean/vendor/bootstrap/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/ifrocean/vendor/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<!-- REFAIRE LA NAV BARRE -->

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
                    <a class="navbar-brand" href="/ifrocean/">Ifrocean</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li <?php if($_SERVER['REQUEST_URI'] === '/ifrocean/' OR $_SERVER['REQUEST_URI'] == '/ifrocean/index.php'){echo 'class="active"';}?> ><a href="/ifrocean/">Accueil</a></li>
                        <li <?php if($_SERVER['REQUEST_URI'] === '/ifrocean/apropos.php'){echo 'class="active"';}?> ><a href="/ifrocean/apropos.php">A Propos</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </header>
    <div class="container">
        
        <div class="ariane">
            <?php //Fil d'ariane ?>
            <a href="/ifrocean/">Accueil</a>
            <?php if (isset($nomEtude)): ?>
             > <a href="/ifrocean/index.php?action=list_etude"> Etude : <?= $nomEtude ?></a>
                <?php if (isset($nomZone)): ?>
                     > <a href="/ifrocean/index.php?action=list_zone&id_etude='.<?= $param_post['idEtude'] ?>">Zone : <?= $nomZone ?></a>
                <?php endif ?>
            <?php endif ?>
        </div>
        
        
        
        <?= $contenu ?>   <!-- Élément spécifique -->

        
        
        
        <footer>
            <!-- footer -->
        </footer>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </div><!-- /.container -->
</body>
</html>