<!DOCTYPE html>

<?php include_once './GPS.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
            
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
        ?>
    </body>
</html>
