<?php
$test = new Model();
$article = $test->getList('article',5);

$smarty->assign('article', $article);
