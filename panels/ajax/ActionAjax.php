<?php

if (isset($_POST['bannir'])){
    $utilisateur = new Utilisateur();

    $id_utilisateur = $Utils->valid_donnees($_POST['id_utilisateur']);

    $checkBan = $utilisateur->Count('','','id_utilisateur = '.$id_utilisateur.' AND banni_utilisateur = 1');

    if ($checkBan !== "0"){
        $dataSend['banni_utilisateur'] = "0";
        $msg = "non banni";
    } else {
        $dataSend['banni_utilisateur'] = "1";
        $msg = "banni";
    }

    $estBanni = $utilisateur->Update($dataSend,$id_utilisateur);
    if ($estBanni){
        $data['success'] = TRUE;
        $data['message'] = $msg;
        $data['id'] = $id_utilisateur;
    } else {
        $data['success'] = FALSE;
        $data['message'] = 'erreur';
    }

    echo json_encode($data);
}
