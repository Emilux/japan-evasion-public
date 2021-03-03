<?php

$smarty->assign('page', 'index');

$article = new Article();


$article = $article->getList('6', 'DESC','date_publication_article', '*', 'statut_article != "PENDING"');


$smarty->assign(array(
    'article' => $article,
));
