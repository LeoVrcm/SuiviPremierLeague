<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Club</title>
        <meta charset="UTF-8" lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="icon" type="image/png" sizes="32x32" href="../images/General/Favicon/favicon-32x32.png">
           
        <link type="text/css" rel="stylesheet" href="../css/Style.css" media='screen'>
    </head>
    <body>
        <header>

            <?php
            include "partials/Header.php";
            ?>

        </header>
        

        <div id='clubHead'>

            <?php
            
                $team=filter_input(INPUT_GET, 'teamName');
            
            if ($team === "") {
                include "../daos/MyClub/ClubNoSelect.html";
            } else {
            include "../daos/MyClub/ClubHeader.php";
            
            ?>

        </div>

        <div id="clubPageBody">
            <div id="clubPageFixture">
                <?php
                include "../daos/MyClub/ClubFixture.php";
                ?>
            </div>

            <div id="clubPageTitlesAndMap">
                <?php
                include "../daos/MyClub/ClubTitle.php";
                ?>
                <br>
                <?php
                include "../daos/MyClub/ClubMap.php";
                ?>
            </div>
        </div>
            <?php } ?>
        
        <footer>
            <?php
            include "partials/Footer.php";
            ?>
        </footer>
        
        <script src="../js/jquery.js"></script>
        <script src="../js/index.js"></script>
    </body>
</html>
