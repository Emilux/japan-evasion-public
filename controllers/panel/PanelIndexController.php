<?php
$smarty->assign('page', 'panelIndex');

$utilisateur = new Utilisateur();
$commentaire = new Commentaire();
$article = new Article();



if (isset($_SESSION['utilisateur'])) {


    $smarty->assign('session', $_SESSION['utilisateur']);


    $nbUtilisateur = $utilisateur->Count();

    $nbCommentaire = $commentaire->Count();

    $nbArticle = $article->Count();

    $nbArticlePending = $article->Count('statut_article','PENDING');

    //récupérer le contenu de l'utilisateur visionné
    $utilisateurs = $utilisateur->getList();

    //récupérer le contenu de l'utilisateur visionné
    $utilisateur = $utilisateur->getItem('id_utilisateur',$_SESSION['utilisateur']['id_utilisateur']); 



    $smarty->assign(array(
        'utilisateur' => $utilisateur,
        'utilisateurs' => $utilisateurs,
        'nbUtilisateur' => $nbUtilisateur,
        'nbCommentaire' => $nbCommentaire,
        'nbArticle' => $nbArticle,
        'nbArticlePending' => $nbArticlePending,
        ));

}