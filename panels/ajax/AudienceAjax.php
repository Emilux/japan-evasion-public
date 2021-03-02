<?php
if ($_SESSION['utilisateur']['role'] === 'administrateur'){
    $utilisateur = new Utilisateur();
    $data['success'] = true;
    $data['count'] = [];

    for($i = 1; $i < 12; $i++){
        $utilisateurCount = $utilisateur->Count('', '', 'YEAR(date_creation_utilisateur) = '.date("Y").' AND MONTH(date_creation_utilisateur) = '.$i);
        if ($utilisateurCount === FALSE){
            $data['success'] = false;
            break;
        } else {
            array_push($data['count'],$utilisateurCount);
        }


    }

    echo json_encode($data);
}
