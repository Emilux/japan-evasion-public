<?php

class Visiteur extends Model {

	protected $_id_visiteur;
	protected $_pseudo_visiteur;
	protected $_email_visiteur;
	protected $_table = 'visiteur';

    //GETTERS

    public function getId_Visiteur(){
        return $this->_id_visiteur;
    }

    public function getPseudo_Visiteur(){
        return $this->_pseudo_visiteur;
    }

    public function getEmail_Visiteur(){
        return $this->_email_visiteur;
    }

    //SETTERS

    public function setId_Visiteur($id_visiteur){
		$this->_id_visiteur = $id_visiteur;
    }

    public function setPseudo_Visiteur($pseudo_visiteur){
		$this->_pseudo_visiteur = $pseudo_visiteur;
    }

    public function setEmail_Visiteur($email_visiteur){
		$this->_email_visiteur = $email_visiteur;
    }


}