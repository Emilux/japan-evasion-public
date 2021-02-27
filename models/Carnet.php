<?php

class Carnet extends Model {

	protected $_id_carnet;
    protected $_contenu_carnet;
	protected $_table = 'carnet_de_voyage';

    //GETTERS

    /**
     * @return int
     */
    public function getId_Carnet(){
        return $this->_id_carnet;
    }

    /**
     * @return string
     */
    public function getContenu_Carnet(){
        return $this->_contenu_carnet;
    }

    //SETTERS

    /**
     * @param int $id_carnet
     */
    public function setId_Carnet($id_carnet){
		$this->_id_carnet = $id_carnet;
    }

    /**
     * @param string $contenu_carnet
     */
    public function setContenu_Carnet($contenu_carnet){
		$this->_contenu_carnet = $contenu_carnet;
    }


}