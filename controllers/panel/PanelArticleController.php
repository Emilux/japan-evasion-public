<?php
    $smarty->assign('page', 'panelArticle');


    $article = new Article();
    $signalement_article = new Signale_Article();


    if (isset($_SESSION['utilisateur'])) {


        $smarty->assign('session', $_SESSION['utilisateur']);

        //récupérer le contenu d'un article
        if ($_SESSION['utilisateur']['role'] !== "redacteur"){
            $articles = $article->getList();
        } else {
            $articles = $article->getList(null,'DESC','date_publication_article','*','utilisateur.id_utilisateur = '.$_SESSION['utilisateur']['id_utilisateur']);
        }

        $smarty->assign(array(
            'articles' => $articles,
            'signalement_articles' => $signalement_article,
        ));

    }