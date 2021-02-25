<?php


class Role extends Model
{
    protected $_id_role;
    protected $_nom_role;
    protected $_table = 'role';


    //GETTERS

    /**
     * @return int
     */
    public function getId_role(){
        return $this->_id_role;
    }

    /**
     * @return string
     */
    public function getNom_role(){
        return $this->_nom_role;
    }


    //SETTERS

    /**
     * @param int $id_role
     */
    public function setId_role($id_role){
        $this->_id_role = $id_role;
    }

    /**
     * @param string $nom_role
     */
    public function setNom_role($nom_role){
        $this->_nom_role = $nom_role;
    }
}