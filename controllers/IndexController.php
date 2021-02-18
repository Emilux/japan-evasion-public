<?php

$smarty->assign('page', 'index');
var_dump($_SESSION['utilisateur']);
$article = new Article();
$article = $article->getList('5');
$smarty->assign(array(
    'article' => $article,
));
