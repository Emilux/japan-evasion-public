<?php

class Image {


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


	public static function GetImageLink($largeur, $nom){

		return ('./assets/media/avatar/'.$largeur.'-'.$nom);
	}


}