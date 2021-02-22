<?php

require('./config/config_init.php');
$ajax = FALSE;
/* ROUTER */

// Gestion de Routing
if (isset($_GET['ajax']) && file_exists(_AJX_.str_replace('.', '', ucfirst($_GET['ajax'])).'Ajax.php')){
    require(_AJX_.ucfirst($_GET['ajax']).'Ajax.php');
    $ajax = TRUE;
}

// Affichage des templates
if (!$ajax){
    // Gestion de Routing
    if (isset($_GET['page']) && file_exists(_CTRL_.str_replace('.', '', ucfirst($_GET['page'])).'Controller.php')){
        require(_CTRL_.ucfirst($_GET['page']).'Controller.php');
    }
    else
        require(_CTRL_.'IndexController.php');

    // Charge Controller de la création ou connexion à son compte sur
// Toutes les pages du site
    require (_CTRL_.'HeaderController.php');
    require (_CTRL_.'CompteController.php');
    $smarty->display(_TPL_.'template.tpl');
}


