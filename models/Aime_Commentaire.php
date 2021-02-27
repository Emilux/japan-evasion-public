<?php
/**
 * @file        Aime_Commentaire.php
 * @brief       Contient la déclaration de la classe Aime_Commentaire
 * @details     Elle permet de récupérer les données de la table \em \b aime_commentaire
 * @author      Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class Aime_Commentaire extends Model {

	protected $_id_utilisateur;
    protected $_id_commentaire;
	protected $_table = 'aime_commentaire';

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
    public function getId_Commentaire(){
        return $this->_id_commentaire;
    }

    //SETTERS

    /**
     * @param int $id_utilisateur
     */
    public function setId_Utilisateur($id_utilisateur){
		$this->_id_utilisateur = $id_utilisateur;
    }

    /**
     * @param int $id_commentaire
     */
    public function setId_Commentaire($id_commentaire){
		$this->_id_commentaire = $id_commentaire;
    }



}