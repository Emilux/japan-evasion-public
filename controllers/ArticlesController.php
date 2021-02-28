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

                if(($commentaire_id_utilisateur && $commentaire_id_utilisateur->getId_Utilisateur() === $_SESSION['utilisateur']['id_utilisateur']) || ($_SESSION['utilisateur']['role'] === "administrateur" || $_SESSION['utilisateur']['role'] === "moderateur")){

                    $commentaire->Delete($_GET['id_commentaire']);
                    header('Location: ?page=articles&id='.$_GET['id'].'#espace_commentaire');

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

            //Ajout d'un commentaire ou une reponse
            if(isset($_POST['submit_add']) || isset($_POST['submit_reponse'])){
                $erreurs = [];
                $commentaire->setId_Article($article->getId_Article());

                //Vérfie que le contenu du commentaire est bien rempli
                if (isset($_POST['contenu_commentaire'])){
                    //Nettoyer les entrées dans les commentaires.
                    $contenu_commentaire = $Utils->valid_donnees($_POST['contenu_commentaire']);
                    //Vérifie que le commentaire est bien conforme
                    if (empty($contenu_commentaire) || strlen($contenu_commentaire) < 5 || strlen($contenu_commentaire) > 555){
                        $erreurs[] = "Veuillez entrer un commentaire qui fait moins de 555 et plus de 5 caractères .";
                    }
                } else {
                    $erreurs[] = "Veuillez remplir le commentaire.";
                }

                if (isset($_POST['submit_reponse']) && isset($_POST['id_commentaire'])){
                    $id_commentaire = $Utils->valid_donnees($_POST['id_commentaire']);
                    if (empty($id_commentaire)){
                        $erreurs[] = "Veuillez sélectionner une réponse.";
                    }
                }




                //Vérifie si c'est un utilisateur ou un visiteur qui commente
                if (isset($_SESSION['utilisateur'])){

                    //Si aucune erreur Assigne les informations de l'utilisateur.
                    if (empty($erreurs)){
                        $commentaire->setPseudo_Visiteur($_SESSION['utilisateur']['pseudo_visiteur']);
                        $commentaire->setEmail_Visiteur($_SESSION['utilisateur']['email_visiteur']);
                        $commentaire->setId_Visiteur($_SESSION['utilisateur']['id_visiteur']);
                        $estVisiteur = false;
                    }
                } else {

                    //Vérfie que le pseudo et l'email sont bien rempli
                    if (isset($_POST['pseudo_visiteur']) && isset($_POST['email_visiteur'])){
                        $pseudo_visiteur = $Utils->valid_donnees($_POST['pseudo_visiteur']);
                        $email_visiteur = $Utils->valid_donnees($_POST['email_visiteur']);

                        //Si c'est un visiteur vérifié que le pseudo et l'email entrés sont bien conformes
                        if (!empty($pseudo_visiteur) && strlen($pseudo_visiteur) <= 20 && strlen($pseudo_visiteur) >= 3){

                            if (!preg_match("/^[A-Za-z0-9-_]*$/",$pseudo_visiteur))
                                $erreurs[] = "Seule les lettres, chiffres et underscore (_) sont acceptés";

                        } else
                            $erreurs[] = "Veuillez entrer un pseudo qui fait moins de 20 et plus de 3 caractères.";


                        if (!empty($email_visiteur) && strlen($pseudo_visiteur) <= 50){
                            if (!filter_var($email_visiteur, FILTER_VALIDATE_EMAIL))
                                $erreurs[] = "L'adresse e-mail n'est pas valide.";
                        } else
                            $erreurs[] = "Veuillez entrer une email qui fait moins de 50 caractères.";

                        //Si aucune erreur Assigne les valeurs données par le visiteur.
                        if (empty($erreurs)){
                            $commentaire->setPseudo_Visiteur($_POST['pseudo_visiteur']);
                            $commentaire->setEmail_Visiteur($_POST['email_visiteur']);
                            $estVisiteur = true;
                        }
                    } else {
                        $erreurs[] = "Veuillez entrer un pseudo et une email.";
                    }


                }

                if (empty($erreurs)){
                    $commentaire->setContenu_Commentaire($contenu_commentaire);

                    //Si c'est un commentaire
                    if (isset($_POST['submit_add'])){
                        if($commentaire->addCommentaire($estVisiteur,false)){
                            header('Location: ?page=articles&id='.$_GET['id'].'#espace_commentaire');
                        }
                    }
                    //Si c'est une réponse
                    else if (isset($_POST['submit_reponse'])){
                        if($commentaire->addCommentaire($estVisiteur, true,$id_commentaire)){
                            header('Location: ?page=articles&id='.$_GET['id'].'#espace_commentaire');
                        }
                    }




                } else {
                    //renvoi les erreurs à la template commentaire.
                    $smarty->assign('erreurs', $erreurs);
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

