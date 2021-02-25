<?php

class Model {

    protected $_bdd;

    /**
     * Model constructor.
     * @param array $donnees
     * @param pdo $bdd
     *
     */
    public function __construct($donnees = null,$bdd = null){
        if ($bdd === null){
            global $dbh;
            $this->_bdd = $dbh;
        } else {
            $this->_bdd = $bdd;
        }

        if ($donnees !== null){
            $this->hydrate($donnees);
        }

    }

    /** Hydrate les variables de chaque object dans laquel cette fonction est appelé
     *
     * @param array $donnees
     *
     * @return void
     */
    public function hydrate(array $donnees){

        foreach ($donnees as $attribut => $valeur) {

            $method = 'set'.ucfirst($attribut);

            if(method_exists($this, $method)){

                $this->$method($valeur);
            }
        }

    }

    /** Cherche la liste des données d'une table donnée dans la base de donnée
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

        $sql = $this->_bdd->query('SELECT '.$selecteur.' FROM '.$this->_table.' '.$where.' ORDER BY '.$champs.' '.$order.' '.$limit);

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

    /** Cherche une seule ligne  d'une dans dans la base de donnée
     * et return un object de la table select ou false
     *
     * @param string $champ
     * @param string $valeur
     * @param string $selecteur
     * @param string|null $where
     * @param string|null $table
     *
     * @return false|mixed|null
     */
    public function getItem($champ, $valeur,$selecteur = "*",$where = null,$table = null){

        if ($table === null){

            if($where === null){
                $sql = $this->_bdd->query('SELECT '.$selecteur.' FROM '.$this->_table.' WHERE '.$champ.' = "'.$valeur.'"');

                
            } else{
                $sql = $this->_bdd->query('SELECT '.$selecteur.' FROM '.$this->_table.' WHERE '.$where);
         
            }
            
        } else {
            $sql = $this->_bdd->query('SELECT '.$selecteur.' FROM '.$table.' WHERE '.$champ.' = "'.$valeur.'"');
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

    /** Supprime une ligne dans une table de la base de donnée
     * en utilisant les paramètres entrés dans le fonction
     *
     * @param int $id
     * @param string|null $where
     *
     * @return false|PDOStatement
     */
    public function Delete($id,$where = null){


        if($where === null){
            $sql = $this->_bdd->prepare('DELETE FROM '.$this->_table.' WHERE id_'.$this->_table.' = '.$id);
        } else {
            $sql = $this->_bdd->prepare('DELETE FROM '.$this->_table.' WHERE '.$where); 
        }
        
        $sql = $sql->execute();

        return $sql;
        
    }

    //Ajouter un élément
    public function Add($objet){

        $champs = '';
        $valeurs = '';

        foreach($objet as $key => $value){
            if($value){
                $champs .= $key.' , ';
                $valeurs .= '"'.$value.'" , ';
            }
        }

        $valeurs = substr($valeurs,0,-2);
        $champs = substr($champs,0,-2);

        $sql = $this->_bdd->prepare('INSERT INTO '.$this->_table.'('.$champs.') VALUES ('.$valeurs.')');
        
        $sql->execute();
        return $sql;

    }

    //Modifier un élément
    public function Update(array $data, $id){

        $valeurs = '';

        foreach($data as $key => $value){
            if($value){
                $valeurs .= $key.' = "'.$value.'" , ';
            }
        }

        $valeurs = substr($valeurs,0,-2);

        $sql = $this->_bdd->prepare('UPDATE '.$this->_table.' SET '.$valeurs.' WHERE id_'.$this->_table.' = '.$id);
        $sql->execute();

    }

    //Récupérer un nombre de commentaire selon l'article
    public function Count($champs = NULL, $valeur = NULL)
    {
        if($champs === NULL && $valeurs === NULL){

            $sql = $this->_bdd->query('SELECT COUNT(*) FROM '.$this->_table);
        }
        else{

            $sql = $this->_bdd->query('SELECT COUNT(*) FROM '.$this->_table.' WHERE '.$champs.' ='.$valeur);

        }

        if ($sql){
            return $sql->fetchColumn();
        }

        return $sql;
    }





}