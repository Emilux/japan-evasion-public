<?php

class Model {

    private $_bdd;


    public function __construct($bdd = null){
        if ($bdd === null){
            global $dbh;
            $this->_bdd = $dbh;
        } else {
            $this->_bdd = $bdd;
        }
    }

    public function getList(string $table,int $limit=null){

        if ($limit===null){
            $sql = $this->_bdd->query('SELECT * FROM '.$table);
        } else {
            $sql = $this->_bdd->query('SELECT * FROM '.$table.' LIMIT '.$limit);
        }
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $sql;
    }

    public function getItem($table,$type=null,$where=null,$donnee=null){
        $sql = $this->_bdd->query('SELECT * FROM '.$table);
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $sql;
    }



}