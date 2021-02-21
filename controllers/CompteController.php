<?php
//test si le formulaire de création de compte a été envoyé

/*if (isset($_POST['creer_compte'])){
    //check if email is empty
    if (isset($_POST['email_utilisateur']) && !empty($_POST['email_utilisateur'])) {
        $email=mysqli_real_escape_string($dbh,trim($_POST['email_utilisateur']));
    }else{
        $empty_email="Email cannot be empty.";
        echo $empty_email.'<br>';
    }
    //check if pseudo is empty
    if (isset($_POST['pseudo_utilisateur']) && !empty($_POST['pseudo_utilisateur'])) {
        $username=mysqli_real_escape_string($dbh,trim($_POST['pseudo_utilisateur']));
    }else{
        $empty_username="Username Cannot be empty.";
        echo $empty_username.'<br>';
    }
    //check if password is empty or confirm password is empty
    if (isset($_POST['mdp_utilisateur']) && !empty($_POST['mdp_utilisateur'])) {
        $psw=mysqli_real_escape_string($dbh,trim($_POST['mdp_utilisateur']));
    }else{
        $empty_password="Password cannot be empty";
        echo $empty_password.'<br>';
    }
    //or confirm password is empty
    if (isset($_POST['mdp_utilisateur_confirmation']) && !empty($_POST['mdp_utilisateur_confirmation'])) {
        $repsw=mysqli_real_escape_string($dbh,trim($_POST['mdp_utilisateur_confirmation']));
    }else{
        $empty_repassword="Retype password cannot be empty";
        echo $empty_repassword.'<br>';
    }

    //check if password dosn't match
    if ($_POST["mdp_utilisateur"] === $_POST["mdp_utilisateur_confirmation"]){
        echo 'success';
    }else{
        echo'failed';
    }


}*/
  

if (isset($_POST['creer_compte'])){
    if (isset($_POST['email_utilisateur']) || isset($_POST['pseudo_utilisateur']) ||
        isset($_POST['mdp_utilisateur']) || isset($_POST['mdp_utilisateur_confirmation'])){
        if(empty($_POST['email_utilisateur']) || empty($_POST['pseudo_utilisateur']) ||
            empty($_POST['mdp_utilisateur']) || empty($_POST['mdp_utilisateur_confirmation'])){
            header('Location: ./?creer_compte=emtpty#exampleModal');
            exit();
        } else {
            if(!preg_match("/^[A-Za-z0-9]*$/", $_POST['pseudo_utilisateur'])){
                header('Location: ./?creer_compte=char#exampleModal');
                exit();
            }else {
                if(!filter_var($_POST['email_utilisateur'], FILTER_VALIDATE_EMAIL)){
                    header('Location: ./?creer_compte=email#exampleModal');
                    exit();
                }else {
                    if ($_POST["mdp_utilisateur"] != $_POST["mdp_utilisateur_confirmation"]){
                        header('Location: ./?creer_compte=unsuccess#exampleModal');
                        exit();
                    }else{
                        $visiteur = new visiteur();
                        $utilisateur = new Utilisateur();
                        if (isset($_POST['newsletter_utilisateur']) && $_POST['newsletter_utilisateur'] === 'on'){
                            $utilisateur->setNewsletter_Visiteur(1);
                        } else {
                            $utilisateur->setNewsletter_Visiteur(0);
                        }

                        //SETTERS
                        $utilisateur->setPseudo_Visiteur($_POST['pseudo_utilisateur']);
                        $utilisateur->setEmail_Visiteur($_POST['email_utilisateur']);
                        $utilisateur->setAvatar_Utilisateur("https://eu.ui-avatars.com/api/?background=1e1e1e&color=ffffff&length=1&bold=true&size=128&name=".$utilisateur->getPseudo_Visiteur());
                        $utilisateur->setMdp_Utilisateur(password_hash($_POST['mdp_utilisateur'], PASSWORD_DEFAULT));
                        $utilisateur->setId_Role('membre');

                        if ($utilisateur->creerCompte()){
                            $role = new Role();

                            $utilisateur = $utilisateur->getItem('visiteur.id_visiteur', $utilisateur->getId_Visiteur());
                            $role = $role->getItem('id_role',$utilisateur->getId_role());

                            //Creer la session et rediriger vers la page d'edition du profil
                            $_SESSION['utilisateur'] = [
                                'id_utilisateur' => $utilisateur->getId_Utilisateur(),
                                'id_visiteur' => $utilisateur->getId_Visiteur(),
                                'pseudo_visiteur' => $utilisateur->getPseudo_Visiteur(),
                                'email_visiteur' => $utilisateur->getEmail_Visiteur(),
                                'banni_utilisateur' => 0,
                                'role' => $role->getNom_Role(),
                            ];
                            header('Location: ./?page=profiles&utilisateur='.$utilisateur->getPseudo_Visiteur());
                            exit();
                        } else {
                            echo 'erreur lors de la création de votre compte visiteur';
                        }
                    }
                }
            }
        }
    } else {
        header('Location: ./#exampleModal');
        exit();
    }

}






//test si le formulaire de connexion a été envoyé
if(isset($_POST['connexion'])){
    if (!isset($_SESSION['utilisateur'])){
        //Vérifier que l'email et le mot de passe sont bien envoyé dans la requête post
        if (isset($_POST['email_utilisateur']) && isset($_POST['mdp_utilisateur'])) {

            //Récuperer l'adresse mail entrée dans le formulaire et la nettoier
            $mail = trim(strip_tags($_POST['email_utilisateur']));

            //Récuperer le mot de passe entrée dans le formulaire et la nettoier
            $mdp = trim(strip_tags($_POST['mdp_utilisateur']));

            //Vérifier que l'email et le mot de passe sont bien remplient
            if (!empty($mail)){
                if (!empty($mdp)){
                    $utilisateur = new Utilisateur();

                    $utilisateur = $utilisateur->getItem('email_visiteur', $mail);

                    //Vérifier si l'email existe dans la table visiteur
                    if ($utilisateur){

                        //Vérifier que le mot de passe entré et celui de l'utilisateur correspondent
                        if (password_verify($mdp,$utilisateur->getMdp_Utilisateur())){

                            $role = new Role();
                            $role = $role->getItem('id_role',$utilisateur->getId_role());

                            if (isset($_POST['reste_connecte']) && $_POST['reste_connecte'] === 'on'){
                                //Creer un cookie avec un ID unique
                                setcookie('JUID', $utilisateur->getId_Utilisateur().'::'.password_hash($utilisateur->getPseudo_Visiteur().$utilisateur->getEmail_Visiteur().$utilisateur->getMdp_Utilisateur().$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT'].$_SERVER['HTTP_ACCEPT_ENCODING'].$_SERVER['HTTP_ACCEPT_LANGUAGE'], PASSWORD_DEFAULT), time() + 60*60*24*7, null, null, false, true);
                            }

                            //Creer la session et rediriger vers la page d'edition du profil
                            $_SESSION['utilisateur'] = [
                                'id_utilisateur' => $utilisateur->getId_Utilisateur(),
                                'id_visiteur' => $utilisateur->getId_Visiteur(),
                                'pseudo_visiteur' => $utilisateur->getPseudo_Visiteur(),
                                'email_visiteur' => $utilisateur->getEmail_Visiteur(),
                                'banni_utilisateur' => $utilisateur->getBanni_Utilisateur(),
                                'role' => $role->getNom_Role(),
                            ];
                            header('Location: ./?page=profiles&utilisateur='.$utilisateur->getPseudo_Visiteur());
                            exit();
                        } else {
                            echo 'wrong mdp';
                        }

                    }
                }

            }

        } else {

        }
    } else {
        echo 'deja co';
    }

}