<?php

$smarty->assign('page', 'articles');



if(isset($_GET['id'])){

    //Appel à la classe Article
    $article = new Article();
    //Appel à la classe Utilisateur
    $utilisateur = new Utilisateur();
    //Appel à la classe Commentaire
    $commentaire = new Commentaire();

    //récupérer le contenu de l'article visionné
    $article = $article->getItem('id_article', $_GET['id']);

    //récupérer les informations du rédacteur de l'article
    $redacteur = $utilisateur->getItem('id_utilisateur', $article['id_utilisateur']);

    //récupérer le nombre de commentaire de l'article
    $nombre_commentaire = $commentaire->Count('id_article', $_GET['id']);

    //récupérer les commentaires sous l'article
    $commentaires = $commentaire->getCommentaire($_GET['id']);

    //afficher l'article si il est publié et s'il est NEW l'affiché que au utilisateur connectés
    if(($article && $article['statut_article'] === 'PUBLISHED') || ($article['statut_article'] === 'NEW' && isset($_SESSION['utilisateur']))){

        //Envoie des informations récupéré pour des différentes entités à smarty
        $smarty->assign(array(
            'article' => $article,
            'redacteur' => $redacteur,
            'nombre_commentaire' => $nombre_commentaire,
            'commentaires' => $commentaires,
            'connecte' => isset($_SESSION['utilisateur'])
        ));

        $smarty->assign('background', $article['photo_article']);


        if(isset($_POST['submit_add'])){

            if($commentaire->addCommentaire()){
                header('Location: ?page=articles&id='.$_GET['id'].'#espace_commentaire');
            }

        }
    }
    else {
        header('Location: ./');
        exit();
    }
    
} else {
    header('Location: ./');
    exit();
}

