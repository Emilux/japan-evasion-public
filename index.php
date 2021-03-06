<?php

//charge le fichier de configuration.
require('./config/config_init.php');

//Verification des informations de connexion
require (_CTRL_.'VerifController.php');

$ajax = FALSE;

/* ROUTER */

// Routing pour les fichiers AJAX
if (isset($_GET['ajax']) && file_exists(_AJX_.str_replace('.', '', ucfirst($_GET['ajax'])).'Ajax.php')){
    require(_AJX_.ucfirst($_GET['ajax']).'Ajax.php');
    //Si c'est une page ajax qui est appelée
    $ajax = TRUE;
}

// Affichage des templates
if (!$ajax){
    // Routing pour les pages du site
    if (isset($_GET['page']) && file_exists(_CTRL_.str_replace('.', '', ucfirst($_GET['page'])).'Controller.php')){
        require(_CTRL_.ucfirst($_GET['page']).'Controller.php');
    } else if (isset($_GET['panel']) && file_exists(_PNL_.str_replace('.', '', ucfirst($_GET['panel'])).'Controller.php')){
        require(_PNL_.ucfirst($_GET['panel']).'Controller.php');
    }
    else
        // Appel toujours le IndexController par défaut (plus tard appel à page 404).
        require(_CTRL_.'IndexController.php');

    // Chargement des controllers présents sur tout le site.
    require (_CTRL_.'HeaderController.php');
    require (_CTRL_.'CompteController.php');

    if ($smarty->getTemplateVars('page') !== null)
    //Affiche la template de base du site
    $smarty->display(_TPL_.'template.tpl');
}


