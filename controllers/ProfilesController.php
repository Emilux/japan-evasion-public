<?php

$smarty->assign('page', 'profiles');



if(isset($_GET['utilisateur'])){

   
    //Appel à la classe Utilisateur et Visiteur
    $utilisateur = new Utilisateur();
    $commentaire = new Commentaire();
    $article = new Article();
    $followers = new Follow();
    $carnet = new Carnet();

    //récupérer le contenu de l'utilisateur visionné
    $utilisateur = $utilisateur->getItem('pseudo_visiteur',$_GET['utilisateur']);

    //afficher l'article si il est publié et s'il est NEW l'affiché que au utilisateur connectés
    if($utilisateur){

        $carnet= $carnet->getItem('id_utilisateur', $utilisateur->getId_Utilisateur());

        $nbFollower = $followers->count('id_followed', $utilisateur->getId_Utilisateur());

        $nbCommentaire = $commentaire->count('id_visiteur', $utilisateur->getId_Visiteur());

        $nbArticle = $article->count('id_utilisateur', $utilisateur->getId_Utilisateur());

        $ActiviteCommentaire = $commentaire->getList(3, 'DESC', 'datetime_commentaire', '*', 'commentaire.id_visiteur = '.$utilisateur->getId_Visiteur());

        //Envoie des informations récupéré pour des différentes entités à smarty
        $smarty->assign(array(
            'utilisateur' => $utilisateur,
            'commente' =>$nbCommentaire,
            'article' =>$nbArticle,
            'carnet' => $carnet,
            'followers' => $nbFollower,
            'commentaire' => $ActiviteCommentaire,
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

