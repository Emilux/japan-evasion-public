<?php 


if(isset($_POST['id_commentaire'])) {
    if (isset($_SESSION['utilisateur'])){

        $aime_commentaire = new Aime_Commentaire();
        
        $is_aime_commentaire = $aime_commentaire->getItem(null, null, '*', 'id_commentaire = '.$_POST['id_commentaire'].' AND id_utilisateur = '.$_SESSION['utilisateur']['id_utilisateur']);
        if (!$is_aime_commentaire){

            $data['id_commentaire'] = (int) $_POST['id_commentaire'];
            $data['id_utilisateur'] = $_SESSION['utilisateur']['id_utilisateur'];
    
            $array = array(
                'msg' => null,
                'number_like' => null,
            );
    
            if($aime_commentaire->Add($data)){
                $nb_aime_commentaire = $aime_commentaire->count('id_commentaire', $_POST['id_commentaire']);

                $array['success'] = true;
                $array['add'] = true;

                $array['number_like'] = $nb_aime_commentaire;
    
            } else {
    
                $array['success'] = false;
                
            }

        } else {

            if ($aime_commentaire->Delete(null, 'id_commentaire = '.$_POST['id_commentaire'].' AND id_utilisateur = '.$_SESSION['utilisateur']['id_utilisateur'])){

                $nb_aime_commentaire = $aime_commentaire->count('id_commentaire', $_POST['id_commentaire']);

                $array['success'] = true;
                $array['delete'] = true;
                $array['number_like'] = $nb_aime_commentaire;

            } else {
                $array['success'] = false;
            }

        }

        echo json_encode($array);

        
    }

}


