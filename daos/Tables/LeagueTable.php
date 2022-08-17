<?php

require_once '../lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("../conf/db.ini");



try {

    // Préparation et exécution de la requete SQL
    $select = $db->prepare("SELECT * FROM team ORDER BY points DESC, GD DESC");
    $select->execute();

    $content = "<p class='tablesPageTitle'>League Table</p><table cellpadding='10px'><thead>"
            . "<tr><th>Pos</th>"
            . "<th>Club</th>"
            . "<th>Played</th>"
            . "<th>Won</th>"
            . "<th>Draw</th>"
            . "<th>Lost</th>"
            . "<th>GD</th>"
            . "<th>Points</th>"
            . "</tr></thead><tbody>";

    // On boucle sur les lignes en récupérant le contenu des colonnes 
    $i = 0;
    foreach ($select as $row) {
        // Récupération des valeurs par concaténation et interpolation
        $i += 1;
        $content .= "<tr><td>$i</td>"
                . "<td class='teamRow'><img class='clubEmblem' src='../images/Clubs/$row[1].png'/> $row[1]</td>"
                . "<td>$row[2]</td>"
                . "<td class='statRow'>$row[3]</td>"
                . "<td class='statRow'>$row[4]</td>"
                . "<td class='statRow'>$row[5]</td>"
                . "<td class='statRow'>$row[6]</td>"
                . "<td>$row[7]</td>"
                . "</tr>";
    }

    
    $content .= "</tbody></table>";    
    // Fermeture du curseur 
    $select->closeCursor();

    // Gestion des erreurs

} catch (Exception $e) {
    $content = "Execution failed: " . $e->getMessage();
}



// Déconnexion
$cnx->Disconnect($db);

// Affichage du contenu
echo $content;


?>
