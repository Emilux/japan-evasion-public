<?php
if (isset($_POST['creer_compte'])){
    $utilisateur = new Utilisateur();
    $data = [];
    $errorConnexion = [];
    if (isset($_POST['email_utilisateur']) && isset($_POST['pseudo_utilisateur']) &&
        isset($_POST['mdp_utilisateur']) && isset($_POST['mdp_utilisateur_confirmation'])){

        //Nettoyage des entrés
        $pseudo_utilisateur = $Utils->valid_donnees($_POST['pseudo_utilisateur']);
        $email_utilisateur = $Utils->valid_donnees($_POST['email_utilisateur']);
        $mdp_utilisateur = $Utils->valid_donnees($_POST['mdp_utilisateur']);
        $mdp_utilisateur_confirmation = $Utils->valid_donnees($_POST['mdp_utilisateur_confirmation']);

        //Check si le pseudo n'est pas vide et fait le bon nombres de caractères
        if(!empty($pseudo_utilisateur) && strlen($pseudo_utilisateur) <= 20 && strlen($pseudo_utilisateur) >= 3){

            //Check si le pseudo est au bon format
            if(preg_match("/^[A-Za-z0-9-_]*$/", $pseudo_utilisateur)){
                $checkPseudo = $utilisateur->getItem('pseudo_visiteur',$pseudo_utilisateur);
                //Check si le pseudo existe déjà
                if ($checkPseudo){
                    $errorConnexion[] = "Ce nom d'utilisateur est déjà utilisé";
                }
            } else {
                $errorConnexion[] = "Seule les lettres, chiffres et underscore (_) sont acceptés";
            }

        } else {
            $data['emptyPseudo'] = true;
            $errorConnexion[] = "Veuillez entrer un pseudo qui fait moins de 20 et plus de 3 caractères.";
        }

        if (!empty($email_utilisateur) && strlen($pseudo_utilisateur) <= 50){
            if(filter_var($email_utilisateur, FILTER_VALIDATE_EMAIL)){
                $checkEmail = $utilisateur->getItem('email_visiteur',$email_utilisateur);
                //Check si l'email existe déjà
                if ($checkEmail){
                    $errorConnexion[] = "Cette adresse email est déjà utilisée";
                }

            } else {
                $errorConnexion[] = "L'adresse e-mail n'est pas valide.";
            }
        } else {
            $data['emptyMail'] = true;
            $errorConnexion[] = "Veuillez entrer une email qui fait moins de 50 caractères.";
        }


        if (empty($mdp_utilisateur) || strlen($mdp_utilisateur) < 8 || strlen($mdp_utilisateur) > 50 || !preg_match("/^\S*(?=\S*[a-z])(?=\S*[!+@#$%^&*(),.?\":{}|<>])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$mdp_utilisateur)) {
            $data['emptyMdp'] = true;
            $errorConnexion[] = "Veuillez entrer un mot de passe de plus de 8 caractères et moins de 50 caractères, contenant au moins une majuscule, une minuscule, un nombre et un caractère spécial";
        }

        if (!empty($mdp_utilisateur_confirmation)){
            if ($mdp_utilisateur !== $mdp_utilisateur_confirmation){
                $errorConnexion[] = "Votre mot de passe de confirmation et votre mot de passe ne correspondent pas.";
            }

        } else {
            $data['emptyMdp_conf'] = true;
            $errorConnexion[] = "Veuillez confirmer votre mot de passe.";
        }

        if (!isset($_POST['cgu'])){
            $data['emptyCheckCgu'] = true;
            $errorConnexion[] = "Veuillez accepter les conditions générales d'utilisation.";
        }

    } else {
        $errorConnexion[]="Une erreur est survenue";
    }

    if (!empty($errorConnexion)){
        $data['success'] = false;
        $data['message'] = $errorConnexion;
    } else {
        $data['success'] = true;
        $data['message'] = $pseudo_utilisateur;
        $visiteur = new visiteur();
        $utilisateur = new Utilisateur();

        if (isset($_POST['newsletter_utilisateur'])){
            $utilisateur->setNewsletter_Visiteur(1);
        } else {
            $utilisateur->setNewsletter_Visiteur(0);
        }

        //SETTERS
        $utilisateur->setPseudo_Visiteur($pseudo_utilisateur);
        $utilisateur->setEmail_Visiteur($email_utilisateur);
        $utilisateur->setAvatar_Utilisateur("https://eu.ui-avatars.com/api/?background=1e1e1e&color=ffffff&length=1&bold=true&size=128&name=".$utilisateur->getPseudo_Visiteur());
        $utilisateur->setMdp_Utilisateur(password_hash($mdp_utilisateur, PASSWORD_DEFAULT));
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
        } else {
            $data['success'] = false;
            $data['message'] = 'erreur lors de la création du compte.';
        }
    }

    echo json_encode($data);

}






//test si le formulaire de connexion a été envoyé
if(isset($_POST['connexion'])){
    $data = [];
    if (!isset($_SESSION['utilisateur'])){
        $errorConnexion = [];
        //Vérifier que l'email et le mot de passe sont bien envoyé dans la requête post
        if (isset($_POST['email_utilisateur']) && isset($_POST['mdp_utilisateur'])) {

            //Récuperer l'adresse mail entrée dans le formulaire et la nettoier
            $mail = $Utils->valid_donnees($_POST['email_utilisateur']);

            //Récuperer le mot de passe entrée dans le formulaire et la nettoier
            $mdp = $Utils->valid_donnees($_POST['mdp_utilisateur']);

            //Vérifier que l'email et le mot de passe sont bien remplient
            if (!empty($mail)){
                if (!empty($mdp)){
                    $utilisateur = new Utilisateur();

                    $utilisateur = $utilisateur->getItem('email_visiteur', $mail);

                    //Vérifier si l'email existe dans la table visiteur
                    if ($utilisateur){

                        //Vérifier que le mot de passe entré et celui de l'utilisateur correspondent
                        if (password_verify($mdp,$utilisateur->getMdp_Utilisateur()) && empty($errorConnexion)){

                            $utilisateur = new Utilisateur();

                            $utilisateur = $utilisateur->getItem('email_visiteur', $mail);

                            $role = new Role();
                            $role = $role->getItem('id_role',$utilisateur->getId_role());

                            if (isset($_POST['reste_connecte'])){
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

                            $data['success'] = true;
                            $data['message'] = $utilisateur->getPseudo_Visiteur();

                        } else {
                            $errorConnexion[] = "Le mot de passe ne correspond pas à ".$mail.".";
                        }

                    } else {
                        $errorConnexion[] = "Cette e-mail n'existe pas.";
                    }
                } else {
                    $errorConnexion[] = "Veuillez saisir un mot de passe.";
                }

            } else {
                $errorConnexion[] = "Veuillez entrer une adresse e-mail.";
            }

        } else {
            $errorConnexion[] = "Une erreur est survenue.";
        }

        if (!empty($errorConnexion)){
            $data['success'] = false;
            $data['message'] = $errorConnexion;
        }

    } else {
        $data['success'] = false;
        $data['message'] = 'Vous êtes déjà connecté';
    }
    echo json_encode($data);
}