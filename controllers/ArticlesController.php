<?php

$smarty->assign('page', 'articles');



if(isset($_GET['id'])){
 
    $article = new Article();
    $utilisateur = new Utilisateur();
    $commentaire = new Commentaire();

    $article = $article->getItem('id_article', $_GET['id']);
    $redacteur = $utilisateur->getItem('id_utilisateur', $article['id_utilisateur']);
    $nombre_commentaire = $commentaire->Count('id_article', $_GET['id']);
    $commentaire = $commentaire->getCommentaire($_GET['id']);
    


    if($article){

        $smarty->assign(array(
            'article' => $article,
            'redacteur' => $redacteur,
            'nombre_commentaire' => $nombre_commentaire
        ));

        $smarty->assign('background', $article['photo_article']);

    }
    else{
        header('Location: ./');
    }
    
} 




else {
    header('Location: ./');
}

