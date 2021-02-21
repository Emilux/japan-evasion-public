<?php


class Role extends Model
{
    protected $_id_role;
    protected $_nom_role;
    protected $_table = 'role';


    //GETTERS

    public function getId_role(){
        return $this->_id_role;
    }

    public function getNom_role(){
        return $this->_nom_role;
    }


    //SETTERS

    public function setId_role($id_role){
        $this->_id_role = $id_role;
    }

    public function setNom_role($nom_role){
        $this->_nom_role = $nom_role;
    }
}