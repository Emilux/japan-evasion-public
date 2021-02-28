<?php
//AUTO RECONNEXION AVEC COOKIE
if (isset($_COOKIE['JUID']) && !isset($_SESSION['utilisateur'])){

    //Appel la classe utilisateur
    $utilisateur_cookie = new Utilisateur();

    //Récupère le cookie contenant les informations de l'utilisateur
    $juid = $_COOKIE['JUID'];

    //SPLIT le JUID (JAPAN EVASION UNIQUE ID) avec d'un coté le id_utilisateur et de l'autre
    //Les informations de connexion de l'utilisateur ainsi que son browser fingerprint
    $juid = explode('::',$juid);

    //Récupère l'utilisateur avec l'id stocké dans le cookie
    $utilisateur_cookie = $utilisateur_cookie->getItem('id_utilisateur',$juid[0]);

    if ($utilisateur_cookie)
        $info = $utilisateur_cookie->getPseudo_Visiteur().$utilisateur_cookie->getEmail_Visiteur().$utilisateur_cookie->getMdp_Utilisateur().$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT'].$_SERVER['HTTP_ACCEPT_ENCODING'].$_SERVER['HTTP_ACCEPT_LANGUAGE'];
    else
        $info = '';
    //Vérifie que les informations et le fingerprint du cookie corresponde au information de l'utilisateur essayant de se connecter
    $hash = password_verify($info,$juid[1]);

    //Si les données correspondent
    if ($hash){
        $role = new Role();
        $role = $role->getItem('id_role',$utilisateur_cookie->getId_role());

        //Creer la session
        $_SESSION['utilisateur'] = [
            'id_utilisateur' => $utilisateur_cookie->getId_Utilisateur(),
            'id_visiteur' => $utilisateur_cookie->getId_Visiteur(),
            'pseudo_visiteur' => $utilisateur_cookie->getPseudo_Visiteur(),
            'email_visiteur' => $utilisateur_cookie->getEmail_Visiteur(),
            'banni_utilisateur' => $utilisateur_cookie->getBanni_Utilisateur(),
            'role' => $role->getNom_Role(),
        ];

        //Renouveller le cookie pour une semaine
        setcookie('JUID', $utilisateur_cookie->getId_Utilisateur().'::'.password_hash($info, PASSWORD_DEFAULT), time() + 60*60*24*7, null, null, false, true);
    } else {
        //Detruire le cookie
        setcookie('JUID', '', time() - 3600, null, null, false, true);
    }

}
//Regarde si l'utilisateur existe encore sinon deconnecter du site
if(isset($_SESSION['utilisateur'])){
    $utilisateur_session = new Utilisateur();
    $utilisateur_session = $utilisateur_session->getItem('id_utilisateur',$_SESSION['utilisateur']['id_utilisateur']);
    if (!$utilisateur_session || $utilisateur_session->getBanni_Utilisateur() === '1')
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
