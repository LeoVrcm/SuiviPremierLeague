<?php

require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");

try {

    $select = $db->prepare("SELECT pl_title, fa_title, lc_title, cs_title FROM team WHERE team_name=?");
    $select->bindParam(1, $team);
    $select->execute();
    $row = $select->fetch();

    $content = "<p class='clubPageTitle'> National Honours</p>"
    . "<div id='clubTitles'>"
    . "<p class='trophyList'>$row[0] x Premier League</p>"
    . "<p class='trophyList'>$row[1] x FA Cup</p>"
    . "<p class='trophyList'>$row[2] x League Cup</p>"
    . "<p class='trophyList'>$row[3] x Community Shield</p>"
    . "</div>";

    $select->closeCursor();
    
} catch (Exception $e) {
    echo "Execution failed: " . $e->getMessage();
}

$cnx->Disconnect($db);

echo $content;
?>

