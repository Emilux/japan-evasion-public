<?php
/**
 * @file        Signale_Article.php
 * @brief       Contient la déclaration de la classe Signale_Article
 * @details     Elle permet de récupérer et stocker les données de la table \em \b Signale_Article 
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class Signale_Article extends Model {

	protected $_id_utilisateur;
    protected $_id_article;
	protected $_table = 'signale_article';

    //GETTERS

    /**
     * @return int
     */
    public function getId_Utilisateur(){
        return $this->_id_utilisateur;
    }

    /**
     * @return int
     */
    public function getId_Article(){
        return $this->_id_article;
    }

    //SETTERS

    /**
     * @param int $id_utilisateur
     */
    public function setId_Utilisateur($id_utilisateur){
		$this->_id_utilisateur = $id_utilisateur;
    }

    /**
     * @param int $id_article
     */
    public function setId_Article($id_article){
		$this->_id_article = $id_article;
    }

    

}