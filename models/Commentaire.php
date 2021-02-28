<?php
/**
 * @file        Commentaire.php
 * @brief       Contient la déclaration de la classe Commentaire
 * @details     Elle permet de récupérer et stocker les données de la table \em \b Commentaire.
 *              Mais aussi d'ajouter des commentaires ou réponses
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class Commentaire extends Utilisateur {

    protected $_id_commentaire;
    protected $_contenu_commentaire;
    protected $_datetime_commentaire;
    protected $_id_article;
    protected $_table = 'commentaire';

    //GETTERS

    /**
     * @return int
     */
    public function getId_Commentaire(){
        return $this->_id_commentaire;
    }

    /**
     * @return string
     */
    public function getContenu_Commentaire(){
        return $this->_contenu_commentaire;
    }

    /**
     * @return string
     */
    public function getDatetime_Commentaire(){
        return $this->_datetime_commentaire;
    }

    /**
     * @return int
     */
    public function getId_Article(){
        return $this->_id_article;
    }

    //SETTERS

    /**
     * @param int $id_commentaire
     */
    public function setId_Commentaire(int $id_commentaire){
		$this->_id_commentaire = $id_commentaire;
    }

    /**
     * @param string $contenu_commentaire
     */
    public function setContenu_Commentaire(string $contenu_commentaire){
		$this->_contenu_commentaire = $contenu_commentaire;
    }

    /**
     * @param string $datetime_commentaire
     */
    public function setDatetime_Commentaire($datetime_commentaire){
        $this->_datetime_commentaire = $datetime_commentaire;
    }

    /**
     * @param int $id_article
     */
    public function setId_Article(int $id_article){
        $this->_id_article = $id_article;
    }

    /** Ajoute un commentaire ou une réponse dans la bdd
     *
     * @param $estVisiteur
     * @param boolean $reponse
     * @param int $id_reponse
     *
     * @return boolean
     */
    public function addCommentaire($estVisiteur, bool $reponse, int $id_reponse = null){
        $visiteur = new Visiteur();
        $reponse_de = new Reponse_de();

        $visiteur->setPseudo_Visiteur($this->getPseudo_Visiteur());
        $visiteur->setEmail_Visiteur($this->getEmail_Visiteur());

        if ($estVisiteur){
            /* LANCER TRANSACTION MYSQL */
            $this->_bdd->beginTransaction();

            //Créer visiteur
            if ($visiteur->creerVisiteur()) {

                //Récuperer id_visiteur du visiteur créer
                $visiteur = $visiteur->getItem('pseudo_visiteur', $this->getPseudo_Visiteur(), 'id_visiteur');
                $this->setId_Visiteur($visiteur->getId_visiteur());

                //Création utilisateur
                $sql = $this->_bdd->prepare(
                    'insert into '.$this->_table.' (contenu_commentaire,datetime_commentaire,id_article,id_visiteur) VALUES ("'.$this->getContenu_Commentaire().'",current_timestamp(),"'.$this->getId_Article().'","'.$this->getId_Visiteur().'")'
                );

                $sql = $sql->execute();

                //Annuler toute la requete si le commentaire n'est pas crée
                if (!$sql)
                    $this->_bdd->rollBack();
                else {
                    if($reponse && $id_reponse !== null){
                        $reponse_de->setId_Commentaire($this->_bdd->lastInsertId());
                        $reponse_de->setId_Reponse($id_reponse);
                        $reponse_de = $reponse_de->AddReponse();
                        if (!$reponse_de){
                            $this->_bdd->rollBack();
                            return false;
                        }
                        else {
                            $this->_bdd->commit();
                            return true;
                        }

                    } else
                        $this->_bdd->commit();
                }

                return $sql;
            }
            else
                $this->_bdd->rollBack();

            return false;
        } else {
            /* LANCER TRANSACTION MYSQL */
            $this->_bdd->beginTransaction();

            //Création utilisateur
            $sql = $this->_bdd->prepare(
                'insert into `commentaire` (contenu_commentaire,datetime_commentaire,id_article,id_visiteur) VALUES ("'.$this->getContenu_Commentaire().'",current_timestamp(),"'.$this->getId_Article().'","'.$this->getId_Visiteur().'")'
            );
            $sql = $sql->execute();
            if (!$sql){
                $this->_bdd->rollBack();
            } else {
                if($reponse && $id_reponse !== null){
                    $reponse_de->setId_Commentaire($this->_bdd->lastInsertId());
                    $reponse_de->setId_Reponse($id_reponse);
                    $reponse_de = $reponse_de->AddReponse();
                    if (!$reponse_de){
                        $this->_bdd->rollBack();
                        return false;
                    }
                    else {
                        $this->_bdd->commit();
                        return true;
                    }

                } else {
                    $this->_bdd->commit();
                }
            }

            return $sql;
        }

    }


    /** Récupère un commentaire et son créateur
     *
     * @param string $champ
     * @param string $valeur
     * @param string $selecteur
     * @param string|null $where
     * @param string|null $table
     *
     * @return boolean|object
     */
    public function getItem($champ, $valeur, $selecteur = "*", $where = null,$table = null){

        $sql = $this->_bdd->query('SELECT '.$selecteur.' FROM '.$this->_table.' WHERE '.$champ.' = "'.$valeur.'"');
        $sql = $this->_bdd->query(
            'SELECT '.$selecteur.' FROM '.$this->_table.' 
                        INNER JOIN visiteur ON commentaire.id_visiteur = visiteur.id_visiteur
                        LEFT OUTER JOIN utilisateur ON visiteur.id_visiteur = utilisateur.id_visiteur
                        WHERE '.$champ.' = "'.$valeur.'"');
        if ($sql)
            $sql = $sql->fetch(PDO::FETCH_ASSOC);
        else
            return false;

        if ($sql){

            $object = new $this->_table($sql);
            return $object;
        }

        return $sql;

    }

    /** Récupère la liste des commentaires ainsi que leurs créateur
     *
     * @param int|null $limit
     * @param string $order
     * @param string $champs
     * @param string $selecteur
     * @param string|null $where
     *
     * @return array|false return un array d'object ou false
     */
    public function getList(int $limit=null, $order = 'DESC', $champs = 'id',$selecteur = '*', $where=null){
        if ($where !== null) $where = 'WHERE '.$where;
        if ($limit !== null) $limit = 'LIMIT '.$limit;
        if ($champs === 'id') $champs = $champs.'_'.$this->_table;

        $lists = [];

        $sql = $this->_bdd->query(
            'SELECT '.$selecteur.' FROM '.$this->_table.' 
                        INNER JOIN visiteur ON commentaire.id_visiteur = visiteur.id_visiteur
                        LEFT OUTER JOIN utilisateur ON visiteur.id_visiteur = utilisateur.id_visiteur
                        '.$where.'
                        ORDER BY '.$champs.' '.$order.' '.$limit);
            

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

    


}



