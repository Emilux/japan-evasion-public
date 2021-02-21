<?php

$smarty->assign('page', 'articles');



if(isset($_GET['id'])){


    //Appel des différentes classes
    $article = new Article();
    $utilisateur = new Utilisateur();
    $commentaire = new Commentaire();
    $reponse = new Reponse_de();

    //récupérer le contenu de l'article visionné
    $article = $article->getItem('id_article', $_GET['id']);
    
    //afficher l'article si il est publié et s'il est NEW l'affiché que au utilisateur connectés
    if(($article)){
        if($article->getStatut_Article() === 'PUBLISHED' || ($article->getStatut_Article() === 'NEW' && isset($_SESSION['utilisateur']))){

            //récupérer les informations du rédacteur de l'article
            $redacteur = $utilisateur->getItem('id_utilisateur', $article->getId_Utilisateur());

            //récupérer le nombre de commentaire de l'article
            $nbCommentaire = $commentaire->count('id_article', $article->getId_Article());

            //récupérer les commentaires sous l'article
            $commentaires = $commentaire->getList(5,'DESC','datetime_commentaire','*','id_article = '.$article->getId_Article());

            //Envoie des informations récupéré pour des différentes entités à smarty
            $smarty->assign(array(
                'article' => $article,
                'redacteur' => $redacteur,
                'reponse' => $reponse,
                'nombre_commentaire' => $nbCommentaire,
                'commentaires' => $commentaires,
                'connecte' => isset($_SESSION['utilisateur'])
            ));

            $smarty->assign('background', $article->getPhoto_Article());


            if(isset($_POST['submit_add'])){
                $commentaire->setId_Article($article->getId_Article());

                if ($_SESSION['utilisateur']){
                    $commentaire->setPseudo_Visiteur($_SESSION['utilisateur']['pseudo_visiteur']);
                    $commentaire->setEmail_Visiteur($_SESSION['utilisateur']['email_visiteur']);
                    $commentaire->setId_Visiteur($_SESSION['utilisateur']['id_visiteur']);
                    $estVisiteur = false;
                } else {
                    $commentaire->setPseudo_Visiteur($_POST['pseudo_visiteur']);
                    $commentaire->setEmail_Visiteur($_POST['email_visiteur']);
                    $estVisiteur = true;
                }

                $commentaire->setContenu_Commentaire($_POST['contenu_commentaire']);
                if($commentaire->addCommentaire($estVisiteur)){
                    header('Location: ?page=articles&id='.$_GET['id'].'#espace_commentaire');
                }

            }
        } else {
            header('Location: ./#exampleModal');
            exit();
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

