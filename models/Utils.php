<?php
/**
 * @file        Utils.php
 * @brief       Contient la déclaration de la classe Utils.
 * @details     Contient des fonctions utilitaires.
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class utils
{
    /** Nettoie une chaine de caractère
     *
     *
     * @param string $donnees
     * @return string
     */
    public function valid_donnees(string $donnees)
    {
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);

        return $donnees;
    }

    /** Génére un mot de passe aléatoire
     *
     *
     *
     * @return string
     */
    public function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }


    public function getAge($date)
    {

        return intval(floor((time() - strtotime($date)) / 31556926));


    }

    public function truncateString($str, $num)
    {

        if (strlen($str) <= $num) {
            return $str;
        }
    }

    public function getDayInterval($date)
    {
        return intval(floor((time() - strtotime($date))/86400));

    }
}


