<?php
if (isset($_POST['plusArticle'])){
    $data = [];
    $data['article'] = [];
    $article = new Article();
    $row = $Utils->valid_donnees($_POST['row']);
    $rowToShow = 6;
    $limit = 0;
    $listArticle = $article->Count(null,null,'statut_article != "PENDING');


    if (intval($row) >= $listArticle){
        $data['success'] = false;
        echo json_encode($data);
        exit();
    }

    $listArticle = $article->getList($row.','.$rowToShow,'DESC','date_publication_article','*','statut_article != "PENDING"');
    if ($listArticle){
        foreach ($listArticle as $value){
            array_push($data['article'],
                [
                    'id'=>$value->getId_Article(),
                    'pseudo'=>$value->getPseudo_Visiteur(),
                    'titre'=>$value->getTitre_Article(),
                    'contenu'=>$value->getContenu_Article(),
                    'cover'=>$value->getPhoto_Article(),
                ]
            );
        }

        $data['success'] = true;

    } else {
        $data['success'] = false;
    }
    echo json_encode($data);



}

if (isset($_POST['plusCommentaire'])){
    $data = [];
    $data['commentaire'] = [];

    //Appel classes
    $commentaire = new Commentaire();
    $role = new Role();
    $aime_commentaire = new Aime_Commentaire();
    $reponse_de = new Reponse_de();



    $row = $Utils->valid_donnees($_POST['row']);
    $id_article = $Utils->valid_donnees($_POST['id_article']);
    $rowToShow = 5;
    $limit = 0;
    $listCommentaire = $commentaire->Count('id_article',$id_article);


    if (intval($row) >= $listCommentaire){
        $data['success'] = false;
        echo json_encode($data);
        exit();
    }

    $listCommentaire = $commentaire->getList($row.','.$rowToShow,'DESC','datetime_commentaire','*','id_article ='.$id_article);
    if ($listCommentaire){
        foreach ($listCommentaire as $value){

            $reponse = $reponse_de->getItem('id_commentaire',$value->getId_commentaire());
            $estReponse = false;
            $reponseContenu = '';
            $reponsePseudo = '';
            $reponseDatetime = '';

            if ($reponse){
                $reponse_com = $commentaire->getItem('id_commentaire',$reponse->getId_Reponse());
                if ($reponse_com){
                    $estReponse = true;
                    $reponseContenu = $reponse_com->getContenu_Commentaire();
                    $reponsePseudo = $reponse_com->getPseudo_Visiteur();
                    $reponseDatetime = $reponse_com->getDatetime_Commentaire();
                }
            }

            if ($value->getAvatar_Utilisateur() !== null){
                $avatar = $value->getAvatar_Utilisateur();
            } else {
                $avatar = 'https://eu.ui-avatars.com/api/?background=1e1e1e&color=ffffff&length=1&bold=true&size=128true&name='.$value->getPseudo_Visiteur();
            }

            if ($value->getId_Role() !== null){
               $user_role = $role->getItem('id_role',$value->getId_Role())->getNom_Role();
            } else {
                $user_role = '';
            }

            array_push($data['commentaire'],
                [
                    'id'=>$value->getId_Commentaire(),
                    'contenu'=>$value->getContenu_Commentaire(),
                    'pseudo'=>$value->getPseudo_Visiteur(),
                    'datetime'=>$value->getDatetime_Commentaire(),
                    'avatar'=>$avatar,
                    'role'=>$user_role,
                    'estReponse'=>$estReponse,
                    'reponseContenu'=>$reponseContenu,
                    'reponsePseudo'=>$reponsePseudo,
                    'reponseDatetime'=>$reponseDatetime,
                    'nblike'=>$aime_commentaire->Count('id_commentaire',$value->getId_Commentaire()),
                ]
            );
        }

        $data['success'] = true;

    } else {
        $data['success'] = false;
    }
    echo json_encode($data);



}


if (isset($_POST['overProfile'])){
    $data = [];

    //Appel classes
    $utilisateur = new Utilisateur();
    $commentaire = new Commentaire();
    $article = new Article();
    $follow = new Follow();

    $id_utilisateur = $_POST['pseudo_utilisateur'];
    $utilisateur = $utilisateur->getItem('id_utilisateur', $id_utilisateur);

    $commentaire = $commentaire->Count('id_visiteur',$utilisateur->getId_Visiteur());
    $article = $article->Count('id_utilisateur',$id_utilisateur);
    $follow = $follow->Count('id_followed',$id_utilisateur);


    $data['commentaire'] = $commentaire;
    $data['article'] = $article;
    $data['follow'] = $follow;
    $data['success'] = true;

    echo json_encode($data);



}