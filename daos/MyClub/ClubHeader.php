<?php

require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");

try {
    
    $select = $db->prepare("SELECT team_name, team_website, team_store, team_wiki, UPPER(team_full_name), foundation_date FROM team WHERE team_name=?");
    $select->bindParam(1, $team);
    $select->execute();

    foreach ($select as $row) {
        $content = "<div id='clubLinks'>"
                . "<a class='clubLinksBtn' href='$row[1]' target='_blank' >Official Website</a>"
                . "<a class='clubLinksBtn' href='$row[2]' target='_blank' >Official Store</a>"
                . "<a class='clubLinksBtn' href='$row[3]' target='_blank' >Wikipedia Page</a>"
                . "</div>"
                . "<div id='clubInfoClubPage'>"
                . "<p id='clubNameClubPage'>$row[4]</p>"
                . "<p>$row[5]</p>"
                . "</div>"
                . "<div id='clubEmblemClubPage'>"
                . "<img src='/SuiviPremierLeague/images/Clubs/$row[0].png' alt=''/>"
                . "</div>";
    }

    $select->closeCursor();
    
} catch (Exception $e) {
    echo "Execution failed: " . $e->getMessage();
}

$cnx->Disconnect($db);

echo $content;
?>    
