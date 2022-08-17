<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fixtures</title>

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

        <form method="GET" id="matchweekForm" name="matchweekForm">

            <select id="matchweekSelect" name="matchweekSelect">

                <?php
                $matchweek = filter_input(INPUT_GET, 'matchweekSelect');
                for ($i = 1; $i <= 38; $i++) {
                    $newoption = "<option value='$i' ";
                    if ($matchweek == $i) {
                        $newoption .= "selected='selected'";
                    }
                    $newoption .= "> Matchweek $i </option>";

                    echo $newoption;
                }
                
                
                ?>

            </select>

        </form>

        <?php
        include "../daos/Fixtures/FixtureTable.php"
        ?>
        

        <footer>

            <?php
            include "partials/Footer.php";
            ?>
            
        </footer>
        
        <script src="../js/jquery.js"></script>

        <script src="../js/index.js"></script>

    </body>
</html>
