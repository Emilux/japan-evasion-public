<?php

class Notification extends Model {

    private $_id_notification;
    private $_contenu_notification;
    private $_statut_notification;
    private $_id_utilisateur;
    private $_table = 'notification';

    //GETTERS

    public function getId_Notification(){
        return $this->_id_notification;
    }

    public function getContenu_Notification(){
        return $this->_contenu_notification;
    }

    public function get_Notification(){
        return $this->_contenu_notification;
    }

    public function getId_Utilisateur(){
        return $this->_id_utilisateur;
    }

    //SETTERS

    public function setId_Notification(int $id_notification){
		$this->_id_notification = $id_notification;
    }

    public function setContenu_Notification(string $contenu_notification){
		$this->_contenu_notification = $contenu_notification;
    }

    public function setStatut_Notification(boolval $statut_notification){
		$this->_statut_notification = $statut_notification;
    }


    //METHODE

    public function ajoutNotif(){

    }

    public function supprNotif(){

    }

    public function ouvrirNotif(){

    }

}