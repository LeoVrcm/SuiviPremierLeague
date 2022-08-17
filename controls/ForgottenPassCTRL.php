<?php

require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");

try {
    $forgotPasswordFormSubmitBtn = filter_input(INPUT_POST, 'forgotPasswordFormSubmitBtn');

    if (isset($forgotPasswordFormSubmitBtn)) {
        $forgotPasswordMail = htmlspecialchars(filter_input(INPUT_POST, 'forgotPasswordMail'));
        $username = $_SESSION['username'];
        if (!empty($forgotPasswordMail)) {
            if (filter_var($forgotPasswordMail, FILTER_VALIDATE_EMAIL)) {

                $select = $db->prepare("SELECT * FROM user WHERE user_mail = ?");
                $select->bindParam(1, $forgotPasswordMail);
                $select->execute();
                $userexist = $select->rowCount();
                if ($userexist == 1) {

                    $char = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                    $randomPassword = array();
                    for ($i = 0; $i < 8; $i++) {
                        $n = rand(0, strlen($char) - 1);
                        $randomPassword[$i] = $char[$n];
                    }
                    $randomPassword = implode($randomPassword);
                    
                    require_once '../divers/MailSend.php';
                    $subject = "New password on SuiviPremierLeague";
                    $message = "Hi <b>$username</b> !<br>Here is your new password : <br> <b>$randomPassword</b>";
                    sendMail($forgotPasswordMail, $username, $subject, $message);
                    
                    $randomPassword = password_hash($randomPassword, PASSWORD_DEFAULT);

                    $update = $db->prepare("UPDATE user SET user_pwd=? WHERE user_mail=?");
                    $update->bindParam(1, $randomPassword);
                    $update->bindParam(2, $forgotPasswordMail);
                    $update->execute();

                    header('Location: /SuiviPremierLeague/boundaries/loginIHM.php');
                } else {
                    $error = "No account linked to this mail !";
                }
            } else {
                $error = "Email is not valid !";
            }
        } else {
            $error = "Enter your mail !";
        }
    }
} catch (Exception $e) {
    $error = "Execution failed: " . $e->getMessage();
}
?>


