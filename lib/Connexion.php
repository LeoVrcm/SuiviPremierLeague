<?php

class Connexion {

public function Connect($pathConnect) {

    $tProperties = parse_ini_file($pathConnect);

    $lsProtocol = $tProperties["protocol"];
    $lsServer = $tProperties["server"];
    $lsPort = $tProperties["port"];
    $lsUS = $tProperties["us"];
    $lsPWD = $tProperties["pwd"];
    $lsDB = $tProperties["db"];
    
    $pdo = null;
    
    try {
        
        // Connexion selon 3 params: chaine de cnx, user et pwd
        $pdo = new PDO("$lsProtocol:host=$lsServer;port=$lsPort;dbname=$lsDB;", $lsUS, $lsPWD);
        // Les erreurs sont traitées comme des exceptions d'où le try/catch
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // tuyau en UTF8, donc liason client-serveur
        $pdo->exec("SET NAMES 'UTF8'");
        
    } catch (PDOException $e) {
        echo "Execution failed: " . $e->getMessage();
    }
    
    return $pdo;
}

public function Disconnect(PDO & $pcnx) {
    $pcnx = null;
}


}

?>