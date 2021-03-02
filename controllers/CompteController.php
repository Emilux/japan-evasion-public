<?php

if(isset($_POST['submit_reinitialisation'])){
    
    $utilisateur = new Utilisateur();

    $emailUtilisateur = $Utils->valid_donnees($_POST['email_utilisateur']);

    $getUtilisateur = $utilisateur->getList(null, 'DESC', 'email_visiteur', '*' ,'email_visiteur = "'.$emailUtilisateur.'"');

    $emailExiste = false;


    foreach($getUtilisateur as $value){

        

        $estUtilisateur = $utilisateur->getItem('visiteur.id_visiteur',$value->getId_Visiteur());

        if ($estUtilisateur){

            $emailExiste = true;
            $id_User = $estUtilisateur->getId_Utilisateur();
            break;
        } 

    } 
    
    if ($emailExiste) {

        $passwordGenerated =  $Utils->randomPassword();
        $data['mdp_utilisateur'] = password_hash($passwordGenerated,PASSWORD_DEFAULT);
        $newPassword = $utilisateur->Update($data, $id_User);
       
        if ($newPassword) {
        
            $mailTo = $emailUtilisateur;
            $headers = 'From: no-reply@japan-evasion.com';
            
            $subject = 'Réinitialisation de mot de passe - Votre nouveau mot de passe';

            $txt = "Voici votre nouveau mot de passe : \n".$passwordGenerated;

            mail($mailTo, $subject, $txt, $headers); 
            
        }
      
    } 
}

