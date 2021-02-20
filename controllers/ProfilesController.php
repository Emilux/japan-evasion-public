<?php

$smarty->assign('page', 'profiles');



if(isset($_GET['utilisateur'])){

   
    //Appel à la classe Utilisateur et Visiteur
    $utilisateur = new Utilisateur();
    $commentaire = new Commentaire();
    $article = new Article();


    //récupérer le contenu de l'utilisateur visionné
    $utilisateur = $utilisateur->getItem('pseudo_visiteur',$_GET['utilisateur']);

    //afficher l'article si il est publié et s'il est NEW l'affiché que au utilisateur connectés
    if($utilisateur){
        //$carnet= $utilisateur->getItem('id_utilisateur', $user['id_utilisateur'], 'carnet_de_voyage');

        //$nbFollower = $utilisateur->count('id_followed', $user['id_utilisateur'],'follow');

        $nbCommentaire = $commentaire->count('id_visiteur', $utilisateur->getId_Visiteur());

        $nbArticle = $article->count('id_utilisateur', $utilisateur->getId_Utilisateur());

        //Envoie des informations récupéré pour des différentes entités à smarty
        $smarty->assign(array(
            'utilisateur' => $utilisateur,
            'commente' =>$nbCommentaire,
            'article' =>$nbArticle,
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

