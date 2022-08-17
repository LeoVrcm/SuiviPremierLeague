<?php
session_start();

if (isset($_SESSION['idUser']) AND $_SESSION['idUser'] > 0) {
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Account</title>
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

            <div id="accountMain">
                <div id="userInfo">             
                    <p> Username : <?php echo $_SESSION['username']; ?> </p>

                    <p> Email : <?php echo $_SESSION['userMail']; ?> </p>

                    <p> Club : <?php echo $_SESSION['userTeam']; ?> <img id="accountClubEmblem" src="/SuiviPremierLeague/images/Clubs/<?php echo $_SESSION['userTeam']; ?>.png" alt=""/></p>

                    <p> <a href="/SuiviPremierLeague/boundaries/ChangePasswordIHM.php">Change password</a> </p>
                    <?php
                } else {
                    header("Location:/SuiviPremierLeague/boundaries/LoginIHM.php");
                }
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