<?php

//connexion
require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");

try {
    // preparation de la requête
    $select = $db->prepare("SELECT team_home, team_home_score, team_away_score, team_away, DATE_FORMAT(fixture_date, '%a %d %b - %H:%i'), stadium_name "
            . "FROM fixture,stadium "
            . "WHERE fixture.id_stadium = stadium.id_stadium AND matchweek=?");
    // liaison du parmètre à la variable matchweek
    $select->bindParam(1, $matchweek);
    // execution de la requête
    $select->execute();
    
    
    $content = "<table id='fixtureTable' cellpadding='12px'><tbody>";
    // On boucle sur les lignes en récupérant le contenu des colonnes
    foreach ($select as $row) {
        // Récupération des valeurs par concaténation et interpolation
        $content .= "<tr>"
                . "<td class='teamRowLeft'> $row[0] <img class='clubEmblem' src='/SuiviPremierLeague/images/Clubs/$row[0].png'/></td>"
                . "<td class='scoreRow'>$row[1] - $row[2]</td>"
                . "<td class='teamRowRight'><img class='clubEmblem' src='/SuiviPremierLeague/images/Clubs/$row[3].png'/> $row[3]</td>"
                . "<td class='dateRow'>$row[4]</td>"
                . "<td class='stadiumRow'>$row[5]</td>"
                . "</tr>";
    }
    $content .= "</tbody></table>";
    
    
    //on ferme le curseur 
    $select->closeCursor();
    
    // gestion des erreurs
} catch (Exception $e) {
    $content = "Execution failed: " . $e->getMessage();
}
// deconnexion
$cnx->Disconnect($db);

// on affiche le contenu
echo $content;
?>
