<?php
$utilisateur = new Utilisateur();
$data['success'] = true;
$data['count'] = [];

for($i = 0; $i < 12; $i++){
    $utilisateurCount = $utilisateur->Count('', '', 'YEAR(CURRENT_DATE) = '.date("Y").' AND MONTH(CURRENT_DATE) = '.$i);

    if ($utilisateurCount === FALSE){
        $data['success'] = false;
        break;
    } else {
        array_push($data['count'],$utilisateurCount);
    }


}

echo json_encode($data);