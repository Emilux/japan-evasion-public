<?php

$smarty->assign('page', 'index');

$article = $article->getList('5');
$smarty->assign(array(
    'article' => $article,
));