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
        return $this->_email_utilisateur;
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

    public function setId_Utilisateur($id_utilisateur){
		$this->_id_utilisateur = $id_utilisateur;
    }

    public function setPseudo_Utilisateur($pseudo_utilisateur){
		$this->_pseudo_utilisateur = $pseudo_utilisateur;
    }

    public function setAvatar_Utilisateur($avatar_utilisateur){
		$this->_avatar_utilisateur = $avatar_utilisateur;
    }

    public function setPrenom_Utilisateur($prenom_utilisateur){
		$this->_prenom_utilisateur = $prenom_utilisateur;
    }

    public function setNom_Utilisateur($nom_utilisateur){
		$this->_nom_utilisateur = $nom_utilisateur;
    }

    public function setDate_Naissance_Utilisateur($date_naissance_utilisateur){
        $this->_date_naissance_utilisateur = $date_naissance_utilisateur;
    }

    public function setEmail_Utilisateur($email_utilisateur){
        $this->_email_utilisateur = $email_utilisateur;
    }
    
    public function setBio_Utilisateur($bio_utilisateur){
        $this->_bio_utilisateur = $bio_utilisateur;
    }

    public function setMdp_Utilisateur($mdp_utilisateur){
        $this->_mdp_utilisateur = $mdp_utilisateur;
    }

    public function setNewsletter_Utilisateur($newsletter_utilisateur){
        $this->_newsletter_utilisateur = $newsletter_utilisateur;
    }

    public function setBanni_Utilisateur($banni_utilisateur){
        $this->_banni_utilisateur = $banni_utilisateur;
    }

    public function setId_Role($id_role){
        $this->_id_role = $id_role;
    }


    //METHODE


    public function commenterArticle(){

    }

    public function getIdRole($nom_role){
        $sql = $this->getItem('nom_role',$nom_role,'role');
        return $sql['id_role'];
    }

    public function getNameRole($id){
        $sql = $this->getItem('id_role',$id,'role');
        return $sql['nom_role'];
    }

    public function getUtilisateurByEmail($mail){
        $utilisateur = new Utilisateur($this->getItem('email_utilisateur',$mail));
        return $utilisateur;
    }

    public function verifierEmail($mail){
        if ($this->getItem('email_utilisateur',$mail) === false){
            return false;
        } else {
            return true;
        }
    }

    public function creerCompte($role){
        $role = $this->getIdRole($role);
        $role = $role;
        $sql = $this->_bdd->prepare('INSERT INTO '.$this->_table.' (pseudo_utilisateur, email_utilisateur, mdp_utilisateur, banni_utilisateur, newsletter_utilisateur, id_role) VALUES ("'.$this->getPseudo_Utilisateur().'", "'.$this->getEmail_Utilisateur().'", "'.$this->getMdp_Utilisateur().'", "0","0","'.$role.'")');
        $sql = $sql->execute();
        return $sql;
    }

    public function voirArticle(){

    }
    
    public function getActivity(){
        $sql = $this->_bdd->query('SELECT * FROM commentaire ORDER BY '.$champs.'_'.$this->_table.' '.$order);
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}





    
    