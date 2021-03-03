<?php

$newsletter = new Newsletter();


$name_newsletter = $Utils->valid_donnees($_POST['name']);
$email_newsletter =$Utils->valid_donnees( $_POST['email']);

$newsletter->setName($name_newsletter);

$newsletter->setEmail($email_newsletter);

$result = $newsletter->AddNewsletter();
if ($result['success']){
    $headers = 'From: no-reply@japan-evasion.com';
    $msg = "Hi ".$name_newsletter. "\nThank you for subscribing to our newsletter!";
    mail($email_newsletter,"The message", $msg,$headers);
}
echo json_encode($result);
