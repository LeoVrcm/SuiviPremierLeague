<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tables</title>
        
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
        
        <br>
        <div id="tableContainer">
            <div id="leagueTable">
                <?php
                include "../daos/Tables/LeagueTable.php";
                ?>
            </div>

            
            
            <div id="playerTable">
                <?php
                include "../daos/Tables/GoalTable.php";
                include "../daos/Tables/AssistTable.php";
                include "../daos/Tables/CleanSheetTable.php";
                ?>
            </div>
        </div>
    
        <footer>
            <?php
            include "partials/Footer.php";
            ?>
        </footer>
        <script src="../js/jquery.js"></script>
        <script src="../js/index.js"></script>
    </body>
</html>
