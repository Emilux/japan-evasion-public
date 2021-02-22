<?php 


if(isset($_POST['id_commentaire'])) {
    if (isset($_SESSION['utilisateur'])){
        $aime_commentaire = new Aime_Commentaire();

        $data['id_commentaire'] = (int) $_POST['id_commentaire'];
        $data['id_utilisateur'] = $_SESSION['utilisateur']['id_utilisateur'];

        $array = array(
            'msg' => null,
            'number_like' => null,
        );

        if($aime_commentaire->Add($data)){
            $nb_aime_commentaire = $aime_commentaire->count('id_commentaire', $_POST['id_commentaire']);

            $array['msg'] = 'success';

            $array['number_like'] = $nb_aime_commentaire;

            echo json_encode($array);

        } else {

            $array['msg'] = 'success';

            $array['number_like'] = null;

            echo json_encode($array);

        }
    }

}


