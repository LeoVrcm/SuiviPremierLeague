<?php

require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");

try {

    $loginFormSubmitBtn = filter_input(INPUT_POST, 'loginFormSubmitBtn');
    if (isset($loginFormSubmitBtn)) {
        
        if (!empty(filter_input(INPUT_POST, 'usernameconnect')) || !empty(filter_input(INPUT_POST, 'pwdconnect'))) {
            $usernameconnect = htmlspecialchars(filter_input(INPUT_POST, 'usernameconnect'));
            $pwdconnect = filter_input(INPUT_POST, 'pwdconnect');
            
            $select = $db->prepare("SELECT * FROM user WHERE username=?");
            $select->bindParam(1, $usernameconnect);
            $select->execute();
            $userexist = $select->rowCount();
            $userinfo = $select->fetch();
            if ($userexist === 1) {

                
                if (password_verify($pwdconnect, $userinfo['user_pwd'])) {
                    $_SESSION['idUser'] = $userinfo['id_user'];
                    $_SESSION['username'] = $userinfo['username'];
                    $_SESSION['userTeam'] = $userinfo['user_team'];
                    $_SESSION['userMail'] = $userinfo['user_mail'];
                    $_SESSION['userPwd'] = $userinfo['user_pwd'];
                    header("Location: /SuiviPremierLeague/index.php");                    
                    
                    
                } else {
                    $error = "Invalid password !";
                }
            } else {
                $error = "No account found !";
            }
        } else {
            $error = "Fill all the fields !";
        }
    }
} catch (Exception $e) {
    $error = "Execution failed: " . $e->getMessage();
}

?>