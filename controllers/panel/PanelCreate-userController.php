<?php
$smarty->assign('page', 'panelCreate-user');

$utilisateur = new Utilisateur();


if (isset ($_POST['submit_utilisateur'])) {

    $pseudo_visiteur = $Utils->valid_donnees($_POST['pseudo_visiteur']);
    $email_visiteur = $Utils->valid_donnees($_POST['email_visiteur']);
    $prenom_utilisateur = $Utils->valid_donnees($_POST['prenom_utilisateur']);
    $nom_utilisateur = $Utils->valid_donnees($_POST['nom_utilisateur']);
    $date_naissance_utilisateur = $Utils->valid_donnees($_POST['date_naissance_utilisateur']);
    $mdp_utilisateur = $Utils->valid_donnees($_POST['mdp_utilisateur']);



    var_dump($_FILES);
            
        if($_FILES['avatar_utilisateur']['error'] == 0){
            $resultat = move_uploaded_file($_FILES['avatar_utilisateur']['tmp_name'], '../assets/media/avatar/'.$_FILES['avatar_utilisateur']['name']);
            
            
            $utilisateur->setAvatar_Utilisateur('./assets/media/avatar/'.$_FILES['avatar_utilisateur']['name']);

            if(!$resultat){
                $smarty->assign('error', 'Une erreur est survenue lors du déplacement du fichier');
            }

        }
        else{

            $utilisateur->setAvatar_Utilisateur("https://eu.ui-avatars.com/api/?background=1e1e1e&color=ffffff&length=1&bold=true&size=128&name=".$pseudo_visiteur);

            $smarty->assign('error', 'Une erreur est survenu lors de l\'upoload sur le serveur');
        }
        
    

       



    
    
    $utilisateur->setPseudo_Visiteur($pseudo_visiteur);
    $utilisateur->setEmail_Visiteur($email_visiteur);
    $utilisateur->setPrenom_Utilisateur($prenom_utilisateur);
    $utilisateur->setNom_Utilisateur($nom_utilisateur);
    $utilisateur->setMdp_Utilisateur(password_hash($mdp_utilisateur,PASSWORD_DEFAULT));
    $utilisateur->setDate_Naissance_Utilisateur($date_naissance_utilisateur);
    $utilisateur->setId_Role('membre');

    $utilisateur = $utilisateur->creerUtilisateur();




}