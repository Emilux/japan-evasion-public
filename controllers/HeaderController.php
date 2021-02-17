<?php
$article_header = new Article();
$article_header = $article_header->getList('5');

$smarty->assign(array(
    'article_header' => $article_header,
));
