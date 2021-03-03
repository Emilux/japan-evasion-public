<?php
/**
 * @file        Article.php
 * @brief       Contient la déclaration de la classe Article
 * @details     Elle permet de récupérer et stocker les données de la table \em \b Article.
 *              Mais aussi créer des articles.
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class Article extends Utilisateur {

    protected $_id_article;
    protected $_contenu_article;
    protected $_titre_article;
    protected $_date_publication_article;
    protected $_photo_article;
    protected $_temps_lecture_article;
    protected $_statut_article;
    protected $_id_utilisateur;
    protected $_table = 'article';
    

    //GETTERS

    /**
     * @return int
     */
    public function getId_Article(){
        return $this->_id_article;
    }

    /**
     * @return string
     */
    public function getContenu_Article(){
        return $this->_contenu_article;
    }

    /**
     * @return string
     */
    public function getTitre_Article(){
        return $this->_titre_article;
    }

    /**
     * @return string
     */
    public function getDate_Publication_Article(){
        return $this->_date_publication_article;
    }

    /**
     * @return string
     */
    public function getPhoto_Article(){
        return $this->_photo_article;
    }

    /**
     * @return int
     */
    public function getTemps_Lecture_Article(){
        return $this->_temps_lecture_article;
    }

    /**
     * @return string
     */
    public function getStatut_Article(){
        return $this->_statut_article;
    }

    /**
     * @return int
     */
    public function getId_Utilisateur(){
        return $this->_id_utilisateur;
    }

    

    //SETTERS

    /**
     * @param int $id_article
     */
    public function setId_Article(int $id_article){
		$this->_id_article = $id_article;
    }

    /**
     * @param string $contenu_article
     */
    public function setContenu_Article($contenu_article){
        $this->_contenu_article = $contenu_article;
    }

    /**
     * @param string $titre_article
     */
    public function setTitre_Article(string $titre_article){
        $this->_titre_article = $titre_article;
    }

    /**
     * @param string $date_publication_article
     */
    public function setDate_Publication_Article($date_publication_article){
        $this->_date_publication_article = $date_publication_article;
    }

    /**
     * @param string $photo_article
     */
    public function setPhoto_Article($photo_article){
        $this->_photo_article = $photo_article;
    }

    /**
     * @param int $temps_lecture_article
     */
    public function setTemps_Lecture_Article(int $temps_lecture_article){
        $this->_temps_lecture_article = $temps_lecture_article;
    }

    /**
     * @param string $statut_article
     */
    public function setStatut_Article(string $statut_article){
        $this->_statut_article = $statut_article;
    }

    /**
     * @param int $id_utilisateur
     */
    public function setId_utilisateur($id_utilisateur){
        $this->_id_utilisateur = $id_utilisateur;
    }

    /** Récupère un article et le rédacteur lui correspondant
     *
     * @param string $champ
     * @param string $valeur
     * @param string $selecteur
     * @param string|null $where
     * @param string|null $table
     *
     * @return boolean|object
     */
    public function getItem($champ, $valeur, $selecteur = "*",$where = null,$table = null){

        if($where === null){
            $sql = $this->_bdd->query(
                'SELECT '.$selecteur.' FROM '.$this->_table.' 
                    INNER JOIN utilisateur ON article.id_utilisateur = utilisateur.id_utilisateur
                    INNER JOIN visiteur ON visiteur.id_visiteur = utilisateur.id_visiteur
                    WHERE '.$champ.' = "'.$valeur.'"');


        } else{
            $sql = $this->_bdd->query(
                'SELECT '.$selecteur.' FROM '.$this->_table.' 
                    INNER JOIN utilisateur ON article.id_utilisateur = utilisateur.id_utilisateur
                    INNER JOIN visiteur ON visiteur.id_visiteur = utilisateur.id_visiteur
                    WHERE '.$where);
        }

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

    /** Récupère la liste des articles ainsi que leurs rédacteur
     *
     * @param int|string|null $limit
     * @param string $order
     * @param string $champs
     * @param string $selecteur
     * @param string|null $where
     *
     * @return array|false return un array d'object ou false
     */
    public function getList($limit=null, $order = 'DESC', $champs = 'id',$selecteur = '*', $where=null){
        if ($where !== null) $where = 'WHERE '.$where;
        if ($limit !== null) $limit = 'LIMIT '.$limit;
        if ($champs === 'id') $champs = $champs.'_'.$this->_table;

        $lists = [];

        $sql = $this->_bdd->query(
            'SELECT '.$selecteur.' FROM '.$this->_table.' 
                        INNER JOIN utilisateur ON article.id_utilisateur = utilisateur.id_utilisateur
                        INNER JOIN visiteur ON visiteur.id_visiteur = utilisateur.id_visiteur
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


    /** Récupère la liste des articles ainsi que leurs rédacteur
     *
     *
     * @return boolean
     * 
     * 
     */
    public function creerArticle(){


    
        $sql = $this->_bdd->prepare(
            'INSERT INTO '.$this->_table.' (titre_article, photo_article, temps_lecture_article, contenu_article, statut_article, id_utilisateur) 
            VALUE ("'.$this->getTitre_Article().'","'.$this->getPhoto_Article().'","'.$this->getTemps_Lecture_Article().'","'.$this->getContenu_Article().'","PENDING","'.$this->getId_Utilisateur().'")'

        );

        $sql = $sql->execute();
        return $sql;


    }

    /**
     * Cette fonction permet de modifier les informations d'un article
     * Si l'article est modifier return true sinon retourne false
     *
     * @param array $data
     * @param $id
     *
     * @return  {boolean}     return true si article mise a jour, sinon false
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

            ' UPDATE '.$this->_table.' SET '.$valeurs.
            ' WHERE '.$this->_table.'.id_article = '.$id

        );
        $sql = $sql->execute();
        return $sql;

    }





}