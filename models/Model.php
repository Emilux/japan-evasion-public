<?php

class Model {

    private $_bdd;


    public function __construct(array $donnees,$dbh = null){
        if ($dbh === null){
            global $bdd;
            $this->_bdd = $bdd;
        } else {
            $this->_bdd = $dbh;
        }

        $this->hydrate($donnees);
    }



    public function hydrate(array $donnees){

        foreach ($donnees as $attribut => $valeur) {

            $method = 'set'.ucfirst($attribut);

            if(method_exists($this, $method)){

                $this->$method($valeur);
            }
        }

    }

    public function setBdd($bdd){

        $this->_bdd = $bdd;
    }


    public function getList(){


        $lists = [];

        $sql = $this->_bdd->query('SELECT * FROM '.$this->_table);

        while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){

            $lists[] = new $this->_table($donnees);
        }

        return $lists;

    }


    // recupère un seul personnage en fonction de l'id
    public function getItem(int $id){

        $sql =$this->_bdd->query('SELECT * FROM '.$this->_table.' where id_'.$this->_table.' = '.$id);

        $donnees = $sql->fetch(PDO::FETCH_ASSOC);

        return new $this->_table($donnees);

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


    public function Update($objet, $id){

        $valeurs = '';

        foreach ($objet as $key => $value) {
            if($value){
                $valeurs .= substr($key,1).' = "'.$value.'" , ';
            }
        }


        $valeurs = substr($valeurs,0,-2);


        $sql = $this->_bdd->prepare('UPDATE '.$this->_table.' SET '.$valeurs.' WHERE id_'.$this->_table.' = '.$id);



        $sql->execute();
    }


}