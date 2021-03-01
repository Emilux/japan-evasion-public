<?php
$smarty->assign('page', 'panelCreate-art');

$article = new Article();


if (isset ($_POST['submit_article'])) {

    $titre_article = $Utils->valid_donnees($_POST['titre_article']);
    $temps_lecture_article = $Utils->valid_donnees($_POST['temps_lecture_article']);
    $contenu_article = $Utils->valid_donnees($_POST['contenu_article']);
    

    var_dump($_FILES);

    if($_FILES['photo_article']['error'] == 0){
        $resultat = move_uploaded_file($_FILES['photo_article']['tmp_name'], '../assets/media/article/'.$_FILES['photo_article']['name']);
        
        
        $article->setPhoto_Article('assets/media/article/'.$_FILES['photo_article']['name']);

        if(!$resultat){
            $smarty->assign('error', 'Une erreur est survenue lors du déplacement du fichier');
        }

    }
    else{
        $smarty->assign('error', 'Une erreur est survenu lors de l\'upoload sur le serveur');
    }

    
    $article->setTitre_Article($titre_article);
    $article->setTemps_Lecture_Article($temps_lecture_article);
    $article->setContenu_Article($contenu_article);
    $article->setId_Utilisateur($_SESSION['utilisateur']['id_utilisateur']);

    $article = $article->creerArticle();




}