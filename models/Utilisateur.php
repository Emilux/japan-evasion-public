<?php

class Utilisateur extends Model {

	protected $_id_utilisateur;
	protected $_pseudo_utilisateur;
	protected $_avatar_utilisateur;
	protected $_prenom_utilisateur;
	protected $_nom_utilisateur;
	protected $_bio_utilisateur;
    protected $_mdp_utilisateur;
    protected $_newsletter_utilisateur;
    protected $_banni_utilisateur;
    protected $_id_role;
	protected $_table = 'utilisateur';


    //GETTERS

    public function getId_Utilisateur(){
        return $this->_id_utilisateur;
    }

    public function getPseudo_Utilisateur(){
        return $this->_pseudo_utilisateur;
    }

    public function getAvatar_Utilisateur(){
        return $this->_avatar_utilisateur;
    }

    public function getPrenom_Utilisateur(){
        return $this->_prenom_utilisateur;
    }

    public function getnNom_Utilisateur(){
        return $this->_nom_utilisateur;
    }

    public function getDate_Naissance_Utilisateur(){
        return $this->_date_naissance_utilisateur;
    }

    public function getEmail_Utilisateur(){
        return $this->_email_utilisateur
    }

    public function getBio_Utilisateur(){
        return $this->_bio_utilisateur;
    }

    public function getMdp_Utilisateur(){
        return $this->_mdp_utilisateur;
    }

    public function getNewsletter_Utilisateur(){
        return $this->_newsletter_utilisateur;
    }

    public function getBanni_Utilisateur(){
        return $this->_banni_utilisateur;
    }

    public function getId_Role(){
        return $this->_id_role;
    }

    //SETTERS

    public function setId_Utilisateur(int $id_utilisateur){
		$this->_id_utilisateur = $id_utilisateur;
    }

    public function setPseudo_Utilisateur(string $pseudo_utilisateur){
		$this->_pseudo_utilisateur = $pseudo_utilisateur;
    }

    public function setAvatar_Utilisateur($avatar_utilisateur){
		$this->_avatar_utilisateur = $avatar_utilisateur;
    }

    public function setPrenom_Utilisateur(string $prenom_utilisateur){
		$this->_prenom_utilisateur = $prenom_utilisateur;
    }

    public function setNom_Utilisateur(string $nom_utilisateur){
		$this->_nom_utilisateur = $nom_utilisateur;
    }

    public function setDate_Naissance_Utilisateur(datetime $date_naissance_utilisateur){
        $this->_date_naissance_utilisateur = $date_naissance_utilisateur;
    }

    public function setEmail_Utilisateur(string $email_utilisateur){
        $this->_email_utilisateur = $email_utilisateur;
    }
    
    public function setBio_Utilisateur(text $bio_utilisateur){
        $this->_bio_utilisateur = $bio_utilisateur;
    }

    public function setMdp_Utilisateur(string $mdp_utilisateur){
        $this->_mdp_utilisateur = $mdp_utilisateur;
    }

    public function setNewsletter_Utilisateur(boolval $newsletter_utilisateur){
        $this->_newsletter_utilisateur = $newsletter_utilisateur;
    }

    public function setBanni_Utilisateur(boolval $banni_utilisateur){
        $this->_banni_utilisateur = $banni_utilisateur;
    }

    public function setId_Role(int $id_role){
        $this->_id_role = $id_role;
    }


    //METHODE


    public function commenterArticle(){

    }

    public function connexion(){

    }

    public function creerCompte(){

    }

    public function voirArticle(){

    }
}





    
    