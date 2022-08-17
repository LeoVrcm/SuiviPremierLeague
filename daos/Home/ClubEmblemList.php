<?php

require_once 'lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("conf/db.ini");

try {
    $select = $db->prepare("SELECT team_name FROM team ORDER by team_name ASC");
    $select->execute();

    $content = "<div id='clubEmblemLine'> <form name='clubSelectForm' method='get' action='/SuiviPremierLeague/boundaries/MyClubIHM.php'>";

    foreach ($select as $row) {
        $content .= "<button name='teamName' value='" . $row[0] . "' id='" . $row[0] . "'> <img class='eachClubEmblem' src='images/Clubs/$row[0].png'/></button>";
    }
    
    $content .= "</form></div> ";

    $select->closeCursor();
    
} catch (Exception $e) {
    $content = "Echec de l'exécution : " . $e->getMessage();
}

$cnx->Disconnect($db);

echo $content;
?>

