<?php

$follow = new Follow();
$follow->setId_Follower($_SESSION['utilisateur']['id_utilisateur']);
$follow->setId_Followed($_GET['id_followed']);


if(isset($_SESSION['utilisateur'])){

    $follower = $follow->doFollow();       
    echo json_encode($follower); 
}


       
        
    
        
                
       




   
        