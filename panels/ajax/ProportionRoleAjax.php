<?php
$utilisateur = new Utilisateur();

$visiteur = new Visiteur();

$role = new Role();

$roleRedacteurId = $role->getItem('nom_role','redacteur')->getId_Role();
$roleMembreId = $role->getItem('nom_role','membre')->getId_Role();
$roleAdministrateurId = $role->getItem('nom_role','administrateur')->getId_Role();
$roleModerateurId = $role->getItem('nom_role','moderateur')->getId_Role();

$nbVisiteur = $visiteur->Count();
$nbMembre = $utilisateur->Count('','','id_role = '.$roleMembreId);
$nbAdministrateur = $utilisateur->Count('','','id_role = '.$roleAdministrateurId);
$nbModerateur = $utilisateur->Count('','','id_role = '.$roleModerateurId);

$nbUtilisateur = $utilisateur->Count();
$nbRedacteur = $utilisateur->Count('id_role',$roleRedacteurId);
$nbVisiteur = $nbVisiteur - $nbUtilisateur;


$data['success'] = true;
$data['count'] = [];

array_push($data['count'],$nbVisiteur,$nbMembre,$nbRedacteur,$nbModerateur, $nbAdministrateur);

echo json_encode($data);