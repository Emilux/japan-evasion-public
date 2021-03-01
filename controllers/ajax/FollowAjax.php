<?php

$follow = new Follow();
$notification = new Notification();

if(isset($_GET['id_followed'])){
    $follow->setId_Follower($_SESSION['utilisateur']['id_utilisateur']);
    $follow->setId_Followed($_GET['id_followed']);
    
    
    if(isset($_SESSION['utilisateur'])){
        $isFollowed = $follow->Count('','','id_follower = '.$follow->getId_Follower().' AND '.' id_followed = '.$follow->getId_Followed());
        if($isFollowed > 0){
            $deleted = $follow->delete('','id_follower = '.$follow->getId_Follower().' AND '.' id_followed = '.$follow->getId_Followed());
            if($deleted){
                $nbFollower = $follow->Count('','','id_followed = '.$follow->getId_Followed());
                $data['success'] = TRUE;
                $data['message'] = 'SUIVRE';
                $data['count'] = $nbFollower;
            } else {
                $data['success'] = FALSE;
            }
            
            echo json_encode($data); 
        } else {
            $follower = $follow->doFollow();

            //Données de la notification
            $dataSend['contenu_notification'] = "<a href='?page=profiles&utilisateur=".$_SESSION['utilisateur']['pseudo_visiteur']."'>".$_SESSION['utilisateur']['pseudo_visiteur']."</a> vous suit.";
            $dataSend['statut_article'] = 0;
            $dataSend['id_utilisateur'] = $_GET['id_followed'];

            //Verfirier si la notification est déjà envoyé
            $existNotification = $notification->Count('','','id_utilisateur = '.$_GET['id_followed'].' AND contenu_notification = "'.$dataSend['contenu_notification'].'"');

            //Créer la notification au follow
            if ($existNotification === "0"){
                $notification = $notification->Add($dataSend);
            }

            echo json_encode($follower);
        }
              
        
    }
}



       
        
    
        
                
       




   
        