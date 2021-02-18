<?php

$smarty->assign('page', 'index');

$article = new Article();
$article = $article->getList('5');
$smarty->assign(array(
    'article' => $article,
));
