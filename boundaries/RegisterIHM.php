<?php
session_start();
include "../controls/RegisterCTRL.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8" lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="icon" type="image/png" sizes="32x32" href="../images/General/Favicon/favicon-32x32.png">

        
        <link type="text/css" rel="stylesheet" href="../css/Style.css" media='screen'>
    </head>

    <body>
        <header>
            <?php
            include "../boundaries/partials/Header.php";
            ?>
        </header>
        
        <div id="registerFormContainer">

            <form id="registerForm" method="POST" action="">
                <table id="registerFormTable" cellpadding="10px">
                    <tr>
                        <td>
                            <label for="username">Username</label>
                        </td>
                        <td>
                            <input type="text" id="username" name="username" value="<?php
                            if (isset($username)) {
                                echo $username;
                            }
                            ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="userMail">Mail</label>
                        </td>
                        <td>
                            <input type="email" id="userMail" name="userMail" value="<?php
                            if (isset($userMail)) {
                                echo $userMail;
                            }
                            ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="userMailVerif">Confirm Mail</label>
                        </td>
                        <td>
                            <input type="email" id="userMailVerif" name="userMailVerif" value="<?php
                            if (isset($userMailVerif)) {
                                echo $userMailVerif;
                            }
                            ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="userPassword">Password </label>
                        </td>
                        <td>
                            <input type="password" id="userPassword" name="userPassword" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="userPasswordVerif">Confirm Password</label>
                        </td>
                        <td>
                            <input type="password" id="userPasswordVerif" name="userPasswordVerif" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="userTeam" class="etiquette">Select Team</label>
                        </td>
                        <td>

                            <select id="userTeam" name="userTeam" >
                                <option></option>
                                <?php

                                try {
                                    
                                    $cursor = $db->query("SELECT team_name FROM team");

                                    foreach ($cursor as $row) {
                                        $content .= "<option value='$row[0]'> $row[0] </option>";
                                    }
                                    $cursor->closeCursor();
                                }
                                catch (Exception $e) {
                                    $content = "Echec de l'exécution : " . $e->getMessage();
                                }

                                echo $content;
//                                ?>	

                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            <input name="registerShowPwd" id="registerShowPwd" type="checkbox"/><label for="registerShowPwd"> show password </label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            
                            <button type="reset" name="registerFormResetBtn" class="formBtn" >Reset </button>
                        </td>
                        <td>
                            
                            <button type="submit" name="registerFormSubmitBtn" class="formBtn" >Sign up </button>
                        </td>
                    </tr>

                </table>
                <div id='registerFormError' class='errorMsg'>
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