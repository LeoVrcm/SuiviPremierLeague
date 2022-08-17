<?php

require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");

try {

    $select = $db->prepare("SELECT team_home, team_home_score, team_away_score, team_away, DATE_FORMAT(fixture_date, '%a %d %b - %H:%i'), stadium_name, matchweek "
            . "FROM fixture,stadium WHERE fixture.id_stadium = stadium.id_stadium AND (team_home=? OR team_away=?) ORDER BY matchweek");
    $select->bindParam(1, $team);
    $select->bindParam(2, $team);

    $select->execute();

    $content = "<p class='clubPageTitle'> Results and Upcoming Fixtures</p> "
            . "<table id='clubPageFixtureTable' cellpadding='12px' ><tbody>";

    foreach ($select as $row) {
        $content .= "<tr>"
                . "<td>$row[6]</td>"
                . "<td class='teamRowLeftClub'> $row[0] <img class='clubEmblem' src='/SuiviPremierLeague/images/Clubs/$row[0].png'/></td>"
                . "<td class='scoreRow'>$row[1] - $row[2]</td>"
                . "<td class='teamRowRightClub'><img class='clubEmblem' src='/SuiviPremierLeague/images/Clubs/$row[3].png'/> $row[3]</td>"
                . "<td class='dateRow'>$row[4]</td>"
                . "<td class='stadiumRowClub'>$row[5]</td>"
                . "</tr>";
    }
    $content .= "</tbody></table>";

    $select->closeCursor();
    
} catch (Exception $e) {
    echo "Execution failed: " . $e->getMessage();
}

$cnx->Disconnect($db);

echo $content;
?>



