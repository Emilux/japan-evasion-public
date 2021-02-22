<?php

class Model {

    protected $_bdd;

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

    public function hydrate(array $donnees){

        foreach ($donnees as $attribut => $valeur) {

            $method = 'set'.ucfirst($attribut);

            if(method_exists($this, $method)){

                $this->$method($valeur);
            }
        }

    }

    //Récupérer une liste d'élément
    public function getList(int $limit=null, $order = 'DESC', $champs = 'id',$selecteur = '*', $where=null){
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

    //Récupérer un élément
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

    //Supprimer un élément
    public function Delete(int $id){

        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id_'.$this->_table.' = '.$id);

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