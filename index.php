<?php

require('./config/config_init.php');


/* ROUTER */
// Gestion de Routing
if (isset($_GET['page']) && file_exists(_CTRL_.str_replace('.', '', $_GET['page']).'.php'))
    require(_CTRL_.$_GET['page'].'.php');
else
    require(_CTRL_.'index.php');


//Modification du header en fonction du nom/type de la page
if (isset($_GET['page']) && file_exists(_TPL_.$_GET['page'].'.tpl')){
    $smarty->assign('pagename',$_GET['page'].' small');
} else {
    $smarty->assign('pagename','');
}


// Affichage des templates
$smarty->display('template/header.tpl');

if (isset($_GET['page']) && file_exists(_TPL_.$_GET['page'].'.tpl'))
    $smarty->display(_TPL_.$_GET['page'].'.tpl');
else
    $smarty->display(_TPL_.'index.tpl');

$smarty->display(_TPL_.'footer.tpl');
