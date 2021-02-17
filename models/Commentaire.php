<?php

class Commentaire extends Model {

    protected $_id_commentaire;
    protected $_contenu_commentaire;
    protected $_datetime_commentaire;
    protected $_id_article;
    protected $_table = 'commentaire';

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

    
    //Permet de récupérer un commentaire ainsi que les infos lié au profil
    public function getCommentaire($article){
        $sql = $this->_bdd->query(
               'SELECT * FROM `commentaire` 
                LEFT JOIN commente ON commentaire.id_commentaire = commente.id_commentaire
                LEFT JOIN utilisateur ON utilisateur.id_utilisateur = commente.id_utilisateur
                LEFT JOIN commentaire_visiteur ON commentaire_visiteur.id_commentaire = commentaire.id_commentaire
                LEFT JOIN visiteur ON visiteur.id_visiteur = commentaire_visiteur.id_visiteur
                LEFT JOIN reponse_de ON reponse_de.id_commentaire = commentaire.id_commentaire
                WHERE commentaire.id_article = '.$article.' ORDER BY datetime_commentaire');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $sql;
    }

}



