<?php
$smarty->assign('page', 'panelIndex');

$utilisateur = new Utilisateur();
$commentaire = new Commentaire();
$article = new Article();
$role = new Role();


if (isset($_SESSION['utilisateur'])) {


    $smarty->assign('session', $_SESSION['utilisateur']);

    //Compteur 
    $nbUtilisateur = $utilisateur->Count();
    if ($_SESSION['utilisateur']['role'] !== "redacteur") {
        $nbCommentaire = $commentaire->Count();
        $nbArticle = $article->Count();
        $nbArticlePending = $article->Count('statut_article', 'PENDING');
    } else {
        $nbCommentaire = $commentaire->Count('commentaire.id_utilisateur',$_SESSION['utilisateur']['id_utilisateur']);
        if (!$nbCommentaire){
            $nbCommentaire = 0;
        }
        $nbArticle = $article->Count('article.id_utilisateur', $_SESSION['utilisateur']['id_utilisateur']);
        if (!$nbArticle){
            $nbArticle = 0;
        }
        $nbArticlePending = $article->Count('', '','article.id_utilisateur = '.$_SESSION['utilisateur']['id_utilisateur'].' AND statut_article = "PENDING"');
        if (!$nbArticlePending){
            $nbArticlePending = 0;
        }
    }

    //récupérer le contenu de l'utilisateur
    $utilisateurs = $utilisateur->getList();

    //récupérer le contenu d'un commentaire 
    $commentaires = $commentaire->getList();
    
    //récupérer le contenu d'un article
    if ($_SESSION['utilisateur']['role'] !== "redacteur"){
        $articles = $article->getList();
    } else {
        $articles = $article->getList(null,'DESC','date_publication_article','*','utilisateur.id_utilisateur = '.$_SESSION['utilisateur']['id_utilisateur']);
    }



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
        ));

}