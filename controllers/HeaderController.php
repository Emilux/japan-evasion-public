<?php
//Regarde si l'utilisateur existe encore sinon deconnecter le client
if(isset($_SESSION['utilisateur'])){
    $utilisateur_session = new Utilisateur();
    $utilisateur_session = $utilisateur_session->getItem('id_utilisateur',$_SESSION['utilisateur']['id_utilisateur']);
    if (!$utilisateur_session)
        header('Location: ./?page=deconnexion');
    else if ($utilisateur_session->getBanni_Utilisateur() === 1)
        header('Location: ./?page=deconnexion');
}


$article_header = new Article();
$utilisateur_header = new Utilisateur();
$article_header = $article_header->getList('5');

if (isset($_SESSION['utilisateur']))
    $utilisateur_header = $utilisateur_header->getItem('id_utilisateur',$_SESSION['utilisateur']['id_utilisateur']);

$smarty->assign(array(
    'article_header' => $article_header,
    'utilisateur_header' => $utilisateur_header,
    'connecte_header'=> isset($_SESSION['utilisateur'])
));
