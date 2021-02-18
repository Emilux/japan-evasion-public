<?php
// Si on a pas ces infos, rien ne peut fonctionner : die
if (!isset($_SERVER['DOCUMENT_ROOT']))
    exit();

// Define de la racine du site
if (isset($_SERVER['HTTP_HOST'])){
    //Test si le site est lancé dans un environnement local
    if ($_SERVER['HTTP_HOST'] === "127.0.0.1" || $_SERVER['HTTP_HOST'] === "localhost") {
        //echo '<p style="margin-top:15px;margin-bottom:15px;text-align: center;">(Site lancé en local)</p>';
        define('_PATH_', '');
    } else {
        define('_PATH_', './');
    }
} else {
    exit();
}


// Define du dossier Coeur
define('_MDL_', _PATH_ . 'models/');

// Define du dossier des Controleurs
define('_CTRL_', _PATH_ . 'controllers/');

// Define du dossier des Configs
define('_CONFIG_', _PATH_ . 'config/');

// Define du dossier des templates
define('_TPL_', _PATH_ . 'template/');

// Define du dossier des logs
define('_LOGS_', _PATH_ . 'logs/');
