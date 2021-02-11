<?php

//information de la connexion à la bdd
$bdd = '';
$server = '';
$user = '';
$password = '';


//connexion à la bdd
try {
    $bdd = [
        'bdd' => new PDO('mysql:dbname='.$bdd.';host='.$server.'', $user, $password)
    ];
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
