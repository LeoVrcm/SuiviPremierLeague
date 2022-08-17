<?php

require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");

try {
    $changePasswordFormSubmitBtn = filter_input(INPUT_POST, 'changePasswordFormSubmitBtn');
    if (isset($changePasswordFormSubmitBtn)) {
    $username = $_SESSION['username'];
    $userMail = $_SESSION['userMail'];
    $changePwdUserPwd = filter_input(INPUT_POST, 'changePwdUserPwd');
    $changePassword = filter_input(INPUT_POST, 'changePassword');
    $changePasswordVerif= filter_input(INPUT_POST, 'changePasswordVerif');
    if (!empty($changePwdUserPwd) || !empty($changePassword) || !empty($changePasswordVerif)) {
        
        if (password_verify($changePwdUserPwd, $_SESSION['userPwd'])) {

            $upperPwd = preg_match('@[A-Z]@', $changePassword);
            $lowerPwd = preg_match('@[a-z]@', $changePassword);
            $numberPwd = preg_match('@[0-9]@', $changePassword);
            $lengthPwd = strlen($changePassword);

            if ($upperPwd AND $lowerPwd AND $numberPwd AND $lengthPwd >= 8) {

                if ($changePassword === $changePasswordVerif) {

                    $changePassword = password_hash($changePassword, PASSWORD_DEFAULT);

                    $update = $db->prepare("UPDATE user SET user_pwd=? WHERE user_mail=?");
                    $update->bindParam(1, $changePassword);
                    $update->bindParam(2, $userMail);
                    $update->execute();

                    $_SESSION['userPwd'] = $changePassword;
                    
                    require_once '../divers/MailSend.php';
                    $subject = "Password updated on SuiviPremierLeague";
                    $message = "Hi <b>$username</b> !<br>You just updated your password on SuiviPremierLeague.com !";
                    sendMail($userMail, $username, $subject, $message);

                    header('Location: /SuiviPremierLeague/index.php');
                } else {
                    $error = "Passwords don't match !";
                }
            } else {
                $error = "Password must contain : <br>"
                        . "- An uppercase letter <br>"
                        . "- A lowercase letter <br>"
                        . "- A numeric digit <br>"
                        . "- Minimum 8 characters";
            }
        } else {
            $error = "Invalid password !";
        }
    } else {
        $error = "Fill all the fields !";
    }
}
    
} catch (Exception $e) {
    $error = "Execution failed: " . $e->getMessage();
}

?>