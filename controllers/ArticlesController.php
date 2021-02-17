<?php

$smarty->assign('page', 'articles');



if(isset($_GET['id'])){
 
    $article = new Article();
    $utilisateur = new Utilisateur();
    $commentaire = new Commentaire();

    $article = $article->getItem('id_article', $_GET['id']);
    $redacteur = $utilisateur->getItem('id_utilisateur', $article['id_utilisateur']);
    $nombre_commentaire = $commentaire->Count('id_article', $_GET['id']);
    $commentaires = $commentaire->getCommentaire($_GET['id']);
    
    
    var_dump($article && $article['statut_article'] !== 'PENDING');
    var_dump($article['statut_article'] !== 'NEW' && isset($_SESSION['utilisateur']));
    var_dump(($article && $article['statut_article'] !== 'PENDING') && ($article['statut_article'] === 'NEW' && isset($_SESSION['utilisateur'])));


    if(($article && $article['statut_article'] === 'PUBLISHED') || ($article['statut_article'] === 'NEW' && isset($_SESSION['utilisateur']))){
            $smarty->assign(array(
                'article' => $article,
                'redacteur' => $redacteur,
                'nombre_commentaire' => $nombre_commentaire,
                'commentaires' => $commentaires
            ));

            $smarty->assign('background', $article['photo_article']);


            if(isset($_POST['submit_add'])){

                $commentaire->Add($_POST);

            }


    }
    else{
        header('Location: ./');
    }
    
} 






else {
    header('Location: ./');
}

