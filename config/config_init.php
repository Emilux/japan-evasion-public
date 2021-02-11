<?php
// Initialisation de la session
session_start();
header("Cache-Control: no-cache");

require('defines.inc.php');
require('libs/Smarty.class.php');
require ('config_bdd.php');
require ('models/Model.php');

//connexion à la bdd
try {
    $dbh = new PDO('mysql:host='.$server.';dbname='.$bdd, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

// Initialisation Smarty
$smarty = new Smarty();