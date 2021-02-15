<?php

$smarty->assign('page', 'articles');


if(isset($_GET['id'])){
 
    $article = new Article();

    $article = $article->getItem('id', $_GET['id']);

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

