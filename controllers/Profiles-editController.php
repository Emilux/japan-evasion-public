<?php

$smarty->assign('page', 'profiles-edit');

if(isset($_SESSION['utilisateur'])){

    //Appel à la classe Utilisateur et Visiteur
    $utilisateur = new Utilisateur();


    //récupérer le contenu de l'utilisateur visionné
    $utilisateur = $utilisateur->getItem('pseudo_visiteur',$_SESSION['utilisateur']['pseudo_visiteur']);

    //afficher l'article si il est publié et s'il est NEW l'affiché que au utilisateur connectés
    if($utilisateur){

        $smarty->assign(array(
            'utilisateur' => $utilisateur,
            'connecte' => isset($_SESSION['utilisateur'])
        ));

        
        if(isset($_POST['submit_update'])){

            //vérifier les entreés
            
            $data = $_POST;

            if($_FILES['avatar_utilisateur']['error'] == 0){
                $resultat = move_uploaded_file($_FILES['avatar_utilisateur']['tmp_name'], './assets/media/avatar/'.$_FILES['avatar_utilisateur']['name']);
                
                
                $image = new Image();
                $image->resizeImage('./assets/media/avatar/'.$_FILES['avatar_utilisateur']['name'], 200, $_FILES['avatar_utilisateur']['name']);
        
                
                $data['avatar_utilisateur'] = './assets/media/avatar/'.$_FILES['avatar_utilisateur']['name'];
                
                if(!$resultat){
                    $smarty->assign('error', 'Une erreur est survenue lors du déplacement du fichier');
                }

            }
            else{
                $smarty->assign('error', 'Une erreur est survenu lors de l\'upoload sur le serveur');
            }

            //UPDATE DE L'UTILISATEUR (ajouter update inner visiteur)
            $utilisateur->Update($data, $_SESSION['utilisateur']['id_visiteur']);

        }

            //CHANGER MOT DE PASSE
            if(isset($_POST['submit_password'])){
                $utilisateur_password = $utilisateur->getItem('id_utilisateur', $utilisateur->getId_Utilisateur(),'mdp_utilisateur');
                $password = password_verify($_POST['mdp_utilisateur'], $utilisateur_password->getMdp_Utilisateur());
                if($password){
                    if($_POST['new_mdp_utilisateur'] === $_POST['confirmation_mdp_utilisateur']){

                        $data['mdp_utilisateur'] = password_hash($_POST['new_mdp_utilisateur'], PASSWORD_DEFAULT);
                        $utilisateur->update($data, $utilisateur->getId_Utilisateur());


                    } else {
                        echo ('movéz confirmazion modepas');
                    }

                } else {
                    echo ('rongue modepas');
                }
            }
 
    }
    else {
        header('Location: ./#exampleModal');
        exit();
    }
    
} else {
    header('Location: ./');
    exit();
}

