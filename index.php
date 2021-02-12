<?php

require('./config/config_init.php');
/* ROUTER */

// Gestion de Routing
if (isset($_GET['page']) && file_exists(_CTRL_.str_replace('.', '', ucfirst($_GET['page'])).'Controller.php')){
    require(_CTRL_.ucfirst($_GET['page']).'Controller.php');
}
else
    require(_CTRL_.'IndexController.php');


//Modification du header en fonction du nom/type de la page
if (isset($_GET['page']) && file_exists(_TPL_.$_GET['page'].'.tpl')){
    $smarty->assign('pagename',$_GET['page'].' small');
} else {
    $smarty->assign('pagename','');
}

// Charge Controller de la création ou connexion à son compte sur
// Toutes les pages du site
require (_CTRL_.'CompteController.php');

// Affichage des templates
$smarty->display(_TPL_.'template.tpl');
