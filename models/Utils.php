<?php


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