<?php
$utilisateur = new Utilisateur();
//test si le formulaire de création de compte a été envoyé
if (isset($_POST['creer_compte'])){
    $utilisateur->setPseudo_Utilisateur($_POST['pseudo_utilisateur']);
    $utilisateur->setEmail_Utilisateur($_POST['email_utilisateur']);
    $utilisateur->setMdp_Utilisateur(password_hash($_POST['mdp_utilisateur'], PASSWORD_DEFAULT));
    $utilisateur->creerCompte('membre');
}

if (isset($_POST['connexion'])){


}

//test si le formulaire de connexion a été envoyé
if(isset($_POST['connexion'])){
    if (!isset($_SESSION['utilisateur'])){
        //Vérifier que l'email et le mot de passe sont bien envoyé dans la requête post
        if (isset($_POST['pseudo_utilisateur']) && $_POST['mdp_utilisateur']) {

            //Récuperer l'adresse mail entrée dans le formulaire et le nettoie
            $mail = trim(strip_tags($_POST['pseudo_utilisateur']));

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
                            header('Location: http://www.example.com/');
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