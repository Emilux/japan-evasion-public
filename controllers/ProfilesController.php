<?php

$smarty->assign('page', 'profiles');



if(isset($_GET['utilisateur'])){

   
    //Appel à la classe Utilisateur
    $utilisateur = new Utilisateur();
    

    //récupérer le contenu de l'article visionné

    $user = $utilisateur->getItem('pseudo_utilisateur', $_GET['utilisateur']);
    $carnet= $utilisateur->getItem('id_utilisateur', $user['id_utilisateur'], 'carnet_de_voyage');


    $nbFollower = $utilisateur->count('id_followed', $user['id_utilisateur'],'follow');
  
   $nbCommentaire = $utilisateur->count('id_utilisateur', $user['id_utilisateur'],'commente');

   $nbArticle = $utilisateur->count('id_utilisateur', $user['id_utilisateur'],'article');


    //afficher l'article si il est publié et s'il est NEW l'affiché que au utilisateur connectés
    if($utilisateur){

        //Envoie des informations récupéré pour des différentes entités à smarty
        $smarty->assign(array(
            'utilisateur' => $user, 
            'follow' => $nbFollower,
            'commente' =>$nbCommentaire,
            'article' =>$nbArticle,
            'carnet' => $carnet,
            'connecte' => isset($_SESSION['utilisateur'])
        ));
 
    }
    else {
        header('Location: ./#exampleModal');
        exit();
    }
    
} else {
    header('Location: ./');
    exit();
}

