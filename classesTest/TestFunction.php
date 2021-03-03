<?php

/**
 * TEST PHPUnits
 */
require('../models/Utils.php');

//require ('../controllers/InscriptionController.php');

class TestFunction extends \PHPUnit\Framework\TestCase {

	
	//TEST N° 1

    /** Truncate une chaine de caractère
    *
    *
    * 
    */
    
    public function testTruncateString() {


        $Utils = new Utils();

        $string1 = 'Bip Bip Boop';
        $string3 = 'Boop Bip Bip';

        $this->assertSame($Utils->truncateString($string1, 3), 'Bip...');
        $this->assertSame($Utils->truncateString($string3, 5),'Boop ...');

    }



    //TEST N° 2

    /** Retourne l'âge en fonction d'une date
     *
     *
    * 
    */
    
    public function testgetAge() {


        $Utils = new Utils();

        $date1 = '09-09-1992';
        $date2 = '20-12-1999';

        $this->assertSame($Utils->getAge($date1), 28);
        $this->assertSame($Utils->getAge($date2), 21);

    }
    

    //TEST N° 3

    /** Nettoie une chaine de caractère
     *
     *
     * @dataProvider  donneesForTestvalid_donnees
    */

    
    public function testValid_donnees(string $donnees){
       
        $Utils = new Utils();
        $this->assertSame($Utils->valid_donnees($donnees),'&lt;script&gt;Bonjour1&lt;/script&gt;');

    }


    public function donneesForTestvalid_donnees() {

		return [
            ['<script>Bonjour1</script>'],
		];

	}
    

}