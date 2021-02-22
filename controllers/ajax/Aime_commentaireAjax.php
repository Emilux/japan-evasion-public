<?php 


if(isset($_POST['id_commentaire']) && isset($_POST['id_utilisateur'])) {

    $aime_commentaire = new Aime_Commentaire();

    
    $array = array(
        'msg' => null,
        'number_like' => null,
    );

    if($aime_commentaire->Add($_POST)){


        $array['msg'] = 'success';
        
        $array['number_like'] = 2;

        echo json_encode($array);

    } else {

        $array['msg'] = 'success';

        $array['number_like'] = 2;

        echo json_encode($array);

    }


}


