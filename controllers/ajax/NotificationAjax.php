<?php
if (isset($_SESSION['utilisateur'])){
    $notification = new Notification();
    $getNotification = $notification->getList(null, 'DESC','id_notification', '*', 'id_utilisateur = '.$_SESSION['utilisateur']['id_utilisateur'].' AND statut_notification = 0');
    $data = [];
    foreach ($getNotification as $notif){
        $dataSend['statut_notification'] = "1";
        $notification = $notification->Update($dataSend,$notif->getId_Notification());
        if (!$notification){
            $data['success'] = false;
            break;
        }
        $data['success'] = true;
    }


    echo json_encode($data);
}
