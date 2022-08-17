<?php

require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");

try {

    $select = $db->prepare("SELECT player_name, role, team_name, player_assist FROM player,team WHERE player.id_team = team.id_team ORDER BY player_assist DESC");
    $select->execute();

    $content = "<br><p class='tablesPageTitle'>Top Playmakers</p><table id='assistTable' cellpadding='10px'><thead>"
            . "<tr><th>Pos</th>"
            . "<th>Player</th>"
            . "<th>Role</th>"
            . "<th>Team</th>"
            . "<th>Value</th>"
            . "</tr></thead><tbody>";

    $i = 0;
    foreach ($select as $row) {

        if ($i < 5) {
            $i += 1;
            $content .= "<tr><td>$i</td>"
                    . "<td class='playerNameRow'> $row[0]</td>"
                    . "<td>$row[1]</td>"
                    . "<td><img class='clubEmblem' src='../images/Clubs/$row[2].png'/> $row[2]</td>"
                    . "<td>$row[3]</td>"
                    . "</tr>";
        } else {
            $content .= "</tbody></table>";
        }
    }
    $content .= "<br>";
    $select->closeCursor();
} catch (Exception $e) {
    $content = "Echec de l'exécution : " . $e->getMessage();
}

$cnx->Disconnect($db);

echo $content;
?>