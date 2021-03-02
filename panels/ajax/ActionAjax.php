<?php
$dataSend=[];

//Le modérateur et l'administrateur peuvent bannir,promouvoir ou retrograder des utilisateur
if ($_SESSION['utilisateur']['role'] === "administrateur" || $_SESSION['utilisateur']['role'] === "moderateur") {
    if (isset($_POST['bannir'])) {
        $dataSend = [];
        $utilisateur = new Utilisateur();
        $role = new Role();

        $id_utilisateur = $Utils->valid_donnees($_POST['id_utilisateur']);
        $roleIdUtilisateur = $utilisateur->getItem('id_utilisateur', $id_utilisateur)->getId_Role();
        $roleUtilisateur = $role->getItem('id_role', $roleIdUtilisateur)->getNom_Role();
        if ($roleUtilisateur && ($_SESSION['utilisateur']['role'] === "moderateur" && $roleUtilisateur === "administrateur") || ($_SESSION['utilisateur']['role'] === "moderateur" && $roleUtilisateur === "moderateur") ){
            $data['success'] = FALSE;
            $data['message'] = 'vous ne pouvez pas bannir un administrateur ou un modérateur en tant que modérateur';
        } else {
            $checkBan = $utilisateur->Count('', '', 'id_utilisateur = ' . $id_utilisateur . ' AND banni_utilisateur = 1');

            if ($checkBan !== "0") {
                $dataSend['banni_utilisateur'] = "0";
                $msg = "non banni";
            } else {
                $dataSend['banni_utilisateur'] = "1";
                $msg = "banni";
            }

            $estBanni = $utilisateur->Update($dataSend, $id_utilisateur);
            if ($estBanni) {
                $data['success'] = TRUE;
                $data['message'] = $msg;
                $data['id'] = $id_utilisateur;
            } else {
                $data['success'] = FALSE;
                $data['message'] = 'erreur';
            }
        }

        echo json_encode($data);
    }

    if (isset($_POST['promouvoir'])) {
        $dataSend = [];
        $utilisateur = new Utilisateur();
        $role = new Role();

        $id_utilisateur = $Utils->valid_donnees($_POST['id_utilisateur']);
        $roleIdUtilisateur = $utilisateur->getItem('id_utilisateur', $id_utilisateur)->getId_Role();
        $roleUtilisateur = $role->getItem('id_role', $roleIdUtilisateur)->getNom_Role();

        if ($roleUtilisateur && ($_SESSION['utilisateur']['role'] === "moderateur" && $roleUtilisateur === "redacteur") || ($_SESSION['utilisateur']['role'] === "moderateur" && $roleUtilisateur === "moderateur") ){
            $data['success'] = FALSE;
            $data['message'] = 'vous ne pouvez pas promouvoir un administrateur ou un modérateur en tant que modérateur';
        } else {
            //Set grade au dessus en fonction du role de l'utilisateur
            switch ($roleUtilisateur) {
                case "administrateur":
                    break;
                case "moderateur":
                    $dataSend['id_role'] = $role->getItem('nom_role', 'administrateur')->getId_Role();
                    $msg = 'administrateur';
                    break;
                case "redacteur":
                    $dataSend['id_role'] = $role->getItem('nom_role', 'moderateur')->getId_Role();
                    $msg = 'moderateur';
                    break;
                case "membre":
                    $dataSend['id_role'] = $role->getItem('nom_role', 'redacteur')->getId_Role();
                    $msg = 'redacteur';
                    break;
                default:
                    $data['success'] = FALSE;
                    $data['message'] = 'failed';
            }

            //Si il y a un role plus haut
            if (!empty($dataSend)) {
                $estPromu = $utilisateur->Update($dataSend, $id_utilisateur);
            } else {
                $estPromu = false;
                $data['success'] = FALSE;
                $data['message'] = 'failed';
            }

            if ($estPromu) {
                $data['success'] = TRUE;
                $data['message'] = $msg;
                $data['role'] = $_SESSION['utilisateur']['role'];
                $data['id'] = $id_utilisateur;
            } else {
                $data['success'] = FALSE;
                $data['message'] = 'erreur';
            }
        }


        echo json_encode($data);
    }

    if (isset($_POST['retrograder'])) {
        $dataSend = [];
        $utilisateur = new Utilisateur();
        $role = new Role();

        $id_utilisateur = $Utils->valid_donnees($_POST['id_utilisateur']);
        $roleIdUtilisateur = $utilisateur->getItem('id_utilisateur', $id_utilisateur)->getId_Role();
        $roleUtilisateur = $role->getItem('id_role', $roleIdUtilisateur)->getNom_Role();
        if ($roleUtilisateur && ($_SESSION['utilisateur']['role'] === "moderateur" && $roleUtilisateur === "administrateur") || ($_SESSION['utilisateur']['role'] === "moderateur" && $roleUtilisateur === "moderateur") ){
            $data['success'] = FALSE;
            $data['message'] = 'vous ne pouvez pas retrograder un administrateur ou un modérateur en tant que modérateur';
        } else {
            //Set grade au dessus en fonction du role de l'utilisateur
            switch ($roleUtilisateur) {
                case "membre":
                    break;
                case "redacteur":
                    $dataSend['id_role'] = $role->getItem('nom_role', 'membre')->getId_Role();
                    $msg = 'membre';
                    break;
                case "moderateur":
                    $dataSend['id_role'] = $role->getItem('nom_role', 'redacteur')->getId_Role();
                    $msg = 'redacteur';
                    break;
                case "administrateur":
                    $dataSend['id_role'] = $role->getItem('nom_role', 'moderateur')->getId_Role();
                    $msg = 'moderateur';
                    break;
                default:
                    $data['success'] = FALSE;
                    $data['message'] = 'failed';
            }

            //Si il y a un role plus haut
            if (!empty($dataSend)) {
                $estPromu = $utilisateur->Update($dataSend, $id_utilisateur);
            } else {
                $estPromu = false;
                $data['success'] = FALSE;
                $data['message'] = 'failed';
            }

            if ($estPromu) {
                $data['success'] = TRUE;
                $data['message'] = $msg;
                $data['role'] = $_SESSION['utilisateur']['role'];
                $data['id'] = $id_utilisateur;
            } else {
                $data['success'] = FALSE;
                $data['message'] = 'erreur';
            }
        }


        echo json_encode($data);
    }

    if (isset($_POST['validArticle'])){
        $dataSend=[];

        $article = new Article();

        $id_article = $Utils->valid_donnees($_POST['id_article']);
        $articleData = $article->getItem('id_article',$id_article);
        if ($articleData && $articleData->getStatut_Article() === "PENDING"){
            $dataSend['statut_article'] = 'NEW';
            $msg = 'new';
        } else {
            $dataSend['statut_article'] = 'PENDING';
            $msg = 'pending';
        }

        if (!empty($dataSend)) {
            $estValid = $article->Update($dataSend, $id_article);
        } else {
            $estValid = false;
            $data['success'] = FALSE;
            $data['message'] = 'failed';
        }

        if ($estValid){
            $data['success'] = TRUE;
            $data['message'] = $msg;
            $data['id'] = $id_article;
        } else {
            $data['success'] = FALSE;
            $data['message'] = 'erreur';
        }

        echo json_encode($data);
    }

}

//Seul un administrateur peut supprimer un utilisateur
if ($_SESSION['utilisateur']['role'] === "administrateur"){
    if (isset($_POST['supprimer'])){
        $dataSend=[];
        $utilisateur = new Utilisateur();
        $visiteur = new Visiteur();

        $id_utilisateur = $Utils->valid_donnees($_POST['id_utilisateur']);

        $id_visiteur = $utilisateur->getItem('id_utilisateur',$id_utilisateur,'visiteur.id_visiteur')->getId_Visiteur();

        $estSuppr = $visiteur->Delete($id_visiteur);
        if ($estSuppr){
            $data['success'] = TRUE;
            $data['message'] = 'supprimé';
            $data['id'] = $id_utilisateur;
        } else {
            $data['success'] = FALSE;
            $data['message'] = 'erreur';
        }

        echo json_encode($data);
    }
}
