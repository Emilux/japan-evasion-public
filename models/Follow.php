<?php
/**
 * @file        Follow.php
 * @brief       Contient la déclaration de la classe Follow
 * @details     Elle permet de récupérer et stocker les données de la table \em \b Follow et relation entre
 *              les utilisateurs.
 *              Mais aussi d'ajouter des Followers.
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class Follow extends Model {

	protected $_id_follower;
    protected $_id_followed;
	protected $_table = 'follow';

    //GETTERS

    /**
     * @return int
     */
    public function getId_Follower(){
        return $this->_id_follower;
    }

    /**
     * @return int
     */
    public function getId_Followed(){
        return $this->_id_followed;
    }

    //SETTERS

    /**
     * @param int $id_follower
     */
    public function setId_Follower($id_follower){
		$this->_id_follower = $id_follower;
    }

    /**
     * @param int $id_followed
     */
    public function setId_Followed($id_followed){
		$this->_id_followed = $id_followed;
    }


    /** Ajoute un follower a un utilisateur
    *
    * @return string
    */
    public function doFollow(){
    
      $query = 'INSERT INTO follow ( id_follower, id_followed ) VALUES ("'.$this->getId_Follower().'" , "'.$this->getId_Followed().'" )';
      $stmt = $this->_bdd->prepare($query);
      $success = $stmt->execute();
      if($success){
        $nbFollower = $this->Count('','','id_followed = '.$this->getId_Followed());
        $data['success'] = TRUE;
        $data['message'] = 'NE PLUS SUIVRE';
        $data['count'] = $nbFollower;
      } else {
        $data['success'] = FALSE;
        $data['message'] = 'not weldone';
      }
      return $data;
    }


}