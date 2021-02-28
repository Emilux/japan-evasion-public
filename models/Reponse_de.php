<?php

/**
 * @file        Reponse_de.php
 * @brief       Contient la déclaration de la classe Reponse_de
 * @details     Elle permet de récupérer et stocker les données de la table \em \b Reponse_de.
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class Reponse_de extends Model
{

    protected $_id_commentaire;
    protected $_id_reponse;
    protected $_table = 'reponse_de';

    //GETTERS

    /**
     * @return int
     */
    public function getId_Commentaire(){
        return $this->_id_commentaire;
    }

    /**
     * @return int
     */
    public function getId_Reponse(){
        return $this->_id_reponse;
    }

    //SETTERS

    /**
     * @param int $id_commentaire
     */
    public function setId_Commentaire(int $id_commentaire){
        $this->_id_commentaire = $id_commentaire;
    }

    /**
     * @param int $id_reponse
     */
    public function setId_Reponse(int $id_reponse){
        $this->_id_reponse = $id_reponse;
    }

    public function AddReponse(){
        //Création utilisateur
        $sql = $this->_bdd->prepare(
            'insert into '.$this->_table.' (id_reponse,id_commentaire) VALUES ("'.$this->getId_Reponse().'", "'.$this->getId_Commentaire().'")'
        );
        $sql = $sql->execute();
        return $sql;
    }

}