<?php
// Initialisation de la session
session_start();
header("Cache-Control: no-cache");



//Changer la langue en FR
setlocale (LC_TIME, 'fr_FR');

require('defines.inc.php');
require('libs/Smarty.class.php');
require ('config_bdd.php');
require ('models/Model.php');

function chargerClass($classe){
    require('models/'.$classe.'.php');
}

spl_autoload_register('chargerClass');

// Connexion à la bdd
try {
    $dbh = new PDO('mysql:host='.$server.';dbname='.$bdd, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

// Initialisation Smarty
$smarty = new Smarty();


