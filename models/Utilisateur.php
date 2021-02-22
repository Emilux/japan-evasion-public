<?php

class Utilisateur extends Visiteur {

	protected $_id_utilisateur;
	protected $_avatar_utilisateur;
	protected $_prenom_utilisateur;
	protected $_nom_utilisateur;
	protected $_bio_utilisateur;
	protected $_date_naissance_utilisateur;
    protected $_mdp_utilisateur;
    protected $_banni_utilisateur;
    protected $_date_creation_utilisateur;
    protected $_id_role;
	protected $_table = 'utilisateur';


    //GETTERS

    public function getId_Utilisateur(){
        return $this->_id_utilisateur;
    }

    public function getAvatar_Utilisateur(){
        return $this->_avatar_utilisateur;
    }

    public function getPrenom_Utilisateur(){
        return $this->_prenom_utilisateur;
    }

    public function getNom_Utilisateur(){
        return $this->_nom_utilisateur;
    }

    public function getDate_Naissance_Utilisateur(){
        return $this->_date_naissance_utilisateur;
    }

    public function getBio_Utilisateur(){
        return $this->_bio_utilisateur;
    }

    public function getMdp_Utilisateur(){
        return $this->_mdp_utilisateur;
    }

    public function getBanni_Utilisateur(){
        return $this->_banni_utilisateur;
    }

    public function getId_Role(){
        return $this->_id_role;
    }

    public function getId_Date_Creation_Utilisateur(){
        return $this->_date_creation_utilisateur;
    }



    //SETTERS

    public function setId_Utilisateur($id_utilisateur){
		$this->_id_utilisateur = $id_utilisateur;
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
    
    public function setBio_Utilisateur($bio_utilisateur){
        $this->_bio_utilisateur = $bio_utilisateur;
    }

    public function setMdp_Utilisateur($mdp_utilisateur){
        $this->_mdp_utilisateur = $mdp_utilisateur;
    }

    public function setBanni_Utilisateur($banni_utilisateur){
        $this->_banni_utilisateur = $banni_utilisateur;
    }

    public function setId_Role($id_role){
        $this->_id_role = $id_role;
    }

    public function setId_Date_Creation_Utilisateur($date_creation_utilisateur){
        $this->_date_creation_utilisateur = $date_creation_utilisateur;
    }


    //METHODE


    //Récupérer un élément
    public function getItem($champ, $valeur,$selecteur = "*",$table=NULL){

        $sql = $this->_bdd->query(
            'SELECT '.$selecteur.' FROM '.$this->_table.' 
                      INNER JOIN visiteur ON visiteur.id_visiteur = utilisateur.id_visiteur 
                      WHERE '.$champ.' = "'.$valeur.'"'
        );

        if ($sql)
            $sql = $sql->fetch(PDO::FETCH_ASSOC);
        else
            return false;

        if ($sql){
            $object = new $this->_table($sql);
            return $object;
        }

        return false;

    }


    //Créer un compte
    public function creerCompte(){

        $visiteur = new Visiteur();
        $role = new Role();
        $role = $role->getItem('nom_role',$this->getId_Role());
        $this->setId_Role($role->getId_role());

        $visiteur->setPseudo_Visiteur($this->getPseudo_Visiteur());
        $visiteur->setEmail_Visiteur($this->getEmail_Visiteur());
        $visiteur->setNewsletter_Visiteur($this->getNewsletter_Visiteur());

        /* LANCER TRANSACTION MYSQL */
        $this->_bdd->beginTransaction();

        //Créer visiteur
        if ($visiteur->creerVisiteur()) {


            //Récuperer id_visiteur du visiteur créer
            $visiteur = $visiteur->getItem('pseudo_visiteur', $this->getPseudo_Visiteur(), 'id_visiteur');
            $this->setId_Visiteur($visiteur->getId_visiteur());

            //Création utilisateur
            $sql = $this->_bdd->prepare(
                'INSERT INTO ' . $this->_table . ' (avatar_utilisateur,mdp_utilisateur, id_role, id_visiteur) VALUE ("'.$this->getAvatar_Utilisateur().'","' . $this->getMdp_Utilisateur() . '","' . $this->getId_Role() . '","' . $this->getId_Visiteur() . '")'
            );
            $sql = $sql->execute();

            //Annuler toute la requete si l'utilisateur n'est pas crée
            if (!$sql)
                $this->_bdd->rollBack();
            else
                $this->_bdd->commit();
            return $sql;
        }
        else
            $this->_bdd->rollBack();

        return false;
    }
   
    //Modifier le profil de l'utilisateur
    public function Update(array $data, $id){

        $valeurs = '';

        foreach($data as $key => $value){
            if($value){
                $valeurs .= $key.' = "'.$value.'" , ';
            }
        }

        $valeurs = substr($valeurs,0,-2);

        $sql = $this->_bdd->prepare(

        ' UPDATE '.$this->_table.
        ' INNER JOIN visiteur ON visiteur.id_visiteur = utilisateur.id_utilisateur'.' SET '.$valeurs.
        ' WHERE visiteur.id_visiteur = '.$id

        );
        var_dump($sql);

        $sql->execute();

    }
}





    
    