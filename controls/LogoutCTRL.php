<?php
session_start();
$_SESSION = array();
header("Location: /SuiviPremierLeague/index.php");

session_destroy();

?>