<?php

if (isset($_GET['recherche'])){
    $data = [];
    $data['article'] = [];

    $recherche = $Utils->valid_donnees($_GET['recherche']);
    $article = new Article();

    if (!empty($recherche)){
        $words = explode(' ', $recherche);
        $recherche = implode('|', $words);
        $listArticle = $article->getList(null, 'DESC', 'date_publication_article', '*', 'statut_article != "PENDING" AND titre_article REGEXP "'.$recherche.'" OR contenu_article REGEXP "'.$recherche.'" OR pseudo_visiteur REGEXP "'.$recherche.'"');
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
            $data['article'] = '';
            $data['success'] = true;
        }
    } else {
        $listArticle = $article->getList('6', 'DESC','date_publication_article', '*', 'statut_article != "PENDING"');
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
    }

    echo json_encode($data);
}