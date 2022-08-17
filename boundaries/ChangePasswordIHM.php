<?php
session_start();
include "../controls/ChangePasswordCTRL.php";
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Change Password</title>

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


        <div id="changePasswordFormContainer">

            <form method="POST" action="">
                <table id="newPasswordFormTable" cellpadding="10px">

                    <tr> 
                        <td>
                            <label for="changePwdUserPwd">Actual password</label>
                        </td>
                        <td>
                            <input type="password" name="changePwdUserPwd" id="changePwdUserPwd"/>
                        </td>
                    </tr>
                    
                    <tr> 
                        <td>
                            <label for="changePassword">New password</label>
                        </td>
                        <td>
                            <input type="password" name="changePassword" id="changePassword"/>
                        </td>
                    </tr>

                    <tr> 
                        <td>
                            <label for="changePasswordVerif">Confirm new password</label>
                        </td>
                        <td>
                            <input type="password" name="changePasswordVerif" id="changePasswordVerif"/>
                        </td>
                    </tr>

                    <tr>     
                        <td></td>
                        <td> 
                            <button class="formBtn" type="submit" name="changePasswordFormSubmitBtn" id="changePasswordFormSubmitBtn"> Submit </button>
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
