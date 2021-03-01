<?php
$smarty->assign('page', 'panelCommentaire');

$utilisateur = new Utilisateur();
$commentaire = new Commentaire();
$article = new Article();
$role = new Role();
$signalement_article = new Signale_Article();


if (isset($_SESSION['utilisateur'])) {


    $smarty->assign('session', $_SESSION['utilisateur']);

    //Compteur 
    $nbUtilisateur = $utilisateur->Count();
    $nbCommentaire = $commentaire->Count();
    $nbArticle = $article->Count();
    $nbArticlePending = $article->Count('statut_article','PENDING');

    //récupérer le contenu de l'utilisateur
    $utilisateurs = $utilisateur->getList();

    //récupérer le contenu d'un commentaire 
    $commentaires = $commentaire->getList();
    
    //récupérer le contenu d'un commentaire 
    $articles = $article->getList();


    //récupérer le contenu de l'utilisateur visionné
    $utilisateur = $utilisateur->getItem('id_utilisateur',$_SESSION['utilisateur']['id_utilisateur']); 


    $smarty->assign(array(
        'utilisateur' => $utilisateur,
        'utilisateurs' => $utilisateurs,
        'nbUtilisateur' => $nbUtilisateur,
        'nbCommentaire' => $nbCommentaire,
        'nbArticle' => $nbArticle,
        'nbArticlePending' => $nbArticlePending,
        'commentaires' => $commentaires,
        'articles' => $articles,
        'role' => $role,
        'titreArticle' => $article,
        'signalement_articles' => $signalement_article,
        ));

}