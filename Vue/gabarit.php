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
    <link href="/ifrocean/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

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
            <?php //Fil d'ariane
            echo '<a href="/ifrocean/">Accueil</a>';
            if (isset($nomEtude)){
                echo '> <a href="/ifrocean/index.php?action=list_etude"> Etude : ' . $nomEtude . '</a>';
                if (isset($nomZone)){
                     echo '> <a href="/ifrocean/index.php?action=list_zone&id_etude=' . $param_post['idEtude'] .'">Zone : ' . $nomZone .'</a>';
                }
            }
            else {
                if (isset($nomEtudeBio)){
                    echo '> <a href="/ifrocean/accueil_biologiste.php"> Etude : ' . $nomEtudeBio .'</a>';
                    if (isset($nomZoneBio)){
                    echo '> <a href="/ifrocean/index.php?action=list_zone&id_etude=' . $param_post['idEtude'] .'">Zone : ' . $nomZoneBio . '</a>';
                    }
                } 
            }
            ?>       
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
    </div><!-- /.container -->
</body>
</html>