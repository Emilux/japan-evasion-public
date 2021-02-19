<?php

class Follow extends Model {

	protected $_id_follower;
    protected $_id_followed;
	protected $_table = 'follow';

    //GETTERS

    public function getId_Follower(){
        return $this->_id_follower;
    }

    public function getId_Followed(){
        return $this->_id_followed;
    }

    //SETTERS

    public function setId_Follower($id_follower){
		$this->_id_follower = $id_follower;
    }

    public function setId_Followed($id_followed){
		$this->_id_followed = $id_followed;
    }


}