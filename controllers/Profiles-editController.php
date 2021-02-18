<?php

$smarty->assign('page', 'profiles-edit');

if(isset($_SESSION['utilisateur'])){
 
   
    //Appel à la classe Utilisateur
    $utilisateur = new Utilisateur();
    

    //récupérer le contenu de l'article visionné

    $user = $utilisateur->getItem('pseudo_utilisateur', $_SESSION['utilisateur']['pseudo_utilisateur']);

    //afficher l'article si il est publié et s'il est NEW l'affiché que au utilisateur connectés
    if($user){

        $nbFollower = $utilisateur->count('id_followed', $user['id_utilisateur'],'follow');
      
        $nbCommentaire = $utilisateur->count('id_utilisateur', $user['id_utilisateur'],'commente');
    
        $nbArticle = $utilisateur->count('id_utilisateur', $user['id_utilisateur'],'article');

        //Envoie des informations récupéré pour des différentes entités à smarty
        $smarty->assign(array(
            'utilisateur' => $user, 
            'follow' => $nbFollower,
            'commente' =>$nbCommentaire,
            'article' =>$nbArticle,
            'connecte' => isset($_SESSION['utilisateur'])
        ));
        
        if(isset($_POST['submit_update'])){

            $utilisateur->Update($_POST, $_SESSION['utilisateur']['id_utilisateur']);
            if(isset($_POST['pseudo_utilisateur'])){
                $_SESSION['utilisateur']['pseudo_utilisateur'] = $_POST['pseudo_utilisateur'];
            }
            if(isset($_POST['email_utilisateur'])){
                $_SESSION['utilisateur']['email_utilisateur'] = $_POST['email_utilisateur'];
            }
        
        }
 
    }
    else {
        header('Location: ./#exampleModal');
        exit();
    }
    
} else {
    header('Location: ./');
    exit();
}

