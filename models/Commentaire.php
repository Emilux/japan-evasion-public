<?php

class Commentaire extends Model {

    private $_id_commentaire;
    private $_contenu_commentaire;
    private $_datetime_commentaire;
    private $_id_article;

    //GETTERS

    public function getId_Commentaire(){
        return $this->_id_commentaire;
    }

    public function getContenu_Commentaire(){
        return $this->_contenu_commentaire;
    }

    public function getDatetime_Commentaire(){
        return $this->_date_commentaire;
    }

    public function getId_Article(){
        return $this->_id_article;
    }

    //SETTERS

    public function setId_Commentaire(int $id_commentaire){
		$this->_id_commentaire = $id_commentaire;
    }

    public function setContenu_Commentaire(int $contenu_commentaire){
		$this->_contenu_commentaire = $contenu_commentaire;
    }

    public function setDatetime_Commentaire($datetime_commentaire){
        $this->_datetime_commentaire = $datetime_commentaire;
    }

    public function setId_Article(int $id_article){
        $this->_id_article = $id_article;
    }

    
}