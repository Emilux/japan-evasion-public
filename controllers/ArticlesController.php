<?php

$smarty->assign('page', 'articles');



if(isset($_GET['id'])){


    //Appel des différentes classes
    $article = new Article();
    $utilisateur = new Utilisateur();
    $commentaire = new Commentaire();
    $reponse = new Reponse_de();
    $aime_commentaire = new Aime_Commentaire();
    $role = new Role();

    //récupérer le contenu de l'article visionné
    $article = $article->getItem('id_article', $_GET['id']);
    
    //afficher l'article si il est publié et s'il est NEW l'affiché que au utilisateur connectés
    if(($article)){

        if($article->getStatut_Article() === 'PUBLISHED' || ($article->getStatut_Article() === 'NEW' && isset($_SESSION['utilisateur']))){

            
            //tester si on recupère une variable id en get
            if(isset($_GET['id_commentaire'])){

                $commentaire_id_utilisateur = $commentaire->getItem('id_commentaire',$_GET['id_commentaire'],'id_utilisateur');

                if($commentaire_id_utilisateur && $commentaire_id_utilisateur->getId_Utilisateur() === $_SESSION['utilisateur']['id_utilisateur']){

                    $commentaire->Delete($_GET['id_commentaire']);
                }
            }

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
                'connecte' => isset($_SESSION['utilisateur']),
                'aime_commentaire' => $aime_commentaire,
                'role' => $role,
            ));

            $smarty->assign('background', $article->getPhoto_Article());


            if(isset($_POST['submit_add'])){
                $commentaire->setId_Article($article->getId_Article());

                if (isset($_SESSION['utilisateur'])){
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

            //AJOUT REPONSE COMMENTAIRE
            if(isset($_POST['submit_reponse'])){
                $commentaire->setId_Article($article->getId_Article());

                if (isset($_SESSION['utilisateur'])){
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
                if($commentaire->addReponse($estVisiteur)){
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

