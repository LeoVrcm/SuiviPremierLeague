<?php

require_once 'lib/Connexion.php';
$cnx = new Connexion();
$db = $cnx->Connect("conf/db.ini");

try {

    $select = $db->prepare("SELECT * FROM article ORDER BY id_article DESC");
    $select->execute();

    $content = "";
    $i = 0;
    foreach ($select as $row) {
        if ($i < 6) {
            $i += 1;
            $content .= "<a class='homeEachArticle' href='$row[1]' target='_blank'>
                    <img class='homeArticleImg' alt='' src='images/Home/NewsArticle/$row[2]' /> 
                    <div class='homeArticleTitleContainer'>
                        <div class='homeArticleTitle'>$row[3]
                        </div>
                        <p class='homeArticleMediaLink'>by $row[4]</p>
                    </div>
                </a>";
        } else {
            $select->closeCursor();
        }
    }
} catch (Exception $e) {
    $content = "Execution failed: " . $e->getMessage();
}

$cnx->Disconnect($db);

echo $content;
?>


