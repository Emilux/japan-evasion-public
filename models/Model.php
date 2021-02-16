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

    public function getList(int $limit=null){
        if ($limit===null){
            $sql = $this->_bdd->query('SELECT * FROM '.$this->_table);
        } else {
            $sql = $this->_bdd->query('SELECT * FROM '.$this->_table.' LIMIT '.$limit);
        }
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $sql;
    }

    public function getItem($champ, $valeur,$table = null){
        
        if ($table === null){

            $sql = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE '.$champ.' = "'.$valeur.'"');
        } else {
            $sql = $this->_bdd->query('SELECT * FROM '.$table.' WHERE '.$champ.' = "'.$valeur.'"');
        }

        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        return $sql;
    }
    


    //supprimer un élément
    public function Delete(int $id){

        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id_'.$this->_table.' = '.$id);

    }

    public function Add($objet){

        $champs = '';
        $valeurs = '';

        foreach($objet as $key => $value){
            if($value){
                $champs .= substr($key,1).' , ';
                $valeurs .= '"'.$value.'" , ';
            }
        }

        $valeurs = substr($valeurs,0,-2);
        $champs = substr($champs,0,-2);

        $sql = $this->_bdd->prepare('INSERT INTO '.$this->_table.'('.$champs.') VALUES ('.$valeurs.')');
        $sql->execute();

    }

    public function Update(array $data, $id){

        $valeurs = '';

        foreach($data as $key => $value){
            if($value){
                $valeurs .= $key.' = "'.$value.'" , ';
            }
        }

        $valeurs = substr($valeurs,0,-2);

        $sql = $this->_bdd->prepare('UPDATE '.$this->_table.' SET '.$valeurs.' WHERE id_'.$this->_table.' = '.$id);

        var_dump($sql);

        $sql->execute();

    }





}