<?php
/**
 * @file        Utilisateur.php
 * @brief       Contient la déclaration de la classe Utilisateur
 * @details     Elle permet de récupérer et stocker les données de la table \em \b Utilisateur.
 *              Mais aussi de créer de nouveaux utilisateurs.
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
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

    /**
     * @return int
     */
    public function getId_Utilisateur(){
        return $this->_id_utilisateur;
    }

    /**
     * @return string
     */
    public function getAvatar_Utilisateur(){
        return $this->_avatar_utilisateur;
    }

    /**
     * @return string
     */
    public function getPrenom_Utilisateur(){
        return $this->_prenom_utilisateur;
    }

    /**
     * @return string
     */
    public function getNom_Utilisateur(){
        return $this->_nom_utilisateur;
    }

    /**
     * @return string
     */
    public function getDate_Naissance_Utilisateur(){
        return $this->_date_naissance_utilisateur;
    }

    /**
     * @return string
     */
    public function getBio_Utilisateur(){
        return $this->_bio_utilisateur;
    }

    /**
     * @return string
     */
    public function getMdp_Utilisateur(){
        return $this->_mdp_utilisateur;
    }

    /**
     * @return boolean
     */
    public function getBanni_Utilisateur(){
        return $this->_banni_utilisateur;
    }

    /**
     * @return int
     */
    public function getId_Role(){
        return $this->_id_role;
    }

    /**
     * @return mixed
     */
    public function getDate_Creation_Utilisateur(){
        return $this->_date_creation_utilisateur;
    }



    //SETTERS

    /**
     * @param $id_utilisateur
     */
    public function setId_Utilisateur($id_utilisateur){
		$this->_id_utilisateur = $id_utilisateur;
    }

    /**
     * @param $avatar_utilisateur
     */
    public function setAvatar_Utilisateur($avatar_utilisateur){
		$this->_avatar_utilisateur = $avatar_utilisateur;
    }

    /**
     * @param $prenom_utilisateur
     */
    public function setPrenom_Utilisateur($prenom_utilisateur){
		$this->_prenom_utilisateur = $prenom_utilisateur;
    }

    /**
     * @param $nom_utilisateur
     */
    public function setNom_Utilisateur($nom_utilisateur){
		$this->_nom_utilisateur = $nom_utilisateur;
    }

    /**
     * @param $date_naissance_utilisateur
     */
    public function setDate_Naissance_Utilisateur($date_naissance_utilisateur){
        $this->_date_naissance_utilisateur = $date_naissance_utilisateur;
    }

    /**
     * @param $bio_utilisateur
     */
    public function setBio_Utilisateur($bio_utilisateur){
        $this->_bio_utilisateur = $bio_utilisateur;
    }

    /**
     * @param $mdp_utilisateur
     */
    public function setMdp_Utilisateur($mdp_utilisateur){
        $this->_mdp_utilisateur = $mdp_utilisateur;
    }

    /**
     * @param $banni_utilisateur
     */
    public function setBanni_Utilisateur($banni_utilisateur){
        $this->_banni_utilisateur = $banni_utilisateur;
    }

    /**
     * @param $id_role
     */
    public function setId_Role($id_role){
        $this->_id_role = $id_role;
    }

    /**
     * @param $date_creation_utilisateur
     */
    public function setDate_Creation_Utilisateur($date_creation_utilisateur){
        $this->_date_creation_utilisateur = $date_creation_utilisateur;
    }

    /** Cherche la liste des utilisateurs dans la base de donnée
     * et return an array of object ou false
     *
     *
     * @param int|null $limit
     * @param string $order
     * @param string $champs
     * @param string $selecteur
     * @param string|null $where
     *
     * @return array|false
     */
    public function getList(int $limit=null, $order = 'DESC', $champs = 'id',$selecteur = '*',string $where=null){
        if ($where !== null) $where = 'WHERE '.$where;
        if ($limit !== null) $limit = 'LIMIT '.$limit;
        if ($champs === 'id') $champs = $champs.'_'.$this->_table;
        $lists = [];

        $sql = $this->_bdd->query('SELECT '.$selecteur.' FROM '.$this->_table.' INNER JOIN visiteur ON visiteur.id_visiteur = utilisateur.id_visiteur '.$where.' ORDER BY '.$champs.' '.$order.' '.$limit);

        if ($sql)
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        else
            return false;

        if ($sql){
            foreach($sql as $donnees){

                $lists[] = new $this->_table($donnees);
            }
            return $lists;
        }
        return false;
    }


    /**
     * Cette fonction récupère un utilisateur et le visiteur auquel il est attaché
     * Si un utilisateur est récupéré il retourne l'objet de celui ci sinon false
     *
     * @param string $champ
     * @param $valeur
     * @param string $selecteur
     * @param string|null $where
     * @param string|null $table
     *
     * @return  object|boolean  return un objet si utilisateur selectionné sinon false
     */
    public function getItem($champ, $valeur,$selecteur = "*",$where = null,$table=NULL){

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


    /**
     * Cette fonction crée un utilisateur et le visiteur auquel il sera rattaché dans la bdd
     * Si l'utilisateur est crée return true sinon retourne false
     *
     *
     * @return  {boolean}     return true si utilisateur crée, sinon false
     */
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


    /**
     * Cette fonction permet de modifier les informations d'un utilisateur et du visiteur
     * auquel il est rattaché dans la bdd
     * Si l'utilisateur est modifier return true sinon retourne false
     *
     * @param array $data
     * @param $id
     *
     * @return  {boolean}     return true si utilisateur mise a jour, sinon false
     */
    public function Update(array $data, $id){

        $valeurs = '';

        foreach($data as $key => $value){
            if($value !== ""){
                $valeurs .= $key.' = "'.$value.'" , ';
            }
        }

        $valeurs = substr($valeurs,0,-2);

        $sql = $this->_bdd->prepare(

        ' UPDATE '.$this->_table.
        ' INNER JOIN visiteur ON visiteur.id_visiteur = utilisateur.id_visiteur'.' SET '.$valeurs.
        ' WHERE utilisateur.id_utilisateur = '.$id

        );
        var_dump($sql);
        $sql = $sql->execute();
        return $sql;

    }



    /**
     * Cette fonction crée un utilisateur avec toute ses information (prenom, pseudo ect...)
     * et le visiteur auquel il sera rattaché dans la bdd
     * Si l'utilisateur est crée return true sinon retourne false
     *
     *
     * @return  {boolean}     return true si utilisateur crée, sinon false
     */
    public function creerUtilisateur(){

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
                'INSERT INTO ' . $this->_table . ' (avatar_utilisateur,mdp_utilisateur, id_role, id_visiteur, prenom_utilisateur, nom_utilisateur, date_naissance_utilisateur) 
                VALUE ("'.$this->getAvatar_Utilisateur().'","' . $this->getMdp_Utilisateur() . '","' . $this->getId_Role() . '","' . $this->getId_Visiteur() . '"
                ,"' . $this->getPrenom_Utilisateur() . '","' . $this->getNom_Utilisateur() . '","' . $this->getDate_Naissance_Utilisateur() . '")'
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


}





    
    