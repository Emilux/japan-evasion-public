<?php
$article_header = new Article();
$utilisateur_header = new Utilisateur();
$article_header = $article_header->getList('5', 'DESC','date_publication_article', '*', 'statut_article != "PENDING"');

if (isset($_SESSION['utilisateur'])){
    $utilisateur_header = $utilisateur_header->getItem('id_utilisateur',$_SESSION['utilisateur']['id_utilisateur']);
    $smarty->assign('sessionUtilisateur', $_SESSION['utilisateur']);
}


$smarty->assign(array(
    'article_header' => $article_header,
    'utilisateur_header' => $utilisateur_header,
    'connecte_header'=> isset($_SESSION['utilisateur']),
));
