<?php

/**
 * @file        Newsletter.php
 * @brief       Contient la déclaration de la classe Newsletter
 * @details     Elle permet de récupérer et stocker les données de la table \em \b Newsletter.
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class Newsletter extends Model {
    protected $id_newsletter;
    protected $name_newsletter;
    protected $email_newsletter;


    /**
     * @return string
     */
    public function getName_Newsletter(){
        return $this->_name_newsletter;
    }

    /**
     * @return string
     */
    public function getEmail_Newsletter(){
        return $this->_email_newsletter;
    }

    /**
     * @return int
     */
    public function getId_Newsletter(){
        return $this->_id_newsletter;
    }

    /**
     * @param string $name_newsletter
     */
    public function setName($name_newsletter) {
        $this->_name_newsletter = $name_newsletter;
    }

    /**
     * @param string $email_newsletter
     */
    public function setEmail($email_newsletter) {
        $this->_email_newsletter = $email_newsletter;
    }

    /**
     * @param int $id_newsletter
     */
    public function setId($id_newsletter) {
        $this->_id_newsletter = $id_newsletter;
    }

    /** Ajoute les informations du visiteur à la table newsletter
     *  Return array contenant le message de succès ou non de la requête
     *
     * @return array
     */
    public function AddNewsletter()
    {   
    if ($this->_name_newsletter !=="" && $this->_email_newsletter !== "") { 

         $query = ('SELECT * FROM newsletter WHERE email_newsletter = "'.$this->getEmail_Newsletter().'"');
         $stmt = $this->_bdd->prepare($query);
         if($stmt->execute()){
             if($stmt->rowCount() > 0){
                $data['message'] = 'email exist';
                
            
            }else{ 
               
                $query = 'INSERT INTO `newsletter`(`email_newsletter` , `name_newsletter`  ) VALUES("'.$this->getEmail_Newsletter().'", "'.$this->getName_Newsletter().'"  )';
                $stmt = $this->_bdd->prepare($query);   
                $success = $stmt->execute();
                    if($success) {
                        $data['success'] = TRUE;
                        $data['message'] = "Hi ".$this->_name_newsletter."!<br />Thank you for submitting your information.";
                    } else if ($stmt->errno) {
                        $data['success'] = FALSE;
                        $data['message'] = $stmt->error;
                    }
                
                }
            }
        }else{
            $data['message'] = 'Please fill all the  fields';
 
        }
        return $data;
    }  


}
