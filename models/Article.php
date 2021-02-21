<?php

class Article extends Model {

    protected $_id_article;
    protected $_contenu_article;
    protected $_titre_article;
    protected $_date_publication_article;
    protected $_photo_article;
    protected $_temps_lecture_article;
    protected $_statut_article;
    protected $_like_article;
    protected $_signale_article;
    protected $_vu_article;
    protected $_tag_article;
    protected $_id_utilisateur;
    protected $_table = 'article';
    

    //GETTERS

    public function getId_Article(){
        return $this->_id_article;
    }

    public function getContenu_Article(){
        return $this->_contenu_article;
    }

    public function getTitre_Article(){
        return $this->_titre_article;
    }

    public function getDate_Publication_Article(){
        return $this->_date_publication_article;
    }

    public function getPhoto_Article(){
        return $this->_photo_article;
    }

    public function getTemps_Lecture_Article(){
        return $this->_temps_lecture_article;
    }

    public function getStatut_Article(){
        return $this->_statut_article;
    }

    //a vérifier
    public function getAime_Article(){
        return $this->_like_article;
    }

    //a vérifier
    public function getSignale_Article(){
        return $this->_signale_article;
    }

    //a vérifier
    public function getVue_Article(){
        return $this->_vue_article;
    }

    //a vérifier
    public function getTag_Article(){
        return $this->_tag_article;
    }

    public function getId_Utilisateur(){
        return $this->_id_utilisateur;
    }

    

    //SETTERS

    public function setId_Article(int $id_article){
		$this->_id_article = $id_article;
    }

    public function setContenu_Article($contenu_article){
        $this->_contenu_article = $contenu_article;
    }

    public function setTitre_Article(string $titre_article){
        $this->_titre_article = $titre_article;
    }

    public function setDate_Publication_Article($date_publication_article){
        $this->_date_publication_article = $date_publication_article;
    }

    public function setPhoto_Article($photo_article){
        $this->_photo_article = $photo_article;
    }

    public function setTemps_Lecture_Article(int $temps_lecture_article){
        $this->_temps_lecture_article = $temps_lecture_article;
    }

    public function setStatut_Article(string $statut_article){
        $this->_statut_article = $statut_article;
    }

    //a vérifier
    public function setAime_Article(int $aime_article){
        $this->_aime_article = $aime_article;
    }

    //a vérifier
    public function setSignale_Article($signale_article){
        $this->_signale_article = $signale_article;
    }

    //a vérifier
    public function setVue_Article(int $vue_article){
        $this->_vue_article = $vue_article;
    }

    //a vérifier
    public function setTag_Article($tag_article){
        $this->_tag_article = $tag_article;
    }

    public function setId_utilisateur(int $id_utilisateur){
        $this->_id_utilisateur = $id_utilisateur;
    }






}