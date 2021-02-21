<?php

class Aime_Commentaire extends Model {

	protected $_id_utilisateur;
    protected $_id_commentaire;
	protected $_table = 'aime_commentaire';

    //GETTERS

    public function getId_Utilisateur(){
        return $this->_id_utilisateur;
    }

    public function getId_Commentaire(){
        return $this->_id_commentaire;
    }

    //SETTERS

    public function setId_Utilisateur($id_utilisateur){
		$this->_id_utilisateur = $id_utilisateur;
    }

    public function setId_Commentaire($id_commentaire){
		$this->_id_commentaire = $id_commentaire;
    }



}