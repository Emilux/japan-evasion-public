<?php
/**
 * @file        Image.php
 * @brief       Contient la déclaration de la classe Image
 * @details     Permet de gérer tout ce qui a en rapport avec l'ajout d'image sur le serveur.
 * @authors     Sadaf MIRZAD, Jordan HERTH, Emilien FUCHS
 * @version     1.0
 * @date        2021
 */
class Image {

    /** Redimensionne une image
     *
     * @param string $image_source
     * @param int $largeur
     * @param string $nom
     */
	 public function resizeImage($image_source, $largeur, $nom) {


		$largeur = (int) $largeur;

		$source = imagecreatefromjpeg($image_source); 

		$reduction = ( ($largeur * 100)/imagesx($source));
		$hauteur = ((imagesy($source) * $reduction)/100 );


		$image_destination = imagecreatetruecolor($largeur, $hauteur); 

		imagecopyresampled($image_destination, $source, 0, 0, 0, 0, imagesx($image_destination), imagesy($image_destination), imagesx($source), imagesy($source)); //rezise


		$nom = str_replace(" ", "-", $nom);
		
		$nouvelle_image = imagejpeg($image_destination, "./assets/media/avatar/".$largeur."-".$nom."");

	}

    /** Renvoi le lien d'une image redimensionné
     *
     * @param int $largeur
     * @param string $nom
     * @return string
     */
	public static function GetImageLink($largeur, $nom){

		return ('./assets/media/avatar/'.$largeur.'-'.$nom);
	}


}