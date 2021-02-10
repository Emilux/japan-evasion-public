<?php

require('./config/config_init.php');


/* ROUTER */
// Gestion de Routing
if (isset($_GET['action']) && file_exists(_CTRL_.str_replace('.', '', $_GET['action']).'.php'))
    require(_CTRL_.$_GET['page'].'.php');
else
    require(_CTRL_.'index.php');


// Affichage des templates
$smarty->display('template/header.tpl');

if (isset($_GET['page']) && file_exists(_TPL_.$_GET['page'].'.tpl'))
    $smarty->display(_TPL_.$_GET['page'].'.tpl');
else
    $smarty->display(_TPL_.'index.tpl');

$smarty->display(_TPL_.'footer.tpl');
