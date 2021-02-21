<?php


class Reponse_de extends Model
{

    protected $_id_commentaire;
    protected $_id_reponse;
    protected $_table = 'reponse_de';

    //GETTERS

    public function getId_Commentaire(){
        return $this->_id_commentaire;
    }

    public function getId_Reponse(){
        return $this->_id_reponse;
    }

    //SETTERS

    public function setId_Commentaire(int $id_commentaire){
        $this->_id_commentaire = $id_commentaire;
    }

    public function setId_Reponse(int $id_reponse){
        $this->_id_reponse = $id_reponse;
    }


}