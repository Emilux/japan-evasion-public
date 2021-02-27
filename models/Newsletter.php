<?php


//a vérifier

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
        $query = 'INSERT INTO `newsletter`(`email_newsletter` , `name_newsletter`  ) VALUES("'.$this->getEmail_Newsletter().'", "'.$this->getName_Newsletter().'"  )';
        $stmt = $this->_bdd->prepare($query);
        //$stmt->bind_param("ss",$this->_email_newsletter, $this->_name_newsletter );
        $success = $stmt->execute();
        if($success) {
            $data['success'] = TRUE;
            $data['message'] = "Hi ".$this->_name_newsletter."!<br />Thank you for submitting your information.";
        } else if ($stmt->errno) {
            $data['success'] = FALSE;
            $data['message'] = $stmt->error;
        }
        return $data;
    }


}
