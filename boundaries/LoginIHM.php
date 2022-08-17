<?php
session_start();
include "../controls/LoginCTRL.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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

        
        <div id="loginFormContainer">

            <form id="loginForm" method="POST" action="">
                <table id="loginFormTable" cellpadding="10px">
                    <tr> 
                        <td>
                            <label for="usernameconnect">Username</label>
                        </td>
                        <td>
                            <input type="text" name="usernameconnect" id="usernameconnect"/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label for="pwdconnect">Password</label>
                        </td>
                        <td>
                            <input type="password" name="pwdconnect" id="pwdconnect"/>
                        </td>                        
                    </tr>                 
                    
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            <input name="loginShowPwd" id="loginShowPwd" type="checkbox"/><label for="loginShowPwd"> show password </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <a href="/SuiviPremierLeague/boundaries/ForgottenPassIHM.php">Forgot password?</a>
                        </td>
                        <td> 
                            <button class="formBtn" type="submit" name="loginFormSubmitBtn"> Log in </button>
                        </td>
                    </tr>
                                  
                    <tr>
                        <td align="center" colspan="2">
                            <a href="/SuiviPremierLeague/boundaries/RegisterIHM.php">Not registered yet?</a>
                        </td>                        
                    </tr>                
                </table>
                
                <div id='loginFormError' class='errorMsg'>
                <?php
                if (isset($error)) {
                    echo  $error;
                }
                ?>
                </div>
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


