<?php

require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");

try {

    $select = $db->prepare("SELECT stadium_name FROM stadium, team WHERE stadium.id_team = team.id_team AND team_name=?");
    $select->bindParam(1, $team);
    $select->execute();
    $row = $select->fetch();

    $content = "<p class='clubPageTitle'> $row[0] </p>"
    . "<div id='stadiumLocationMap'> "
    . "<iframe width='510px' height='500px' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?q=$row[0]Stadium&t=&z=15&ie=UTF8&iwloc=&output=embed'></iframe>"
    . "</div>";

    $select->closeCursor();
    
} catch (Exception $e) {
    echo "Execution failed: " . $e->getMessage();
}

$cnx->Disconnect($db);

echo $content;
?>
