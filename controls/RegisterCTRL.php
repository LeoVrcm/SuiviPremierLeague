<?php
// connexion
require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");

try {
    // attribution du bouton submit à un valeur, puis vérification si le bouton à été cliqué
    $registerFormSubmitBtn = filter_input(INPUT_POST, 'registerFormSubmitBtn');
    if (isset($registerFormSubmitBtn)) {
        // vérfication qu'aucuns des champs ne soient vide
        if (!empty(filter_input(INPUT_POST, 'username')) && !empty(filter_input(INPUT_POST, 'userMail')) && !empty(filter_input(INPUT_POST, 'userMailVerif')) && !empty(filter_input(INPUT_POST, 'userPassword')) && !empty(filter_input(INPUT_POST, 'userPasswordVerif')) && !empty(filter_input(INPUT_POST, 'userTeam'))) {
            // création de variables pour chaque champ du formulaire
            // utilisation de htmlspecialchars pour convertir les caractères spéciaux en entités html
            $username = htmlspecialchars(filter_input(INPUT_POST, 'username'));
            $userMail = htmlspecialchars(filter_input(INPUT_POST, 'userMail'));
            $userMailVerif = htmlspecialchars(filter_input(INPUT_POST, 'userMailVerif'));
            $userPassword = filter_input(INPUT_POST, 'userPassword');
            $userPasswordVerif = filter_input(INPUT_POST, 'userPasswordVerif');
            $userTeam = htmlspecialchars(filter_input(INPUT_POST, 'userTeam'));
            // création d'une variable pour vérifier la longueur de la saisie 'username' (15 carac. minimum)
            $usernamelength = strlen($username);

            if ($usernamelength <= 15) {
                // préparation de la requête select pour vérifier que l'username saisi n'existe pas dans la bd
                $selectUsername = $db->prepare("SELECT * FROM user WHERE username=?");
                // liaison du paramètre à la variable username
                $selectUsername->bindParam(1, $username);
                // execution de la requête préparée
                $selectUsername->execute();
                // on utilise rowCount() pour compter le nombre de ligne sortie avec la requête qui à l'username en paramètre
                $usernameExist = $selectUsername->rowCount();
                // si le resultat est 0, l'username est disponible
                if ($usernameExist === 0) {
                    // on vérifie que les adresses mail sont identiques 
                    if ($userMail === $userMailVerif) {
                        // on vérifie, dans le cas ou l'utilisateur réussisse à contourner le controle de l'email du navigateur, que l'email a un format valide
                        if (filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
                            // on prepare une nouvelle requête
                            $selectUserMail = $db->prepare("SELECT * FROM user WHERE user_mail=?");
                            // liaison du paramètre à la variable userMail
                            $selectUserMail->bindParam(1, $userMail);
                            // execution de la requête préparée
                            $selectUserMail->execute();
                            // on vérifie que le mail n'existe pas déjà comme avec l'username
                            $userMailExist = $selectUserMail->rowCount();
                            if ($userMailExist === 0) {
                                // on vérifie que le mot de passe est au format demandé
                                $upperPwd = preg_match('@[A-Z]@', $userPassword);
                                $lowerPwd = preg_match('@[a-z]@', $userPassword);
                                $numberPwd = preg_match('@[0-9]@', $userPassword);
                                $lengthPwd = strlen($userPassword);
                                // on vérifie que chaque variable retourne true
                                if ($upperPwd && $lowerPwd && $numberPwd && $lengthPwd >= 8) {
                                    // on vérifie que les mots de passe sont identiques
                                    if ($userPassword === $userPasswordVerif) {
                                        // on hache le mot de passe 
                                        $userPassword = password_hash($userPassword, PASSWORD_DEFAULT);
                                        
                                        // on prépare et éxecute l'insert avec les saisies du formulaire une fois que tout est OK
                                        $insertUser = $db->prepare("INSERT INTO user(username, user_mail, user_pwd, user_team) VALUES(?,?,?,?)");
                                        $insertUser->bindParam(1, $username);
                                        $insertUser->bindParam(2, $userMail);
                                        $insertUser->bindParam(3, $userPassword);
                                        $insertUser->bindParam(4, $userTeam);
                                        $insertUser->execute();
                                        
                                        // on envoie le mail de confirmation d'inscription
                                        require_once '../divers/MailSend.php';
                                        $subject = "Registration on SuiviPremierLeague";
                                        $message = "Hi <b>$username</b> !<br>You just registered on SuiviPremierLeague.com, welcome aboard !";
                                        sendMail($userMail, $username, $subject, $message);
                                        
                                        // on dirige l'utilisateur vers la page Login
                                        header('Location: /SuiviPremierLeague/boundaries/LoginIHM.php');
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
                                $error = "Email already used !";
                            }
                        } else {
                            $error = "Email is not valid !";
                        }
                    } else {
                        $error = "Emails don't match !";
                    }
                } else {
                    $error = "Username already used !";
                }
            } else {
                $error = "Username can't exceed 15 characters !";
            }
        } else {
            $error = "Fill all the fields !";
        }
    }
} catch (Exception $e) {
    $error = "Execution failed: " . $e->getMessage();
}
?>

