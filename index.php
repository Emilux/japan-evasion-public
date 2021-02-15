<?php

require('./config/config_init.php');
/* ROUTER */

// Gestion de Routing
if (isset($_GET['page']) && file_exists(_CTRL_.str_replace('.', '', ucfirst($_GET['page'])).'Controller.php')){
    require(_CTRL_.ucfirst($_GET['page']).'Controller.php');
}
else
    require(_CTRL_.'IndexController.php');

// Charge Controller de la création ou connexion à son compte sur
// Toutes les pages du site
require (_CTRL_.'CompteController.php');

// Affichage des templates
$smarty->display(_TPL_.'template.tpl');
