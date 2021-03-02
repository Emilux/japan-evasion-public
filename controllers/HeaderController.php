<?php
$article_header = new Article();
$notification_header = new Notification();
$utilisateur_header = new Utilisateur();
$article_header = $article_header->getList('5', 'DESC','date_publication_article', '*', 'statut_article != "PENDING"');


if (isset($_SESSION['utilisateur'])){
    $utilisateur_header = $utilisateur_header->getItem('id_utilisateur',$_SESSION['utilisateur']['id_utilisateur']);
    $nbNotif = $notification_header->Count('','','id_utilisateur = '.$_SESSION['utilisateur']['id_utilisateur'].' AND statut_notification = 0');
    $notifications_header = $notification_header->getList(null, 'DESC','id_notification', '*', 'id_utilisateur = '.$_SESSION['utilisateur']['id_utilisateur'].' AND statut_notification = 0');
    $smarty->assign('sessionUtilisateur', $_SESSION['utilisateur']);
    if ($notifications_header){
        $smarty->assign('notifications_header', $notifications_header);
    }

    $smarty->assign('nbNotif_header', $nbNotif);
}


$smarty->assign(array(
    'article_header' => $article_header,
    'utilisateur_header' => $utilisateur_header,
    'connecte_header'=> isset($_SESSION['utilisateur']),
));
