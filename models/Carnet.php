<?php

class Carnet extends Model {

	protected $_id_carnet;
    protected $_contenu_carnet;
	protected $_table = 'carnet_de_voyage';

    //GETTERS

    public function getId_Carnet(){
        return $this->_id_carnet;
    }

    public function getContenu_Carnet(){
        return $this->_contenu_carnet;
    }

    //SETTERS

    public function setId_Carnet($id_carnet){
		$this->_id_carnet = $id_carnet;
    }

    public function setContenu_Carnet($contenu_carnet){
		$this->_contenu_carnet = $contenu_carnet;
    }


}