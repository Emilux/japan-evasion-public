<?php
// Initialisation de la session
session_start();
header("Cache-Control: no-cache");

require('defines.inc.php');
require('libs/Smarty.class.php');
require ('config_bdd.php');

// Initialisation Smarty
$smarty = new Smarty();