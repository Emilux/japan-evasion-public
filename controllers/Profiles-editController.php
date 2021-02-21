<?php

$smarty->assign('page', 'profiles-edit');

if(isset($_SESSION['utilisateur'])){

    //Appel à la classe Utilisateur et Visiteur
    $utilisateur = new Utilisateur();


    //récupérer le contenu de l'utilisateur visionné
    $utilisateur = $utilisateur->getItem('pseudo_visiteur',$_SESSION['utilisateur']['pseudo_visiteur']);

    //afficher l'article si il est publié et s'il est NEW l'affiché que au utilisateur connectés
    if($utilisateur){

        //Envoie des informations récupéré pour des différentes entités à smarty
        /*$smarty->assign(array(
            'utilisateur' => $user, 
            'follow' => $nbFollower,
            'commente' =>$nbCommentaire,
            'article' =>$nbArticle,
            'connecte' => isset($_SESSION['utilisateur'])
        ));*/
        //Envoie des informations récupéré pour des différentes entités à smarty

        $smarty->assign(array(
            'utilisateur' => $utilisateur,
            'connecte' => isset($_SESSION['utilisateur'])
        ));



        
        if(isset($_POST['submit_update'])){
            //vérifier les entreés


            //UPADATE DE L'UTILISATEUR (ajouter update inner visiteur)
            $utilisateur->Update($_POST, $_SESSION['utilisateur']['id_visiteur']);

            //CHANGER LE PSEUDO DE L'UTILISATEUR ET SON EMAIL DANS LA SESSION SI ILS SONT CHANGES
            if(isset($_POST['pseudo_utilisateur'])){
                $_SESSION['utilisateur']['pseudo_utilisateur'] = $_POST['pseudo_utilisateur'];
            }
            if(isset($_POST['email_utilisateur'])){
                $_SESSION['utilisateur']['email_utilisateur'] = $_POST['email_utilisateur'];
            }
        
        }
 
    }
    else {
        /*header('Location: ./#exampleModal');
        exit();*/
    }
    
} else {
    /*header('Location: ./');
    exit();*/
}

