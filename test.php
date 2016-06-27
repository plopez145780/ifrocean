<!DOCTYPE html>

<?php include_once 'Modele/GPS.php'; ?>
<?php include_once 'Modele/Zone.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
            /*
            $latA_dir = "N";
            $latA_deg = 39;     
            $latA_min = 17;     
            $latA_sec = 0;
            
                    
            $longA_dir = "O";
            $longA_deg = 76;     
            $longA_min = 36;     
            $longA_sec = 0;   
            
            $coordA = new GPS($latA_dir, $latA_deg, $latA_min, $latA_sec, $longA_dir, $longA_deg, $longA_min, $longA_sec);
            echo "<br>";
            echo $coordA->getLatitude();
            echo "<br>";
            echo $coordA->getLongitude();
            */
            echo "----------------------------";
            
            
            $coord1 = new GPS("N",47,13,4,012,"O",1,33,17,573);
            
            //$coord2 = new GPS("N",47,13,3.875,"O",1,33,8.202);
            
            //echo "distance :";
            //echo $coord1->calculerDistance($coord2);
            
            /*
            $lat3 = 48.80686346108517;
            $long3 = 2.1430206298828125;
            $coord3 = new GPS($lat3,$long3);
            
            $lat4 = 48.797818160096874;
            $long4 = 2.3641204833984375;
            $coord4 = new GPS($lat4,$long4);
            
            $z = new Zone($coord1,$coord2,$coord3,$coord4);
            $s = $z->calculerSurface();
            echo "<BR>";
            echo 'surface:';
            
            echo $s;*/
            
            
        ?>
    </body>
</html>
