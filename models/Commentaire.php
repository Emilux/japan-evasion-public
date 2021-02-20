<?php

class Commentaire extends Utilisateur {

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
        return $this->_datetime_commentaire;
    }

    public function getId_Article(){
        return $this->_id_article;
    }

    //SETTERS

    public function setId_Commentaire(int $id_commentaire){
		$this->_id_commentaire = $id_commentaire;
    }

    public function setContenu_Commentaire(string $contenu_commentaire){
		$this->_contenu_commentaire = $contenu_commentaire;
    }

    public function setDatetime_Commentaire($datetime_commentaire){
        $this->_datetime_commentaire = $datetime_commentaire;
    }

    public function setId_Article(int $id_article){
        $this->_id_article = $id_article;
    }
    

    public function addCommentaire($estVisiteur){
        $visiteur = new Visiteur();

        $visiteur->setPseudo_Visiteur($this->getPseudo_Visiteur());
        $visiteur->setEmail_Visiteur($this->getEmail_Visiteur());

        if ($estVisiteur){
            /* LANCER TRANSACTION MYSQL */
            $this->_bdd->beginTransaction();

            //Créer visiteur
            if ($visiteur->creerVisiteur()) {
                echo 'user crée';

                //Récuperer id_visiteur du visiteur créer
                $visiteur = $visiteur->getItem('pseudo_visiteur', $this->getPseudo_Visiteur(), 'id_visiteur');
                $this->setId_Visiteur($visiteur->getId_visiteur());

                //Création utilisateur
                $sql = $this->_bdd->prepare(
                    'insert into `commentaire` (contenu_commentaire,datetime_commentaire,id_article,id_visiteur) VALUES ("'.$this->getContenu_Commentaire().'",current_timestamp(),"'.$this->getId_Article().'","'.$this->getId_Visiteur().'")'
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
        } else {
            //Création utilisateur
            $sql = $this->_bdd->prepare(
                'insert into `commentaire` (contenu_commentaire,datetime_commentaire,id_article,id_visiteur) VALUES ("'.$this->getContenu_Commentaire().'",current_timestamp(),"'.$this->getId_Article().'","'.$this->getId_Visiteur().'")'
            );
            $sql = $sql->execute();
            return $sql;
        }

    }

    //Récupérer un élément
    public function getItem($champ, $valeur,$selecteur = "*",$table = null){

        $sql = $this->_bdd->query('SELECT '.$selecteur.' FROM '.$this->_table.' WHERE '.$champ.' = "'.$valeur.'"');
        $sql = $this->_bdd->query(
            'SELECT '.$selecteur.' FROM '.$this->_table.' 
                        INNER JOIN visiteur ON commentaire.id_visiteur = visiteur.id_visiteur
                        LEFT OUTER JOIN utilisateur ON visiteur.id_visiteur = utilisateur.id_visiteur
                        WHERE '.$champ.' = "'.$valeur.'"');
        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        if ($sql){

            $object = new $this->_table($sql);
            return $object;
        }

        return $sql;

    }

    /*
     *
     *
     *
     *
     *
     */
    //Permet de récupérer un commentaire ainsi que les infos lié au profil
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

        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($sql){
            foreach($sql as $donnees){

                $lists[] = new $this->_table($donnees);
            }
            return $lists;
        }
        return false;
    }

    /*Ajout commentaire par un visiteur
    public function addCommentaireVisiteur(){


        $sql = $this->_bdd->prepare('INSERT INTO '.$this->_table.' (contenu_commentaire, datetime_commentaire, id_article) VALUES ("'.$this->getContenu_Commentaire.'", "'.$this->getDatetime_Commentaire.'", "'.$this->getId_Article.'")');
        $sql->execute();

        CURRENT_TIMESTAMP;

    }*/

}



