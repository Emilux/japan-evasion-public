<?php

$follow = new Follow();
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
            echo json_encode($follower); 
        }
              
        
    }
}



       
        
    
        
                
       




   
        