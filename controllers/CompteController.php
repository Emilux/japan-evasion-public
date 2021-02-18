<?php



$utilisateur = new Utilisateur();
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
    if(empty($_POST['email_utilisateur']) || empty($_POST['pseudo_utilisateur']) || 
    empty($_POST['mdp_utilisateur']) || empty($_POST['mdp_utilisateur_confirmation'])){
        header('Location: ./?creer_compte=emtpty');
        exit();
    } else {
        if(!preg_match("/^[A-Za-z0-9]*$/", $_POST['pseudo_utilisateur'])){
            header('Location: ./?creer_compte=char'); 
            exit();
        }else {
            if(!filter_var($_POST['email_utilisateur'], FILTER_VALIDATE_EMAIL)){
                header('Location: ./?creer_compte=email'); 
                exit();  
            }else {
                if ($_POST["mdp_utilisateur"] != $_POST["mdp_utilisateur_confirmation"]){
                    header('Location: ./?creer_compte=unsuccess');
                    exit();
                }else{
                    $utilisateur->setPseudo_Utilisateur($_POST['pseudo_utilisateur']);
                    $utilisateur->setEmail_Utilisateur($_POST['email_utilisateur']);
                    $utilisateur->setMdp_Utilisateur(password_hash($_POST['mdp_utilisateur'], PASSWORD_DEFAULT));
                    $utilisateur->creerCompte('membre');
                    header('Location: ./?creer_compte=success');
                }
            }
        }
    }
}






//test si le formulaire de connexion a été envoyé
if(isset($_POST['connexion'])){
    if (!isset($_SESSION['utilisateur'])){
        //Vérifier que l'email et le mot de passe sont bien envoyé dans la requête post
        if (isset($_POST['email_utilisateur']) && $_POST['mdp_utilisateur']) {

            //Récuperer l'adresse mail entrée dans le formulaire et le nettoie
            $mail = trim(strip_tags($_POST['email_utilisateur']));

            //Récuperer le mot de passe entrée dans le formulaire et le nettoie
            $mdp = trim(strip_tags($_POST['mdp_utilisateur']));

            //Vérifier que l'email et le mot de passe sont bien remplient
            if (!empty($mail)){
                if (!empty($mdp)){
                    //Vérifier si l'email existe dans la table utilisateur
                    if ($utilisateur->verifierEmail($mail)){

                        //récupèrer l'utilisateur ayant l'email correspondentent
                        $utilisateur = $utilisateur->getUtilisateurByEmail($mail);

                        //Vérifier que le mot de passe entré et celui de l'utilisateur correspondent
                        if (password_verify($mdp,$utilisateur->getMdp_Utilisateur())){
                            //Creer la session et rediriger vers la page d'edition du profil
                            $_SESSION['utilisateur'] = [
                                'id_utilisateur' => $utilisateur->getId_Utilisateur(),
                                'pseudo_utilisateur' => $utilisateur->getPseudo_Utilisateur(),
                                'email_utilisateur' => $utilisateur->getEmail_Utilisateur(),
                                'banni_utilisateur' => $utilisateur->getBanni_Utilisateur(),
                                'role' => $utilisateur->getNameRole($utilisateur->getId_Role()),
                            ];
                            header('Location: ./?page=profiles');
                            exit();
                        } else {
                            echo 'wrong mdp';
                            var_dump($utilisateur->getMdp_Utilisateur());
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