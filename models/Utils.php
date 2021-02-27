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
    public function valid_donnees(string $donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
}