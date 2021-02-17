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
                'SELECT datetime_commentaire, pseudo_visiteur,avatar_utilisateur, pseudo_utilisateur,contenu_commentaire,
                reponse_de.id_reponse AS reponse, commentaire.id_commentaire AS commentaire, COUNT(aime_commentaire.id_commentaire) AS aime_commentaire
                FROM '.$this->_table.'
                LEFT JOIN commente ON commentaire.id_commentaire = commente.id_commentaire
                LEFT JOIN utilisateur ON utilisateur.id_utilisateur = commente.id_utilisateur
                LEFT JOIN commentaire_visiteur ON commentaire_visiteur.id_commentaire = commentaire.id_commentaire
                LEFT JOIN visiteur ON visiteur.id_visiteur = commentaire_visiteur.id_visiteur
                LEFT JOIN reponse_de ON reponse_de.id_commentaire = commentaire.id_commentaire
                LEFT JOIN aime_commentaire ON aime_commentaire.id_commentaire = commentaire.id_commentaire
                WHERE commentaire.id_article = '.$article.'
                GROUP BY commentaire.id_commentaire
                ORDER BY datetime_commentaire');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $sql;
    }

    /*Ajout commentaire par un visiteur
    public function addCommentaireVisiteur(){


        $sql = $this->_bdd->prepare('INSERT INTO '.$this->_table.' (contenu_commentaire, datetime_commentaire, id_article) VALUES ("'.$this->getContenu_Commentaire.'", "'.$this->getDatetime_Commentaire.'", "'.$this->getId_Article.'")');
        $sql->execute();

        CURRENT_TIMESTAMP;

    }*/

}



