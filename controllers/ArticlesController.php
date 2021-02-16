<?php

$smarty->assign('page', 'articles');

setlocale (LC_TIME, 'fr_FR');


if(isset($_GET['id'])){
 
    $article = new Article();

    $article = $article->getItem('id_article', $_GET['id']);

    if($article){
        $smarty->assign(array(
            'article' => $article
            
        ));

    }
    else{
        header('Location: ./');
    }
    
} 
else {
    header('Location: ./');
}

