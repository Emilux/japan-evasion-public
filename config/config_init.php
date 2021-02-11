<?php
// Initialisation de la session
session_start();
header("Cache-Control: no-cache");

require('defines.inc.php');
require('libs/Smarty.class.php');
require ('config_bdd.php');

//connexion à la bdd
try {
    $bdd = [
        'bdd' => new PDO('mysql:dbname='.$bdd.';host='.$server.'', $user, $password)
    ];
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

// Initialisation Smarty
$smarty = new Smarty();