<?php
session_start();
include "../controls/ForgottenPassCTRL.php";
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Forgot your password</title>
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


        <div id="forgotPasswordFormContainer">

            <form method="POST" action="" id="forgotPasswordForm">
                <table id="forgotPasswordFormTable" cellpadding="10px">
                    <tr> 
                        <td>
                            <label for="forgotPasswordMail">Mail linked to your account</label>
                        </td>
                        <td>
                            <input type="email" name="forgotPasswordMail" id="forgotPasswordMail"/>
                        </td>
                    </tr>

                    <tr>    
                        <td></td>
                        <td> 
                            <button class="formBtn" type="submit" name="forgotPasswordFormSubmitBtn" id="forgotPasswordFormSubmitBtn"> Send me an email </button>
                        </td>
                    </tr>

                </table>

                <?php
                if (isset($error)) {
                    echo "<p class='errorMsg'>" . $error . "</p>";
                }
                ?>
            </form>

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

