<?php
/**
 * @file        Notification.php
 * @brief       Contient la déclaration de la classe Notification
 * @details     Elle permet de récupérer et stocker les données de la table \em \b Notification.
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class Notification extends Model {

    protected $_id_notification;
    protected $_contenu_notification;
    protected $_statut_notification;
    protected $_id_utilisateur;
    protected $_table = 'notification';

    //GETTERS

    /**
     * @return int
     */
    public function getId_Notification(){
        return $this->_id_notification;
    }

    /**
     * @return string
     */
    public function getContenu_Notification(){
        return $this->_contenu_notification;
    }

    /**
     * @return boolean
     */
    public function getStatut_Notification(){
        return $this->_statut_notification;
    }

    /**
     * @return int
     */
    public function getId_Utilisateur(){
        return $this->_id_utilisateur;
    }

    //SETTERS

    /**
     * @param int $id_notification
     */
    public function setId_Notification(int $id_notification){
		$this->_id_notification = $id_notification;
    }

    /**
     * @param string $contenu_notification
     */
    public function setContenu_Notification(string $contenu_notification){
		$this->_contenu_notification = $contenu_notification;
    }

    /**
     * @param boolean $statut_notification
     */
    public function setStatut_Notification(bool $statut_notification){
		$this->_statut_notification = $statut_notification;
    }

    /**
     * @param boolean $id_utilisateur
     */
    public function setId_Utilisateur(bool $id_utilisateur){
        $this->_id_utilisateur = $id_utilisateur;
    }


}