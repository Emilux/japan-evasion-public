<?php
/**
 * @file        Visiteur.php
 * @brief       Contient la déclaration de la classe Visiteur
 * @details     Elle permet de récupérer et stocker les données de la table \em \b Visiteur.
 *              Mais aussi de créer de nouveaux Visiteurs.
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class Visiteur extends Model {

	protected $_id_visiteur;
	protected $_pseudo_visiteur;
	protected $_email_visiteur;
	protected $_newsletter_visiteur;
	protected $_table = 'visiteur';

    //GETTERS

    /**
     * @return int
     */
    public function getId_Visiteur(){
        return $this->_id_visiteur;
    }

    /**
     * @return string
     */
    public function getPseudo_Visiteur(){
        return $this->_pseudo_visiteur;
    }

    /**
     * @return string
     */
    public function getEmail_Visiteur(){
        return $this->_email_visiteur;
    }

    /**
     * @return boolean
     */
    public function getNewsletter_Visiteur(){
        return $this->_newsletter_visiteur;
    }

    //SETTERS

    /**
     * @param int $id_visiteur
     */
    public function setId_Visiteur($id_visiteur){
		$this->_id_visiteur = $id_visiteur;
    }

    /**
     * @param string $pseudo_visiteur
     */
    public function setPseudo_Visiteur($pseudo_visiteur){
		$this->_pseudo_visiteur = $pseudo_visiteur;
    }

    /**
     * @param string $email_visiteur
     */
    public function setEmail_Visiteur($email_visiteur){
		$this->_email_visiteur = $email_visiteur;
    }

    /**
     * @param boolean $newsletter_visiteur
     */
    public function setNewsletter_Visiteur($newsletter_visiteur){
		$this->_newsletter_visiteur = $newsletter_visiteur;
    }

    /**
     * Cette fonction crée un visiteur dans la base de donnée
     * Si le visiteur est crée, elle retourne true, sinon false
     *
     * @return  {boolean}            return true si visiteur crée, false sinon
     */
    public function creerVisiteur(){

        if(empty($this->getNewsletter_Visiteur()))
            $this->setNewsletter_Visiteur(0);

        $sql = $this->_bdd->prepare(
            'INSERT INTO '.$this->_table.' (pseudo_visiteur, email_visiteur,newsletter_visiteur) VALUE ("'.$this->getPseudo_Visiteur().'","'.$this->getEmail_Visiteur().'","'.$this->getNewsletter_Visiteur().'")'
        );

        $sql = $sql->execute();
        return $sql;
    }

}