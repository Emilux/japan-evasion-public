<?php

$smarty->assign('page', 'index');

$article = new Article();


if (isset($_GET['recherche'])){


    $article = $article->getList(null, 'DESC', 'date_publication_article', '*', 'titre_article LIKE "%'.$_GET["recherche"].'%"');
    
}
else {
    $article = $article->getList('5');
}


$smarty->assign(array(
    'article' => $article,
));
